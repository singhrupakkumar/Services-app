<?php
/**
 * 
 */
App::uses('AppController', 'Controller');

class OrdersController extends AppController {

/*********************Api*****************************/
	public function api_orderlist(){
		configure::write('debug', 0);
		$this->layout = "ajax";
		if($this->request->is('post'))  {
			$uid = $this->request->data['uid'];
					$this->Order->recursive = 1;
			$order = $this->Order->find('all',array('conditions'=>array('Order.user_id'=>$uid)));
			
			foreach($order as &$ord){
				
			$ord['User']['name'] = $ord['User']['firstname'].' '.$ord['User']['lastname'];	
			}
			
			if ($order) {
                $response['isSuccess'] = true;
                $response['data'] = $order;
				} else { 
				$response['isSuccess'] = false; 
				$response['msg'] = "There is no data available"; 
				}		
				}else{
				$response['isSuccess'] = false;
				$response['msg'] = "Please post Uid";
				}  
				echo json_encode($response);
				exit;	
	}
    public function admin_dlstastable() {
        Configure::write("debug", 0);
        $a = $_POST['id'];
//       
//        if ($a == 0) {
//            exit;
//        }
        $d = explode('-', $a);
        $uid = $d[0];
        $oid = $d[1];
        $stas = $d[2];
        $this->loadModel('Point');
        $this->loadModel('TableReservation');
        //$cnt = $this->Point->find('count', array('conditions' => array('Point.orderid' => $oid)));
        // $data = $this->TableReservation->find('first', array('conditions' => array('TableReservation.id' => $oid)));
        if ($stas == 3) {
//            $this->request->data['Point']['uid'] = $uid;
//            $this->request->data['Point']['orderid'] = $oid;
//            $this->request->data['Point']['points'] = floor($data['Order']['subtotal']);
//            $total = floor($data['Order']['subtotal']);
//            if ($this->Point->save($this->request->data)) {
//                $this->Order->updateAll(array('Order.dl_status' => $stas), array('Order.id' => $oid));
//                $this->loadModel('User');
//                $user = $this->User->find('first', array('conditions' => array('User.id' => $uid)));
//                $tp = $user['User']['loyalty_points'];
//
//                $this->User->updateAll(array('User.loyalty_points' => $total + $tp), array('User.id' => $uid));
//            }
            $this->TableReservation->updateAll(array('TableReservation.dl_status' => $stas), array('TableReservation.id' => $oid));
            //print_r($data);
        } else {
            $this->TableReservation->updateAll(array('TableReservation.dl_status' => $stas), array('TableReservation.id' => $oid));
        }

        exit;
    }

	
	
	/*********************Api*****************************/
	public function api_requestlist(){
			configure::write('debug', 0);
			$this->layout = "ajax";
			if($this->request->is('post')) {	
			$uid = $this->request->data['uid'];
			$status = $this->request->data['status'];
			if(!empty($status)){
				$status = $status;
			}else{
				$status = 1;
			}
			
			$this->Order->recursive = 1;
			
			$order = $this->Order->find('all',array('conditions'=>array('Order.providerid'=>$uid,'Order.status'=>$status)));
			
			foreach($order as &$ord){
				
			$ord['User']['name'] = $ord['User']['firstname'].' '.$ord['User']['lastname'];	
			}
			
			
			if ($order) {
                $response['status'] = true;
                $response['data'] = $order;
				} else { 
				$response['status'] = false;
                $response['msg'] = "There is no data available";
				}		
				}else{	
				$response['status'] = false;
				$response['msg'] = "Please post provider id";
			    }  	
				echo json_encode($response);
				exit;		
	}
    public function admin_dlstas() {
        Configure::write("debug", 0);
        $a = $_POST['id'];
        if ($a == 0) {
            exit;
        }
        $d = explode('-', $a);
        $uid = $d[0];
        $oid = $d[1];
        $stas = $d[2];
        $this->loadModel('Point');
        $cnt = $this->Point->find('count', array('conditions' => array('Point.orderid' => $oid)));
        $data = $this->Order->find('first', array('conditions' => array('Order.id' => $oid)));
        if ($cnt <= 0 && $stas == 3) {
            $this->request->data['Point']['uid'] = $uid;
            $this->request->data['Point']['orderid'] = $oid;
            $this->request->data['Point']['points'] = floor($data['Order']['subtotal']);
            $total = floor($data['Order']['subtotal']);
            if ($this->Point->save($this->request->data)) {
                $this->Order->updateAll(array('Order.dl_status' => $stas), array('Order.id' => $oid));
                $this->loadModel('User');
                $user = $this->User->find('first', array('conditions' => array('User.id' => $uid)));
                $tp = $user['User']['loyalty_points'];

                $this->User->updateAll(array('User.loyalty_points' => $total + $tp), array('User.id' => $uid));
            }

            //print_r($data);
        } else {
            $this->Order->updateAll(array('Order.dl_status' => $stas), array('Order.id' => $oid));
        }

        exit;
    }

