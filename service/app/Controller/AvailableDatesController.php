<?php

App::uses('AppController', 'Controller');

/**
 * Promocodes Controller
 *
 * @property Promocodes $Promocodes
 * @property PaginatorComponent $Paginator
 */
class AvailableDatesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator','RequestHandler');

       public function beforeFilter() {
        parent::beforeFilter();
    }
	
	/***************Api***************/
	
	
        public function api_make_payment(){
			
            configure::write('debug',2);
            $this->layout = "ajax";
            $this->loadModel('Service');
            $this->loadModel('Order');


            if($this->request->is('post'))
            {

            $stripe_key = 'sk_test_GAjwHaoK3A0yweCQwq2TNlAq';

            $user_id = $this->request->data['user_id'];

            $stripetoken = $this->request->data['stripetoken'];
            // $stripetoken = $this->request->data['stripetoken'];
            $providerid = $this->request->data['providerId'];
            $serviceid = $this->request->data['serviceId'];
            $schedule = $this->request->data['scheduleDate'];
            $amount = $this->request->data['amount'] * 100;


$apiKey = 'sk_test_GAjwHaoK3A0yweCQwq2TNlAq';

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => "https://api.stripe.com/v1/charges",
    CURLOPT_POST => 1,
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer " . $apiKey
    ),
    CURLOPT_POSTFIELDS => http_build_query(array(
        'amount' => $amount,
        'currency' => 'USD',
        'description' => 'Hire service',
        'source' => $stripetoken
    ))
));
$data = curl_exec($curl);
curl_close($curl);


