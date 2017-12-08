<?php
App::uses('AppController', 'Controller');
/**
 * RestaurantsTypes Controller
 *
 * @property RestaurantsType $RestaurantsType
 * @property PaginatorComponent $Paginator
 */
class RestaurantsTypesController extends AppController {

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
		
		$this->set('restaurantsTypes', $this->RestaurantsType->find('all'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->RestaurantsType->exists($id)) {
			throw new NotFoundException(__('Invalid restaurants type'));
		}
		$options = array('conditions' => array('RestaurantsType.' . $this->RestaurantsType->primaryKey => $id));
		$this->set('restaurantsType', $this->RestaurantsType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->RestaurantsType->create();
			if ($this->RestaurantsType->save($this->request->data)) {
				$this->Session->setFlash(__('The Venues Category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Venues Category could not be saved. Please, try again.'));
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
		if (!$this->RestaurantsType->exists($id)) {
			throw new NotFoundException(__('Invalid restaurants type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RestaurantsType->save($this->request->data)) {
				$this->Session->setFlash(__('The Venues Category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Venues Category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RestaurantsType.' . $this->RestaurantsType->primaryKey => $id));
			$this->request->data = $this->RestaurantsType->find('first', $options);
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
		$this->RestaurantsType->id = $id;
		if (!$this->RestaurantsType->exists()) {
			throw new NotFoundException(__('Invalid restaurants type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RestaurantsType->delete()) {
			$this->Session->setFlash(__('The Venues Category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Venues Category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
