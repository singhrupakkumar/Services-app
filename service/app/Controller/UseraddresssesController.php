<?php
App::uses('AppController', 'Controller');
/**
 * Useraddressses Controller
 *
 * @property Useraddresss $Useraddresss
 * @property PaginatorComponent $Paginator
 */
class UseraddresssesController extends AppController {

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
		$this->Useraddresss->recursive = 0;
		$this->set('useraddressses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Useraddresss->exists($id)) {
			throw new NotFoundException(__('Invalid useraddresss'));
		}
		$options = array('conditions' => array('Useraddresss.' . $this->Useraddresss->primaryKey => $id));
		$this->set('useraddresss', $this->Useraddresss->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Useraddresss->create();
			if ($this->Useraddresss->save($this->request->data)) {
				$this->Session->setFlash(__('The useraddresss has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The useraddresss could not be saved. Please, try again.'));
			}
		}
		$users = $this->Useraddresss->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Useraddresss->exists($id)) {
			throw new NotFoundException(__('Invalid useraddresss'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Useraddresss->save($this->request->data)) {
				$this->Session->setFlash(__('The useraddresss has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The useraddresss could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Useraddresss.' . $this->Useraddresss->primaryKey => $id));
			$this->request->data = $this->Useraddresss->find('first', $options);
		}
		$users = $this->Useraddresss->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Useraddresss->id = $id;
		if (!$this->Useraddresss->exists()) {
			throw new NotFoundException(__('Invalid useraddresss'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Useraddresss->delete()) {
			$this->Session->setFlash(__('The useraddresss has been deleted.'));
		} else {
			$this->Session->setFlash(__('The useraddresss could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Useraddresss->recursive = 0;
		$this->set('useraddressses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Useraddresss->exists($id)) {
			throw new NotFoundException(__('Invalid useraddresss'));
		}
		$options = array('conditions' => array('Useraddresss.' . $this->Useraddresss->primaryKey => $id));
		$this->set('useraddresss', $this->Useraddresss->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Useraddresss->create();
			if ($this->Useraddresss->save($this->request->data)) {
				$this->Session->setFlash(__('The useraddresss has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The useraddresss could not be saved. Please, try again.'));
			}
		}
		$users = $this->Useraddresss->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Useraddresss->exists($id)) {
			throw new NotFoundException(__('Invalid useraddresss'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Useraddresss->save($this->request->data)) {
				$this->Session->setFlash(__('The useraddresss has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The useraddresss could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Useraddresss.' . $this->Useraddresss->primaryKey => $id));
			$this->request->data = $this->Useraddresss->find('first', $options);
		}
		$users = $this->Useraddresss->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Useraddresss->id = $id;
		if (!$this->Useraddresss->exists()) {
			throw new NotFoundException(__('Invalid useraddresss'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Useraddresss->delete()) {
			$this->Session->setFlash(__('The useraddresss has been deleted.'));
		} else {
			$this->Session->setFlash(__('The useraddresss could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}



public function api_addAddress() {
        configure::write('debug', 0);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $this->User->recursive = 2;
        $this->layout = "ajax";
        $data['name']=$redata->name;
        $data['street_name']=$redata->street;
        $data['user_id']=$redata->user_id;
            if (!empty($redata)) {
            $data = $this-> Useraddressses->save($data);
            if ($data) {

                $response['msg'] = 'Success';

                $response['data'] = $data;
            } else {

                $response['isSucess'] = 'false';

                $response['msg'] = 'Sorry There are no data';
            }
        
          }
echo json_encode($response);
exit;
    }

public function api_showAddresses() {
        configure::write('debug', 0);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $this->User->recursive = 2;
        $this->layout = "ajax";
        $user_id=$redata->user_id;
            if (!empty($redata)) {
            $data = $this-> Useraddressses->find('all', array('conditions' => array('Useraddressses.id' => $id)));
            if ($data) {

                $response['msg'] = 'Success';

                $response['data'] = $data;
            } else {

                $response['isSucess'] = 'false';

                $response['msg'] = 'Sorry There are no data';
            }
        
          }
echo json_encode($response);
exit;
    }
}