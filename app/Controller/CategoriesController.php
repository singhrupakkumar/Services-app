<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

////////////////////////////////////////////////////////////
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('api_catview'));
    }
	
	

			

    public function index() {
        $this->helpers[] = 'Tree';
        $categories = $this->Category->find('all', array(
            'recursive' => -1,
            
            'order' => array(
                'Category.lft' => 'ASC'
            ),
            'conditions' => array(
                
            ),
        ));
        $this->set(compact('categories'));
    }

////////////////////////////////////////////////////////////

    public function api_catview() {
        Configure::write("debug", 0);

        $this->helpers[] = 'Tree';
        $categories = $this->Category->find('threaded');
		
        $this->loadModel('Colour');
		$this->loadModel("Woodtype");
        $this->loadModel("Brand");
		$this->loadModel("Series");
        $this->loadModel("Mechanism");
		$this->loadModel("Theme");
        $this->loadModel("Style");
        $this->loadModel("Gemstone");
		
        $colour = $this->Colour->find('all'); 
		$tag = $this->Woodtype->find('all');
		$brand = $this->Brand->find('all');	
		$series = $this->Series->find('all');
		$mechanism = $this->Mechanism->find('all');
		$theme = $this->Theme->find('all');	
		$style = $this->Style->find('all');
		$gemstone = $this->Gemstone->find('all');
			
        if ($categories) {
            $response['isSucess'] = 'true';
            $response['data']['category'] = $categories;
            $response['data']['colour'] = $colour;
			$response['data']['woodtype'] = $tag;
			$response['data']['brand'] = $brand;
			$response['data']['series'] = $series;
			$response['data']['mechanism'] = $mechanism;
			
			$response['data']['theme'] = $theme;
			$response['data']['style'] = $style;
			$response['data']['gemstone'] = $gemstone;
        } else {
            $response['error'] = '1';
            $response['data'] = '';
        }
        echo json_encode($response);
        exit;
    }

    ////////////////////////////////////////////////////////////////   

    public function view($slug = null,$sort=null, $order=null) {

        configure::write('debug',0);

        $category = $this->Category->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Category.slug' => $slug
            )
        ));
     
        if (empty($category)) {
            return $this->redirect(array('action' => 'index'));
        }
        $this->set(compact('category'));

//echo "<pre>"; print_r($this->params['url']); echo "</pre>";
        if(isset($this->params['url']['sort']) && isset($this->params['url']['order'])){
            if($this->params['url']['sort'] == 'name'){
                $sortby = 'Product.'.$this->params['url']['sort'];
                $order = $this->params['url']['order'];
            }
            if($this->params['url']['sort'] == 'rating'){
                $sortby = 'Product.avg_rating';
                $order = $this->params['url']['order'];
            }
        }else{
             $sortby = 'Product.name';
             $order = 'ASC';
        }

        $condition1 = array(
            'Product.category_id' => $category['Category']['id'],
            'Product.active' => 1
        );
    
      //  $finalcondition = $conditions ? $conditions : $condition1;

        ///////////////////////////order by condition////////////
        $orderbyname = array(
            $sortby => $order
        );
        $orderby =  $orderbyname;





        $this->Paginator->settings = array(
            'recursive' => 1,
          'conditions' => $condition1,
            'order' => $orderby,
            'limit' => 12
        );
        $products = $this->Paginator->paginate('Product');

 
        if (count($products) == 0) {
            $this->Session->setFlash('Product Not found in this criteria.', 'flash_error');
        }

        $this->set(compact('products'));
       
    }

    
    
    
    /**************Reset function*******************************/
    public function admin_reset(){
        
        $this->Session->delete('Category');
        return $this->redirect(array('action' => 'admin_index'));
    }
    
    
    
    
    /**********************************************/
////////////////////////////////////////////////////////////

    public function admin_index() {
     Configure::write("debug", 0);
     
        /***************************************************************/
     $category  = $this->Category->find('all');  

       $this->set('categories', $category);

    }



////////////////////////////////////////////////////////////

    public function admin_view($id = null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException('Invalid category');
        }
        $category = $this->Category->find('first', array(
            'conditions' => array(
                'Category.id' => $id
            )
        ));
        $this->set(compact('category'));
    }

////////////////////////////////////////////////////////////

    public function admin_add() {
		configure::write('debug',2);
		
        if ($this->request->is('post')) {
			
			 if ($this->Category->hasAny(array('Category.name' => $this->request->data['Category']['name']))) {
                $this->Session->setFlash(__('Category already exist!!!'));
	        }else{
            $this->Category->create();
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash('The category has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The category could not be saved. Please, try again.');
            }
			}	
        }

    }

////////////////////////////////////////////////////////////

    public function admin_edit($id = null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException('Invalid category');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash('The category has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The category could not be saved. Please, try again.');
            }
        } else {
            $this->request->data = $this->Category->find('first', array('conditions' => array('Category.id' => $id)));
        }
    }

////////////////////////////////////////////////////////////

    public function admin_delete($id = null) {
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException('Invalid category');
        }
        //$this->request->onlyAllow('post', 'delete');
        if ($this->Category->delete()) {
            $this->Session->setFlash('Category deleted');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Category was not deleted');
        return $this->redirect(array('action' => 'index'));
    }

////////////////////////////////////////////////////////////
}
