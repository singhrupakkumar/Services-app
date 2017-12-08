<?php

App::uses('AppController', 'Controller');

/**
 * Promocodes Controller
 *
 * @property Promocodes $Promocodes
 * @property PaginatorComponent $Paginator
 */
class PromocodesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

       public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('api_promocode');
    }
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index($id=NULL) {
        $this->Paginator = $this->Components->load('Paginator');
        $this->Paginator->settings = array(            
        'Promocode' => array(
            'conditions'=>array(
                'Promocode.res_id'=>$id
            ),
            'limit' => 20
        )
    );
        
        $this->set('promocodes', $this->Paginator->paginate());
        $this->set("resid", $id);
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Promocode->exists($id)) {
            throw new NotFoundException(__('Invalid alergy'));
        }
        $options = array('conditions' => array('Promocode.' . $this->Promocode->primaryKey => $id));
        $this->set('tax', $this->Promocode->find('first', $options));
          
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add($id=NULL) {
        if ($this->request->is('post')) {
            $this->Promocode->create();
            if ($this->Promocode->save($this->request->data)) {
                $this->Session->setFlash(__('The Promocode has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Promocode could not be saved. Please, try again.'));
            }
        }else {
            $this->set("resid", $id);
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
        if (!$this->Promocode->exists($id)) {
            throw new NotFoundException(__('Invalid Promocode'));
        }
        if ($this->request->is(array('post', 'put'))) {
               $this->Promocode->id=$id;
          //  print_r($this->request->data);exit;
            if ($this->Promocode->save($this->request->data)) {
                $this->Session->setFlash(__('The Promocode has been saved.'));
                return $this->redirect(array('controller'=>'restaurants','action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Promocode could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Promocode.' . $this->Promocode->primaryKey => $id));
            $this->request->data = $this->Promocode->find('first', $options);
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
        $this->Promocode->id = $id;
        if (!$this->Promocode->exists()) {
            throw new NotFoundException(__('Invalid alergy'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Promocode->delete()) {
            $this->Session->setFlash(__('The Promocode has been deleted.'));
        } else {
            $this->Session->setFlash(__('The Promocode could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    public function api_promocode() {
        configure::write('debug', 0);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);   
        $this->layout = "ajax";
        if (!empty($redata)) {
        $resid = $redata->Restaurant->id;
        $procode = $redata->Promocode->promocode;
        $data=$this->Restaurant->find('first',array('conditions'=>array('AND'=>array('Promocode.res_id'=>$resid,'Promocode.promocode'=>$procode))));
                if($data){
                    $response['error'] = '0'; 
                    $response['msg'] = 'You have added  in the Favourite list'; 
                    $response['data'] = $data;
                }else {
                     $response['error'] = '1'; 
                    $response['msg'] = 'error'; 
                }
        }
         echo json_encode($response);
        exit;
    }   
}
