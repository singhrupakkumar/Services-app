<?php

App::uses('AppController', 'Controller');

/**
 * Alergies Controller
 *
 * @property Alergy $Alergy
 * @property PaginatorComponent $Paginator
 */
class AdsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('api_ads');
    }

//api_ads
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Ad->recursive = 0;
        $this->set('dishSubcats', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Ad->recursive = 0;
        if (!$this->Ad->exists($id)) {
            throw new NotFoundException(__('Invalid Ads'));
        }
        $options = array('conditions' => array('Ad.' . $this->Ad->primaryKey => $id));
        $a = $this->Ad->find('first', $options);
        // debug($a);exit;
        $this->set('dishSubcat', $this->Ad->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $d = $this->request->data['Ad']['image'];
            // print_r($this->request->data);
            $uploadfolderpath = "ads";
            $uploadpath = WWW_ROOT . '/files/' . $uploadfolderpath;
            if ($d['error'] == 0) {
                $imagename = $d['name'];
                if (file_exists($uploadpath . DS . $imagename)) {
                    $imagename = time() . $imagename;
                }
                $fullpathimage = $uploadpath . DS . $imagename;
                $this->request->data['Ad']['image'] = $imagename;
                move_uploaded_file($d['tmp_name'], $fullpathimage);
            }
            $this->Ad->create();
            if ($this->Ad->save($this->request->data)) {
                $this->Session->setFlash(__('The Ads has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Ads  could not be saved. Please, try again.'));
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
        if (!$this->Ad->exists($id)) {
            throw new NotFoundException(__('Invalid Ads'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $d = $this->request->data['Ad']['image'];
            if ($d['name'] == '') {
                $this->request->data['Ad']['image'] = $this->request->data['Ad']['img'];
            }

            $uploadfolderpath = "ads";
            $uploadpath = WWW_ROOT . '/files/' . $uploadfolderpath;
            if ($d['error'] == 0) {
                $imagename = $d['name'];
                if (file_exists($uploadpath . DS . $imagename)) {
                    $imagename = time() . $imagename;
                }
                $fullpathimage = $uploadpath . DS . $imagename;
                $this->request->data['Ad']['image'] = $imagename;
                move_uploaded_file($d['tmp_name'], $fullpathimage);
            }
            if ($this->Ad->save($this->request->data)) {
                $this->Session->setFlash(__('The Ads has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Ads could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Ad.' . $this->Ad->primaryKey => $id));
            $this->request->data = $this->Ad->find('first', $options);
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
        $this->Ad->id = $id;
        if (!$this->Ad->exists()) {
            throw new NotFoundException(__('Invalid Ads'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Ad->delete()) {
            $this->Session->setFlash(__('The Ad has been deleted.'));
        } else {
            $this->Session->setFlash(__('The Ad could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function api_ads() {
        $data = $this->Ad->find('first', array('order' => 'rand()'));
       
       

            $data['Ad']['image'] = FULL_BASE_URL . $this->webroot . "files/ads/" . $data['Ad']['image'];
       
        if ($data) {
            $response['error'] = "0";
            $response['data'] = $data;
        } else {
            $response['error'] = "1";
            $response['data'] = "no data ";
        }
        echo json_encode($response);
        exit;
    }

}
