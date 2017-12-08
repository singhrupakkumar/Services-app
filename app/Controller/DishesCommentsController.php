<?php
App::uses('AppController', 'Controller');
/**
 * DishesComments Controller
 *
 * @property DishesComment $DishesComment
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class DishesCommentsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Js');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DishesComment->recursive = 0;
		$this->set('dishesComments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DishesComment->exists($id)) {
			throw new NotFoundException(__('Invalid dishes comment'));
		}
		$options = array('conditions' => array('DishesComment.' . $this->DishesComment->primaryKey => $id));
		$this->set('dishesComment', $this->DishesComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DishesComment->create();
			if ($this->DishesComment->save($this->request->data)) {
				$this->Flash->success(__('The dishes comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The dishes comment could not be saved. Please, try again.'));
			}
		}
		$dishes = $this->DishesComment->Dish->find('list');
		$this->set(compact('dishes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DishesComment->exists($id)) {
			throw new NotFoundException(__('Invalid dishes comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DishesComment->save($this->request->data)) {
				$this->Flash->success(__('The dishes comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The dishes comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DishesComment.' . $this->DishesComment->primaryKey => $id));
			$this->request->data = $this->DishesComment->find('first', $options);
		}
		$dishes = $this->DishesComment->Dish->find('list');
		$this->set(compact('dishes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DishesComment->id = $id;
		if (!$this->DishesComment->exists()) {
			throw new NotFoundException(__('Invalid dishes comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DishesComment->delete()) {
			$this->Flash->success(__('The dishes comment has been deleted.'));
		} else {
			$this->Flash->error(__('The dishes comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * dishes_index method
 *
 * @return void
 */
	public function dishes_index() {
		$this->DishesComment->recursive = 0;
		$this->set('dishesComments', $this->Paginator->paginate());
	}

/**
 * dishes_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function dishes_view($id = null) {
		if (!$this->DishesComment->exists($id)) {
			throw new NotFoundException(__('Invalid dishes comment'));
		}
		$options = array('conditions' => array('DishesComment.' . $this->DishesComment->primaryKey => $id));
		$this->set('dishesComment', $this->DishesComment->find('first', $options));
	}

/**
 * dishes_add method
 *
 * @return void
 */
	public function dishes_add() {
		if ($this->request->is('post')) {
			$this->DishesComment->create();
			if ($this->DishesComment->save($this->request->data)) {
				$this->Flash->success(__('The dishes comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The dishes comment could not be saved. Please, try again.'));
			}
		}
		$dishes = $this->DishesComment->Dish->find('list');
		$this->set(compact('dishes'));
	}

/**
 * dishes_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function dishes_edit($id = null) {
		if (!$this->DishesComment->exists($id)) {
			throw new NotFoundException(__('Invalid dishes comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DishesComment->save($this->request->data)) {
				$this->Flash->success(__('The dishes comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The dishes comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DishesComment.' . $this->DishesComment->primaryKey => $id));
			$this->request->data = $this->DishesComment->find('first', $options);
		}
		$dishes = $this->DishesComment->Dish->find('list');
		$this->set(compact('dishes'));
	}

/**
 * dishes_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function dishes_delete($id = null) {
		$this->DishesComment->id = $id;
		if (!$this->DishesComment->exists()) {
			throw new NotFoundException(__('Invalid dishes comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DishesComment->delete()) {
			$this->Flash->success(__('The dishes comment has been deleted.'));
		} else {
			$this->Flash->error(__('The dishes comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
