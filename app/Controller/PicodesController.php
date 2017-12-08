<?php

App::uses('AppController', 'Controller');

/**
 * Picodes Controller
 *
 * @property Picode $Picode
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PicodesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Picode->recursive = 0;
        $this->set('picodes', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Picode->exists($id)) {
            throw new NotFoundException(__('Invalid picode'));
        }
        $options = array('conditions' => array('Picode.' . $this->Picode->primaryKey => $id));
        $this->set('picode', $this->Picode->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Picode->create();
            if ($this->Picode->save($this->request->data)) {
                $this->Session->setFlash(__('The picode has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The picode could not be saved. Please, try again.'));
            }
        }
        $res = $this->Picode->Restaurant->find('list');
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
        if (!$this->Picode->exists($id)) {
            throw new NotFoundException(__('Invalid picode'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Picode->save($this->request->data)) {
                $this->Session->setFlash(__('The picode has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The picode could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Picode.' . $this->Picode->primaryKey => $id));
            $this->request->data = $this->Picode->find('first', $options);
        }
        $res = $this->Picode->Restaurant->find('list');
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
        $this->Picode->id = $id;
        if (!$this->Picode->exists()) {
            throw new NotFoundException(__('Invalid picode'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Picode->delete()) {
            $this->Session->setFlash(__('The picode has been deleted.'));
        } else {
            $this->Session->setFlash(__('The picode could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Picode->recursive = 0;
        $this->set('picodes', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Picode->recursive = 2;
        if (!$this->Picode->exists($id)) {
            throw new NotFoundException(__('Invalid picode'));
        }
        $options = array('conditions' => array('Picode.' . $this->Picode->primaryKey => $id));
        $this->set('picode', $this->Picode->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Picode->create();
            if ($this->Picode->save($this->request->data)) {
                $this->Session->setFlash(__('The picode has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The picode could not be saved. Please, try again.'));
            }
        }
        $res = $this->Picode->Restaurant->find('list');
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
        if (!$this->Picode->exists($id)) {
            throw new NotFoundException(__('Invalid picode'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Picode->save($this->request->data)) {
                $this->Session->setFlash(__('The picode has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The picode could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Picode.' . $this->Picode->primaryKey => $id));
            $this->request->data = $this->Picode->find('first', $options);
        }
        $res = $this->Picode->Restaurant->find('list');
        $this->set(compact('res'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Picode->id = $id;
        if (!$this->Picode->exists()) {
            throw new NotFoundException(__('Invalid picode'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Picode->delete()) {
            $this->Session->setFlash(__('The picode has been deleted.'));
        } else {
            $this->Session->setFlash(__('The picode could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_indexa() {


        $this->Picode->recursive = 0;
        $this->loadModel('Restaurant');
        $data = $this->Restaurant->find('first', array('conditions' => array('Restaurant.user_id' => $this->Auth->user('id'))));

        $d = $this->Paginator->paginate(
                'Picode', array('Picode.res_id' => $data['Restaurant']['id'])
        );
        $this->set('picodes', $d);
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_viewa($id = null) {
        $this->Picode->recursive = 2;
        if (!$this->Picode->exists($id)) {
            throw new NotFoundException(__('Invalid picode'));
        }
        $options = array('conditions' => array('Picode.' . $this->Picode->primaryKey => $id));
        $this->set('picode', $this->Picode->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_adda() {
        if ($this->request->is('post')) {
            $this->Picode->create();
            if ($this->Picode->save($this->request->data)) {
                $this->Session->setFlash(__('The picode has been saved.'));
                return $this->redirect(array('action' => 'indexa'));
            } else {
                $this->Session->setFlash(__('The picode could not be saved. Please, try again.'));
            }
        }
        $res = $this->Picode->Restaurant->find('list', array('conditions' => array('Restaurant.user_id' => $this->Auth->user('id'))));
        $this->set(compact('res'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edita($id = null) {
        if (!$this->Picode->exists($id)) {
            throw new NotFoundException(__('Invalid picode'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Picode->save($this->request->data)) {
                $this->Session->setFlash(__('The picode has been saved.'));
                return $this->redirect(array('action' => 'indexa'));
            } else {
                $this->Session->setFlash(__('The picode could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Picode.' . $this->Picode->primaryKey => $id));
            $this->request->data = $this->Picode->find('first', $options);
        }
        $res = $this->Picode->Restaurant->find('list');
        $this->set(compact('res'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_deletea($id = null) {
        $this->Picode->id = $id;
        if (!$this->Picode->exists()) {
            throw new NotFoundException(__('Invalid picode'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Picode->delete()) {
            $this->Session->setFlash(__('The picode has been deleted.'));
        } else {
            $this->Session->setFlash(__('The picode could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'indexa'));
    }

}