    public function admin_tabledelete($id = null) {
        $this->loadModel("TableReservation");
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->TableReservation->id = $id;
        if (!$this->TableReservation->exists()) {
            throw new NotFoundException('Invalid order');
        }
        if ($this->TableReservation->delete()) {
            $this->Session->setFlash('Order deleted');
            return $this->redirect(array('action' => 'tableindex'));
        }
        $this->Session->setFlash('Order was not deleted');
        return $this->redirect(array('action' => 'tableindex'));
    }

    public function admin_tableview($id = NULL) {
        $this->loadModel("TableReservation");
        $order = $this->TableReservation->find('first', array(
            'recursive' => 1,
            'conditions' => array(
                'TableReservation.id' => $id
            )
        ));
        if (empty($order)) {
            return $this->redirect(array('action' => 'index'));
        }
        $this->set(compact('order'));
    }

    public function admin_tableedit($id = NULL) {
        $this->loadModel("TableReservation");
        $this->TableReservation->id = $id;
        if (!$this->TableReservation->exists()) {
            throw new NotFoundException('Invalid order');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->TableReservation->save($this->request->data)) {
                $this->Session->setFlash('The order has been saved');
                return $this->redirect(array('action' => 'tableindex'));
            } else {
                $this->Session->setFlash('The order could not be saved. Please, try again.');
            }
        } else {
            $options = array('conditions' => array('TableReservation.' . $this->TableReservation->primaryKey => $id));
            $this->request->data = $this->TableReservation->find('first', $options);
        }
    }

    public function admin_tableindex() {
        $this->loadModel('TableReservation');
        if ($this->request->is("post")) {
            //print_r($this->request->data);exit;
            $filter = $this->request->data['Order']['filter'];
            $rid = $this->request->data['Order']['restaurant_id'];
            $name = $this->request->data['Order']['name'];
            if (empty($rid)) {
                $conditions[] = array(
                    'TableReservation.' . $filter . ' LIKE' => '%' . $name . '%',
                );
            } else if (empty($name)) {
                $conditions[] = array(
                    'TableReservation.res_id' => $rid,
                );
            } else {
                $conditions[] = array('AND' => array(
                        'TableReservation.' . $filter . ' LIKE' => '%' . $name . '%',
                        'TableReservation.res_id' => $rid,
                ));
            }
            $this->Session->write('TableReservation.filter', $filter);
            $name = $this->request->data['Order']['name'];
            $this->Session->write('TableReservation.name', $name);
            $this->Session->write('TableReservation.conditions', $conditions);
            return $this->redirect(array('action' => 'tableindex'));
        }

        if ($this->Session->check('TableReservation')) {
            $all = $this->Session->read('TableReservation');
        } else if ($this->Auth->user('role') == "rest_admin") {
            $uid = $this->Auth->user('id');
            $this->loadModel('Restaurant');
            $res_first_data = $this->Restaurant->find('first', array('conditions' => array('Restaurant.user_id' => $uid)));

            $all = array(
                'name' => '',
                'filter' => '',
                'conditions' => array('TableReservation.res_id' => $res_first_data['Restaurant']['id']
            ));
        } else {
            $all = array(
                'name' => '',
                'filter' => '',
                'conditions' => ''
            );
        }
        $this->set(compact('all'));
        $this->Paginator = $this->Components->load('Paginator');

        $this->Paginator->settings = array('conditions' => $all['conditions'], 'recursive' => 2, 'limit' => 10, 'order' => array(
                'TableReservation.id' => 'desc'
        ));
        $orders = $this->Paginator->paginate('TableReservation');
        //$this->set('data', $data);
        // debug($data);
        $this->loadModel('Restaurant');
        $this->set('res', $this->Restaurant->find('list'));
        $this->set(compact('orders'));
    }

    public function admin_tablereset() {
        $this->Session->delete('TableReservation');
        return $this->redirect(array('action' => 'tableindex'));
    }

    public function admin_index() {
        Configure::write("debug", 0);
//         $orders=$this->Order->find('all');
//         print_r($orders);
//         $this->set(compact('orders'));
//         exit;
        if ($this->request->is("post")) {
           // print_r($this->request->data);exit;
            $filter = $this->request->data['Order']['filter'];
            $rid = $this->request->data['Order']['restaurant_id'];
            $name = $this->request->data['Order']['name'];
            $date = $this->request->data['Order']['date'];
            $dltype = $this->request->data['Order']['type'];
            if ($date) {
                $date = $date;
            } else {
                $date = "2016-01-01";
            }
            $date1 = $this->request->data['Order']['date1'];
            if ($date1) {
                $date1 = $date1;
            } else {
                $date1 = date("Y-m-d");
            }
           if (empty($rid) && !empty($name) && empty($dltype)) {
                $conditions[] = array('AND' => array(
                        'Order.' . $filter . ' LIKE' => '%' . $name . '%',
                        'Order.created  BETWEEN ? and ?' => array($date, $date1)
                ));
            }else if (!empty($dltype) && !empty($rid)) {
                $conditions[] = array('AND' => array(
                        'Order.restaurant_id' => $rid,
                         'Order.delivery_status' => $dltype,
                        'Order.created  BETWEEN ? and ?' => array($date, $date1)
                ));
            } 
            else if (empty($name) && !empty($rid)) {
                $conditions[] = array('AND' => array(
                        'Order.restaurant_id' => $rid,
                        'Order.created  BETWEEN ? and ?' => array($date, $date1)
                ));
            } else if(!empty($dltype) || $dltype==0 && empty ($name) && empty ($rid)){
              $conditions[] = array('AND' => array(
                       'Order.delivery_status' => $dltype,
                        'Order.created  BETWEEN ? and ?' => array($date, $date1)
                ));   
            } else {
                $conditions[] = array('AND' => array(
                        'Order.' . $filter . ' LIKE' => '%' . $name . '%',
                        'Order.restaurant_id' => $rid,
                        'Order.created  BETWEEN ? and ?' => array($date, $date1)
                ));
            }
          // print_r($conditions);exit;
            $this->Session->write('AOrder.filter', $filter);
            $name = $this->request->data['Order']['name'];
            $this->Session->write('AOrder.name', $name);
            $this->Session->write('AOrder.conditions', $conditions);
            return $this->redirect(array('action' => 'index'));
        }
        if ($this->Session->check('AOrder')) {
            $all = $this->Session->read('AOrder');
        } else if ($this->Auth->user('role') == "rest_admin") {
            $uid = $this->Auth->user('id');
            $this->loadModel('Restaurant');
            $res_first_data = $this->Restaurant->find('first', array('conditions' => array('Restaurant.user_id' => $uid)));
            $all = array(
                'name' => '',
                'filter' => '',
                'conditions' => array(
                    'Order.restaurant_id' => $res_first_data['Restaurant']['id']));
        } else {
          $all = array(
                'name' => '',
                'filter' => '',
                'conditions' => '');
        }
        //print_r($all['conditions']);exit;
        $this->set(compact('all'));
        $this->Paginator = $this->Components->load('Paginator');
        // $this->paginate['recursive'] = 2;
        $this->Paginator->settings = array(
            'Order' => array(
                'order' => array(
                    'Order.created' => 'DESC'
                ),
                'limit' => 20,
                'conditions' => $all['conditions'],
                'recursive' => 2,
                'paramType' => 'querystring',
            )
        );
       // print_r($all['conditions']);exit;
        $this->Paginator->settings = array('conditions' => $all['conditions'], 'recursive' => 2, 'limit' => 20, 'order' => array(
                'Order.id' => 'desc'
        ));
        $orders = $this->Paginator->paginate();
        $this->loadModel('Restaurant');
        $this->set('res', $this->Restaurant->find('list'));
        $this->set(compact('orders'));
    }

    public function admin_indexall() {
        Configure::write("debug", 0);
        $this->loadModel('Restaurant');
        $this->loadModel('TableReservation');

        if ($this->request->is("post")) {

            if ($this->request->data['Order']['date'] == '') {
                $this->request->data['Order']['date'] = "2016-01-01";
            }
            if ($this->request->data['Order']['date1'] == '') {
                $this->request->data['Order']['date1'] = date('Y-m-d');
            }
            if ($this->request->data['Order']['restaurant_id'] == '') {
                $resdata = $this->Restaurant->find('list');
            } else {
                $resdata = $this->Restaurant->find('list', array('conditions' => array('Restaurant.id' => $this->request->data['Order']['restaurant_id'])));
            }

            $postres_id = $this->request->data['Order']['restaurant_id'];
            $date = $this->request->data['Order']['date'];
            $date1 = $this->request->data['Order']['date1'];
            $this->Session->write('orderexcel.date', $date);
            $this->Session->write('orderexcel.date1', $date1);
            // $resdata = $this->Restaurant->find('list', array('conditions' => array('AND'=>array('Restaurant.id' => $this->request->data['Order']['restaurant_id'],'Restaurant.created  BETWEEN ? and ?'=>array($this->request->data['Order']['date'],$this->request->data['Order']['date1'])))));
            $alldata = [];
            foreach ($resdata as $key => $rd) {
                $alldata['Order'][$key]['name'] = $rd;
                $alldata['Order'][$key]['id'] = $key;

                $data = $this->Order->find('all', array('conditions' => array('AND' => array('Order.restaurant_id' => $key, 'Order.created  BETWEEN ? and ?' => array($date, $date1)))));
                $alldata['Order'][$key]['table_reservation'] = $this->TableReservation->find('count', array('conditions' => array('AND' => array('TableReservation.res_id' => $key, 'TableReservation.created  BETWEEN ? and ?' => array($date, $date1)))));
                $alldata['Order'][$key]['allorders'] = $alldata['Order'][$key]['table_reservation'] + $this->Order->find('count', array('conditions' => array('AND' => array('Order.restaurant_id' => $key, 'Order.created  BETWEEN ? and ?' => array($date, $date1)))));
                $cnt = count($data);
                $dl = 0;
                $pk = 0;
                $qrc = 0;
                $tble = 0;
                for ($i = 0; $i < $cnt; $i++) {

                    if ($data[$i]['Order']['delivery_status'] == 0) {
                        $dl++;
                    } else if ($data[$i]['Order']['delivery_status'] == 1) {
                        $pk++;
                    } else if ($data[$i]['Order']['delivery_status'] == 2) {
                        $qrc++;
                    }
                }
                $alldata['Order'][$key]['delivery'] = $dl;
                $alldata['Order'][$key]['pickup'] = $pk;
                $alldata['Order'][$key]['qrcode'] = $qrc;
            }

            if ($this->request->data['Order']['resname']=='restaurant') {
                $uid = $this->Auth->user('id');
                $date = $this->request->data['Order']['date'];
                $date1 = $this->request->data['Order']['date1'];
                $this->loadModel('Restaurant');
                $res_first_data = $this->Restaurant->find('first', array('conditions' => array('Restaurant.user_id' => $uid)));
                $resdata = $this->Restaurant->find('list', array('conditions' => array('Restaurant.id' => $res_first_data['Restaurant']['id'])));
                $alldata = [];
                foreach ($resdata as $key => $rd) {
                    $alldata['Order'][$key]['name'] = $rd;
                    $alldata['Order'][$key]['id'] = $key;

                    $data = $this->Order->find('all', array('conditions' => array('AND' => array('Order.restaurant_id' => $key, 'Order.created  BETWEEN ? and ?' => array($date, $date1)))));
                    $alldata['Order'][$key]['table_reservation'] = $this->TableReservation->find('count', array('conditions' => array('AND' => array('TableReservation.res_id' => $key, 'TableReservation.created  BETWEEN ? and ?' => array($date, $date1)))));
                    $alldata['Order'][$key]['allorders'] = $alldata['Order'][$key]['table_reservation'] + $this->Order->find('count', array('conditions' => array('AND' => array('Order.restaurant_id' => $key, 'Order.created  BETWEEN ? and ?' => array($date, $date1)))));
                    $cnt = count($data);
                    $dl = 0;
                    $pk = 0;
                    $qrc = 0;
                    $tble = 0;
                    for ($i = 0; $i < $cnt; $i++) {

                        if ($data[$i]['Order']['delivery_status'] == 0) {
                            $dl++;
                        } else if ($data[$i]['Order']['delivery_status'] == 1) {
                            $pk++;
                        } else if ($data[$i]['Order']['delivery_status'] == 2) {
                            $qrc++;
                        }
                    }
                    $alldata['Order'][$key]['delivery'] = $dl;
                    $alldata['Order'][$key]['pickup'] = $pk;
                    $alldata['Order'][$key]['qrcode'] = $qrc;
                }
            }
        } else {
            // echo $this->Auth->user('role'); exit;
            if ($this->Auth->user('role') == 'rest_admin') {

                $uid = $this->Auth->user('id');
                $date = "2016-01-01";
                $date1 = date('Y-m-d');
                $this->loadModel('Restaurant');
                $res_first_data = $this->Restaurant->find('first', array('conditions' => array('Restaurant.user_id' => $uid)));
                $resdata = $this->Restaurant->find('list', array('conditions' => array('Restaurant.id' => $res_first_data['Restaurant']['id'])));
                $alldata = [];
                foreach ($resdata as $key => $rd) {
                    $alldata['Order'][$key]['name'] = $rd;
                    $alldata['Order'][$key]['id'] = $key;

                    $data = $this->Order->find('all', array('conditions' => array('AND' => array('Order.restaurant_id' => $key, 'Order.created  BETWEEN ? and ?' => array($date, $date1)))));
                    $alldata['Order'][$key]['table_reservation'] = $this->TableReservation->find('count', array('conditions' => array('AND' => array('TableReservation.res_id' => $key, 'TableReservation.created  BETWEEN ? and ?' => array($date, $date1)))));
                    $alldata['Order'][$key]['allorders'] = $alldata['Order'][$key]['table_reservation'] + $this->Order->find('count', array('conditions' => array('AND' => array('Order.restaurant_id' => $key, 'Order.created  BETWEEN ? and ?' => array($date, $date1)))));
                    $cnt = count($data);
                    $dl = 0;
                    $pk = 0;
                    $qrc = 0;
                    $tble = 0;
                    for ($i = 0; $i < $cnt; $i++) {

                        if ($data[$i]['Order']['delivery_status'] == 0) {
                            $dl++;
                        } else if ($data[$i]['Order']['delivery_status'] == 1) {
                            $pk++;
                        } else if ($data[$i]['Order']['delivery_status'] == 2) {
                            $qrc++;
                        }
                    }
                    $alldata['Order'][$key]['delivery'] = $dl;
                    $alldata['Order'][$key]['pickup'] = $pk;
                    $alldata['Order'][$key]['qrcode'] = $qrc;
                }
            } else {
                $this->Session->delete('orderexcel');
                $date = "2015-01-01";
                $date1 = date('Y-m-d');
                $resdata = $this->Restaurant->find('list');
                $alldata = [];
                foreach ($resdata as $key => $rd) {
                    $alldata['Order'][$key]['name'] = $rd;
                    $alldata['Order'][$key]['id'] = $key;
                    $data = $this->Order->find('all', array('conditions' => array('AND' => array('Order.restaurant_id' => $key, 'Order.created  BETWEEN ? and ?' => array($date, $date1)))));
                    $alldata['Order'][$key]['table_reservation'] = $this->TableReservation->find('count', array('conditions' => array('AND' => array('TableReservation.res_id' => $key, 'TableReservation.created  BETWEEN ? and ?' => array($date, $date1)))));
                    $alldata['Order'][$key]['allorders'] = $alldata['Order'][$key]['table_reservation'] + $this->Order->find('count', array('conditions' => array('AND' => array('Order.restaurant_id' => $key, 'Order.created  BETWEEN ? and ?' => array($date, $date1)))));
                    $cnt = count($data);
                    $dl = 0;
                    $pk = 0;
                    $qrc = 0;
                    $tble = 0;
                    for ($i = 0; $i < $cnt; $i++) {

                        if ($data[$i]['Order']['delivery_status'] == 0) {
                            $dl++;
                        } else if ($data[$i]['Order']['delivery_status'] == 1) {
                            $pk++;
                        } else if ($data[$i]['Order']['delivery_status'] == 2) {
                            $qrc++;
                        }
                    }

                    $alldata['Order'][$key]['delivery'] = $dl;
                    $alldata['Order'][$key]['pickup'] = $pk;
                    $alldata['Order'][$key]['qrcode'] = $qrc;
                }
            }
        }

        $this->loadModel('Restaurant');
        $this->set('res', $this->Restaurant->find('list'));
        $this->set(compact('alldata'));
    }

    public function admin_reset() {
        $this->Session->delete('AOrder');
        return $this->redirect(array('action' => 'index'));
    }

