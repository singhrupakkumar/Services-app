<?php

App::uses('AppController', 'Controller');

/**
 * Socials Controller
 *
 * @property Social $Social
 * @property PaginatorComponent $Paginator
 */
class SocialsController extends AppController {

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
        $this->Social->recursive = 0;
        $this->set('socials', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Social->exists($id)) {
            throw new NotFoundException(__('Invalid social'));
        }
        $options = array('conditions' => array('Social.' . $this->Social->primaryKey => $id));
        $this->set('social', $this->Social->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $image = $this->request->data['Social']['icon'];
            $uploadFolder = "social";
            //full path to upload folder
            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            //check if there wasn't errors uploading file on serwer
            if ($image['error'] == 0) {
                //image file name
                $imageName = $image['name'];
                //check if file exists in upload folder
                if (file_exists($uploadPath . DS . $imageName)) {
                    //create full filename with timestamp
                    $imageName = date('His') . $imageName;
                }
                //create full path with image name
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Social']['icon'] = $imageName;
                // $this->request->data['Restaurant']['amities_selected'] = $ckbox;
                //upload image to upload folder
                move_uploaded_file($image['tmp_name'], $full_image_path);
            }
            $this->Social->create();
            if ($this->Social->save($this->request->data)) {
                $this->Session->setFlash(__('The social has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The social could not be saved. Please, try again.'));
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
        if (!$this->Social->exists($id)) {
            throw new NotFoundException(__('Invalid social'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Social->save($this->request->data)) {
                $this->Session->setFlash(__('The social has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The social could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Social.' . $this->Social->primaryKey => $id));
            $this->request->data = $this->Social->find('first', $options);
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
        $this->Social->id = $id;
        if (!$this->Social->exists()) {
            throw new NotFoundException(__('Invalid social'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Social->delete()) {
            $this->Session->setFlash(__('The social has been deleted.'));
        } else {
            $this->Session->setFlash(__('The social could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Social->recursive = 0;
        $this->set('socials', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Social->exists($id)) {
            throw new NotFoundException(__('Invalid social'));
        }
        $options = array('conditions' => array('Social.' . $this->Social->primaryKey => $id));
        $this->set('social', $this->Social->find('first', $options));
		
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            /*$image = $this->request->data['Social']['icon'];
            $uploadFolder = "social";
            //full path to upload folder
            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            //check if there wasn't errors uploading file on serwer
            if ($image['error'] == 0) {
                //image file name
                $imageName = $image['name'];
                //check if file exists in upload folder
                if (file_exists($uploadPath . DS . $imageName)) {
                    //create full filename with timestamp
                    $imageName = date('His') . $imageName;
                }
                //create full path with image name
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Social']['icon'] = $imageName;
                // $this->request->data['Restaurant']['amities_selected'] = $ckbox;
                //upload image to upload folder
                move_uploaded_file($image['tmp_name'], $full_image_path);
            }*/
            $this->Social->create();
            if ($this->Social->save($this->request->data)) {
                $this->Session->setFlash(__('The social has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The social could not be saved. Please, try again.'));
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
        if (!$this->Social->exists($id)) {
            throw new NotFoundException(__('Invalid social'));
        }
        if ($this->request->is(array('post', 'put'))) {
              /*$image = $this->request->data['Social']['icon'];
            $uploadFolder = "social";
            //full path to upload folder
            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            //check if there wasn't errors uploading file on serwer
            if ($image['error'] == 0) {
                //image file name
                $imageName = $image['name'];
                //check if file exists in upload folder
                if (file_exists($uploadPath . DS . $imageName)) {
                    //create full filename with timestamp
                    $imageName = date('His') . $imageName;
                }
                //create full path with image name
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Social']['icon'] = $imageName;
                // $this->request->data['Restaurant']['amities_selected'] = $ckbox;
                //upload image to upload folder
                move_uploaded_file($image['tmp_name'], $full_image_path);
            }
            else {

                $admin_edit = $this->Social->find('first', array('conditions' => array('Social.id' => $id)));
                $this->request->data['Social']['icon'] = !empty($admin_edit['Social']['icon']) ? $admin_edit['Social']['icon'] : 'hotel.png';
            }*/
            if ($this->Social->save($this->request->data)) {
                $this->Session->setFlash(__('The social has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The social could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Social.' . $this->Social->primaryKey => $id));
            $this->request->data = $this->Social->find('first', $options);
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
        $this->Social->id = $id;
        if (!$this->Social->exists()) {
            throw new NotFoundException(__('Invalid social'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Social->delete()) {
            $this->Session->setFlash(__('The social has been deleted.'));
        } else {
            $this->Session->setFlash(__('The social could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
