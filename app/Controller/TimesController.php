<?php

App::uses('AppController', 'Controller');

/**
 * Times Controller
 *
 * @property Time $Time
 * @property PaginatorComponent $Paginator
 */
class TimesController extends AppController {

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
        $this->Time->recursive = 0;
        $this->set('times', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Time->exists($id)) {
            throw new NotFoundException(__('Invalid time'));
        }
        $options = array('conditions' => array('Time.' . $this->Time->primaryKey => $id));
        $this->set('time', $this->Time->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Time->create();
            if ($this->Time->save($this->request->data)) {
                $this->Session->setFlash(__('The time has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The time could not be saved. Please, try again.'));
            }
        }
        $res = $this->Time->Restaurant->find('list');
        $this->set(compact('res'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Time->exists($id)) {
            throw new NotFoundException(__('Invalid time'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Time->save($this->request->data)) {
                $this->Session->setFlash(__('The time has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The time could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Time.' . $this->Time->primaryKey => $id));
            $this->request->data = $this->Time->find('first', $options);
        }
        $res = $this->Time->Restaurant->find('list');
        $this->set(compact('res'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Time->id = $id;
        if (!$this->Time->exists()) {
            throw new NotFoundException(__('Invalid time'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Time->delete()) {
            $this->Session->setFlash(__('The time has been deleted.'));
        } else {
            $this->Session->setFlash(__('The time could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {     
          $this->Time->recursive = 0;
           if($this->Auth->user('role')=='rest_admin'){
           $res = $this->Time->Restaurant->find('first',array('conditions'=>array('Restaurant.user_id'=>$this->Auth->user('id')))); 
           $this->Paginator->settings = array(
            'Time' => array(
                'conditions' => array('Time.res_id'=>$res['Restaurant']['id']
                )));
        }
        $this->set('times', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Time->exists($id)) {
            throw new NotFoundException(__('Invalid time'));
        }
        $options = array('conditions' => array('Time.' . $this->Time->primaryKey => $id));
        $this->set('time', $this->Time->find('first', $options));
        $res = $this->Time->Restaurant->find('list');
        $this->set(compact('res'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {   
        if ($this->request->is('post')) {
            $this->Time->create();
               if ($this->Time->hasAny(array('Time.res_id' => $this->request->data['Time']['res_id']))) {
                $this->Session->setFlash(__('Store Time  already exist!!!'));
                 return $this->redirect(array('action' => 'index'));
            }
            if ($this->Time->save($this->request->data)) {
                $this->Session->setFlash(__('The time has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The time could not be saved. Please, try again.'));
            }
        }
        if($this->Auth->user('role')=='rest_admin'){
         $res = $this->Time->Restaurant->find('list',array('conditions'=>array('Restaurant.user_id'=>$this->Auth->user('id'))));
        }else {
        $res = $this->Time->Restaurant->find('list');
        }
        $this->set(compact('res'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Time->exists($id)) {
            throw new NotFoundException(__('Invalid time'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Time->save($this->request->data)) {
                $this->Session->setFlash(__('The time has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The time could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Time.' . $this->Time->primaryKey => $id));
            $this->request->data = $this->Time->find('first', $options);
        }
         if($this->Auth->user('role')=='rest_admin'){
         $res = $this->Time->Restaurant->find('list',array('conditions'=>array('Restaurant.user_id'=>$this->Auth->user('id'))));
        }else {
        $res = $this->Time->Restaurant->find('list');
        }
        $this->set(compact('res'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Time->id = $id;
        if (!$this->Time->exists()) {
            throw new NotFoundException(__('Invalid time'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Time->delete()) {
            $this->Session->setFlash(__('The time has been deleted.'));
        } else {
            $this->Session->setFlash(__('The time could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
