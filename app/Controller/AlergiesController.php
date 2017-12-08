<?php
App::uses('AppController', 'Controller');
/**
 * Alergies Controller
 *
 * @property Alergy $Alergy
 * @property PaginatorComponent $Paginator
 */
class AlergiesController extends AppController {

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
		$this->Alergy->recursive = 0;
		$this->set('alergies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Alergy->exists($id)) {
			throw new NotFoundException(__('Invalid alergy'));
		}
		$options = array('conditions' => array('Alergy.' . $this->Alergy->primaryKey => $id));
		$this->set('alergy', $this->Alergy->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Alergy->create();
			if ($this->Alergy->save($this->request->data)) {
				$this->Session->setFlash(__('The alergy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alergy could not be saved. Please, try again.'));
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
		if (!$this->Alergy->exists($id)) {
			throw new NotFoundException(__('Invalid alergy'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Alergy->save($this->request->data)) {
				$this->Session->setFlash(__('The alergy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alergy could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Alergy.' . $this->Alergy->primaryKey => $id));
			$this->request->data = $this->Alergy->find('first', $options);
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
		$this->Alergy->id = $id;
		if (!$this->Alergy->exists()) {
			throw new NotFoundException(__('Invalid alergy'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Alergy->delete()) {
			$this->Session->setFlash(__('The alergy has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alergy could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Alergy->recursive = 0;
		$this->set('alergies', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Alergy->exists($id)) {
			throw new NotFoundException(__('Invalid alergy'));
		}
		$options = array('conditions' => array('Alergy.' . $this->Alergy->primaryKey => $id));
		$this->set('alergy', $this->Alergy->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Alergy->create();
			if ($this->Alergy->save($this->request->data)) {
				$this->Session->setFlash(__('The alergy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alergy could not be saved. Please, try again.'));
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
		if (!$this->Alergy->exists($id)) {
			throw new NotFoundException(__('Invalid alergy'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Alergy->save($this->request->data)) {
				$this->Session->setFlash(__('The alergy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alergy could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Alergy.' . $this->Alergy->primaryKey => $id));
			$this->request->data = $this->Alergy->find('first', $options);
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
		$this->Alergy->id = $id;
		if (!$this->Alergy->exists()) {
			throw new NotFoundException(__('Invalid alergy'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Alergy->delete()) {
			$this->Session->setFlash(__('The alergy has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alergy could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
