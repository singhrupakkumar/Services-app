<?php

//ob_start();

App::uses('AppController', 'Controller');

App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'Payment-Gateway-master', array('file' => 'Payment-Gateway-master' . DS . 'cryptobox.class.php'));
class BillsController extends AppController {

////////////////////////////////////////////////////////////

public $components = array(

        'Session',

        'Auth',

        'RequestHandler',

    );

    public function beforeFilter() {



        parent::beforeFilter();



        $this->Auth->allow('api_deletepatient', 'api_login', 'api_otpverify', 'api_userRejectedBills', 'api_rejectBill','api_getRejectBillByDate', 'api_approvedBillByDate', 'api_userApprovedBills', 'api_saveimage', 'api_allnotifications', 'api_fblogin', 'api_registration', 'admin','api_view', 'admin_login','admin_resetbyadmin','api_contact', 'api_forgetpwd', 'api_trackorder', 'api_addresslist', 'api_resetpwd', 'api_fblogin', 'walletipn', 'api_wallet', 'api_loginwork', 'api_ccresponse', 'api_ccresponsepickup', 'api_ccresponsewallet', 'ccresponse','emailverify','webverifyemail','api_verifyEmail','strposa','api_test','api_editprofile','api_userinfo','api_clientpatientlist','api_clientacceptpatientlist','api_patienttestlist');

         

    }


      public function admin_index($id=null) {



        Configure::write("debug", 2);
        

        $users = $this->Bill->find('all', array('conditions' => array('Bill.user_id' => $id)));
        
        $this->set(compact('users')); 
        $this->set('userID',$id);


    } 
    public function admin_add($id=null) {
        $this->loadModel('User');
        Configure::write("debug", 2);
        $get_token = $this->User->find('first', array('conditions' => array('User.id' => $id)));
        if ($this->request->is('post')) {


            $this->request->data['Bill']['user_id'] = $id;
			$this->request->data['Bill']['due_date']=date('Y-m-d H:i:s' , strtotime($this->request->data['Bill']['due_date']));
            $this->Bill->create();

            $token = $get_token['User']['tokenid'];
            $title='Arion Pay';
			$body= 'You have a new billing request.';
            if ($this->Bill->save($this->request->data)) {

			     
			    $this->SendPushNotificationsAndroid($token,$title,$body);
                $this->Session->setFlash('The bill has been saved');
                
                return $this->redirect(array('action' => 'index',$id));
					

            } else {
				
                $this->Session->setFlash('The bill could not be saved. Please, try again.');
				return $this->redirect(array('action' => 'add',$id));
            }



        }



    }

	
	  public function admin_edit($id = null) {
      
        $userId = $this->Bill->find('first', array('conditions' => array('Bill.id' => $id)));

        Configure::write("debug", 0);



        $this->Bill->id = $id;

        if (!$this->Bill->exists()) {



            throw new NotFoundException('Invalid bill');



        }

        if ($this->request->is('post') || $this->request->is('put')) {
		
            if ($this->Bill->save($this->request->data)) {

                $this->Session->setFlash('The bill has been saved');
				
                return $this->redirect(array('action' => 'index',$userId['Bill']['user_id']));
				
  
            } else {



                $this->Session->setFlash('The bill could not be saved. Please, try again.');



            }



        } else {



            $this->request->data = $this->Bill->read(null, $id);
            $userData = $this->Bill->find('first', array('conditions' => array('Bill.id' => $id)));
            $this->set('user', $userData);

        }



    }
	
	    
		
    public function admin_view($id = null) {


        Configure::write("debug", 0);
        $this->Bill->id = $id;



        if (!$this->Bill->exists()) {



            throw new NotFoundException('Invalid bill');



        }



        $this->set('user', $this->Bill->read(null, $id));



    }
	