$get_response = json_decode($data);



                
            if ($data) {

				$service_items = array();
                $order = array();
                if( $get_response->status == 'succeeded')
                {

                        $order['Order']['user_id'] = $this->request->data['user_id'];
                        $order['Order']['providerid'] = $this->request->data['providerId'];
                        $order['Order']['schedule_date'] = $this->request->data['scheduleDate'];
                        $order['Order']['schedule_time'] = $this->request->data['scheduleTime'];
                        $order['Order']['status'] = 1;
                        $order['Order']['amount'] = $this->request->data['amount'];
                        $serviceId = $this->request->data['serviceId'];
						
                        $get_services = explode(',', $serviceId); 
						$service_get = $this->Service->find('all',array('conditions'=>array('Service.id'=>$get_services)));
                       
	
                    foreach ($service_get as $d) {
                       
						$service_items['Service']['service_id'] = $d['Service']['id'];
						$service_items['Service']['name'] = $d['Service']['name'];
						$service_items['Service']['image'] = $d['Service']['image'];
						$service_items['Service']['price'] = $d['Service']['price'];
						$order['OrderItem'][]= $service_items['Service'];
                    }

				    $this->Order->create();
                   $save = $this->Order->saveAll($order, array('validate' => 'first'));
					if($save){
					   $response['isSuccess'] = true;
					  $last_id = $this->Order->getLastInsertId();
					  $response['data'] = 'Service has been scheduled Order Id - ' .$last_id ;	
					}else{
					  $response['isSuccess'] = false;		
					 $response['data'] = 'Something wrong in saving data';		
					}
				 
  
                }
                else
                {  
                    $response['isSuccess'] = true;
                    $response['data'] = 'There is some problem to make payment.' . $stripetoken;
                }



            } else {
                $response['isSuccess'] = true;
                $response['msg'] = "There is no data available";
            }   
         }else{
                $response['isSuccess'] = true;
                 $response['msg'] = "Please post Date & time";  
         }      

        echo json_encode($response);
        exit;   
        }
		public function api_availabledays(){
			configure::write('debug', 0);
			$this->layout = "ajax";
			$this->loadModel('Service');




			if($this->request->is('post') OR 1==1)
            {	

            $provider_type = $this->request->data['stype'];
            $title = $this->request->data['title'];
            $servicdedate = $this->request->data['sdate'];
            $time = '9-10';//$this->request->data['stime'];
        
// $provider_type = 'individual';//$this->request->data['stype'];
// $title = array('test', 'test122');//$this->request->data['title'];
// $servicdedate = '2017-11-14';//$this->request->data['sdate'];
// $time = '9-10';//$this->request->data['stime'];



			$today_day = date('l',strtotime($servicdedate));
			$time_explod = explode('-',$time);
		
            $open  = $time_explod[0];	
            $close = $time_explod[1];	
			$service = $this->Service->find('all',array('recursive'=>2,'conditions'=>array('Service.name'=>$title)));
			$provider_ids = array();
			foreach($service as $list){
				if(trim($list['User']['provider_type']) == $provider_type){

				$provider_ids[] = $list['User']['id'];
					
				}	
			}

		    $data = $this->AvailableDate->find('all', array('recursive'=>2,'conditions' => array('AvailableDate.days' =>$today_day,'TIME(open) <='=>$open,'TIME(close) >='=>$close,'AvailableDate.provider_id'=>$provider_ids),'group' =>'AvailableDate.provider_id'
                    ));	


foreach ($data as $key => &$d) {

    if($d['User']['image'])
    $d['User']['image'] = Router::url('/', true).'/files/profile_pic/' . $d['User']['image'];
    else
    $d['User']['image'] = Router::url('/', true).'/files/profile_pic/avatar.png';

    $set_service_ids = '';
	$total_price = 0;
    foreach ($d['User']['Service'] as $key => $s) {
        // if($s['name'] != $title)
        if( !in_array($s['name'], $title))
        {
            unset($d['User']['Service'][$key]);
        }
        else
        {
            if($set_service_ids)
            $set_service_ids .= ','.$s['id'];
            else
            $set_service_ids = $s['id'];

			$total_price = $total_price + (int)$s['price'];		

		
        }
    }
$d['User']['services'] = $set_service_ids;
$d['User']['total_price'] = $total_price;
}

// echo "<pre>";
// print_r($data);
// echo "</pre>";

// die("aaaa");

				
            if ($data) {
                $response['isSuccess'] = true;
                $response['data'] = $data;
            } else {
                $response['isSuccess'] = false;
                $response['msg'] = "There is no data available";
            }	
		 }else{
			    $response['isSuccess'] = false;
                 $response['msg'] = "Please post Date & time";	
		 }  	

		echo json_encode($response);
        exit;	
		}
	
	
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index($id=NULL) {
      
        
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->AvailableDate->exists($id)) {
            throw new NotFoundException(__('Invalid Available Date'));
        }
        $options = array('conditions' => array('AvailableDate.' . $this->AvailableDate->primaryKey => $id),'recursive'=>1);
        $this->set('AvailableDate', $this->AvailableDate->find('first', $options));
          
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add($id=NULL) {
        if ($this->request->is('post')) {
            $this->AvailableDate->create();
            if ($this->AvailableDate->save($this->request->data)) {
                $this->Session->setFlash(__('The Available Date has been saved.'));
                return $this->redirect(array('controller'=>'services','action' => 'availabledates',$id));
            } else {
                $this->Session->setFlash(__('The Available Date could not be saved. Please, try again.'));
            }
        }
        if($id){
            $this->loadModel('Service');
            $this->set('services',$this->Service->find('first',array('conditions'=>array('Service.id'=>$id))));
        }
		$this->loadModel('Service');
		if($this->Auth->user('role')=="provider"){
			  $this->set('provider_list',$this->Service->find('list',array('conditions'=>array('Service.user_id'=>$this->Auth->user('id')))));
		}else{
		    $this->set('provider_list',$this->Service->find('list'));	
		}
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        Configure::write("debug", 0);
        if (!$this->AvailableDate->exists($id)) {
            throw new NotFoundException(__('Invalid Available Date'));
        }
        if ($this->request->is(array('post', 'put'))) {
               $this->AvailableDate->id=$id;
          //  print_r($this->request->data);exit;
            if ($this->AvailableDate->save($this->request->data)) {
                $this->Session->setFlash(__('The AvailableDate has been saved.'));
                return $this->redirect(array('controller'=>'services','action' => 'availabledates',$this->request->data['AvailableDate']['provider_id']));
            } else {
                $this->Session->setFlash(__('The AvailableDate could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('AvailableDate.' . $this->AvailableDate->primaryKey => $id),'recursive'=>1);
            $this->request->data = $this->AvailableDate->find('first', $options);
        }
    }
    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->AvailableDate->id = $id;
        if (!$this->AvailableDate->exists()) {
            throw new NotFoundException(__('Invalid AvailableDate'));
        }
        $unavailable_info = $this->AvailableDate->find('first',array('conditions'=>array('AvailableDate.id'=>$id)));
        //print_r($unavailable_info);
        if($unavailable_info){
            $provider_id = $unavailable_info['AvailableDate']['provider_id'];
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->AvailableDate->delete()) {
            $this->Session->setFlash(__('The AvailableDate has been deleted.'));
        } else {
            $this->Session->setFlash(__('The AvailableDate could not be deleted. Please, try again.'));
        } 
        return $this->redirect(array('controller'=>'services','action' => 'availabledates',$provider_id));
    }
    
}