////////////////////////////////////////////////////////////

    public function admin_view($id = null) {
        $order = $this->Order->find('first', array(
            'recursive' => 1,
            'conditions' => array(
                'Order.id' => $id
            )
        ));
        if (empty($order)) {
            return $this->redirect(array('action' => 'index'));
        }
        $this->set(compact('order'));
    }

    public function admin_viewall($id = null) {
        $this->loadModel('Restaurant');
        $this->loadModel('TableReservation');

        $resdata = $this->Restaurant->find('list', array('conditions' => array('Restaurant.id' => $id)));
        $alldata = [];
        foreach ($resdata as $key => $rd) {
            $alldata['Order'][$key]['name'] = $rd;
            $alldata['Order'][$key]['id'] = $key;
            $data = $this->Order->find('all', array('conditions' => array('Order.restaurant_id' => $key)));
            $alldata['Order'][$key]['table_reservation'] = $this->TableReservation->find('count', array('conditions' => array('TableReservation.res_id' => $key)));
            $alldata['Order'][$key]['allorders'] = $alldata['Order'][$key]['table_reservation'] + $this->Order->find('count', array('conditions' => array('Order.restaurant_id' => $key)));
            $cnt = count($data);
            $dl = 0;
            $pk = 0;
            $qrc = 0;
            $tble = 0;
            $delivery_total = 0;
            $pickup_total = 0;
            $qr_total = 0;
            for ($i = 0; $i < $cnt; $i++) {
                if ($data[$i]['Order']['delivery_status'] == 0) {
                    $dl++;
                    $delivery_total+=$data[$i]['Order']['total'];
                } else if ($data[$i]['Order']['delivery_status'] == 1) {
                    $pk++;
                    $pickup_total+=$data[$i]['Order']['total'];
                } else if ($data[$i]['Order']['delivery_status'] == 2) {
                    $qrc++;
                    $qr_total+=$data[$i]['Order']['total'];
                }
            }
            $tresrv = $this->TableReservation->find('all', array('conditions' => array('TableReservation.res_id' => $key)));
            $tr_total = 0;
            foreach ($tresrv as $trd) {
                $tr_total+=$trd['TableReservation']['total'];
            }
            $alldata['Order'][$key]['delivery'] = $dl;
            $alldata['Order'][$key]['pickup'] = $pk;
            $alldata['Order'][$key]['qrcode'] = $qrc;
            $alldata['Order'][$key]['dtotal'] = $delivery_total;
            $alldata['Order'][$key]['ptotal'] = $pickup_total;
            $alldata['Order'][$key]['qrtotal'] = $qr_total;
            $alldata['Order'][$key]['trtotal'] = $tr_total;
        }

        $rdata = $this->Restaurant->find('first', array(
            'recursive' => 1,
            'conditions' => array(
                'Restaurant.id' => $id
            )
        ));
        $this->set(compact('rdata', 'alldata'));
    }

