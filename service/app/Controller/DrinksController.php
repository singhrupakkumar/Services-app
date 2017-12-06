<?php
App::uses('AppController', 'Controller');
/**
 * RestaurantsTypes Controller
 *
 * @property RestaurantsType $RestaurantsType
 * @property PaginatorComponent $Paginator
 */
class DrinksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {

		$this->set('Drinks', $this->Drink->find('all'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Drink->exists($id)) {
			throw new NotFoundException(__('Invalid restaurants type'));
		}
		$options = array('conditions' => array('Drink.' . $this->Drink->primaryKey => $id));
		$this->set('Drink', $this->Drink->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {

			$this->Drink->create();
			if ($this->Drink->save($this->request->data)) {
				$this->Session->setFlash(__('The Free Drink Category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Free Drink could not be saved. Please, try again.'));
			}
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
		if (!$this->Drink->exists($id)) {
			throw new NotFoundException(__('Invalid Free Drink Category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Drink->save($this->request->data)) {
				$this->Session->setFlash(__('The Free Drink Category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Free Drink Category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Drink.' . $this->Drink->primaryKey => $id));
			$this->request->data = $this->Drink->find('first', $options);
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
		$this->Drink->id = $id;
		if (!$this->Drink->exists()) {
			throw new NotFoundException(__('Invalid Free Drink Category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Drink->delete()) {
			$this->Session->setFlash(__('The Free Drink Category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Free Drink Category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
