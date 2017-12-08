<?php

App::uses('AppController', 'Controller');

/**
 * Taxes Controller
 *
 * @property Tax $Tax
 * @property PaginatorComponent $Paginator
 */
class TaxesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Tax->recursive = 0;
        $this->set('taxes', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Tax->exists($id)) {
            throw new NotFoundException(__('Invalid tax'));
        }
        $options = array('conditions' => array('Tax.' . $this->Tax->primaryKey => $id));
        $this->set('tax', $this->Tax->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Tax->create();
            if ($this->Tax->save($this->request->data)) {
                $this->Session->setFlash(__('The tax has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tax could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Tax->exists($id)) {
            throw new NotFoundException(__('Invalid tax'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Tax->save($this->request->data)) {
                $this->Session->setFlash(__('The tax has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tax could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Tax.' . $this->Tax->primaryKey => $id));
            $this->request->data = $this->Tax->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Tax->id = $id;
        if (!$this->Tax->exists()) {
            throw new NotFoundException(__('Invalid tax'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Tax->delete()) {
            $this->Session->setFlash(__('The tax has been deleted.'));
        } else {
            $this->Session->setFlash(__('The tax could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Tax->recursive = 0;
        $this->set('taxes', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Tax->exists($id)) {
            throw new NotFoundException(__('Invalid tax'));
        }
        $options = array('conditions' => array('Tax.' . $this->Tax->primaryKey => $id));
        $this->set('tax', $this->Tax->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Tax->create();
            if ($this->Tax->save($this->request->data)) {
                $this->Session->setFlash(__('The tax has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tax could not be saved. Please, try again.'));
            }
        }
               $res = $this->Tax->Restaurant->find('list');
		$this->set(compact('res'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Tax->exists($id)) {
            throw new NotFoundException(__('Invalid tax'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Tax->save($this->request->data)) {
                $this->Session->setFlash(__('The tax has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tax could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Tax.' . $this->Tax->primaryKey => $id));
            $this->request->data = $this->Tax->find('first', $options);
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
        $this->Tax->id = $id;
        if (!$this->Tax->exists()) {
            throw new NotFoundException(__('Invalid tax'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Tax->delete()) {
            $this->Session->setFlash(__('The tax has been deleted.'));
        } else {
            $this->Session->setFlash(__('The tax could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    public function admin_editsurcharge() {
        
         if ($this->request->is('post')) {
            $surchargenew = $this->request->data['Tax']['surcharge'];
        
        $upd = $this->Tax->updateAll(array('Tax.surcharge' => $surchargenew));
       // print_r( $upd);
        if($upd){
                        
         $this->Session->setFlash(__('The Surcharge has been saved.'));  
        }else{ 
        $this->Session->setFlash(__('The Surcharge could not be saved. Please, try again.')); 
        }
        }else{ 
        $this->Session->setFlash(__('Please enter surchange')); 
        }
         $surcharge = $this->Tax->find('first',array('order'=>'Tax.id ASC'));
        // print_r($surcharge);
		$surchargenew = number_format($surcharge['Tax']['surcharge'],3);
         $this->Session->setFlash(__('Your current surcharge is '. $surchargenew));  
            $msgg = 'Your current surcharge is '. $surchargenew;
            $this->set('msgg',$msgg);
    }
//echo number_format($surchargenew,3);
        /*if (!$this->Tax->exists($id)) {
            throw new NotFoundException(__('Invalid tax'));
        }*/
       // if ($this->request->is(array('post', 'put'))) {
           /* if ($this->Tax->save($this->request->data)) {
                $this->Session->setFlash(__('The tax has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tax could not be saved. Please, try again.'));
            }*/
        /*} else {
           // $options = array('conditions' => array('Tax.' . $this->Tax->primaryKey => $id));
            $this->request->data = $this->Tax->find('first');
        }*/
   // } 
    
       /* public function api_canceltime() {
        Configure::write('debug', 0);
        $this->layout = 'ajax';
           ob_start();
        //print_r($this->request->data);
        $c = ob_get_clean();
        $fc = fopen('files' . DS . 'detail.txt', 'w');
        fwrite($fc, $c);
        fclose($fc);		
		 $resid = $this->request->data['resid'];//=624; 
		 //$cancel_time = $this->request->data['cancel_time'];
		 $ctime = $this->Tax->find('all');		 
		// echo "<pre>";print_r($ctime);die;
		 if ($ctime) {
            $response['isSuccess'] = "true";
            $response['data'] = $ctime;
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "No data found";
        }		
        echo json_encode($response);
        exit;
		 
		}  */
		
		public function api_canceltime() {
        Configure::write('debug', 0);
        $this->layout = 'ajax';
           ob_start();
        //print_r($this->request->data);
        $c = ob_get_clean();
        $fc = fopen('files' . DS . 'detail.txt', 'w');
        fwrite($fc, $c);
        fclose($fc);		
		 $resid = $this->request->data['resid'];//=624; 
		 //$cancel_time = $this->request->data['cancel_time'];
		 $ctime = $this->Tax->find('first', array('conditions'=>array('Tax.resid'=>'$resid')));		 
		// print_r($ctime);
		 if ($ctime) {
            $response['isSuccess'] = "true";
            $response['data'] = $ctime;
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "No data found";
        }		
        echo json_encode($response);
        exit;
		 
		}  
}