	    public function admin_delete($id = null) {


       $userId = $this->Bill->find('first', array('conditions' => array('Bill.id' => $id)));
        if (!$this->request->is('post')) {



            throw new MethodNotAllowedException();



        }



        $this->Bill->id = $id;



        if (!$this->Bill->exists()) {



            throw new NotFoundException('Invalid bill');



        }



        if ($this->Bill->delete()) {



            $this->Session->setFlash('Bill deleted');



            return $this->redirect(array('action' => 'index',$userId['Bill']['user_id']));



        }



        $this->Session->setFlash('Bill was not deleted');



        return $this->redirect(array('action' => 'index'));



    }
	
	
	public function admin_approvedelete($id = null) {



        if (!$this->request->is('post')) {



            throw new MethodNotAllowedException();



        }



        $this->Bill->id = $id;



        if (!$this->Bill->exists()) {



            throw new NotFoundException('Invalid bill');



        }



        if ($this->Bill->delete()) {



            $this->Session->setFlash('Bill deleted');



            return $this->redirect(array('action' => 'approved'));



        }



        $this->Session->setFlash('Bill was not deleted');



        return $this->redirect(array('action' => 'approved'));



    }
	
	
	
    public function admin_rejectdelete($id = null) {



        if (!$this->request->is('post')) {



            throw new MethodNotAllowedException();



        }



        $this->Bill->id = $id;



        if (!$this->Bill->exists()) {



            throw new NotFoundException('Invalid bill');



        }



        if ($this->Bill->delete()) {



            $this->Session->setFlash('Bill deleted');



            return $this->redirect(array('action' => 'rejected'));



        }



        $this->Session->setFlash('Bill was not deleted');



        return $this->redirect(array('action' => 'rejected'));



    }
	


    public function admin_pendingdelete($id = null) {



        if (!$this->request->is('post')) {



            throw new MethodNotAllowedException();



        }



        $this->Bill->id = $id;



        if (!$this->Bill->exists()) {



            throw new NotFoundException('Invalid bill');



        }



        if ($this->Bill->delete()) {



            $this->Session->setFlash('Bill deleted');



            return $this->redirect(array('action' => 'pending'));



        }



        $this->Session->setFlash('Bill was not deleted');



        return $this->redirect(array('action' => 'pending'));



    }



	 public function admin_approved() {
		 Configure::write("debug", 2);
        $this->Bill->recursive = 2;
        $bills = $this->Bill->find('all', array('conditions' => array('Bill.status' => 1), 'order' => array('Bill.id DESC')));
		
        $this->set('users', $bills);
    }
	
	 public function admin_rejected() {

        $this->Bill->recursive = 2;
        $bills = $this->Bill->find('all', array('conditions' => array('Bill.status' => 2), 'order' => array('Bill.id DESC')));
		
        $this->set('users', $bills);
    }
	
	public function admin_pending() {
		 Configure::write("debug", 2);
        $this->Bill->recursive = 2;
        $bills = $this->Bill->find('all', array('conditions' => array('Bill.status' => 0), 'order' => array('Bill.id DESC')));
		
        $this->set('users', $bills);
    }
	
	public function status() {
			$this->autoRender=false;
			if($this->RequestHandler->isAjax()){
				Configure::write('debug', 2);
				}   

          $status = $_REQUEST["status"];
		  $id = $_REQUEST["id"];
         $this->Bill->query('UPDATE bills SET payment_status = "'.$status.'" WHERE id="'.$id.'"');
         echo 'success';
		}
		
