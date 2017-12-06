<?php
App::uses('AppController', 'Controller');
/**
 * Dishes Controller
 *
 * @property Dish $Dish
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 */
class DishesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Dish->recursive = 0;
		$this->set('dishes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dish->exists($id)) {
			throw new NotFoundException(__('Invalid dish'));
		}
		$options = array('conditions' => array('Dish.' . $this->Dish->primaryKey => $id));
		$this->set('dish', $this->Dish->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dish->create();
			if ($this->Dish->save($this->request->data)) {
				return $this->flash(__('The dish has been saved.'), array('action' => 'index'));
			}
		}
		$cats = $this->Dish->Cat->find('list');
		$restaurants = $this->Dish->Restaurant->find('list');
		$this->set(compact('cats', 'restaurants'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Dish->exists($id)) {
			throw new NotFoundException(__('Invalid dish'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dish->save($this->request->data)) {
				return $this->flash(__('The dish has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Dish.' . $this->Dish->primaryKey => $id));
			$this->request->data = $this->Dish->find('first', $options);
		}
		$cats = $this->Dish->Cat->find('list');
		$restaurants = $this->Dish->Restaurant->find('list');
		$this->set(compact('cats', 'restaurants'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Dish->id = $id;
		if (!$this->Dish->exists()) {
			throw new NotFoundException(__('Invalid dish'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Dish->delete()) {
			return $this->flash(__('The dish has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The dish could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Dish->recursive = 0;
		$this->set('dishes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Dish->exists($id)) {
			throw new NotFoundException(__('Invalid dish'));
		}
		$options = array('conditions' => array('Dish.' . $this->Dish->primaryKey => $id));
		$this->set('dish', $this->Dish->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Dish->create();
			if ($this->Dish->save($this->request->data)) {
				return $this->flash(__('The dish has been saved.'), array('action' => 'index'));
			}
		}
		//$cats = $this->Dish->Cat->find('list');
		$this->loadModel('Restaurant'); 
		$restaurants = $this->Dish->Restaurant->find('list');
		$this->set(compact('cats', 'restaurants'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Dish->exists($id)) {
			throw new NotFoundException(__('Invalid dish'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dish->save($this->request->data)) {
				return $this->flash(__('The dish has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Dish.' . $this->Dish->primaryKey => $id));
			$this->request->data = $this->Dish->find('first', $options);
		}
		$cats = $this->Dish->Cat->find('list');
		$restaurants = $this->Dish->Restaurant->find('list');
		$this->set(compact('cats', 'restaurants'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Dish->id = $id;
		if (!$this->Dish->exists()) {
			throw new NotFoundException(__('Invalid dish'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Dish->delete()) {
			return $this->flash(__('The dish has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The dish could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
