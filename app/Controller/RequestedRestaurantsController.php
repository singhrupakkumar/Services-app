<?php
//ob_start();
App::uses('AppController', 'Controller');

class RequestedRestaurantsController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    
    public function add(){
//         Configure::write('debug', 0);
        $this->layout = 'ajax'; 
        if ($this->request->is('post')) {
                $this->RequestedRestaurant->create();
                $this->RequestedRestaurant->save($this->request->data);
                $record_id = $this->RequestedRestaurant->getLastInsertID();
                $response['status']  = true;
                //print_r($this->request->data);
                $response['msg'] = 'Registration has been successful';
                $response['request_id']=$record_id;
            
        }
         else {
             $response['status']  = false;
            $response['msg'] = 'Sorry please try again';
        }
         echo json_encode($response);
        $this->autoRender = false;
    }
    public function upload_logo(){
//        print_r($this->request->data); print_r($_FILES); //exit;
        $this->request->data['RequestedRestaurant']['id'] = $this->request->data['request_id'];
        $this->request->data['RequestedRestaurant']['description'] = $this->request->data['description'];
        $image = $_FILES['logo'];
        $uploadFolder = "restaurants";
        //full path to upload folder
        $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
        if ($image['error'] == 0) {
            //image file name
            $imageName = $image['name'];
            //check if file exists in upload folder
            if (file_exists($uploadPath . DS . $imageName)) {
                //create full filename with timestamp
                $imageName = date('His') . $imageName;
            }
            //create full path with image
            $full_image_path = $uploadPath . DS . $imageName;
            $this->request->data['RequestedRestaurant']['logo'] = $imageName;
            move_uploaded_file($image['tmp_name'], $full_image_path);
            if($this->RequestedRestaurant->save($this->request->data)){
                $response['status']  = true;
                $response['msg'] = 'You will be notified by email about your restaurant credentials';
            }else{
                $response['status']  = false;
                $response['msg'] = 'Error in saving data';
            }
        }else{
            $response['status']  = false;
            $response['msg'] = 'Sorry please try again';
        }
        echo json_encode($response);
        $this->autoRender = false;
    }
    
    public function admin_index(){
        $this->layout = "admin";
        $this->RequestedRestaurant->recursive=2;
        if ($this->request->is("post")) {
            //  print_r($this->request->data);exit;
            $filter = $this->request->data['RequestedRestaurant']['filter'];
            $name = $this->request->data['RequestedRestaurant']['name'];
            $conditions[] = array(
                'RequestedRestaurant.' . $filter . ' LIKE' => '%' . $name . '%',
            );
            $this->Session->write('RequestedRestaurant.filter', $filter);
            $this->Session->write('RequestedRestaurant.name', $name);
            $this->Session->write('RequestedRestaurant.conditions', $conditions);
            return $this->redirect(array('action' => 'index'));
        }
        if ($this->Session->check('RequestedRestaurant')) {
            $all = $this->Session->read('RequestedRestaurant');
        } else {
            $all = array(
                'name' => '',
                'filter' => '',
                'conditions' => ''
            );
        }
		if($this->Auth->user('role') != 'rest_admin'){
        $this->set(compact('all'));
        $this->Paginator = $this->Components->load('Paginator');
		
        $this->Paginator->settings = array(
            'RequestedRestaurant' => array(
                'recursive' => 2,
//                'contain' => array(
//                ),
                'conditions' => array(
                ),
                'order' => array(
                    'RequestedRestaurant.created' => 'DESC'
                ),
                'limit' => 20,
                'conditions' => $all['conditions'],
                'paramType' => 'querystring',
            )
        );

        $this->set('RequestedRestaurants', $this->Paginator->paginate());
		}else{
                    $this->set('RequestedRestaurants', $this->RequestedRestaurant->find('all'));
		}
    }
    public function admin_view($id = NULL){
        Configure::write("debug", 0);
        $this->layout = "admin";
        if (!$this->RequestedRestaurant->exists($id)) {
            throw new NotFoundException('Invalid RequestedRestaurant');
        }
        
        $RequestedRestaurant = $this->RequestedRestaurant->find('first', array(
            'recursive' => 2,
            'conditions' => array(
                'RequestedRestaurant.id' => $id
            )
        ));
        $this->set(compact('RequestedRestaurant'));
    }
    public function admin_delete($id = null) {
        $this->layout = "admin";
        $this->RequestedRestaurant->id = $id;
        if (!$this->RequestedRestaurant->exists()) {
            throw new NotFoundException('Invalid Request');
        }
        $this->RequestedRestaurant->onlyAllow('post', 'delete');
        if ($this->RequestedRestaurant->delete()) {
            $this->Session->setFlash('Request deleted');
            return $this->redirect(array('action' => 'index'));
        }
        $this->RequestedRestaurant->setFlash('Request was not deleted');
        return $this->redirect(array('action' => 'index'));
    }
    public function admin_edit($id = null) {
        Configure::write("debug", 2);
        if (!$this->RequestedRestaurant->exists($id)) {
            throw new NotFoundException('Invalid product');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            // debug($this->request->data);
            $image = $this->request->data['Product']['image'];
            $uploadFolder = "product";
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
                //create full path with image
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Product']['image'] = $imageName;
                move_uploaded_file($image['tmp_name'], $full_image_path);
                $this->RequestedRestaurant->id = $id;
            } else {

                $admin_edit = $this->Product->find('first', array('conditions' => array('Product.id' => $id)));
                $this->request->data['Product']['image'] = !empty($admin_edit['Product']['image']) ? $admin_edit['Product']['image'] : ' ';
            }
            if ($this->RequestedRestaurant->save($this->request->data)) {
                $this->Session->setFlash('The product has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The product could not be saved. Please, try again.');
            }
        }
        $RequestedRestaurant = $this->RequestedRestaurant->find('first', array(
            'conditions' => array(
                'RequestedRestaurant.id' => $id
            )
        ));
        $this->request->data = $RequestedRestaurant;
        $this->set(compact('RequestedRestaurant'));
    }
    public function admin_switch_active($id=NULL,$status=0){
        $this->layout = "admin";
        $this->RequestedRestaurant->id = $id;
        if (!$this->RequestedRestaurant->exists()) {
            throw new NotFoundException('Invalid Request');
        }
        if($status == 0){
            $updated = 1;
        }else{
            $updated = 0;
        }
        if ($this->RequestedRestaurant->saveField('active', $updated)) {
            $this->Session->setFlash('Status Updated');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Status was not Updated');
        return $this->redirect(array('action' => 'index'));   
    }
}
?>