	public function api_allnotifications() {
		$this->loadModel('User');
        Configure::write('debug',0);
        $this->layout = 'ajax';
		
        $email = $this->request->data['email'];
        if ($this->request->is('post')) {

        $getUser = $this->User->find('first', array('conditions' => array('User.email' => $email)));
        $bills = $this->Bill->find('all', array('conditions' => array('AND' => array('Bill.user_id' => $getUser['User']['id'], 'Bill.status' => 0)), 'order' => array('Bill.id DESC')));
		$recentBill = $this->Bill->find('all', array('conditions' => array('AND' => array('Bill.user_id' => $getUser['User']['id'], 'Bill.status' => 1)), 'order' => array('Bill.approved_date DESC'), 'limit' => 5));
		if(count($bills) > 0)
			$i = 0;
		    $j = 0;
			foreach($bills as $bill){
				if($bill['Bill']['bill_type'] == 'mobile'){
					$icon = 'mobile';					
				}elseif($bill['Bill']['bill_type'] == 'electricity'){
					$icon = 'bolt';
				}elseif($bill['Bill']['bill_type'] == 'gas'){
					$icon = 'square';
				}elseif($bill['Bill']['bill_type'] == 'water'){
					$icon = 'tint';
				}elseif($bill['Bill']['bill_type'] == 'internet'){
					$icon = 'globe';
				}elseif($bill['Bill']['bill_type'] == 'cable'){
					$icon = 'usb';
				}elseif($bill['Bill']['bill_type'] == 'home-security'){
					$icon = 'shield';
				}elseif($bill['Bill']['bill_type'] == 'car-insurance'){
					$icon = 'car';
				}elseif($bill['Bill']['bill_type'] == 'life-insurance'){
					$icon = 'heartbeat';
				}elseif($bill['Bill']['bill_type'] == 'car-payment'){
					$icon = 'money';
				}elseif($bill['Bill']['bill_type'] == 'home'){
					$icon = 'home';
				}elseif($bill['Bill']['bill_type'] == 'other'){
					$icon = 'book';
				}
				$bills[$i]['Bill']['Icon'] = $icon;
			$i++;	
			}
			
			foreach($recentBill as $recentBills){
				
				$recentBillApproveddate = explode(' ',$recentBill[$j]['Bill']['approved_date']);
			    //$recentBill[$j]['Bill']['approved_date'] = $recentBillApproveddate[0];
				$date1 = str_replace('-', '/', $recentBillApproveddate[0]);
$recentBill[$j]['Bill']['approved_date'] = date('m-d-Y',strtotime($date1));
				if($recentBills['Bill']['bill_type'] == 'mobile'){
					$icons = 'mobile';					
				}elseif($recentBills['Bill']['bill_type'] == 'electricity'){
					$icons = 'bolt';
				}elseif($recentBills['Bill']['bill_type'] == 'gas'){
					$icons = 'square';
				}elseif($recentBills['Bill']['bill_type'] == 'water'){
					$icons = 'tint';
				}elseif($recentBills['Bill']['bill_type'] == 'internet'){
					$icons = 'globe';
				}elseif($recentBills['Bill']['bill_type'] == 'cable'){
					$icons = 'usb';
				}elseif($recentBills['Bill']['bill_type'] == 'home-security'){
					$icons = 'shield';
				}elseif($recentBills['Bill']['bill_type'] == 'car-insurance'){
					$icons = 'car';
				}elseif($recentBills['Bill']['bill_type'] == 'life-insurance'){
					$icons = 'heartbeat';
				}elseif($recentBills['Bill']['bill_type'] == 'car-payment'){
					$icons = 'money';
				}elseif($recentBills['Bill']['bill_type'] == 'home'){
					$icons = 'home';
				}elseif($recentBills['Bill']['bill_type'] == 'other'){
					$icons = 'book';
				}
				$recentBill[$j]['Bill']['Icon'] = $icons;
				
				
				
				$j++;
			}
			

			$response['status'] = true;
			$response['data'] = $bills;
            $response['recentbill'] = $recentBill;			
        }else{
			$response['status'] = false;
			$response['msg'] = 'No data found';
		}

        echo json_encode($response);
        exit;
    }
	

