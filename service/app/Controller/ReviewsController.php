<?php

App::uses('AppController', 'Controller');

/**
 * Times Controller
 *
 * @property Time $Time
 * @property PaginatorComponent $Paginator
 */
class ReviewsController extends AppController {

    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Review->recursive = 0;
        if ($this->Auth->user('role') == 'rest_admin') {
            $res = $this->Review->Restaurant->find('first', array('conditions' => array('Restaurant.user_id' => $this->Auth->user('id'))));
            $this->Paginator->settings = array(
                'Review' => array(
                    'conditions' => array('Review.resid' => $res['Restaurant']['id']
            )));
        }
        $this->set('reviews', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
         $this->Review->recursive = 1;
        if (!$this->Review->exists($id)) {
            throw new NotFoundException(__('Invalid time'));
        }
        $options = array('conditions' => array('Review.' . $this->Review->primaryKey => $id));
        $this->set('time', $this->Review->find('first', $options));
        $res = $this->Review->Restaurant->find('list');
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
        if ($this->Auth->user('role') == 'rest_admin') {
            $res = $this->Time->Restaurant->find('list', array('conditions' => array('Restaurant.user_id' => $this->Auth->user('id'))));
        } else {
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
