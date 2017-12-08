<?php

//ob_start();

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class TestapiController extends AppController {

	public $uses = array('UserPlan','UserDrink','SubscriptionPlan','Product','Product','RestaurantsType','User','UserCoupon');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('api_planbuy','api_drinkbuy','api_drink_history','api_cronupdate','api_couponapply','api_resgallery','api_getallcity','api_resgallerybyid','api_ratings','api_getalldrink','api_codetest','api_sendpush','api_testpush');        
	}



	private function strposa($haystack, $needle, $offset = 0) {
		if (!is_array($needle))
			$needle = array($needle);
		foreach ($needle as $query) {
			if (strpos($haystack, $query, $offset) !== false)
                return true; // stop on first true result
        }
        return false;
    }


    public function api_resgallery(){   
    	$this->loadModel('Gallery'); 

    	$id = $_POST['id'];
    	$data=$this->Gallery->find('all', array('conditions' => array('Gallery.res_id' => $id)));
    	$cnt=count($data);

    	if($cnt==0){
    		$response['error'] =1;
    		$response['data'] = "no data";
    	}
    	else{
    		for ($i = 0; $i < $cnt; $i++) {               
    			$data[$i]['Gallery']['image'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Gallery']['image'];

    		}  
    		$response['error'] = 0;
    		$response['data'] = $data;
    	}      

    	echo json_encode($response);        
    	exit;
    }

    public function api_resgallerybyid(){   
    	$this->loadModel('Gallery'); 

    	$id = $_POST['id'];
    	$data=$this->Gallery->find('first', array('conditions' => array('Gallery.id' => $id)));
    	$cnt=count($data);


    	if($cnt==0){
    		$response['error'] =1;
    		$response['data'] = "no data";
    	}
    	else{
    		$data['Gallery']['image'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data['Gallery']['image'];
    		$response['error'] = 0;
    		$response['data'] = $data;
    	}      

    	echo json_encode($response);        
    	exit;
    }



    public function api_planbuy(){        
    	$userId = $_REQUEST['userid'];
    	$planId = $_REQUEST['planid'];
    	if($userId!="" && $planId!=""){            
    		$this->request->data['UserPlan']['user_id'] = $userId;
    		$this->request->data['UserPlan']['plan_id'] = $planId;

    		$this->request->data['UserPlan']['payment_id'] = $_REQUEST['payment_id'];
    		$this->request->data['UserPlan']['price'] = $_REQUEST['price'];
    		$this->request->data['UserPlan']['original_price'] = $_REQUEST['original_price'];
    		$this->request->data['UserPlan']['discount'] = $_REQUEST['discount'];


    		$user = $this->User->find('first',array('conditions'=>array('User.id'=>$userId)));

    		if($user){

    			/* Free one month sunscripiton Plan */
    			$couponby = $this->UserCoupon->find('first',array('conditions'=>array('UserCoupon.userid'=>$userId,'status'=>0),'fields'=>array('UserCoupon.*','(SELECT COUNT( * ) FROM  `user_coupons` WHERE user_coupons.invited_by=UserCoupon.invited_by AND user_coupons.status =1) as totalredeem'))); 
    			if(count($couponby)>0){
                    // echo "<pre>";
                    // print_r($_POST);
                    // die();
    				if($couponby[0]['totalredeem']<7){
    					$adduser = $this->User->find('first',array('conditions'=>array('User.id'=>$couponby['UserCoupon']['invited_by'])));

    					$adduserfreedrink = ($adduser['User']['total_freedrink'])+30;

    					$this->request->data['User']=array();
    					$this->request->data['User']['total_freedrink']=$adduserfreedrink;
    					$this->request->data['User']['id']=$adduser['User']['id'];
    					$this->User->save($this->request->data);

    					$this->request->data['UserCoupon']['status']=1;
    					$this->request->data['UserCoupon']['id']=$couponby['UserCoupon']['id'];

    					$this->UserCoupon->save($this->request->data);                    

    				}
    			}  
    			$this->request->data['User']=array();         	 

    			$totalDrink = $user['User']['total_freedrink'];
                // Monthly free Drink 
    			if($planId==1){
    				$freedrink = 30 ;
    				$totalDrink+=$freedrink;
    			}
                // Yearly Free Drink
    			if($planId==2){
    				$freedrink = 365 ;
    				$totalDrink+=$freedrink;
    			}
    			$this->request->data['User']['today_freedrink']=1;
    			$this->request->data['User']['total_freedrink']=$totalDrink;
    			$this->request->data['User']['latest_plan']=$planId;

    			$this->request->data['User']['id']=$userId;
    			$this->User->save($this->request->data);

    			$this->UserPlan->create();
    			$this->UserPlan->save($this->request->data);

    			$response['error']=0;
    			$response['msg']="Plan Subscribed Successfully"; 

    		}
    		else{
    			$response['error']=1;
    			$response['msg']="User not found";
    		}           
    	}
    	else{
    		$response['error']=1;
    		$response['msg']="Please Fill all fields";
    	}
       // echo "hello";
    	echo json_encode($response);
    	exit;
    }


    public function api_drinkbuy(){
    	Configure::write("debug", 0);
    	$userId = $_REQUEST['userid'];


    	if($userId!=""){
    		$user = $this->User->find('first',array('conditions'=>array('User.id'=>$userId)));

    		if($user){         

    			if($user['User']['today_freedrink']==0){
    				$response['error']=1;
    				$response['msg']="Already buy today freedrink. "; 
    			}
    			else{

    				$totalDrink = $user['User']['total_freedrink'];
    				$redeemDrink = $user['User']['redeem_freedrink'];

    				if(($totalDrink==0) && ($redeemDrink==0)){
    					$response['error'] = 1 ;
    					$response['msg'] = "You have no more Free Drink. For more Drink, Please Subscribe a Freedrink Plan.";  
    				}
    				else{
    					if($totalDrink>0){
    						$totalDrink-=1;
    						$this->request->data['User']['total_freedrink']=$totalDrink;
    					}
    					else{
    						$redeemDrink-=1;
    						$this->request->data['User']['redeem_freedrink']=$redeemDrink;
    					}
    					$this->request->data['User']['today_freedrink']=0;                    
    					$this->request->data['User']['id']=$userId;

    					$this->User->save($this->request->data);


    					$resid = $_REQUEST['resid'];
    					$drinkid = $_REQUEST['drinkid'];

    					if($resid!="" && $drinkid!=""){
    						$this->request->data['UserDrink']['userid'] = $userId;
    						$this->request->data['UserDrink']['resid'] = $resid;
    						$this->request->data['UserDrink']['drinkid'] = $drinkid;
    						$this->UserDrink->create();
    						$this->UserDrink->save($this->request->data);  
    					}                   
    					$response['error']=0;
    					$response['msg']="Free Drink get Successfully"; 
    				}

    			}
    		}
    		else{
    			$response['error']=1;
    			$response['msg']="User not found";
    		}           
    	}
    	else{
    		$response['error']=1;
    		$response['msg']="Please Fill all fields";
    	}
       // echo "hello";
    	echo json_encode($response);
    	exit;
    }

    public function api_drink_history(){
    	Configure::write("debug", 2);
    	$userId = $_REQUEST['userid'];
    	if($userId!=""){
    		$this->UserDrink->recursive=2;
    		$drink = $this->UserDrink->find('all',array('conditions'=>array('UserDrink.userid' =>$userId)));   

    		for($i=0;$i<count($drink);$i++){           
    			if ($drink[$i]['Product']['image']) {
    				$drink[$i]['Product']['image'] = FULL_BASE_URL . $this->webroot . 'files/product/' .$drink[$i]['Product']['image'];
    			} else {
    				$drink[$i]['Product']['image']= FULL_BASE_URL . $this->webroot . 'img/no-image.jpg';
    			}
    		}

            // echo "<pre>";
            // print_r(count($drink));
            // print_r($drink);
            // die();
    		$response['data']=$drink;
            if(count($drink)>0){
                $response['error']=0;
            }
            else{
                $response['error']=1;
                
            }
    	}
    	else{
    		$response['error']=1;
    		$response['msg']="Please Fill all fields";
    	}
    	echo json_encode($response);
    	exit; 

    }

    

    public function api_couponapply(){
    	Configure::write("debug", 2);
    	$userId = $_REQUEST['userid'];
    	$coupon_code = $_REQUEST['coupon_code'];
    	$user = $this->User->find('first',array('conditions'=>array('User.id' =>$userId))); 

    	if($user){
    		$coupon_codes = $this->User->find('first',array('conditions'=>array('User.coupon_code' =>$coupon_code)));
    		if($coupon_codes){
    			if($userId!=$coupon_codes['User']['id']){
    				$used = $this->UserCoupon->find('all',array('conditions'=>array('UserCoupon.coupon' =>$coupon_code,'UserCoupon.userid' =>$userId)));                   
    				if(!$used){
    					$this->request->data['UserCoupon']['coupon']=$coupon_code;
    					$this->request->data['UserCoupon']['userid']=$userId;
    					$this->request->data['UserCoupon']['invited_by']=$coupon_codes['User']['id'];

    					$this->UserCoupon->create();
    					$this->UserCoupon->save($this->request->data);

    					$response['msg'] = "Successfully Applied coupon. Enjoy your free Drink";
    					$response['status']=5;
    					$response['error'] = 0;
    				}
    				else{
    					$response['msg'] = "Already Used Coupon code By You";
    					$response['status']=4;
    					$response['error'] = 1; 
    				}
    			}
    			else{
    				$response['msg'] = "You can not use own Coupon Code";
    				$response['status']=3;
    				$response['error'] = 1; 
    			}

    		}
    		else{
    			$response['msg'] = "Invalid Coupon Code";
    			$response['status']=2;
    			$response['error'] = 1; 
    		}
    	}
    	else{

    		$response['error'] = 1;
    		$response['msg'] = "User not found";
    		$response['status']=1;
    	}
    	echo json_encode($response);
    	exit;     
    }

    public function api_getallcity(){
    	Configure::write("debug", 2);
    	$this->loadModel('Restaurant');

    	$city = $this->Restaurant->query('SELECT LCASE(restaurants.city) as city FROM `restaurants` group by restaurants.city order by restaurants.city');        

    	if($city){
    		$citys = "";
    		foreach ($city as $key) {
    			$citys[]= $key[0]['city'];
    		}           
    		$response['data']=$citys;
    		$response['error'] = 0; 
    	}
    	else{
    		$response['error'] = 1;
    		$response['msg'] = "No data Found";
    	}
    	echo json_encode($response);
    	exit;     
    }


    public function api_ratings(){
    	Configure::write("debug", 2);
    	$this->loadModel('Rating');
    	$this->request->data['Rating']['userid']=$_REQUEST['userid'];
    	$this->request->data['Rating']['resid']=$_REQUEST['resid'];
    	$this->request->data['Rating']['drinkid']=$_REQUEST['drinkid'];
    	$this->request->data['Rating']['resrate']=$_REQUEST['resrate'];
    	$this->request->data['Rating']['drinkrate']=$_REQUEST['drinkrate'];

    	if($this->request->data['Rating']['userid']!="" && $this->request->data['Rating']['resid']!="" && $this->request->data['Rating']['drinkid']!=""){

    		$detail = $this->Rating->find('first',array('conditions'=>array('userid'=>$this->request->data['Rating']['userid'],'resid'=> $this->request->data['Rating']['resid'],'drinkid'=>$this->request->data['Rating']['drinkid'])));


    		if(count($detail)>0){
    			$this->request->data['Rating']['id']=$detail['Rating']['id'];
    			$this->Rating->save($this->request->data);  
    		}
    		else{
    			$this->Rating->create();
    			$this->Rating->save($this->request->data);                    
    		}
    		$response['error'] = 0;
    		$response['msg'] = "Rating given successfully";            
    	}
    	else{
    		$response['error'] = 1;
    		$response['msg'] = "All fields are requierd";
    	}
    	echo json_encode($response);
    	exit;     
    }


    public function api_background(){
    	Configure::write("debug", 2);
    	$this->loadModel('Background');
    	$data = $this->Background->find('first');

    	if($data['Background']['name']!=""){
    		$data['Background']['name']=FULL_BASE_URL .$this->webroot."files/staticpage/".$data['Background']['name'];
    	}
        // echo "<pre>";
        // print_r($data);
        // die();
    	echo json_encode(array('error' =>0 , 'data'=>$data['Background']));
    	exit;     
    }

    public function api_codetest(){
    	Configure::write("debug", 2);
    	$userId = $_REQUEST['userid'];     
    	$used = $this->UserCoupon->find('all',array('conditions'=>array('UserCoupon.userid' =>$userId)));  
    	if(count($used)>0){
    		$response['msg'] = "Used";
    		$response['error'] = 1; 
    	}else{
    		$response['msg'] = "Not used";
    		$response['error'] = 0; 
    	}                
    	echo json_encode($response);
    	exit;         
    }


    public function api_getalldrink(){
    	Configure::write("debug", 2);
    	$this->loadModel('Drink');
    	$drink = $this->Drink->find('all');  
    	if(count($drink)>0){
    		$response['data'] = $drink;
    		$response['error'] = 0; 
    	}else{
    		$response['msg'] = "Not Drinks";
    		$response['error'] = 1; 
    	}                
    	echo json_encode($response);
    	exit;         
    }



    public function sendpush($token,$message){
    	
    	Configure::write("debug", 2);
    	
    	$ch = curl_init("https://fcm.googleapis.com/fcm/send");		  
    	$title = "Buzzed";		  
    	$body = "Wine";
    	$notification = array('title' =>$title , 'body' => $body, 'vibrate' => true, 'click_action' => 'FCM_PLUGIN_ACTIVITY',  'sound' => 'default', 'content-available' => '1', 'priority' => 'high');
    	//$token = "E5DBEC45-944C-4B92-8ED0-15F234934D4D";
    	
    	$arrayToSend = array('to' => $token, 'notification' => $notification, 'data' => $message);
    	$json = json_encode($arrayToSend);
    	// print_r($json);
    	// die();
    	$headers = array();  
    	$headers[] = 'Content-Type: application/json';			  
    	$headers[] = 'Authorization: key= AIzaSyD2Bi5K1awrCRasa6oRnpo5rLCc62P0JwA';

    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);			  
    	curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	

    	curl_exec($ch);			  			  
    	print_r($ch);
    	curl_close($ch);
    	return true;
    }

    /*Cron Job Code*/

    public function api_cronupdate(){

   	configure::write('debug', 0);
        $this->loadModel('PatientTest');      
        $this->loadModel('StatusHistory');

        $today =  strtotime(date('Y-m-d'));
        $dataee = $this->PatientTest->find('all', array( 
                                            'conditions' => array('not' => array('PatientTest.report' => null))
                                           ));
       
        foreach($dataee as $datas){
        $dated = strtotime(date('Y-m-d',strtotime($datas['PatientTest']['reportdate']))); 
        $days_between = ceil(abs($today - $dated) / 86400); 
        $this->request->data['StatusHistory']['doctorid'] = $datas['PatientTest']['doctorid'];
        $this->request->data['StatusHistory']['patientid'] = $datas['PatientTest']['patientid'];
        $this->request->data['StatusHistory']['userid'] = $datas['PatientTest']['userid'];
        $this->request->data['StatusHistory']['testid'] = $datas['PatientTest']['testid'];
        $this->request->data['StatusHistory']['status'] = $datas['PatientTest']['status'];
        $this->request->data['StatusHistory']['date'] = $datas['PatientTest']['date'];
        $this->request->data['StatusHistory']['report'] = $datas['PatientTest']['report'];
        $this->request->data['StatusHistory']['reportdate'] = $datas['PatientTest']['reportdate'];

                
        if($days_between > 7){
            $this->StatusHistory->create();
            $savedata = $this->StatusHistory->save($this->request->data);
            $this->PatientTest->deleteAll(array('PatientTest.id' => $datas['PatientTest']['id']), false);
                }  
        }
               
        echo json_encode($savedata);
        exit;
    }

    public function api_testpush(){

        
        Configure::write("debug", 2);
        
        $ch = curl_init("https://fcm.googleapis.com/fcm/send");      
        $title = "Boozie";        
        $body = "Free Drink- Yoyu have get succesdkfhsdkj";
        $notification = array('title' =>$title , 'body' => $body, 'vibrate' => true, 'click_action' => 'FCM_PLUGIN_ACTIVITY',  'sound' => 'default', 'content-available' => '1', 'priority' => 'high');

       $token = "ckRovok2GSw:APA91bHFXXuS251wvY7_kfRq0dpaTCmFraPvfxrjdNbfctJ2_0Q6zdW7TsMp_qlHGtheid0pl8oC1Ta6L9MAlPBOjZo6sKE6vyct-_LPsdypm-Q6ef9oVzQHd0AHmwtmw-7XMLK9366A";
        
        $arrayToSend = array('to' => $token, 'notification' => $notification);
        $json = json_encode($arrayToSend);
        // print_r($json); 
        // die();
        $headers = array();  
        $headers[] = 'Content-Type: application/json';            
        $headers[] = 'Authorization: key= AIzaSyD_KIN1XzSBZROwuJts42jZ8NITPcCfPj8';

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);              
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

        $result = curl_exec($ch);                       
        print_r($result);
       

        curl_close($ch);
        //return "ok"; 
        die('heredd');    
    }
}