	public function api_notifications() {
		$this->loadModel('User');
        Configure::write('debug',0);
        $this->layout = 'ajax';
		
        $email = $this->request->data['email'];
        if ($this->request->is('post')) {

        $getUser = $this->User->find('first', array('conditions' => array('User.email' => $email)));
        $bills = $this->Bill->find('all', array('conditions' => array('AND' => array('Bill.user_id' => $getUser['User']['id'], 'Bill.status' => 0)), 'order' => array('Bill.id DESC')));
		$i = 0;
		foreach($bills as $bill){
			$due_date = explode(' ', $bills[$i]['Bill']['due_date']);
			//$bills[$i]['Bill']['due_date'] = $due_date[0];
							$date1 = str_replace('-', '/', $due_date[0]);
$bills[$i]['Bill']['due_date'] = date('m-d-Y',strtotime($date1));
				if($bill['Bill']['bill_type'] == 'mobile'){
					$icon = 'mobile';					
				}elseif($bill['Bill']['bill_type'] == 'electricity'){
					$icon = 'bolt';
				}elseif($bill['Bill']['bill_type'] == 'gas'){
					$icon = 'square';
				}elseif($bill['Bill']['bill_type'] == 'water'){
					$icon = 'tint';
				}elseif($bill['Bill']['bill_type'] == 'internet'){
					$icon = 'globe';
				}elseif($bill['Bill']['bill_type'] == 'cable'){
					$icon = 'usb';
				}elseif($bill['Bill']['bill_type'] == 'home-security'){
					$icon = 'shield';
				}elseif($bill['Bill']['bill_type'] == 'car-insurance'){
					$icon = 'car';
				}elseif($bill['Bill']['bill_type'] == 'life-insurance'){
					$icon = 'heartbeat';
				}elseif($bill['Bill']['bill_type'] == 'car-payment'){
					$icon = 'money';
				}elseif($bill['Bill']['bill_type'] == 'home'){
					$icon = 'home';
				}elseif($bill['Bill']['bill_type'] == 'other'){
					$icon = 'book';
				}
				$bills[$i]['Bill']['Icon'] = $icon;
			
			$i++;
			
		}
		if(count($bills) > 0)
			
			$response['status'] = true;
			$response['data'] = $bills;
		
        }else{
			$response['status'] = false;
			$response['msg'] = 'No data found';
		}

        echo json_encode($response);
        exit;
    }

	
	public function api_billById() {
		
        Configure::write('debug',0);
        $this->layout = 'ajax';
		
        $id = $this->request->data['bill_id'];
        if ($this->request->is('post')) {

        $bill = $this->Bill->find('first', array('conditions' => array('Bill.id' => $id)));
		if(count($bill) > 0)
			$d = explode(' ',$bill['Bill']['created']);
		    $d1 = explode('-', $d[0]);
			$bill['Bill']['created'] = $d1[1].'-'.$d1[2].'-'.$d1[0]; 
			$d_due = explode(' ',$bill['Bill']['due_date']);
		    $d1_due = explode('-', $d_due[0]);
			$bill['Bill']['due_date'] = $d1_due[1].'-'.$d1_due[2].'-'.$d1_due[0];

				if($bill['Bill']['bill_type'] == 'mobile'){
					$icon = 'mobile';					
				}elseif($bill['Bill']['bill_type'] == 'electricity'){
					$icon = 'bolt';
				}elseif($bill['Bill']['bill_type'] == 'gas'){
					$icon = 'square';
				}elseif($bill['Bill']['bill_type'] == 'water'){
					$icon = 'tint';
				}elseif($bill['Bill']['bill_type'] == 'internet'){
					$icon = 'globe';
				}elseif($bill['Bill']['bill_type'] == 'cable'){
					$icon = 'usb';
				}elseif($bill['Bill']['bill_type'] == 'home-security'){
					$icon = 'shield';
				}elseif($bill['Bill']['bill_type'] == 'car-insurance'){
					$icon = 'car';
				}elseif($bill['Bill']['bill_type'] == 'life-insurance'){
					$icon = 'heartbeat';
				}elseif($bill['Bill']['bill_type'] == 'car-payment'){
					$icon = 'money';
				}elseif($bill['Bill']['bill_type'] == 'home'){
					$icon = 'home';
				}elseif($bill['Bill']['bill_type'] == 'other'){
					$icon = 'book';
				}
				$bill['Bill']['Icon'] = $icon;

			
			$response['status'] = true;
			$response['data'] = $bill;  
        }else{
			$response['status'] = false;
			$response['msg'] = 'No data found';
		}

        echo json_encode($response);
        exit;
    }


