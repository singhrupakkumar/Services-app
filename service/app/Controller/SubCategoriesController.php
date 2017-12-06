<?php

App::uses('AppController', 'Controller');

/**
 * DishSubcats Controller
 *
 * @property DishSubcat $DishSubcat
 * @property PaginatorComponent $Paginator
 */
class SubCategoriesController extends AppController {

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
	 
	 
	/********************Api*************************/
	
	public function api_subcatbyid(){ 
		configure::write('debug',0);
		$this->layout = "ajax";
		$this->loadModel('Category');
		if($this->request->is('post')){
		$cat_id = $this->request->data['cat_id'];
		$cdata= $this->Category->find('first',array('conditions'=>array('Category.id'=>$cat_id)));
		$data = $this->SubCategory->find('all',array('conditions'=>array('SubCategory.category_id'=>$cat_id)));
		
			if($cdata['Category']['image']){
					$cdata['Category']['image']= FULL_BASE_URL . $this->webroot . "files/catimage/" . $cdata['Category']['image'];	
					}else{
					$cdata['Category']['image'] = FULL_BASE_URL . $this->webroot . "files/catimage/noimage.png";		
			}
		
		
		foreach($data  as &$sub){
			
		if($sub['SubCategory']['image']){
					$sub['SubCategory']['image'] = FULL_BASE_URL . $this->webroot . "files/subcatimage/" .$sub['SubCategory']['image'];	
					}else{
					$sub['SubCategory']['image'] = FULL_BASE_URL . $this->webroot . "files/subcatimage/noimage.png";				
		}	
			
		}
	
		 if ($data) {
                $response['isSuccess'] = true;
				$response['cat'] = $cdata;
                $response['data'] = $data;
            } else {
                $response['isSuccess'] = false;
                $response['msg'] = "There is no data available";
            }

		}
		echo json_encode($response);
        exit;	
			
	} 
	 
	 
    public function index() {
        $this->SubCategory->recursive = 0;
        $this->set('dishSubcats', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->SubCategory->exists($id)) {
            throw new NotFoundException(__('Invalid dish subcat'));
        }
        $options = array('conditions' => array('SubCategory.' . $this->SubCategory->primaryKey => $id));
        $this->set('dishSubcat', $this->SubCategory->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $d = $this->request->data['SubCategory']['image'];
            // print_r($this->request->data);
            $uploadfolderpath = "subcatimage";
            $uploadpath = WWW_ROOT . '/files/' . $uploadfolderpath;
            if ($d['error'] == 0) {
                $imagename = $d['name'];
                if (file_exists($uploadpath . DS . $imagename)) {
                    $imagename = time() . $imagename;
                }
                $fullpathimage = $uploadpath . DS . $imagename;
                $this->request->data['SubCategory']['image'] = $imagename;
                move_uploaded_file($d['tmp_name'], $fullpathimage);
            }
            $this->SubCategory->create();
            if ($this->SubCategory->save($this->request->data)) {
                $this->Session->setFlash(__('The dish subcat has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The dish subcat could not be saved. Please, try again.'));
            }
        }
        $dishCategories = $this->SubCategory->DishCategory->find('list');
        $this->set(compact('dishCategories'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->SubCategory->exists($id)) {
            throw new NotFoundException(__('Invalid dish subcat'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->SubCategory->save($this->request->data)) {
                $this->Session->setFlash(__('The dish subcat has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The dish subcat could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('SubCategory.' . $this->SubCategory->primaryKey => $id));
            $this->request->data = $this->SubCategory->find('first', $options);
        }
        $dishCategories = $this->SubCategory->DishCategory->find('list');
        $this->set(compact('dishCategories'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->SubCategory->id = $id;
        if (!$this->SubCategory->exists()) {
            throw new NotFoundException(__('Invalid dish subcat'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->SubCategory->delete()) {
            $this->Session->setFlash(__('The dish subcat has been deleted.'));
        } else {
            $this->Session->setFlash(__('The dish subcat could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
		Configure::write("debug", 0);
		$this->SubCategory->recursive = 2;
        $this->set('subcategory', $this->SubCategory->find('all'));

    }

    public function admin_assoindex() {
		
		
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->SubCategory->recursive = 2;
        if (!$this->SubCategory->exists($id)) {
            throw new NotFoundException(__('Invalid dish subcat'));
        }
        $options = array('conditions' => array('SubCategory.' . $this->SubCategory->primaryKey => $id));
        $a = $this->SubCategory->find('first', $options);
        // debug($a);exit;
        $this->set('dishSubcat', $this->SubCategory->find('first', $options));
    }

    public function admin_assoview($id = null) {
        $this->SubCategory->recursive = 2;
        if (!$this->SubCategory->exists($id)) {
            throw new NotFoundException(__('Invalid dish subcat'));
        }
        $options = array('conditions' => array('SubCategory.' . $this->SubCategory->primaryKey => $id));
        $a = $this->SubCategory->find('first', $options);
        // debug($a);exit;
        $this->set('dishSubcat', $this->SubCategory->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
		 Configure::write("debug",0);
		if ($this->request->is('post')) {

		   $d = $this->request->data['SubCategory']['image'];
			if ($this->request->data['SubCategory']['image']) {
            $uploadfolderpath = "subcatimage";
            $uploadpath = WWW_ROOT . '/files/' . $uploadfolderpath;
            
                $imagename = $d['name'];
                if (file_exists($uploadpath . DS . $imagename)) {
                    $imagename = time() . $imagename;
                }
                $fullpathimage = $uploadpath . DS . $imagename;
                $this->request->data['SubCategory']['image'] = $imagename;
                move_uploaded_file($d['tmp_name'], $fullpathimage);
            }
			
			
            $this->SubCategory->create();
	
            if ($this->SubCategory->save($this->request->data)) {
                $this->Session->setFlash(__('The SubCategory has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The SubCategory could not be saved. Please, try again.'));
            }
        }
		
       $dishCategories = $this->SubCategory->Category->find('list');
       $this->set(compact('dishCategories'));
    }

	 public function admin_assoadd() {
       
    } 

	
	
/*    public function admin_assoadd() {
	Configure::write('debug',0);
		 $d = $this->request->data['DishSubcat']['image']['name'];
	  if ($this->request->is('post')) {
			 //print_r($this->request->data);
			 //$d = '';
         
			if ($this->request->data['DishSubcat']['image']['name']!="") {
			
            // print_r($this->request->data);
            $uploadfolderpath = "subcatimage";
            $uploadpath = WWW_ROOT . '/files/' . $uploadfolderpath;
            
                $imagename = $d['name'];
                if (file_exists($uploadpath . DS . $imagename)) {
                    $imagename = time() . $imagename;
                }
                $fullpathimage = $uploadpath . DS . $imagename;
                $this->request->data['DishSubcat']['image'] = $imagename;
                move_uploaded_file($d['tmp_name'], $fullpathimage);
            }
			else{
				$this->request->data['DishSubcat']['image']='noimage.png';
			}
            $this->DishSubcat->create();
            if ($this->DishSubcat->save($this->request->data)) {
                $this->Session->setFlash(__('The dish subcat has been saved.'));
                return $this->redirect(array('action' => 'assoindex'));
            } else {
                $this->Session->setFlash(__('The dish subcat could not be saved. Please, try again.'));
            }
        }
        $dishCategories = $this->DishSubcat->DishCategory->find('list', array('conditions' => array('DishCategory.isshow' => 1)));
        $this->set(compact('dishCategories'));
    }
*/
    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
   

    public function admin_edit($id = null) {
        if (!$this->SubCategory->exists($id)) {
            throw new NotFoundException(__('Invalid subcat'));
        }
        if ($this->request->is(array('post', 'put'))) {
              $d = $this->request->data['SubCategory']['image'];
            if ($d['name'] == '') {
                $this->request->data['SubCategory']['image'] = $this->request->data['SubCategory']['img'];
            }else{
			 $this->request->data['SubCategory']['image'] = $this->request->data['SubCategory']['image'];	
			}

            $uploadfolderpath = "subcatimage";
            $uploadpath = WWW_ROOT . '/files/' . $uploadfolderpath;
            if ($d['error'] == 0) {
                $imagename = $d['name'];
                if (file_exists($uploadpath . DS . $imagename)) {
                    $imagename = time() . $imagename;
                }
                $fullpathimage = $uploadpath . DS . $imagename;
                $this->request->data['SubCategory']['image'] = $imagename;
                move_uploaded_file($d['tmp_name'], $fullpathimage);
            }
            if ($this->SubCategory->save($this->request->data)) {
                $this->Session->setFlash(__('The  subcat has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The  subcat could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('SubCategory.' . $this->SubCategory->primaryKey => $id));
            $this->request->data = $this->SubCategory->find('first', $options);
        }
        $dishCategories = $this->SubCategory->Category->find('list');
        $this->set(compact('dishCategories'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->SubCategory->id = $id;
        if (!$this->SubCategory->exists()) {
            throw new NotFoundException(__('Invalid dish subcat'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->SubCategory->delete()) {
            $this->Session->setFlash(__('The dish subcat has been deleted.'));
        } else {
            $this->Session->setFlash(__('The dish subcat could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function admin_assodelete($id = null) {
        $this->SubCategory->id = $id;
        if (!$this->SubCategory->exists()) {
            throw new NotFoundException(__('Invalid dish subcat'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->SubCategory->delete()) {
            $this->Session->setFlash(__('The dish subcat has been deleted.'));
        } else {
            $this->Session->setFlash(__('The dish subcat could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'assoindex'));
    }

}