////////////////////////////////////////////////////////////

    public function admin_edit($id = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException('Invalid order');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Order->save($this->request->data)) {
                $this->Session->setFlash('The order has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The order could not be saved. Please, try again.');
            }
        } else {
            $this->request->data = $this->Order->read(null, $id);
        }
    }

////////////////////////////////////////////////////////////

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException('Invalid order');
        }
        if ($this->Order->delete()) {
            $this->Session->setFlash('Order deleted');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Order was not deleted');
        return $this->redirect(array('action' => 'index'));
    }

////////////////////////////////////////////////////////////
    public function stats() {
        //$this->loadModel("Order");
        //$this->render('/Order/admin_view');
        $order = $this->request->data['Order']['created'];
        print_r($order);
    }
    
    public function admin_myaccount(){
        Configure::write("debug", 0);
        $this->loadModel('User');
        $user=$this->User->find('first',array('conditions'=>array('User.id'=>$this->Auth->user('id'))));      
        $this->set(compact(user));
    }    
    
    public function admin_password() {
        Configure::write("debug", 0);
        $this->loadModel('User');
          $this->User->id = $this->Auth->user('id');
        if (!$this->User->exists()) {
            throw new NotFoundException('Invalid user');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('The user has been saved');
                $this->redirect(array('action' => 'myaccount'));
            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
    }
    public function orderhistry(){
          configure::write('debug', 0);
        $uid = $this->Auth->user('id');
        $data = $this->Order->find('all',array('conditions'=>array('Order.uid'=>$uid)));
        $this->set('data', $data);
    }
	
	
	
}