	public function api_billApprovedById() {
		
        Configure::write('debug',2);
        $this->layout = 'ajax';
		$date = date("Y-m-d H:i:s");
        $id = $this->request->data['billId'];
        if ($this->request->is('post')) {

        $this->Bill->query('UPDATE bills SET status = 1, approved_date = "'.$date.'" WHERE id = "'.$id.'"');
        $bill = $this->Bill->find('first', array('conditions' => array('Bill.id' => $id)));
		
		
				if($bill['Bill']['bill_type'] == 'mobile'){
					$icon = 'mobile';					
				}elseif($bill['Bill']['bill_type'] == 'electricity'){
					$icon = 'bolt';
				}elseif($bill['Bill']['bill_type'] == 'gas'){
					$icon = 'square';
				}elseif($bill['Bill']['bill_type'] == 'water'){
					$icon = 'tint';
				}elseif($bill['Bill']['bill_type'] == 'internet'){
					$icon = 'globe';
				}elseif($bill['Bill']['bill_type'] == 'cable'){
					$icon = 'usb';
				}elseif($bill['Bill']['bill_type'] == 'home-security'){
					$icon = 'shield';
				}elseif($bill['Bill']['bill_type'] == 'car-insurance'){
					$icon = 'car';
				}elseif($bill['Bill']['bill_type'] == 'life-insurance'){
					$icon = 'heartbeat';
				}elseif($bill['Bill']['bill_type'] == 'car-payment'){
					$icon = 'money';
				}elseif($bill['Bill']['bill_type'] == 'home'){
					$icon = 'home';
				}elseif($bill['Bill']['bill_type'] == 'other'){
					$icon = 'book';
				}
				$bill['Bill']['Icon'] = $icon;
		
		
		$response['status'] = true;
		$response['data'] = $bill;

        echo json_encode($response);
        exit;
    }
	}
	public function api_billRejectById() {
		
        Configure::write('debug',0);
        $this->layout = 'ajax';
		$date = date("Y-m-d H:i:s");
        $id = $this->request->data['billID'];
        if ($this->request->is('post')) {

        $this->Bill->query('UPDATE bills SET status = 0, rejected_date = "'.$date.'" WHERE id = "'.$id.'"');
      
		$response['status'] = true;
		

        echo json_encode($response);
        exit;
    }
	}
	
