<?php
App::uses('AppController', 'Controller');
class ThemesController extends AppController {
    /////////////////////////////////////////
    public $components = array(
        'RequestHandler',
        'Paginator',
        'Flash'
    );
    
    /////////////////////////////////////////
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    
    /*
     * Admin Functions
     */
    
    public function admin_index() {
        $this->Paginator = $this->Components->load('Paginator');

        $this->Paginator->settings = array(
            'Theme' => array(
                'recursive' => -1,
                'limit' => 50,
//                'conditions' => $all['conditions'],
                'order' => array(
                    'Theme.title' => 'ASC'
                ),
                'paramType' => 'querystring',
            )
        );
        $products = $this->Paginator->paginate();
        $this->layout = "admin";
        $this->Theme->recursive = 2;
        $this->set('themes', $this->Paginator->paginate());
    }
    /**
     * 
     * @param type $id
     * @throws NotFoundException
     */
    public function admin_view($id = null) {
        Configure::write("debug", 0);
        $this->layout = "admin";
        if (!$this->Theme->exists($id)) {
            throw new NotFoundException('Invalid Theme');
        }
        
        $membership = $this->Theme->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Theme.id' => $id
            )
        ));
       
        $this->set(compact('theme'));
    }
    public function admin_add() {
        $this->layout = "admin";
        if ($this->request->is('post')) {
            $image = $this->request->data['Theme']['image'];
            $uploadFolder = "themes";
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
                $full_path = $uploadPath . DS . $imageName;
                $this->request->data['Theme']['image'] = $imageName;
                move_uploaded_file($image['tmp_name'], $full_path);
            }
            
            $full_image = $this->request->data['Theme']['full_image'];
//            $uploadFolder = "themes";
            //full path to upload folder
//            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            //check if there wasn't errors uploading file on serwer
            if ($full_image['error'] == 0) {
                //image file name
                $fullImageName = $full_image['name'];
                //check if file exists in upload folder
                if (file_exists($uploadPath . DS . $fullImageName)) {
                    //create full filename with timestamp
                    $fullImageName = date('His') . $fullImageName;
                }
                //create full path with image
                $full_image_path = $uploadPath . DS . $fullImageName;
                $this->request->data['Theme']['full_image'] = $fullImageName;
                move_uploaded_file($full_image['tmp_name'], $full_image_path);
            }
            
            $this->Theme->create();
            if ($this->Theme->save($this->request->data)) {
                $this->Session->setFlash('The Theme has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The Theme could not be saved. Please, try again.');
            }
        }
    }
    public function admin_edit($id = null) {
        $this->layout = "admin";
        Configure::write("debug", 2);
        if (!$this->Theme->exists($id)) {
            throw new NotFoundException('Invalid Theme');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            // debug($this->request->data);
            $image = $this->request->data['Theme']['image'];
            $uploadFolder = "themes";
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
                $this->request->data['Theme']['image'] = $imageName;
                move_uploaded_file($image['tmp_name'], $full_image_path);
                $this->Theme->id = $id;
            } else {

                $admin_edit = $this->Theme->find('first', array('conditions' => array('Theme.id' => $id)));
            }
            if ($this->Theme->save($this->request->data)) {
                $this->Session->setFlash('The product has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Theme could not be saved. Please, try again.');
            }
        }
        $theme = $this->Theme->find('first', array(
            'conditions' => array(
                'Theme.id' => $id
            )
        ));

        $this->request->data = $theme;
        $this->set(compact('theme'));
    }
    public function admin_delete($id = null) {
        $this->layout = "admin";
        $this->Theme->id = $id;
        if (!$this->Theme->exists()) {
            throw new NotFoundException('Invalid Theme');
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Theme->delete()) {
            $this->Session->setFlash('Theme deleted');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Theme was not deleted');
        return $this->redirect(array('action' => 'index'));
    }
    public function admin_fetchthemes(){
        $this->layout = 'ajax';
        $themes = $this->Theme->find('list',array('conditions'=>array('Theme.active'=>1)));
        $this->set('data', $themes);
        $this->set('_serialize', 'data');
    }
    public function admin_switch_active($id=NULL,$status=0){
        $this->layout = "admin";
        $this->Theme->id = $id;
        if (!$this->Theme->exists()) {
            throw new NotFoundException('Invalid Request');
        }
        if($status == 0){
            $updated = 1;
        }else{
            $updated = 0;
        }
        if ($this->Theme->saveField('active', $updated)) {
            $this->Session->setFlash('Status Updated');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Status was not Updated');
        return $this->redirect(array('action' => 'index'));   
    }
    /*
     * Front End Functions
     */
    public function index() {
        $this->loadModel('Membership');
        $memberships = $this->Membership->find('all',array('conditions'=>array('Membership.active'=>1)));
        
        foreach($memberships as $membership){
            $themes_id = unserialize($membership['Membership']['assoc_themes']);
            $themes_id = explode(",",$themes_id);
            $themes = $this->Theme->find("all",array('conditions'=>array(
               'Theme.id'=>  $themes_id
               )));
            $membership['Themes'] = $themes;
           $plans[] = $membership;
        }
        $this->set(compact('plans'));
    }
    public function selectedtheme($id = null){
//        $selected_theme = $id;
         $this->Theme->id = $id;
        if (!$this->Theme->exists()) {
            throw new NotFoundException('Invalid Request');
        }
        $selected_theme = $this->Theme->find('first',array('conditions'=>array('Theme.id'=>$id)));
        // Get themes
        $themes = $this->Theme->find('all',array('conditions'=>array('Theme.active'=>1)));
        $this->set(compact('themes','selected_theme'));
    }
}
?>