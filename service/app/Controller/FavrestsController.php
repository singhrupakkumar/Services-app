<?php
App::uses('AppController', 'Controller');
/**
 * Favrests Controller
 *
 * @property Favrest $Favrest
 * @property PaginatorComponent $Paginator
 */
class FavrestsController extends AppController {

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
		$this->Favrest->recursive = 0;
		$this->set('favrests', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Favrest->exists($id)) {
			throw new NotFoundException(__('Invalid favrest'));
		}
		$options = array('conditions' => array('Favrest.' . $this->Favrest->primaryKey => $id));
		$this->set('favrest', $this->Favrest->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Favrest->create();
			if ($this->Favrest->save($this->request->data)) {
				$this->Session->setFlash(__('The favrest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favrest could not be saved. Please, try again.'));
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
		if (!$this->Favrest->exists($id)) {
			throw new NotFoundException(__('Invalid favrest'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Favrest->save($this->request->data)) {
				$this->Session->setFlash(__('The favrest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favrest could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Favrest.' . $this->Favrest->primaryKey => $id));
			$this->request->data = $this->Favrest->find('first', $options);
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
		$this->Favrest->id = $id;
		if (!$this->Favrest->exists()) {
			throw new NotFoundException(__('Invalid favrest'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Favrest->delete()) {
			$this->Session->setFlash(__('The favrest has been deleted.'));
		} else {
			$this->Session->setFlash(__('The favrest could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Favrest->recursive = 0;
		$this->set('favrests', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Favrest->exists($id)) {
			throw new NotFoundException(__('Invalid favrest'));
		}
		$options = array('conditions' => array('Favrest.' . $this->Favrest->primaryKey => $id));
		$this->set('favrest', $this->Favrest->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Favrest->create();
			if ($this->Favrest->save($this->request->data)) {
				$this->Session->setFlash(__('The favrest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favrest could not be saved. Please, try again.'));
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
		if (!$this->Favrest->exists($id)) {
			throw new NotFoundException(__('Invalid favrest'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Favrest->save($this->request->data)) {
				$this->Session->setFlash(__('The favrest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favrest could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Favrest.' . $this->Favrest->primaryKey => $id));
			$this->request->data = $this->Favrest->find('first', $options);
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
		$this->Favrest->id = $id;
		if (!$this->Favrest->exists()) {
			throw new NotFoundException(__('Invalid favrest'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Favrest->delete()) {
			$this->Session->setFlash(__('The favrest has been deleted.'));
		} else {
			$this->Session->setFlash(__('The favrest could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