	public function api_rejectBill() { 
		
        Configure::write('debug',2);
        $this->layout = 'ajax';
		$this->loadModel('User');
        $id = $this->request->data['bill_id'];
		$uid = $this->request->data['user'];
		$date = date("Y-m-d H:i:s");
		$reason = $this->request->data['reason'];
        if ($this->request->is('post')) {
        $getUser = $this->User->find('first', array('conditions' => array('User.email' => $uid)));
        $this->Bill->query('UPDATE bills SET status = 2, reject_reason = "'.$reason.'", rejected_date = "'.$date.'" WHERE id = "'.$id.'"');

				$to = 'rakhi@avainfotech.com';

				$subject = "Arion Pay";

				$txt = "Your bill request has been rejected.<br/><b>User name : </b>".$getUser['User']['first_name']." ".$getUser['User']['last_name']."<br/><b>Reason for rejection : </b><br/>".$this->request->data['reason'];

				// To send HTML mail, the Content-type header must be set
				$headers[] = 'MIME-Version: 1.0';
				$headers[] = 'Content-type: text/html; charset=iso-8859-1';

				// Additional headers

				$headers[] = 'From: Arion <Arion@example.com>';


				// Mail it
				$mail = mail($to, $subject, $txt, implode("\r\n", $headers));
		
		if($mail){
			$response['status'] = true;
		}else{
			$response['status'] = false;
		}
		
		

        echo json_encode($response);
        exit;
    }
	}
	public function api_userApprovedBills() {
		$this->loadModel('User');
        Configure::write('debug',0);
        $this->layout = 'ajax';
		
        $email = $this->request->data['email'];
        if ($this->request->is('post')) {

        $getUser = $this->User->find('first', array('conditions' => array('User.email' => $email)));
        $bills = $this->Bill->find('all', array('conditions' => array('AND' => array('Bill.user_id' => $getUser['User']['id'], 'Bill.status' => 1)), 'order' => array('Bill.approved_date DESC')));
		$i = 0;
		foreach($bills as $bill){
			$due_date = explode(' ', $bills[$i]['Bill']['due_date']);
			//$bills[$i]['Bill']['due_date'] = $due_date[0];
			$date1 = str_replace('-', '/', $due_date[0]);
            $bills[$i]['Bill']['due_date'] = date('m-d-Y',strtotime($date1));



			$created_date = explode(' ', $bills[$i]['Bill']['created']);
			//$bills[$i]['Bill']['created'] = $created_date[0];
			$date2 = str_replace('-', '/', $created_date[0]);
            $bills[$i]['Bill']['created'] = date('m-d-Y',strtotime($date2));


			$approved_date = explode(' ', $bills[$i]['Bill']['approved_date']);
			//$bills[$i]['Bill']['approved_date'] = $approved_date[0];
			$date3 = str_replace('-', '/', $approved_date[0]);
            $bills[$i]['Bill']['approved_date'] = date('m-d-Y',strtotime($date3));
			
			
				if($bill['Bill']['bill_type'] == 'mobile'){
					$icon = 'mobile';					
				}elseif($bill['Bill']['bill_type'] == 'electricity'){
					$icon = 'bolt';
				}elseif($bill['Bill']['bill_type'] == 'gas'){
					$icon = 'square';
				}elseif($bill['Bill']['bill_type'] == 'water'){
					$icon = 'tint';
				}elseif($bill['Bill']['bill_type'] == 'internet'){
					$icon = 'globe';
				}elseif($bill['Bill']['bill_type'] == 'cable'){
					$icon = 'usb';
				}elseif($bill['Bill']['bill_type'] == 'home-security'){
					$icon = 'shield';
				}elseif($bill['Bill']['bill_type'] == 'car-insurance'){
					$icon = 'car';
				}elseif($bill['Bill']['bill_type'] == 'life-insurance'){
					$icon = 'heartbeat';
				}elseif($bill['Bill']['bill_type'] == 'car-payment'){
					$icon = 'money';
				}elseif($bill['Bill']['bill_type'] == 'home'){
					$icon = 'home';
				}elseif($bill['Bill']['bill_type'] == 'other'){
					$icon = 'book';
				}
				$bills[$i]['Bill']['Icon'] = $icon;
			$i++;
			
		}
		if(count($bills) > 0)
			
			$response['status'] = true;
			$response['data'] = $bills;
		
        }else{
			$response['status'] = false;
			$response['msg'] = 'No data found';
		}

        echo json_encode($response);
        exit;
    }
	
	public function api_userRejectedBills() {
		$this->loadModel('User');
        Configure::write('debug',0);
        $this->layout = 'ajax';
		
        $email = $this->request->data['email'];
        if ($this->request->is('post')) {

        $getUser = $this->User->find('first', array('conditions' => array('User.email' => $email)));
        $bills = $this->Bill->find('all', array('conditions' => array('AND' => array('Bill.user_id' => $getUser['User']['id'], 'Bill.status' => 2)), 'order' => array('Bill.rejected_date DESC')));
		$i = 0;
		foreach($bills as $bill){
			$due_date = explode(' ', $bills[$i]['Bill']['due_date']);
			//$bills[$i]['Bill']['due_date'] = $due_date[0];
			$date1 = str_replace('-', '/', $due_date[0]);
            $bills[$i]['Bill']['due_date'] = date('m-d-Y',strtotime($date1));


			$created_date = explode(' ', $bills[$i]['Bill']['created']);
			//$bills[$i]['Bill']['created'] = $created_date[0];
			$date2 = str_replace('-', '/', $created_date[0]);
            $bills[$i]['Bill']['created'] = date('m-d-Y',strtotime($date2));


			$rejected_date = explode(' ', $bills[$i]['Bill']['rejected_date']);

			$date3 = str_replace('-', '/', $rejected_date[0]);
            $bills[$i]['Bill']['rejected_date'] = date('m-d-Y',strtotime($date3));
			
				if($bill['Bill']['bill_type'] == 'mobile'){
					$icon = 'mobile';					
				}elseif($bill['Bill']['bill_type'] == 'electricity'){
					$icon = 'bolt';
				}elseif($bill['Bill']['bill_type'] == 'gas'){
					$icon = 'square';
				}elseif($bill['Bill']['bill_type'] == 'water'){
					$icon = 'tint';
				}elseif($bill['Bill']['bill_type'] == 'internet'){
					$icon = 'globe';
				}elseif($bill['Bill']['bill_type'] == 'cable'){
					$icon = 'usb';
				}elseif($bill['Bill']['bill_type'] == 'home-security'){
					$icon = 'shield';
				}elseif($bill['Bill']['bill_type'] == 'car-insurance'){
					$icon = 'car';
				}elseif($bill['Bill']['bill_type'] == 'life-insurance'){
					$icon = 'heartbeat';
				}elseif($bill['Bill']['bill_type'] == 'car-payment'){
					$icon = 'money';
				}elseif($bill['Bill']['bill_type'] == 'home'){
					$icon = 'home';
				}elseif($bill['Bill']['bill_type'] == 'other'){
					$icon = 'book';
				}
				$bills[$i]['Bill']['Icon'] = $icon;
			
			$i++;
			
		}
		if(count($bills) > 0)
			
			$response['status'] = true;
			$response['data'] = $bills;
		
        }else{
			$response['status'] = false;
			$response['msg'] = 'No data found';
		}

        echo json_encode($response);
        exit;
    }


	public function api_getRejectBillByDate() {
		$this->loadModel('User');
        Configure::write('debug',0);
        $this->layout = 'ajax';
		
        $email = $this->request->data['email'];
		$date = $this->request->data['getdate'];

        if ($this->request->is('post')) {

        $getUser = $this->User->find('first', array('conditions' => array('User.email' => $email)));
        $bills = $this->Bill->find('all', array('conditions' => array('AND' => array('Bill.user_id' => $getUser['User']['id'], 'Bill.status' => 2, 'Bill.rejected_date LIKE'=>'%'.$date.'%')), 'order' => array('Bill.id DESC')));
		$i = 0;
		foreach($bills as $bill){
			$due_date = explode(' ', $bills[$i]['Bill']['due_date']);
			//$bills[$i]['Bill']['due_date'] = $due_date[0];
            $date1 = str_replace('-', '/', $due_date[0]);
            $bills[$i]['Bill']['due_date'] = date('m-d-Y',strtotime($date1));

			
			$created_date = explode(' ', $bills[$i]['Bill']['created']);
			//$bills[$i]['Bill']['created'] = $created_date[0];
			$date2 = str_replace('-', '/', $created_date[0]);
            $bills[$i]['Bill']['created'] = date('m-d-Y',strtotime($date2));


			$approved_date = explode(' ', $bills[$i]['Bill']['approved_date']);
			//$bills[$i]['Bill']['approved_date'] = $approved_date[0];
			$date3 = str_replace('-', '/', $approved_date[0]);
            $bills[$i]['Bill']['approved_date'] = date('m-d-Y',strtotime($date3));


				if($bill['Bill']['bill_type'] == 'mobile'){
					$icon = 'mobile';					
				}elseif($bill['Bill']['bill_type'] == 'electricity'){
					$icon = 'bolt';
				}elseif($bill['Bill']['bill_type'] == 'gas'){
					$icon = 'square';
				}elseif($bill['Bill']['bill_type'] == 'water'){
					$icon = 'tint';
				}elseif($bill['Bill']['bill_type'] == 'internet'){
					$icon = 'globe';
				}elseif($bill['Bill']['bill_type'] == 'cable'){
					$icon = 'usb';
				}elseif($bill['Bill']['bill_type'] == 'home-security'){
					$icon = 'shield';
				}elseif($bill['Bill']['bill_type'] == 'car-insurance'){
					$icon = 'car';
				}elseif($bill['Bill']['bill_type'] == 'life-insurance'){
					$icon = 'heartbeat';
				}elseif($bill['Bill']['bill_type'] == 'car-payment'){
					$icon = 'money';
				}elseif($bill['Bill']['bill_type'] == 'home'){
					$icon = 'home';
				}elseif($bill['Bill']['bill_type'] == 'other'){
					$icon = 'book';
				}
				$bills[$i]['Bill']['Icon'] = $icon;
			$i++;
			
		}
		if(count($bills) > 0)
			
			$response['status'] = true;
			$response['data'] = $bills;
		
        }else{
			$response['status'] = false;
			$response['msg'] = 'No data found';
		}

        echo json_encode($response);
        exit;
    }


	public function api_approvedBillByDate() {
		$this->loadModel('User');
        Configure::write('debug',0);
        $this->layout = 'ajax';
		
        $email = $this->request->data['email'];
		$date = $this->request->data['getdate'];

        if ($this->request->is('post')) {

        $getUser = $this->User->find('first', array('conditions' => array('User.email' => $email)));
        $bills = $this->Bill->find('all', array('conditions' => array('AND' => array('Bill.user_id' => $getUser['User']['id'], 'Bill.status' => 1, 'Bill.approved_date LIKE'=>'%'.$date.'%')), 'order' => array('Bill.id DESC')));
		$i = 0;
		foreach($bills as $bill){
			$due_date = explode(' ', $bills[$i]['Bill']['due_date']);
			//$bills[$i]['Bill']['due_date'] = $due_date[0];
			$date1 = str_replace('-', '/', $due_date[0]);
            $bills[$i]['Bill']['due_date'] = date('m-d-Y',strtotime($date1));
			
			//$created_date = explode(' ', $bills[$i]['Bill']['created']);
			$bills[$i]['Bill']['created'] = $created_date[0];
			$date2 = str_replace('-', '/', $created_date[0]);
            $bills[$i]['Bill']['created'] = date('m-d-Y',strtotime($date2));


			$approved_date = explode(' ', $bills[$i]['Bill']['approved_date']);
			//$bills[$i]['Bill']['approved_date'] = $approved_date[0];
			$date3 = str_replace('-', '/', $approved_date[0]);
            $bills[$i]['Bill']['approved_date'] = date('m-d-Y',strtotime($date3));

				if($bill['Bill']['bill_type'] == 'mobile'){
					$icon = 'mobile';					
				}elseif($bill['Bill']['bill_type'] == 'electricity'){
					$icon = 'bolt';
				}elseif($bill['Bill']['bill_type'] == 'gas'){
					$icon = 'square';
				}elseif($bill['Bill']['bill_type'] == 'water'){
					$icon = 'tint';
				}elseif($bill['Bill']['bill_type'] == 'internet'){
					$icon = 'globe';
				}elseif($bill['Bill']['bill_type'] == 'cable'){
					$icon = 'usb';
				}elseif($bill['Bill']['bill_type'] == 'home-security'){
					$icon = 'shield';
				}elseif($bill['Bill']['bill_type'] == 'car-insurance'){
					$icon = 'car';
				}elseif($bill['Bill']['bill_type'] == 'life-insurance'){
					$icon = 'heartbeat';
				}elseif($bill['Bill']['bill_type'] == 'car-payment'){
					$icon = 'money';
				}elseif($bill['Bill']['bill_type'] == 'home'){
					$icon = 'home';
				}elseif($bill['Bill']['bill_type'] == 'other'){
					$icon = 'book';
				}
				$bills[$i]['Bill']['Icon'] = $icon;
			$i++;
			
		}
		if(count($bills) > 0)
			
			$response['status'] = true;
			$response['data'] = $bills;
		
        }else{
			$response['status'] = false;
			$response['msg'] = 'No data found';
		}

        echo json_encode($response);
        exit;
    }

	
	
}



