<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
//App::uses('ConnectionManager', 'Model');
/**
 * Restaurants Controller
 *
 * @property Restaurant $Restaurant
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 */
App::import('Sanitize');
ini_set('memory_limit', '256M');

class RestaurantsController extends AppController {

    //var $name = 'Restaurant';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('api_restaurantslist', 'api_getresmenu', 'api_restaurantslistbyadd', 'api_dishsubcat', 'detail', 'search',
            'api_mobilefilter', 'api_frestaurantsbyaddname', 'api_frestaurantsbyaddnameb', 'api_advancepayment','api_promocode','api_deals','api_getalltype','api_searchbynameresturent','admin_plans','api_resgallery','api_topbar','api_searchbycity'));
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Cart');
    public $distance = 100;

    /**
     * index method
     *
     * @return void
     */
     public function index() {
        $this->Restaurant->recursive = 0;
        $this->set('restaurants', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));

        $this->set('restaurant', $this->Restaurant->find('first', $options));
    }

    /**
     * detail method
     *
     * @throws NotFoundException
     * @param string $id
     * @param string $id
     * @return void
     */
    public function detail($id = null, $dishid = NULL,$dlstatus=null) {
		$id = base64_decode($id);
		$dishid = base64_decode($dishid);
        Configure::write("debug", 0);
		
		//$shop = $this->Session->read('Shop');
		//print_r($shop);
		//echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
		//echo $shop['Order']['total'];
        /*if (!$shop['Order']['total']) {
            return $this->redirect('/');
        }*/
		
//        echo $this->Session->id();
//        $cart = $this->Session->read('Shop');
//        echo json_encode($cart);exit;
        $this->Restaurant->recursive = 2;
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        $this->loadModel('Product');
        $this->loadModel('DishSubcat');
        $dishoptions = array('conditions' => array('DishSubcat.dish_catid' => $dishid));
        $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
        $prooptions = array('conditions' => array('AND' => array('Product.res_id' => $id, 'Product.dishcategory_id' => $dishid, 'Product.sale' => 0)));
        $countdata = $this->DishSubcat->find('all', $dishoptions);
        foreach ($countdata as $d) {
            $d['DishSubcat']['cnt'] = $this->Product->find('count', array('conditions' => array('AND' => array('Product.res_id' => $id, 'Product.dishsubcat_id' => $d['DishSubcat']['id'], 'Product.sale' => 0))));
            if ($d['DishSubcat']['cnt'] == 0) {
                
            } else {
                $data['DishSubcat'][] = $d['DishSubcat'];
            }
        }
        $product_associate = $this->Product->find('all', $prooptions);
//        /print_r($product_associate);exit;
        $ct = count($product_associate);
        $this->loadModel('Alergy');
        for ($i = 0; $i < $ct; $i++) {
            if (!empty($product_associate[$i]['Product']['pro_id'])) {
                $pids = array();
                @$pids = unserialize($product_associate[$i]['Product']['pro_id']);
                $pid = explode(',', $pids);
                //$alid = array();
                @$alid = unserialize($product_associate[$i]['Product']['alergi']);

                $alids = explode(',', $alid);
                // print_r($alids);        
                $product_associate[$i]['Product']['Alergy'] = $this->Alergy->find('all', array('conditions' => array('Alergy.id' => $alids)));
                //$product_associate[$i]['Product']['asp'] = $this->Product->find('all', array('conditions' => array('AND' => array('Product.id' => $pid, 'Product.res_id' => $id, 'Product.dishcategory_id' => $dishid))));
                $product_associate[$i]['Product']['asp'] = $this->Product->find('all', array('conditions' => array('Product.id' => $pid)));
            }
        }
        //print_r($product_associate);
//        /exit;
        $rdta = $this->Restaurant->find('first', $options);
        @$alltid = unserialize($rdta['Restaurant']['typeid']);
        $this->loadModel('RestaurantsType');
        $rtdta = $this->RestaurantsType->find('all', array('conditions' => array('RestaurantsType.id' => $alltid)));
        //print_r($rtdta);exit;
        $this->set('RestaurantsType', $rtdta);

        $this->set('restaurant', $this->Restaurant->find('first', $options));
        $this->set('product', $product_associate);
        $this->set('DishSubcat', $data);
        $this->Session->write('Shop.Order.restaurant_id', $id);
		 $this->Session->write('Shop.Order.delivery_status', $dlstatus);
        $this->Session->write('Auth.redirect', $this->here);
    }

    /**
     * cartdetail method
     *
     * @throws NotFoundException
     * @param string $id
     * @param string $id
     * @return void
     */
    public function admin_cartdetail($id = null, $table = null, $dishid = NULL) {
        $this->Restaurant->recursive = 2;
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        $this->loadModel('Product');
        $this->loadModel('DishSubcat');
        $dishoptions = array('conditions' => array('DishSubcat.dish_catid' => $dishid));
        $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
        $prooptions = array('conditions' => array('AND' => array('Product.res_id' => $id, 'Product.dishcategory_id' => $dishid)));
        $countdata = $this->DishSubcat->find('all', $dishoptions);
        foreach ($countdata as $d) {
            $d['DishSubcat']['cnt'] = $this->Product->find('count', array('conditions' => array('AND' => array('Product.res_id' => $id, 'Product.dishsubcat_id' => $d['DishSubcat']['id']))));
            if ($d['DishSubcat']['cnt'] == 0) {
                
            } else {
                $data['DishSubcat'][] = $d['DishSubcat'];
            }
        }
        $this->set('restaurant', $this->Restaurant->find('first', $options));
        $this->set('product', $this->Product->find('all', $prooptions));
        $this->set('DishSubcat', $data);
        $this->set('tno', $table);
        $this->Session->write('Cart.tableno', $table);
         $this->Session->write('Cart.resid', $id);
    }

    public function admin_menudetai($id = null, $table = null) {
        Configure::write('debug', 0);
        $this->Restaurant->recursive = 2;
        $this->loadModel('DishCategory');
        $this->loadModel('Product');
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
        $dishdata = $this->DishCategory->find('all');
        foreach ($dishdata as $d) {

            $d['DishCategory']['cnt'] = $this->Product->find('count', array('conditions' => array('AND' => array('Product.res_id' => $id, 'Product.dishcategory_id' => $d['DishCategory']['id']))));
            if ($d['DishCategory']['cnt'] == 0) {
                
            } else {
                $data['DishCategory'][] = $d['DishCategory'];
            }
        }
        $this->loadModel('Restable');
        $restable = array('conditions' => array('AND' => array('Restable.res_id' => $id, 'Restable.tableno' => $table)));
        $this->set('restable', $this->Restable->find('first', $restable));
        $this->set('restaurant', $this->Restaurant->find('first', $options));
        $this->set('discategory', $data);
        $this->Session->write('Shop.Order.restaurant_id', $id);
        $this->set('tno', $table);
        $this->set('rno', $id);
    }

    public function cart_ajax() {
        configure::write('debug', 0);
        $this->loadModel('Product');
        $this->loadModel('Cart');
        if ($this->request->is('ajax')) {
            $this->autoRender = false;

            $products = $this->request->data['prodata'];
            //$pr[] = $products;
            //print_r($products);
            echo $this->request->data['tableNo'];
            $ar = array();
            foreach ($products as $key => $val) {

                $querys = $this->Product->find('all', array('conditions' => array('Product.id' => $key)));
                $querys[0]['Product']['quantity'] = $val;
                array_push($ar, $querys);
            }
            print_r($ar);
            foreach ($ar as $query) {
                $this->Cart->create();
                $name = $query[0]['Product']['name'];
                //echo $name;
                $wght = $query[0]['Product']['weight'];
                $price = $query[0]['Product']['price'];
                $cart = $this->Cart->save(
                        array(
                            'uid' => 0,
                            'image' => '',
                            'sessionid' => $this->Session->id(session_id()),
                            'product_id' => $query[0]['Product']['id'],
                            'name' => $name,
                            'weight' => $wght,
                            'price' => $price,
                            'quantity' => $query[0]['Product']['quantity'],
                            'weight_total' => $query[0]['Product']['quantity'] * $wght,
                            'subtotal' => $query[0]['Product']['quantity'] * $price,
                            'resid' => $this->request->data['res_id'],
                            'table' => $this->request->data['tableNo'],
                            'cat_id' => $this->request->data['dishID']
                        )
                );
                print_r($cart);
            }
        }
    }

    /**
     * menu method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function menu($id = null, $dis = null) {
		$id = base64_decode($id);
        Configure::write("debug", 0);
        
       $shop = $this->Session->read('Shop');
		//print_r($shop);exit;
        $this->Cart->clear();
        $this->Restaurant->recursive = 2;
        $this->loadModel('DishCategory');
		$this->loadModel('Review');
        $this->loadModel('Product');
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
        $dishdata = $this->DishCategory->find('all');
        foreach ($dishdata as $d) {

            $d['DishCategory']['cnt'] = $this->Product->find('count', array('conditions' => array('AND' => array('Product.res_id' => $id, 'Product.dishcategory_id' => $d['DishCategory']['id'], 'Product.sale' => 0))));
            if ($d['DishCategory']['cnt'] == 0) {
                
            } else {
                $data['DishCategory'][] = $d['DishCategory'];
            }
        }
        $rdta = $this->Restaurant->find('first', $options);
        @$alltid = unserialize($rdta['Restaurant']['typeid']);
        $this->loadModel('RestaurantsType');
        $rtdta = $this->RestaurantsType->find('all', array('conditions' => array('RestaurantsType.id' => $alltid)));
		
		
		$fetchrec = $this->Restaurant->find('all', array('conditions' => array(
                'AND' => array(
                    'Restaurant.city' => $rdta['Restaurant']['city'],
					'Restaurant.state' => $rdta['Restaurant']['state'],
                )
            ),
            'recursive' => 0,
            'limit' => 4,
        ));
		
		
		
		
		//echo '<pre>';
        //print_r($fetchrec);
		//echo count($fetchrec);
		
/*-----------LOAD GALLERY MODEL---------------*/
		$this->loadModel('Gallery');
		$galleryimages = $this->Gallery->find('all',array(
		'conditions'=>array(
		'res_id'=> $rdta['Restaurant']['id'], //'628',
		)		
		));
		
		$this->set('gimages',$galleryimages);

		
        $this->set('restaurant', $this->Restaurant->find('first', $options));
        $this->set('RestaurantsType', $rtdta);
        @$this->set('discategory', $data);
		$this->set('fetchrec', $fetchrec);
			$this->set('myid', $dis);
			
		$rateQuery = $this->Review->find('all', array('conditions' => array('Review.resid' => $id)));
		$reviewCommentQuery = $this->Review->find('all', array('conditions' => array('Review.resid' => $id), 'order' => 'Review.id DESC', 'limit' => 4));
		$this->set('rates', $rateQuery);
		$this->set('reviewComments', $reviewCommentQuery);		
		
    }
	
	
	
	public function category($id = null) {
		$id = base64_decode($id);
        Configure::write("debug", 0);
       $shop = $this->Session->read('Shop');
		//print_r($shop);exit;
        $this->Cart->clear();
        $this->Restaurant->recursive = 2;
        $this->loadModel('DishCategory');
        $this->loadModel('Product');
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
        $dishdata = $this->DishCategory->find('all');
        foreach ($dishdata as $d) {

            $d['DishCategory']['cnt'] = $this->Product->find('count', array('conditions' => array('AND' => array('Product.res_id' => $id, 'Product.dishcategory_id' => $d['DishCategory']['id'], 'Product.sale' => 0))));
            if ($d['DishCategory']['cnt'] == 0) {
                
            } else {
                $data['DishCategory'][] = $d['DishCategory'];
            }
        }
        $rdta = $this->Restaurant->find('first', $options);
        @$alltid = unserialize($rdta['Restaurant']['typeid']);
        $this->loadModel('RestaurantsType');
        $rtdta = $this->RestaurantsType->find('all', array('conditions' => array('RestaurantsType.id' => $alltid)));
		
		
		$fetchrec = $this->Restaurant->find('all', array('conditions' => array(
                'AND' => array(
                    'Restaurant.city' => $rdta['Restaurant']['city'],
					'Restaurant.state' => $rdta['Restaurant']['state'],
                )
            ),
            'recursive' => 0,
            'limit' => 4,
        ));
		
		
		
		
		//echo '<pre>';
        //print_r($fetchrec);
		//echo count($fetchrec);
		
/*-----------LOAD GALLERY MODEL---------------*/
		$this->loadModel('Gallery');
		$galleryimages = $this->Gallery->find('all',array(
		'conditions'=>array(
		'res_id'=>  $rdta['Restaurant']['id'], //'628',
		)		
		));
		
		$this->set('gimages',$galleryimages);

		
        $this->set('restaurant', $this->Restaurant->find('first', $options));
        $this->set('RestaurantsType', $rtdta);
        $this->set('discategory', $data);
		$this->set('fetchrec', $fetchrec);
		
    }		
	
	
	
	
	
	
	
	
	
	

    /**
     * menu method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_rescart() {

        $id = $this->params['url']['res_id'];
        $tableId = $this->params['url']['table'];
        $this->Restaurant->recursive = 2;
        $this->loadModel('DishCategory');
        $this->loadModel('Product');
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
        $dishdata = $this->DishCategory->find('all');
        foreach ($dishdata as $d) {

            $d['DishCategory']['cnt'] = $this->Product->find('count', array('conditions' => array('AND' => array('Product.res_id' => $id, 'Product.dishcategory_id' => $d['DishCategory']['id']))));
            if ($d['DishCategory']['cnt'] == 0) {
                
            } else {
                $data['DishCategory'][] = $d['DishCategory'];
            }
        }
        $this->set('restaurant', $this->Restaurant->find('first', $options));
        $this->set('discategory', $data);
        $tableID = $this->params['url']['table'];
    }

    public function addresmenu($id = null) {
//        $shop = $this->Session->read('Shop');
//        $this->Cart->clear();
        $this->Restaurant->recursive = 2;
        $this->loadModel('DishCategory');
        $this->loadModel('Product');
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
        $dishdata = $this->DishCategory->find('all');
        foreach ($dishdata as $d) {

            $d['DishCategory']['cnt'] = $this->Product->find('count', array('conditions' => array('AND' => array('Product.res_id' => $id, 'Product.dishcategory_id' => $d['DishCategory']['id']))));
            if ($d['DishCategory']['cnt'] == 0) {
                
            } else {
                $data['DishCategory'][] = $d['DishCategory'];
            }
        }
        $this->set('restaurant', $this->Restaurant->find('first', $options));
        $this->set('discategory', $data);
    }

    /**
     * res search on index
     */
    public function discovery() {
        $this->Restaurant->recursive = 2;
        if ($this->request->is('post')) {
            $d = $this->request->data;
            $lat = $d['Restaurant']['lat']; //=30.5389944;
            $long = $d['Restaurant']['long']; //  =75.9550329;
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {

                return $this->redirect(array('controller' => 'products', 'action' => 'index'));
            } else {
                $data = $this->Restaurant->find('all', array(
                    "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                    "ORDER BY" => 'DESC',
                ));
                $cnt = count($data);
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i][0]['distance'] < $this->distance) {
                        $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                    } else {
                        unset($data[$i]);
                    }
                }
                $finaldata = array();
                $j = 0;
                foreach ($data as $d) {
                    $finaldata['Restaurant'][$j] = $d['Restaurant'];
                    $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                    $j++;
                }
            }
        } else {
            return $this->redirect(array('controller' => 'products', 'action' => 'index'));
        }
        $this->set('restauranttype', $this->RestaurantsType->find('all'));
        $this->set('resdata', $finaldata);
    }

    /**
     * res search on index
     */
    public function search() {
        $this->Restaurant->recursive = 2;
        if ($this->request->is('post')) {
            $d = $this->request->data;
            $lat = $d['Restaurant']['lat']; //=30.5389944;
            $long = $d['Restaurant']['long']; //  =75.9550329;
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {

                return $this->redirect(array('controller' => 'products', 'action' => 'index'));
            } else {
                $data = $this->Restaurant->find('all', array(
                    "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                    "ORDER BY" => 'DESC',
                ));
                $cnt = count($data);
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i][0]['distance'] < $this->distance) {
                        $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                    } else {
                        unset($data[$i]);
                    }
                }
                $finaldata = array();
                $j = 0;
                foreach ($data as $d) {
                    $finaldata['Restaurant'][$j] = $d['Restaurant'];
                    $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                    $j++;
                }
            }
        } else {
            return $this->redirect(array('controller' => 'products', 'action' => 'index'));
        }
        $this->set('restauranttype', $this->RestaurantsType->find('all'));
        $this->set('resdata', $finaldata);
    }

    public function restaurantsearch() {
        Configure::write("debug", 0);
        $this->Restaurant->recursive = 2;
        if ($this->request->is('post')) {
            $d = $this->request->data;
            $lat = $d['Restaurant']['lat']; //=30.5389944;
            $long = $d['Restaurant']['long']; //  =75.9550329;
            $this->Session->write('searchlat', $lat);
            $this->Session->write('searchlong', $long);
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {

                return $this->redirect(array('controller' => 'products', 'action' => 'index'));
            } else {
                $data = $this->Restaurant->find('all', array(
                    "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                    "ORDER BY" => 'DESC',
                ));
                $cnt = count($data);
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i][0]['distance'] < $this->distance) {
                        $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                    } else {
                        unset($data[$i]);
                    }
                }
                $finaldata = array();
                $j = 0;
                foreach ($data as $d) {
                    $finaldata['Restaurant'][$j] = $d['Restaurant'];
                    $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                    $j++;
                }
            }
        } else {
            if ($this->Session->read('searchlat')) {
                $lat = $this->Session->read('searchlat');
            } else {
                $lat = 0;
            }
            if ($this->Session->read('searchlong')) {
                $long = $this->Session->read('searchlong');
            } else {
                $long = 0;
            }
            if ($lat == 0 || $long == 0) {

                return $this->redirect(array('controller' => 'products', 'action' => 'index'));
            } else {
              
                $distanve = $_GET['distance'];
                $type = $_GET['type'];
                $rate = $_GET['rate'];
                $dlchk = $_GET['dlchk'];
                $tkchk = $_GET['tkchk'];
               
                $conditions = array();
                $this->loadModel("RestaurantsType");
                if ($distanve) {
                    $distanve = $_GET['distance'];
                } else {
                    $distanve = $this->distance;
                }
                if ($this->params->query['rate']) {
                    $conditions[] = array('Restaurant.review_avg' => $this->params->query['rate']);
                }
                if ($this->params->query['type']) {
                     $td=explode(',',$type);               
                    $conditions[] = array('Restaurant.typeid' => serialize($td));
                }
                if ($this->params->query['dlchk']) {
                    $conditions[] = array('Restaurant.delivery' => 1);
                }
                if ($this->params->query['tkchk']) {
                    $conditions[] = array('Restaurant.takeaway' => 1);
                }
//                print_r($conditions);
//                $data = $this->Restaurant->find('all', array('conditions' => array('AND' => $conditions)));
                //print_r($data);
                $data = $this->Restaurant->find('all', array('conditions' => array('AND' => $conditions)), array(
                    "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                    "ORDER BY" => 'DESC',
                ));
                $cnt = count($data);
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i][0]['distance'] < $distanve) {
                        $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                    } else {
                        unset($data[$i]);
                    }
                }
                $finaldata = array();
                $j = 0;
                foreach ($data as $d) {
                    $finaldata['Restaurant'][$j] = $d['Restaurant'];
                    $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                    $j++;
                }
            }
        }
        $this->set('restauranttype', $this->RestaurantsType->find('all'));
        $this->set('resdata', $finaldata);
    }

    /**
     * res search on index
     */
    public function tablesearch() {
         Configure::write("debug", 0);
        $this->Restaurant->recursive = 2;
        if ($this->request->is('post')) {
            $d = $this->request->data;
            $lat = $d['Restaurant']['lat']; //=30.5389944;
            $long = $d['Restaurant']['long']; //  =75.9550329;
            $this->Session->write('searchlat', $lat);
            $this->Session->write('searchlong', $long);
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {

                return $this->redirect(array('controller' => 'products', 'action' => 'index'));
            } else {
                $data = $this->Restaurant->find('all', array(
                    "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                    "ORDER BY" => 'DESC',
                ));
                $cnt = count($data);
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i][0]['distance'] < $this->distance) {
                        $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                    } else {
                        unset($data[$i]);
                    }
                }
                $finaldata = array();
                $j = 0;
                foreach ($data as $d) {
                    $finaldata['Restaurant'][$j] = $d['Restaurant'];
                    $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                    $j++;
                }
            }
        } else {
            if ($this->Session->read('searchlat')) {
                $lat = $this->Session->read('searchlat');
            } else {
                $lat = 0;
            }
            if ($this->Session->read('searchlong')) {
                $long = $this->Session->read('searchlong');
            } else {
                $long = 0;
            }
            if ($lat == 0 || $long == 0) {

                return $this->redirect(array('controller' => 'products', 'action' => 'index'));
            } else {
              
                $distanve = $_GET['distance'];
                $type = $_GET['type'];
                $rate = $_GET['rate'];
                $dlchk = $_GET['dlchk'];
                $tkchk = $_GET['tkchk'];
               
                $conditions = array();
                $this->loadModel("RestaurantsType");
                if ($distanve) {
                    $distanve = $_GET['distance'];
                } else {
                    $distanve = $this->distance;
                }
                if ($this->params->query['rate']) {
                    $conditions[] = array('Restaurant.review_avg' => $this->params->query['rate']);
                }
                if ($this->params->query['type']) {
                     $td=explode(',',$type);               
                    $conditions[] = array('Restaurant.typeid' => serialize($td));
                }
                if ($this->params->query['dlchk']) {
                    $conditions[] = array('Restaurant.delivery' => 1);
                }
                if ($this->params->query['tkchk']) {
                    $conditions[] = array('Restaurant.takeaway' => 1);
                }
//                print_r($conditions);
//                $data = $this->Restaurant->find('all', array('conditions' => array('AND' => $conditions)));
                //print_r($data);
                $data = $this->Restaurant->find('all', array('conditions' => array('AND' => $conditions)), array(
                    "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                    "ORDER BY" => 'DESC',
                ));
                $cnt = count($data);
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i][0]['distance'] < $distanve) {
                        $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                    } else {
                        unset($data[$i]);
                    }
                }
                $finaldata = array();
                $j = 0;
                foreach ($data as $d) {
                    $finaldata['Restaurant'][$j] = $d['Restaurant'];
                    $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                    $j++;
                }
            }
        }
        $this->set('restauranttype', $this->RestaurantsType->find('all'));
        $this->set('resdata', $finaldata);
    }

    public function filtersearch() {
        Configure::write("debug", 0);
        $this->Restaurant->recursive = 2;
        if ($this->request->is('post')) {

            $lat = $_POST['lat']; //=30.5389944;
            $long = $_POST['lng']; //  =75.9550329;
            $distance = $_POST['amt'];
            $restype = $_POST['restype1'];
            $restype1 = $_POST['restype'];

            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {

                return $this->redirect(array('controller' => 'products', 'action' => 'index'));
            } else {
                if ($restype == '' || $restype == 'all') {
                    $data = $this->Restaurant->find('all', array(
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else if ($restype == 'Delivery' && $restype1 == '') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('Restaurant.delivery' => 1),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } elseif ($restype1 == 'Takeaway' && $restype == '') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('Restaurant.takeaway' => 1),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } elseif ($restype1 == 'Takeaway' && $restype == 'Delivery') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.takeaway' => 1, 'Restaurant.delivery' => 1)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('Restaurant.typeid' => $restype),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                }

                $cnt = count($data);
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i][0]['distance'] < $distance) {
                        $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                    } else {
                        unset($data[$i]);
                    }
                }
                $finaldata = array();
                $j = 0;
                foreach ($data as $d) {
                    $finaldata['Restaurant'][$j] = $d['Restaurant'];
                    $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                    $j++;
                }
            }
            if ($finaldata) {
                $response['error'] = "0";
                $response['Restaurant'] = $finaldata;
                $response['lat'] = $lat;
                $response['lng'] = $long;
                $response['dist'] = $distance;
            } else {
                $response['error'] = "0";
                $response['data'] = "null";
            }
        } else {
            $response['error'] = "0";

            $response['message'] = "There is no data available";
        }

        echo json_encode($response);
        exit;
    }

    public function filterrestype() {
        Configure::write("debug", 0);
        $this->Restaurant->recursive = 2;
        if ($this->request->is('post')) {

            $lat = $_POST['lat']; //=30.5389944;
            $long = $_POST['lng']; //  =75.9550329;
            $distance = $_POST['amt'];
            $restype = $_POST['restype'];

            $restype1 = $_POST['restype1'];
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {

                return $this->redirect(array('controller' => 'products', 'action' => 'index'));
            } else {
                if ($restype == '' || $restype == 'all') {
                    $data = $this->Restaurant->find('all', array(
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else if ($restype == 'Delivery' && $restype1 == '') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('Restaurant.delivery' => 1),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } elseif ($restype == 'Takeaway' && $restype1 == '') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('Restaurant.takeaway' => 1),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } elseif ($restype == 'Takeaway' && $restype1 == 'Delivery') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.takeaway' => 1, 'Restaurant.delivery' => 1)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } elseif ($restype == 'Delivery' && $restype1 == 'Takeaway') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.takeaway' => 1, 'Restaurant.delivery' => 1)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('Restaurant.typeid' => $restype),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                }

                $cnt = count($data);
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i][0]['distance'] < $distance) {
                        $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                    } else {
                        unset($data[$i]);
                    }
                }
                $finaldata = array();
                $j = 0;
                foreach ($data as $d) {
                    $finaldata['Restaurant'][$j] = $d['Restaurant'];
                    $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                    $j++;
                }
            }
            if ($finaldata) {
                $response['error'] = "0";
                $response['Restaurant'] = $finaldata;
                $response['lat'] = $lat;
                $response['lng'] = $long;
                $response['dist'] = $distance;
            } else {
                $response['error'] = "0";
                $response['data'] = "null";
            }
        } else {
            $response['error'] = "0";
            $response['message'] = "There is no data available";
        }

        echo json_encode($response);
        exit;
    }

    public function filterbytype() {
        Configure::write("debug", 0);
        $this->Restaurant->recursive = 2;
        if ($this->request->is('post')) {

            $lat = $_POST['lat']; //=30.5389944;
            $long = $_POST['lng']; //  =75.9550329;
            $distance = $_POST['amt'];
            $restype = $_POST['restype'];
            $alltype = $_POST['alltype'];
            $restype1 = $_POST['restype1'];
            $alltypein_array = explode(',', $alltype);
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {

                return $this->redirect(array('controller' => 'products', 'action' => 'index'));
            } else {
                if ($alltypein_array[0] == 0) {
                    $data = $this->Restaurant->find('all', array(
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else if ($restype == 'Delivery' && $restype1 == '') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.delivery' => 1, 'Restaurant.typeid' => $alltypein_array)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } elseif ($restype1 == 'Takeaway' && $restype == '') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.takeaway' => 1, 'Restaurant.typeid' => $alltypein_array)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } elseif ($restype1 == 'Takeaway' && $restype == 'Delivery') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.takeaway' => 1, 'Restaurant.delivery' => 1, 'Restaurant.typeid' => $alltypein_array)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('Restaurant.typeid' => $alltypein_array),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                }

                $cnt = count($data);
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i][0]['distance'] < $distance) {
                        $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                    } else {
                        unset($data[$i]);
                    }
                }
                $finaldata = array();
                $j = 0;
                foreach ($data as $d) {
                    $finaldata['Restaurant'][$j] = $d['Restaurant'];
                    $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                    $j++;
                }
            }
            if ($finaldata) {
                $response['error'] = "0";
                $response['Restaurant'] = $finaldata;
                $response['lat'] = $lat;
                $response['lng'] = $long;
                $response['dist'] = $distance;
            } else {
                $response['error'] = "0";
                $response['data'] = "null";
            }


        } else {
            $response['error'] = "0";
            $response['message'] = "There is no data available";
        }

        echo json_encode($response);
        exit;
    }

    public function filterbyratings() {
        Configure::write("debug", 0);
        $this->Restaurant->recursive = 2;
        if ($this->request->is('post')) {

            $lat = $_POST['lat']; //=30.5389944;
            $long = $_POST['lng']; //  =75.9550329;
            $distance = $_POST['amt'];
            $restype = $_POST['restype'];
            $alltype = $_POST['alltype'];
            $restype1 = $_POST['restype1'];
            $alltypein_array = explode(',', $alltype);
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {

                return $this->redirect(array('controller' => 'products', 'action' => 'index'));
            } else {
                if ($alltypein_array[0] == 0) {
                    $data = $this->Restaurant->find('all', array(
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else if ($restype == 'Delivery' && $restype1 == '') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.delivery' => 1, 'Restaurant.typeid' => $alltypein_array)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } elseif ($restype1 == 'Takeaway' && $restype == '') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.takeaway' => 1, 'Restaurant.typeid' => $alltypein_array)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } elseif ($restype1 == 'Takeaway' && $restype == 'Delivery') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.takeaway' => 1, 'Restaurant.delivery' => 1, 'Restaurant.typeid' => $alltypein_array)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('Restaurant.review_avg' => $alltypein_array),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                }

                $cnt = count($data);
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i][0]['distance'] < $distance) {
                        $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                    } else {
                        unset($data[$i]);
                    }
                }
                $finaldata = array();
                $j = 0;
                foreach ($data as $d) {
                    $finaldata['Restaurant'][$j] = $d['Restaurant'];
                    $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                    $j++;
                }
            }
            if ($finaldata) {
                $response['error'] = "0";
                $response['Restaurant'] = $finaldata;
                $response['lat'] = $lat;
                $response['lng'] = $long;
                $response['dist'] = $distance;
            } else {
                $response['error'] = "0";
                $response['data'] = "null";
            }
        } else {
            $response['error'] = "0";
            $response['message'] = "There is no data available";
        }

        echo json_encode($response);
        exit;
    }

    /**
     * 
     * @param type $email_review
     * @return type
     */
    private function isEmail($email_review) {
        return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email_review));
    }

    public function review($id = NULL) {
        Configure::write("debug", 0);
        $shop = $this->Session->read('Shop');
        $this->Cart->clear();
        $this->Restaurant->recursive = 2;
        $this->loadModel('DishCategory');
        $this->loadModel('Product');
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
        $dishdata = $this->DishCategory->find('all');
        foreach ($dishdata as $d) {

            $d['DishCategory']['cnt'] = $this->Product->find('count', array('conditions' => array('AND' => array('Product.res_id' => $id, 'Product.dishcategory_id' => $d['DishCategory']['id']))));
            if ($d['DishCategory']['cnt'] == 0) {
                
            } else {
                $data['DishCategory'][] = $d['DishCategory'];
            }
        }
        if ($this->request->is('post')) {
            $this->loadModel('Review');
            $this->request->data['Review']['resid'] = $id;
            $this->request->data['Review']['name'] = 'name'; //$_POST['name_review'];
            $this->request->data['Review']['email'] = 'eamil@email.com'; // $_POST['email_review'];
            $this->request->data['Review']['food_quality'] = '1'; // $_POST['food_review'];
            $this->request->data['Review']['price'] = '11'; // $_POST['price_review'];
            $this->request->data['Review']['punctuality'] = $_POST['punctuality_review'];
            $this->request->data['Review']['courtesy'] = '111'; // $_POST['courtesy_review'];
            $this->request->data['Review']['text'] = $_POST['review_text'];
            $this->request->data['Review']['uid'] = $this->Auth->user('id');
            $avg_rtng = $_POST['food_review'] + $_POST['price_review'] + $_POST['punctuality_review'] + $_POST['courtesy_review'];
            //debug($this->request->data);exit;
            $cnt = $this->Review->find('count', array('conditions' => array('AND' => array('Review.uid' => $this->Auth->user('id'), 'Review.resid' => $id))));
            if ($cnt == 0) {
                $this->Review->save($this->request->data);
                $resrev = $this->Restaurant->find('first', array('conditions' => array('Restaurant.id' => $id)));
                $rc = $resrev['Restaurant']['review_count'] + 1;
                $avrc = $resrev['Restaurant']['total_avr'] + $avg_rtng;
                $avg_rtng = ($avrc / $rc) / 4;
                $this->Restaurant->updateAll(array('Restaurant.review_count' => $rc, 'Restaurant.review_avg' => $avg_rtng, 'Restaurant.total_avr' => $avrc), array('Restaurant.id' => $id));
            }
        }
        $this->loadModel('Review');
        $this->loadModel('Gallery');
        $this->Review->recursive = 2;
        $this->set('restaurant', $this->Restaurant->find('first', $options));
        $this->set('discategory', $data);
        $this->set('Review', $this->Review->find('all', array('conditions' => array('Review.resid' => $id))));
        $this->set('Gallery', $this->Gallery->find('all', array('conditions' => array('Gallery.res_id' => $id))));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            debug($this->request->data);
            exit;
            $this->Restaurant->create();
            if ($this->Restaurant->save($this->request->data)) {
                return $this->flash(__('The restaurant has been saved.'), array('action' => 'index'));
            }
        }
        $users = $this->Restaurant->User->find('list');
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
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Restaurant->save($this->request->data)) {
                return $this->flash(__('The restaurant has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
            $this->request->data = $this->Restaurant->find('first', $options);
        }
        $users = $this->Restaurant->User->find('list');
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
        $this->Restaurant->id = $id;
        if (!$this->Restaurant->exists()) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Restaurant->delete()) {
            return $this->flash(__('The restaurant has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The restaurant could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

    public function admin_reset() {
        $this->Session->delete('Restaurant');
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    
    public function admin_index() {
        // $this->Session->delete('Restaurant');
        //$this->layout = "admin";

        /* Rakesh updated code*/

        // if ($this->request->is("post")) {
        //     //  print_r($this->request->data);exit;
        //     $filter = $this->request->data['Restaurant']['filter'];
        //     $name = $this->request->data['Restaurant']['name'];
        //     $conditions[] = array(
        //         'Restaurant.' . $filter . ' LIKE' => '%' . $name . '%',
        //     );
        //     $this->Session->write('Restaurant.filter', $filter);
        //     $this->Session->write('Restaurant.name', $name);
        //     $this->Session->write('Restaurant.conditions', $conditions);
        //     return $this->redirect(array('action' => 'index'));
        // }
        // if ($this->Session->check('Restaurant')) {
          
        //     $all = $this->Session->read('Restaurant');
        // } else if($this->Auth->user('role')=="rest_admin"){
        //   $all = array(
        //         'name' => '',
        //         'filter' => '',
        //         'conditions' => array(
        //         'Restaurant.user_id' =>$this->Auth->user('id')
        //     )); 
        // } else {
        //     $all = array(
        //         'name' => '',
        //         'filter' => '',
        //         'conditions' => ''
        //     );
        // }
        // $this->set(compact('all'));
        // $this->Paginator = $this->Components->load('Paginator');
        // $this->Paginator->settings = array(
        //     'Restaurant' => array(
        //         'recursive' => 2,
        //         'contain' => array(
        //         ),
        //         'conditions' => array(
        //         ),
        //         'order' => array(
        //             'Restaurant.created' => 'DESC'
        //         ),
        //         'limit' => 20,
        //         'conditions' => $all['conditions'],
        //         'paramType' => 'querystring',
        //     )
        // );

        $restaurant = $this->Restaurant->find('all',array(
            
                //'recursive' => 2,
                'fields'=>array('Restaurant.*','(SELECT SUM(quantity) FROM `products` where res_id = Restaurant.id) as quantityall','(SELECT count(*) FROM `user_drinks` where resid=Restaurant.id) as redeemed'),
                // 'contain' => array(
                // ),
                // 'conditions' => array(
                // ),
                'order' => array(
                    'Restaurant.name' => 'DESC'
                ),
               // 'limit' => 20,
                //'conditions' => $all['conditions'],
              //  'paramType' => 'querystring',
       
        ));

       
        $this->set('restaurants', $restaurant);
    }

    public function admin_tableview($id = NULL) {

        Configure::write("debug", 0);
        //$this->layout = "admin";
        $this->loadModel('Product');
        $this->loadModel('Cart');
        $this->Restaurant->recursive = 2;
        $this->Product->recursive = 2;
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
        $this->loadModel('RestaurantsType');
        $data = $this->Restaurant->find('first', $options);
        $this->set('restaurant', $data);
        $product_data = $this->Product->find('all', array('conditions' => array('Product.res_id' => $id), 'limit' => 4));
        $this->set('products', $product_data);
        $this->loadModel('Restable');
        $Restable = $this->Restable->find('all', array('conditions' => array('Restable.res_id' => $id), 'order' => 'Restable.id ASC'));
        $this->set('rdata', $Restable);
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        Configure::write("debug", 0);
       		
        $this->Restaurant->recursive = 2;
     
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));

       
        $data = $this->Restaurant->find('first', $options);
        
        $this->set('restaurant', $data);

        $type =  explode('XXX-',substr($data['Restaurant']['typeid'],4));
        if(count($type)==0){
            $rest_type ="";
        }
        else{
            $cod= array();
            foreach($type as $key=>$value){
               $cod[]=  array('RestaurantsType.id' =>$value);
            }
            $main = array('OR' => $cod);
            $this->loadModel('RestaurantsType');
            $rest_type = $this->RestaurantsType->find('all',array('conditions' =>$main));             
        }

        $this->set('restauranttype', $rest_type);
    }

    /**
     * 
     * @param type $param
     */
    public function admin_addtableresrv() {
        $this->loadModel('Restable');
        print_r($_POST);

        $this->request->data['Restable']['tableno'] = $_POST['tno'];
        $this->request->data['Restable']['res_id'] = $_POST['resid'];
        $cnt = $this->Restable->find('count', array('conditions' => array('Restable.tableno' => $_POST['tno'], 'Restable.res_id' => $_POST['resid'])));
        if ($cnt <= 0) {
            $this->Restable->save($this->request->data);
            echo "sucess";
        } else {
            echo "You have been Already Added";
        }
        exit;
    }

    /**
     * admin_addproduct method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_addproduct($id = null) {
        Configure::write("debug", 0);
        //$this->layout = "admin";
        $this->loadModel('Product');
        if ($this->request->is('post')) {

            $this->request->data['Product']['res_id'] = $id;
            


            $image = $this->request->data['Product']['image'];
            $uploadFolder = "product";
            
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
                $this->Product->create();
                if ($this->Product->save($this->request->data)) {
                    $this->Session->setFlash('The product has been saved');
                    return $this->redirect(array('controller' => 'products','action' => 'admin_resindex',$id));
                } else {
                    $this->Session->setFlash('The product could not be saved. Please, try again.');
                }
            }
        }       
        $this->loadModel('Product');

        $this->loadModel('Drink');

        $Drink = $this->Drink->find("list");
        $this->set('drink',$Drink);
       
    }

    public function admin_assoaddproduct($id = null) {
        Configure::write("debug", 0);
        //$this->layout = "admin";
        $this->loadModel('Product');
        if ($this->request->is('post')) {
            //debug($this->request->data);exit;
//            $this->request->data['Product']['pro_id'] = serialize($this->request->data['Product']['proassociate']);
            $this->request->data['Product']['alergi'] = serialize($this->request->data['Product']['alergi']);
            $this->request->data['Product']['res_id'] = $id;
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
                $this->Product->create();
                if ($this->Product->save($this->request->data)) {

                    $this->Session->setFlash('The product has been saved');

                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('The product could not be saved. Please, try again.');
                }
            }
        }
        /* $this->loadModel('Product');
          $this->Restaurant->recursive = 2;
          $this->Product->recursive = 2;
          if (!$this->Restaurant->exists($id)) {
          throw new NotFoundException(__('Invalid restaurant'));
          }
          $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
          $this->loadModel('RestaurantsType');
          $data = $this->Restaurant->find('first', $options);
          $this->set('restaurant', $data);
          $product_data = $this->Product->find('all', array('conditions' => array('Product.res_id' => $id)));
          $this->set('products', $product_data);
          //debug($product_data); */
        $this->loadModel('Product');
        $this->loadModel('DishCategory');
       $this->set('DishCategory', $this->DishCategory->find('list', array('conditions' => array('AND'=>array('DishCategory.isshow' => 1,'DishCategory.res_id' => $id)))));
        $this->set('id', $id);
    }

    /**
     * admin_adddishcat method
     *
     * @return void
     */
    public function admin_adddishcat($id = null) {
        $this->loadModel('DishCategory');
        if ($this->request->is('post')) {
            $this->DishCategory->create();
            if ($this->DishCategory->save($this->request->data)) {
                $this->Session->setFlash(__('The dish category has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
     * admin_adddishsubcat method
     *
     * @return void
     */
    public function admin_adddishsubcat($id = null) {
        $this->loadModel('DishSubcat');
        if ($this->request->is('post')) {
            $this->DishSubcat->create();
            if ($this->DishSubcat->save($this->request->data)) {
                $this->Session->setFlash(__('The dish subcat has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The dish subcat could not be saved. Please, try again.'));
            }
        }
        $dishCategories = $this->DishSubcat->DishCategory->find('list');
        $this->set(compact('dishCategories'));
    }

    ///////////////////
    /**
     * 
     * @param type $complete_address
     * @return boolean
     */
    private function getLetLong($complete_address) {
        if (!empty($complete_address)) {
            $format_address = str_replace(' ', '+', $complete_address);
            $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . $format_address . '&sensor=true', false);
            $output = json_decode($geocodeFromAddr);
            if (!empty($output)) {
                $data['latitude'] = $output->results[0]->geometry->location->lat;
                $data['longitude'] = $output->results[0]->geometry->location->lng;
            }
            if (!empty($data)) {

                return $data;
            } else {
                $data['latitude'] = 0;
                $data['longitude'] = 0;
            }
        }
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {

        if ($this->request->is('post')) { 
          
            if(isset($_POST['data']['Restaurant']['typeid'])){
                $type_id= "XXX-".implode("XXX-",$_POST['data']['Restaurant']['typeid']);
            }

            $image = $this->request->data['Restaurant']['logo'];
            $image1 = $this->request->data['Restaurant']['bannerone'];
            $image2 = $this->request->data['Restaurant']['bannertwo'];
            $image3 = $this->request->data['Restaurant']['bannerthree'];
            $image4 = $this->request->data['Restaurant']['bannerfour'];


            // $tax = $this->request->data['Restaurant']['taxes'];
            $uploadFolder = "restaurants";
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
                $this->request->data['Restaurant']['logo'] = $imageName;
                $this->request->data['Restaurant']['typeid'] = $type_id;
               
                move_uploaded_file($image['tmp_name'], $full_image_path);
                $add = $this->request->data['Restaurant']['address'];
                $cty = $this->request->data['Restaurant']['city'];
                $state = $this->request->data['Restaurant']['state'];
                $complete_address = $add . ',' . $cty . ',' . $state;
                $latlong = $this->getLetLong($complete_address);
                $latitude = $latlong['latitude'];
                $longitude = $latlong['longitude'];
            }


            if ($image1['error'] == 0) {
                $imageName = $image1['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Restaurant']['bannerone'] = $imageName;
                move_uploaded_file($image1['tmp_name'], $full_image_path);
            }


             if ($image2['error'] == 0) {
                $imageName = $image2['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Restaurant']['bannertwo'] = $imageName;
                move_uploaded_file($image2['tmp_name'], $full_image_path);
            }

             if ($image3['error'] == 0) {
                $imageName = $image3['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Restaurant']['bannerthree'] = $imageName;
                move_uploaded_file($image3['tmp_name'], $full_image_path);
            }


            if ($image4['error'] == 0) {
                $imageName = $image4['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Restaurant']['bannerfour'] = $imageName;
                move_uploaded_file($image4['tmp_name'], $full_image_path);
            }

            $this->Restaurant->create();
            $this->request->data['Restaurant']['latitude'] = $latitude;
            $this->request->data['Restaurant']['longitude'] = $longitude;
            if ($this->Restaurant->save($this->request->data)) {
                $id = $this->Restaurant->getLastInsertID();
                $this->Session->setFlash('The restaurant has been saved.');
                return $this->redirect(array('action' => 'index'));
            }
            $users = $this->Restaurant->User->find('list');
        } else {
            $rname = @$_GET['resname'];
            $this->loadModel('RestaurantsType');
            $restype = $this->RestaurantsType->find("list");
            $this->set('restype', $restype);
            $this->set('rname', $rname);
        }
    }

    /**
     * admin_fadd method for foodolic app in which city and state is for soudi arabia country
     *
     * @return void
     */
    public function admin_fadd() {
        if ($this->request->is('post')) {
//            print_r($this->request->data);
//            if($this->request->data['Restaurant']['areas']){
//                print_r($this->request->data['Restaurant']['areas']);
//            }
//            exit;
            $image = $this->request->data['Restaurant']['logo'];
            $uploadFolder = "restaurants";
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
                $this->request->data['Restaurant']['logo'] = $imageName;
                // $this->request->data['Restaurant']['amities_selected'] = $ckbox;
                //upload image to upload folder
                move_uploaded_file($image['tmp_name'], $full_image_path);
                $add = $this->request->data['Restaurant']['address'];
                $cty = $this->request->data['Restaurant']['city'];
                if (isset($this->request->data['Restaurant']['state'])) {
                    $state = $this->request->data['Restaurant']['state'];
                    $complete_address = $add . ',' . $cty . ',' . $state;
                    $latlong = $this->getLetLong($complete_address);
                    $latitude = $latlong['latitude'];
                    $longitude = $latlong['longitude'];
                } else {
                    $complete_address = $add . ',' . $cty;
                    $latlong = $this->getLetLong($complete_address);
                    $latitude = $latlong['latitude'];
                    $longitude = $latlong['longitude'];
                }
            }

            $this->Restaurant->create();
            $this->request->data['Restaurant']['latitude'] = $latitude;
            $this->request->data['Restaurant']['longitude'] = $longitude;
            if ($this->Restaurant->save($this->request->data)) {
                $rest_id = $this->Restaurant->getLastInsertID();

                if (isset($this->request->data['Restaurant']['areas'])) {
                    $this->loadModel('DeliverableArea');
                    foreach ($this->request->data['Restaurant']['areas'] as $area) {
                        $this->DeliverableArea->create();
                        $this->request->data['DeliverableArea']['res_id'] = $rest_id;
                        $this->request->data['DeliverableArea']['area_id'] = $area;
                        $this->DeliverableArea->save($this->request->data);
                    }
                }

                $this->Session->setFlash('The restaurant has been saved.');
                return $this->redirect(array('action' => 'index'));
            }

            $users = $this->Restaurant->User->find('list');
        } else {
            $this->loadModel('RestaurantsType');
            $restype = $this->RestaurantsType->find("list");
            $this->set('restype', $restype);

            $this->loadModel('City');
            $cities = $this->City->find("list", array(
                'fields' => array('City.id', 'City.city_name'),
                'conditions' => array(
                    'country_id' => 3
                )
            ));
            $this->set('cities', $cities);
        }
    }

    /*
     * Api to get areas according to cities
     */

    public function admin_areas($id = null) {
        $this->layout = 'ajax';
        $city_id = $id;
        $this->loadModel('Area');
        $areas = $this->Area->find('all', array(
            'conditions' => array(
                'city_id' => $city_id
            )
        ));
        if ($areas) {
            $response['status'] = true;
            $response['data'] = $areas;
        } else {
            $response['status'] = false;
            $response['msg'] = "No data Found";
        }
//    print_r($areas); exit;
        $this->set('response', $response);
        $this->render('ajax');
    }

//     $this->set(compact('users')); 

    /**
     * 
     * @param type $id
     * @param type $res_uid
     * @return type
     * @throws NotFoundException
     */
    public function admin_edit($id = null, $res_uid = NULL) {
        Configure::write("debug", 0);
        //$this->layout = "admin";
        $this->Restaurant->id = $id;
        $this->Restaurant->user_id = $res_uid;
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if(isset($_POST['data']['Restaurant']['typeid'])){
                $type_id= "XXX-".implode("XXX-",$_POST['data']['Restaurant']['typeid']);
            }

            $this->request->data['Restaurant']['typeid'] = $type_id;

            $image = $this->request->data['Restaurant']['logo'];
            $bannerone = $this->request->data['Restaurant']['bannerone'];
            $bannertwo = $this->request->data['Restaurant']['bannertwo'];
            $bannerthree = $this->request->data['Restaurant']['bannerthree'];
            $bannerfour = $this->request->data['Restaurant']['bannerfour'];


            $uploadFolder = "restaurants";
            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;

            $admin_edit = $this->Restaurant->find('first', array('conditions' => array('Restaurant.id' => $id)));

            
            if ($image['error'] == 0) {
                $imageName = $image['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Restaurant']['logo'] = $imageName;
                move_uploaded_file($image['tmp_name'], $full_image_path);
            } else {
                   $this->request->data['Restaurant']['logo'] = !empty($admin_edit['Restaurant']['logo']) ? $admin_edit['Restaurant']['logo'] : 'hotel.png';
            }


            if ($bannerone['error'] == 0) {
                $imageName = $bannerone['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Restaurant']['bannerone'] = $imageName;
               
               
                move_uploaded_file($bannerone['tmp_name'], $full_image_path);
            }else {
                   $this->request->data['Restaurant']['bannerone'] = !empty($admin_edit['Restaurant']['bannerone']) ? $admin_edit['Restaurant']['bannerone'] : 'hotel.png';
            }

            if ($bannertwo['error'] == 0) {
                $imageName = $bannertwo['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Restaurant']['bannertwo'] = $imageName;
               
               
                move_uploaded_file($bannertwo['tmp_name'], $full_image_path);
            }else {
                   $this->request->data['Restaurant']['bannertwo'] = !empty($admin_edit['Restaurant']['bannertwo']) ? $admin_edit['Restaurant']['bannertwo'] : 'hotel.png';
            }

            if ($bannerthree['error'] == 0) {
                $imageName = $bannerthree['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Restaurant']['bannerthree'] = $imageName;
              
               
                move_uploaded_file($bannerthree['tmp_name'], $full_image_path);
            }else {
                   $this->request->data['Restaurant']['bannerthree'] = !empty($admin_edit['Restaurant']['bannerthree']) ? $admin_edit['Restaurant']['bannerthree'] : 'hotel.png';
            }

            if ($bannerfour['error'] == 0) {
                $imageName = $bannerfour['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['Restaurant']['bannerfour'] = $imageName;
              
               
                move_uploaded_file($bannerfour['tmp_name'], $full_image_path);
            }else {
                   $this->request->data['Restaurant']['bannerfour'] = !empty($admin_edit['Restaurant']['bannerfour']) ? $admin_edit['Restaurant']['bannerfour'] : 'hotel.png';
            }


            $add = $this->request->data['Restaurant']['address'];           
                       
            $cty = $this->request->data['Restaurant']['city'];
            $state = $this->request->data['Restaurant']['state'];
            $complete_address = $add . ',' . $cty . ',' . $state;
            $latlong = $this->getLetLong($complete_address);
			
			@$latitude = $this->request->data['Restaurant']['latitude'];
			@$longitude = $this->request->data['Restaurant']['longitude'];
			if($latitude and $longitude){
			@$latitude = $this->request->data['Restaurant']['latitude'];
			@$longitude = $this->request->data['Restaurant']['longitude'];
			}else{
			
            $latitude = $latlong['latitude'];
            $longitude = $latlong['longitude'];
            $this->request->data['Restaurant']['latitude'] = $latitude;
            $this->request->data['Restaurant']['longitude'] = $longitude;
			}
//            pr($this->request->data);exit;    
           
            if ($this->Restaurant->save($this->request->data)) {

                $this->Session->setFlash('The restaurant has been saved.');
                return $this->redirect(array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
            $this->request->data = $this->Restaurant->find('first', $options);
            $this->loadModel('RestaurantsType');
            $restype = $this->RestaurantsType->find("list");
            $this->set('restype', $restype);
        }
        $this->loadModel('User');
        $this->set('uname', $this->User->find('first',array('conditions'=>array('User.id'=>$res_uid))));
        
        
        $users = $this->Restaurant->find('list');
        $this->set(compact('users'));
        $this->set('Restaurant', $this->request->data);
    }

    /*
     * admin_fedit method for foodolic app in which city and state is for soudi arabia country
     */

    public function admin_fedit($id = null) {
        //$this->layout = "admin";
        $this->Restaurant->id = $id;
        if (!$this->Restaurant->exists($id)) {
            throw new NotFoundException(__('Invalid restaurant'));
        }
        if ($this->request->is(array('post', 'put'))) {
//            debug($this->request->data);exit;
            $add = $this->request->data['Restaurant']['address'];
            $cty = $this->request->data['Restaurant']['city'];
            $state = $this->request->data['Restaurant']['state'];
            $complete_address = $add . ',' . $cty . ',' . $state;
            $latlong = $this->getLetLong($complete_address);
            $latitude = $latlong['latitude'];
            $longitude = $latlong['longitude'];
            $this->request->data['Restaurant']['latitude'] = $latitude;
            $this->request->data['Restaurant']['longitude'] = $longitude;
//            pr($this->request->data);exit;        
            $image = $this->request->data['Restaurant']['logo'];
            $uploadFolder = "restaurants";
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
                $this->request->data['Restaurant']['logo'] = $imageName;
                //upload image to upload folder
                move_uploaded_file($image['tmp_name'], $full_image_path);
            } else {

                $admin_edit = $this->Restaurant->find('first', array('conditions' => array('Restaurant.id' => $id)));
                $this->request->data['Restaurant']['logo'] = !empty($admin_edit['Restaurant']['logo']) ? $admin_edit['Restaurant']['logo'] : 'hotel.png';
            }
            if ($this->Restaurant->save($this->request->data)) {
                $this->Session->setFlash('The restaurant has been saved.');
                return $this->redirect(array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
            $this->request->data = $this->Restaurant->find('first', $options);
            $this->loadModel('RestaurantsType');
            $restype = $this->RestaurantsType->find("list");
            $this->set('restype', $restype);
        }
        $users = $this->Restaurant->find('list');
        $this->set(compact('users'));
        $this->set('Restaurant', $this->request->data);
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
	   $this->Restaurant->id = $id;
	   $delete = $this->Restaurant->delete();
	  // exit;
		/*if (!$this->Restaurant->exists()) {
			throw new NotFoundException(__('Invalid restaurants type'));
		}*/
		//$this->request->allowMethod('post', 'delete');
		if ($delete) {
			$this->Session->setFlash(__('The restaurants type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The restaurants type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	
    }

    /**
     * 
     * @param type $id
     */
    public function admin_activate($id = null) {
        $this->Restaurant->id = $id;
        if ($this->Restaurant->exists()) {
            $x = $this->Restaurant->save(array(
                'Restaurant' => array(
                    'status' => '1'
                )
            ));
            $this->Session->setFlash(__("Activated successfully."));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__("Unable to activate."));
            $this->redirect($this->referer());
        }
    }

    /**
     * 
     * @param type $id
     */
    public function admin_deactivate($id = null) {
        $this->Restaurant->id = $id;
        if ($this->Restaurant->exists()) {
            $x = $this->Restaurant->save(array(
                'Restaurant' => array(
                    'status' => '0'
                )
            ));
            $this->Session->setFlash(__("Activated successfully."));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__("Unable to activate."));
            $this->redirect($this->referer());
        }
    }

    /**
     * 
     * @param type $id
     * @throws MethodNotAllowedException
     */
    public function admin_activateall($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        foreach ($this->request['data']['Restaurant'] as $k => $v) {
            if ($k == $v) {
                $this->Restaurant->id = $v;
                if ($this->Restaurant->exists()) {
                    $x = $this->Restaurant->save(array(
                        'Restaurant' => array(
                            'status' => 1
                        )
                    ));

                    $this->Session->setFlash(__('Selected Restaurants Activated.', true));
                } else {
                    $this->Session->setFlash(__("Unable to Activate Restaurants."));
                }
            }
        }
        $this->redirect($this->referer());
    }

    public function admin_deleteall($id = null) {



        if (!$this->request->is('post')) {



            throw new MethodNotAllowedException();
        }



        foreach ($this->request['data']['Restaurant'] as $k) {



            $this->Restaurant->id = (int) $k;



            if ($this->Restaurant->exists()) {



                $this->Restaurant->delete();
            }
        }



        $this->Session->setFlash(__('Restaurant deleted....'));



        $this->redirect(array('action' => 'index'));
    }

    /**
     * 
     * @param type $id
     * @throws MethodNotAllowedException
     */
    public function admin_inactivateall($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        foreach ($this->request['data']['Restaurant'] as $k => $v) {
            if ($k == $v) {
                $this->Restaurant->id = $v;
                if ($this->Restaurant->exists()) {
                    $x = $this->Restaurant->save(array(
                        'Restaurant' => array(
                            'status' => 0
                        )
                    ));
                    $this->Session->setFlash(__('Selected Restaurants Deactivated.', true));
                } else {
                    $this->Session->setFlash(__("Unable to Deactivate Restaurants."));
                }
            }
        }
        $this->redirect($this->referer());
    }

    public function admin_checkin() {
        $this->loadModel('UserCheckin');
        //$this->layout = "admin";
        $this->UserCheckin->recursive = 0;
        //pr($this->Paginator->paginate());
        $this->set('userCheckins', $this->Paginator->paginate('UserCheckin', array('UserCheckin.is_check' => 1)));
    }

    public function admin_bookmark() {
        $this->loadModel('BookmarkDishes');
        //$this->layout = "admin";
        $this->BookmarkDishes->recursive = 0;
        //pr($this->Paginator->paginate());
        $this->set('bookmarkDishes', $this->Paginator->paginate('BookmarkDish', array('BookmarkDish.restaurant_id' => 1)));
    }

    /*     * ****************************Web services for  the restaurants************************ */

    /**
     * url detector
     * @param type $haystack
     * @param type $needle
     * @param type $offset
     * @return boolean
     */
    private function strposa($haystack, $needle, $offset = 0) {
        if (!is_array($needle))
            $needle = array($needle);
        foreach ($needle as $query) {
            if (strpos($haystack, $query, $offset) !== false)
                return true; // stop on first true result
        }
        return false;
    }
    

    /*
      DELIMITER $$

      DROP FUNCTION IF EXISTS `get_distance_in_miles_between_geo_locations` $$
      CREATE FUNCTION get_distance_in_miles_between_geo_locations(geo1_latitude decimal(10,6), geo1_longitude decimal(10,6), geo2_latitude decimal(10,6), geo2_longitude decimal(10,6))
      returns decimal(10,3) DETERMINISTIC
      BEGIN
      return ((ACOS(SIN(geo1_latitude * PI() / 180) * SIN(geo2_latitude * PI() / 180) + COS(geo1_latitude * PI() / 180) * COS(geo2_latitude * PI() / 180) * COS((geo1_longitude - geo2_longitude) * PI() / 180)) * 180 / PI()) * 60 * 1.1515);
      END $$

      DELIMITER ;

     */

    /**
     * @desc All restaurant listing in specific distance
     * @name All restaurant listing 
     * @link  get_distance_in_miles_between_geo_locations
     */
    public function api_restaurantslist() {
        configure::write('debug', 2);
       // $this->Restaurant->recursive = 2;

        $lat = $_REQUEST['latitude'];
        $long = $_REQUEST['longitude'];
        $response['pos']['lat'] = $lat;//= 31.3260152;
        $response['pos']['lng'] = $long;// =75.5761829;


            if ($lat == 0 || $long == 0) {
                $response['isSucess'] = "false";
                $response['msg'] = "There is no data available";
            } else {
                $url = FULL_BASE_URL . $this->webroot . "files/restaurants/" ;
                
                $this->distance = 62.1371;
                $maindistance =$this->distance;

                // Filter Code              	
              	$sql="";
              

              if(isset($_REQUEST['type'])){
              	$type = explode('--', $_REQUEST['type']);
                	for($kp=0;$kp<count($type);$kp++){
                		if($type[$kp]!=""){
                			if($kp==0){
                				$sql.= " WHERE Restaurant.typeid LIKE '%XXX-".$type[$kp]."%'";
	                		} 
	                		else{
	                			$sql.= " OR Restaurant.typeid LIKE '%XXX-".$type[$kp]."%'";
	                		}	
                		}                		
                	}
                }
               
                $data = $this->Restaurant->query("SELECT get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance, CONCAT('https://rakesh.crystalbiltech.com/freedrink/files/restaurants/', Restaurant.logo ) AS logo,Restaurant.* FROM  `rakesh_freedrink`.`restaurants` AS  `Restaurant` $sql HAVING distance < $maindistance");
                  // $log = $this->Restaurant->getDataSource();
            // echo "<pre>";
            // print_r($log);
            // die();  
            }

            $finaldata = array();
            $j = 0;
            
            foreach ($data as $d) {

                $d['Restaurant']['distance'] = $d[0]['distance'];
                $d['Restaurant']['logo'] = $d[0]['logo']; 
                if($d['Restaurant']['bannerone']!=""){
                    $d['Restaurant']['bannerone']=$url.$d['Restaurant']['bannerone']; 
                }  
                if($d['Restaurant']['bannertwo']!=""){
                    $d['Restaurant']['bannertwo']=$url.$d['Restaurant']['bannertwo'];
                } 
                if($d['Restaurant']['bannerthree']!=""){            
                    $d['Restaurant']['bannerthree']=$url.$d['Restaurant']['bannerthree'];
                }   
                if($d['Restaurant']['bannerfour']!=""){           
                $d['Restaurant']['bannerfour']=$url.$d['Restaurant']['bannerfour'];  
                } 

                $type =  explode('XXX-',substr($d['Restaurant']['typeid'],4));
                if(count($type)==0){                   
                    $alltype ="";
                }
                else{
                    $cod= array();
                    foreach($type as $key=>$value){
                       $cod[]=  array('RestaurantsType.id' =>$value);
                    }
                    $main = array('OR' => $cod);
                    $this->loadModel('RestaurantsType');
                    $alltype = $this->RestaurantsType->find('all',array('conditions' =>$main)); 
                }

                $finaldata['Restaurant'][$j] = $d['Restaurant'];
                $finaldata['Restaurant'][$j]['typename'] = $alltype;

                if (!empty($d['Favrest'])) {
                    $fav_rest_user = array();
                    foreach ($d['Favrest'] as $fav_rest) {
                        array_push($fav_rest_user, $fav_rest['user_id']);
                    }

                    if (isset($redata->user_id)) {
                        $set_as_fav = in_array($redata->user_id, $fav_rest_user);
                        if ($set_as_fav) {
                            $finaldata['Restaurant'][$j]['favrest'] = 1;
                        } else {
                            $finaldata['Restaurant'][$j]['favrest'] = 0;
                        }
                    } else {
                        $finaldata['Restaurant'][$j]['favrest'] = 0;
                    }
                } else {
                    $finaldata['Restaurant'][$j]['favrest'] = 0;
                }

                $j++;
            }
            //debug($finaldata);exit;
            if ($finaldata) {
                $response['isSuccess'] = "true";
                $response['data'] = $finaldata;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
       
        echo json_encode($response);
        
        exit;
    }
	 public function api_restaurantslistall() {
        configure::write('debug', 0);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $lat = $redata->data->Restaurant->latitude;//=30.5389944;
        $long = $redata->data->Restaurant->longitude;//=75.9550329;
		$alltype = array();
		$alltype = $redata->data->Restaurant->type; //= array('Saloon');
        $response['pos']['lat'] = $lat;
        $response['pos']['lng'] = $long;
        if (!empty($redata)) {
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {
                $response['isSucess'] = "false";
                $response['msg'] = "There is no data available";
            } else {
                $data = $this->Restaurant->find('all',array('conditions'=>
				 array('rest_type'=>$alltype),
				 "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
				 "ORDER BY" => 'DESC',
                ));
			
            }
			//print_r($data);
			//exit;
            $cnt = count($data);
            for ($i = 0; $i < $cnt; $i++) {
                if ($data[$i][0]['distance'] < $this->distance) {
                    $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                } else {
                    unset($data[$i]);
                }
            }
            $finaldata = array();
            $j = 0;
            foreach ($data as $d) {
                $finaldata['Restaurant'][$j] = $d['Restaurant'];
                $finaldata['Restaurant'][$j]['typename'] = $this->RestaurantsType->find('all',array('conditions'=>array('RestaurantsType.id'=>  unserialize($d['Restaurant']['typeid']))));

                if (!empty($d['Favrest'])) {
                    $fav_rest_user = array();
                    foreach ($d['Favrest'] as $fav_rest) {
                        array_push($fav_rest_user, $fav_rest['user_id']);
                    }
                    if (isset($redata->user_id)) {
                        $set_as_fav = in_array($redata->user_id, $fav_rest_user);
                        if ($set_as_fav) {
                            $finaldata['Restaurant'][$j]['favrest'] = 1;
                        } else {
                            $finaldata['Restaurant'][$j]['favrest'] = 0;
                        }
                    } else {
                        $finaldata['Restaurant'][$j]['favrest'] = 0;
                    }
                } else {
                    $finaldata['Restaurant'][$j]['favrest'] = 0;
                }

                $j++;
            }
			//print_r($finaldata);
            //debug($finaldata);exit;
            if ($finaldata) {
                $response['isSuccess'] = "true";
                $response['data'] = $finaldata;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    /**
     * @desc All restaurant listing in specific distance
     * @name All restaurant listing 
     * @link  get_distance_in_miles_between_geo_locations
     *   ob_start();
      // $postdata = file_get_contents("php://input");
      print_r($postdata );
      $c = ob_get_clean();
      $fc = fopen('files' . DS . 'detail.txt', 'w');
      fwrite($fc, $c);
      fclose($fc);
     * parameters: city, area, address, user_id. user_id to check whether user selects restaurant as favourite or not
     */
    public function api_restaurantslistbyadd() {
        configure::write('debug', 0);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
//        ob_start();
//       $postdata = file_get_contents("php://input");
//      print_r($redata );
//      $c = ob_get_clean();
//      $fc = fopen('files' . DS . 'detail.txt', 'w');
//      fwrite($fc, $c);
//      fclose($fc);
//        $redata = (object)['city'=>'riyadh','area'=>'','address'=>'','user_id'=>1];
        if (!empty($redata)) {
            $address = $redata->city . ',' . $redata->area . ',' . $redata->address;
            $latlong = $this->getLetLong($address);
            //debug($latlong);
            $lat = $latlong['latitude'];
            $long = $latlong['longitude'];
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {
                $response['isSucess'] = "false";
                $response['msg'] = "There is no lat long available";
            } else {
                $data = $this->Restaurant->find('all', array(
                    "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                    "ORDER BY" => 'DESC'
                ));
                //  debug($data);
            }
            $cnt = count($data);
            for ($i = 0; $i < $cnt; $i++) {
                if ($data[$i][0]['distance'] < $this->distance) {
                    $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                } else {
                    unset($data[$i]);
                }
            }
            $finaldata = array();
            $j = 0;
            foreach ($data as $d) {
                $finaldata['Restaurant'][$j] = $d['Restaurant'];
                $finaldata['Restaurant'][$j]['typename'] = $this->RestaurantsType->find('all',array('conditions'=>array('RestaurantsType.id'=>  unserialize($d['Restaurant']['typeid']))));
                if (!empty($d['Favrest'])) {
                    $fav_rest_user = array();
                    foreach ($d['Favrest'] as $fav_rest) {
                        array_push($fav_rest_user, $fav_rest['user_id']);
                    }
                    if (isset($redata->user_id)) {
                        $set_as_fav = in_array($redata->user_id, $fav_rest_user);
                        if ($set_as_fav) {
                            $finaldata['Restaurant'][$j]['favrest'] = 1;
                        } else {
                            $finaldata['Restaurant'][$j]['favrest'] = 0;
                        }
                    } else {
                        $finaldata['Restaurant'][$j]['favrest'] = 0;
                    }
                } else {
                    $finaldata['Restaurant'][$j]['favrest'] = 0;
                }
                $j++;
            }

//            debug($finaldata);exit;
            if ($finaldata) {
                $response['isSuccess'] = "true";
                $response['data'] = $finaldata;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no final data available";
            }
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    /*
      DELIMITER $$

      DROP FUNCTION IF EXISTS `get_distance_in_miles_between_geo_locations` $$
      CREATE FUNCTION get_distance_in_miles_between_geo_locations(geo1_latitude decimal(10,6), geo1_longitude decimal(10,6), geo2_latitude decimal(10,6), geo2_longitude decimal(10,6))
      returns decimal(10,3) DETERMINISTIC
      BEGIN
      return ((ACOS(SIN(geo1_latitude * PI() / 180) * SIN(geo2_latitude * PI() / 180) + COS(geo1_latitude * PI() / 180) * COS(geo2_latitude * PI() / 180) * COS((geo1_longitude - geo2_longitude) * PI() / 180)) * 180 / PI()) * 60 * 1.1515);
      END $$

      DELIMITER ;

     */

    /**
     * @desc All restaurant listing in specific distance
     * @name All restaurant listing 
     * @link  get_distance_in_miles_between_geo_locations
     */
    public function api_restaurantslistb() {
        configure::write('debug', 0);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $lat = $redata->data->Restaurant->latitude; //=30.5389944;
        $long = $redata->data->Restaurant->longitude; //  =75.9550329;
        $response['pos']['lat'] = $lat;
        $response['pos']['lng'] = $long;
        if (!empty($redata)) {
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {
                $response['isSucess'] = "false";
                $response['msg'] = "There is no data available";
            } else {
                $data = $this->Restaurant->find('all', array(
                    "conditions" => array('Restaurant.reservation' => 1),
                    "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                    "ORDER BY" => 'DESC',
                ));
            }
            $cnt = count($data);
            for ($i = 0; $i < $cnt; $i++) {
                if ($data[$i][0]['distance'] < $this->distance) {
                    $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                } else {
                    unset($data[$i]);
                }
            }
            $finaldata = array();
            $j = 0;
            foreach ($data as $d) {
                $finaldata['Restaurant'][$j] = $d['Restaurant'];
                $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];

                if (!empty($d['Favrest'])) {
                    $fav_rest_user = array();
                    foreach ($d['Favrest'] as $fav_rest) {
                        array_push($fav_rest_user, $fav_rest['user_id']);
                    }
                    if (isset($redata->user_id)) {
                        $set_as_fav = in_array($redata->user_id, $fav_rest_user);
                        if ($set_as_fav) {
                            $finaldata['Restaurant'][$j]['favrest'] = 1;
                        } else {
                            $finaldata['Restaurant'][$j]['favrest'] = 0;
                        }
                    } else {
                        $finaldata['Restaurant'][$j]['favrest'] = 0;
                    }
                } else {
                    $finaldata['Restaurant'][$j]['favrest'] = 0;
                }

                $j++;
            }
            //debug($finaldata);exit;
            if ($finaldata) {
                $response['isSuccess'] = "true";
                $response['data'] = $finaldata;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    /**
     * @desc All restaurant listing in specific distance
     * @name All restaurant listing 
     * @link  get_distance_in_miles_between_geo_locations
     *   ob_start();
      // $postdata = file_get_contents("php://input");
      print_r($postdata );
      $c = ob_get_clean();
      $fc = fopen('files' . DS . 'detail.txt', 'w');
      fwrite($fc, $c);
      fclose($fc);
     * parameters: city, area, address, user_id. user_id to check whether user selects restaurant as favourite or not
     */
    public function api_restaurantslistbyaddb() {
        configure::write('debug', 0);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
//        ob_start();
//       $postdata = file_get_contents("php://input");
//      print_r($redata );
//      $c = ob_get_clean();
//      $fc = fopen('files' . DS . 'detail.txt', 'w');
//      fwrite($fc, $c);
//      fclose($fc);
//        $redata = (object)['city'=>'riyadh','area'=>'','address'=>'','user_id'=>1];
        if (!empty($redata)) {
            $address = $redata->city . ',' . $redata->area . ',' . $redata->address;
            $latlong = $this->getLetLong($address);
            //debug($latlong);
            $lat = $latlong['latitude'];
            $long = $latlong['longitude'];
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {
                $response['isSucess'] = "false";
                $response['msg'] = "There is no lat long available";
            } else {
                $data = $this->Restaurant->find('all', array(
                    "conditions" => array('Restaurant.reservation' => 1),
                    "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                    "ORDER BY" => 'DESC'
                ));
                //  debug($data);
            }
            $cnt = count($data);
            for ($i = 0; $i < $cnt; $i++) {
                if ($data[$i][0]['distance'] < $this->distance) {
                    $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                } else {
                    unset($data[$i]);
                }
            }
            $finaldata = array();
            $j = 0;
            foreach ($data as $d) {
                $finaldata['Restaurant'][$j] = $d['Restaurant'];
                $finaldata['Restaurant'][$j]['typename'] = $this->RestaurantsType->find('all',array('conditions'=>array('RestaurantsType.id'=>  unserialize($d['Restaurant']['typeid']))));
                if (!empty($d['Favrest'])) {
                    $fav_rest_user = array();
                    foreach ($d['Favrest'] as $fav_rest) {
                        array_push($fav_rest_user, $fav_rest['user_id']);
                    }
                    if (isset($redata->user_id)) {
                        $set_as_fav = in_array($redata->user_id, $fav_rest_user);
                        if ($set_as_fav) {
                            $finaldata['Restaurant'][$j]['favrest'] = 1;
                        } else {
                            $finaldata['Restaurant'][$j]['favrest'] = 0;
                        }
                    } else {
                        $finaldata['Restaurant'][$j]['favrest'] = 0;
                    }
                } else {
                    $finaldata['Restaurant'][$j]['favrest'] = 0;
                }
                $j++;
            }

//            debug($finaldata);exit;
            if ($finaldata) {
                $response['isSuccess'] = "true";
                $response['data'] = $finaldata;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no final data available";
            }
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    public function api_getresmenu() {
        configure::write('debug', 0);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        ob_start();
        print_r($redata);
        $c = ob_get_clean();
        $fc = fopen('files' . DS . 'detail.txt', 'w');
        fwrite($fc, $c);
        fclose($fc);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
        if (!empty($redata)) {
            $id = $redata->Restaurant->id;
            $this->loadModel("RestaurantsType");
            $this->loadModel("DishCategory");
            $this->loadModel("Product");
            $data = $this->Restaurant->find('all', array('conditions' => array('Restaurant.id' => $id)));
            foreach ($data as $d) {
                $d['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $d['Restaurant']['logo'];
                $res[] = $d['Restaurant'];
                $res[]['type'] = $d['RestaurantsType'];
                if (!empty($d['Favrest'])) {
                    $fav_rest_user = array();
                    foreach ($d['Favrest'] as $fav_rest) {
                        array_push($fav_rest_user, $fav_rest['user_id']);
                    }
                    if (isset($redata->user_id)) {
                        $set_as_fav = in_array($redata->user_id, $fav_rest_user);
                        if ($set_as_fav) {
                            $res[]['favrest'] = 1;
                        } else {
                            $res[]['favrest'] = 0;
                        }
                    } else {
                        $res[]['favrest'] = 0;
                    }
                } else {
                    $res[]['favrest'] = 0;
                }
            }
            $dishdata = $this->DishCategory->find('all');
            foreach ($dishdata as $d) {

                $d['DishCategory']['cnt'] = $this->Product->find('count', array('conditions' => array('AND' => array('Product.res_id' => $id, 'Product.dishcategory_id' => $d['DishCategory']['id'],'Product.sale'=>0))));
                if ($d['DishCategory']['cnt'] == 0) {
                    
                } else {
                    
                    $dataa[]['DishCategory'] = $d['DishCategory'];
                }
            }
              
             
               for ($i = 0; $i < count($dataa); $i++) {

                $dataa[$i]['DishCategory']['image'] = FULL_BASE_URL . $this->webroot . "files/catimage/" . $dataa[$i]['DishCategory']['image'];
               }
           // print_r($dataa);exit;
            if ($data) {
                $response['isSuccess'] = "true";
                $response['data'] = $res;
                $response['data']['cat'] = $dataa;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    public function api_dishsubcat() {
        configure::write('debug', 0);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        ob_start();
        print_r($redata);
        $c = ob_get_clean();
        $fc = fopen('files' . DS . 'detail.txt', 'w');
        fwrite($fc, $c);
        fclose($fc);
        $this->layout = "ajax";
        if (!empty($redata)) {
            $rid = $redata->Restaurant->id;
            ;
            $id = $redata->DishSubcat->id;
            $this->loadModel('DishSubcat');
            $data = $this->DishSubcat->find('all', array('conditions' => array('DishSubcat.dish_catid' => $id)));
            //debug($data); exit;
            $this->loadModel('Product');
            foreach ($data as $d) {
                $d['DishSubcat']['cnt'] = $this->Product->find('count', array('conditions' => array('AND' => array('Product.res_id' => $rid, 'Product.dishsubcat_id' => $d['DishSubcat']['id']))));

                if ($d['DishSubcat']['cnt'] == 0) {
                    
                } else {
                    $dataa[]['DishSubcat'] = $d['DishSubcat'];
                }
            }
             for ($i = 0; $i < count($dataa); $i++) {

                $dataa[$i]['DishSubcat']['image'] = FULL_BASE_URL . $this->webroot . "files/subcatimage/" . $dataa[$i]['DishSubcat']['image'];
               }
            //  debug($dataa);exit;
            if ($dataa) {
                $response['isSuccess'] = "true";
                $response['data'] = $dataa;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    public function api_restaurantbyid() {
        configure::write('debug', 0);

        $this->layout = "ajax";
        // $postdata = file_get_contents("php://input");
        // $redata = json_decode($postdata);

        $resid = $_REQUEST['res_id'];
        $ursid = $_REQUEST['user_id'];
        $long = $_REQUEST['longitude'];
        $lat = $_REQUEST['latitude'];

        //$resid=624;
       // if ($redata) {
            $this->Restaurant->recursive = 1;
            
            // $data = $this->Restaurant->find('first', array('conditions' => array('Restaurant.id' => $resid),"fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance")));

            $data = $this->Restaurant->find('first',
                        array(
                        'conditions' => array('Restaurant.id' => $resid),
                            "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*"),
                            "ORDER BY" => 'DESC',
                        ));

        $url = FULL_BASE_URL . $this->webroot . "files/restaurants/" ;
        if($data['Restaurant']['bannerone']!=""){
            $data['Restaurant']['bannerone']=$url.$data['Restaurant']['bannerone']; 
        }  
        if($data['Restaurant']['bannertwo']!=""){
            $data['Restaurant']['bannertwo']=$url.$data['Restaurant']['bannertwo'];
        } 
        if($data['Restaurant']['bannerthree']!=""){            
            $data['Restaurant']['bannerthree']=$url.$data['Restaurant']['bannerthree'];
        }   
        if($data['Restaurant']['bannerfour']!=""){           
        $data['Restaurant']['bannerfour']=$url.$data['Restaurant']['bannerfour'];  
        } 
        $type =  explode('XXX-',substr($data['Restaurant']['typeid'],4));
        
        if(count($type)==0){          
            $rest_type ="";
        }
        else{
            $cod= array();
            foreach($type as $key=>$value){
               $cod[]=  array('RestaurantsType.id' =>$value);
            }
            $main = array('OR' => $cod);
            $this->loadModel('RestaurantsType');
            $rest_type = $this->RestaurantsType->find('all',array('conditions' =>$main));
        } 
       
        $data['Restaurant']['typename'] = $rest_type;

            // $this->loadModel('RestaurantsType');
            // $data['Restaurant']['typename'] = $this->RestaurantsType->find('all', array('conditions' => array('RestaurantsType.id' => unserialize($data['Restaurant']['typeid']))));

                
            $response['data'] = $data['Restaurant'];
            $response['distance'] = $data[0]['distance'];

            if($response['data']==0){
                unset($response['data']);
                $response['isSucess'] = "false";
                $response['msg'] = "No data found";
            }
            else{
                $response['data']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data['Restaurant']['logo'];
               // $response['data']['typename'] = $data['RestaurantsType']['name'];
                
                if (!empty($data['Favrest'])) {
                    foreach ($data['Favrest'] as $fav_rest) {
                        $uid[] = $fav_rest['user_id'];
                    }

                    if (in_array($ursid, $uid)) {
                        $response['data']['favrest'] = 1;
                    } else {
                        $response['data']['favrest'] = 0;
                    }
                } else {
                    $response['data']['favrest'] = 0;
                }
                $response['isSucess'] = "true";
            }
        // }

        echo json_encode($response);
        // $this->render('ajax');
        exit;
    }
	
	public function api_deals(){
		 configure::write('debug', 0);
		    $this->layout = "ajax";
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $ursid = $redata->user_id; 
		$this->loadModel('Deal');	
		$zdata = $this->Deal->find('all', array('fields'=>'DISTINCT Deal.rid','conditions' => array('Deal.uid' => $ursid),'order'=>'Deal.id DESC'));
		//print_r($zdata);
		$t=0;
		foreach($zdata as $zdataz)
		{
			//$uidz = $zdataz['Deal']['uid'];
			$residz = $zdataz['Deal']['rid'];
			$datax[$t] = $this->Restaurant->find('all', array('conditions' => array('Restaurant.id' => $residz),'order'=>'Restaurant.id DESC'));
			$t++;
			//print_r($datax);
		}
		//print_r($datax);
			//echo 'sssssssssss';
		//,'limit' => 5
		//print_r($datax);
			   
			      if ($datax) {
            $response['isSuccess'] = "true";
            $response['data'] = $datax;
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }

        //debug($finaldata);exit;
        echo json_encode($response);
        $this->render('ajax');
        exit;
		
	}


    public function api_restaurantofferbyid() {
        configure::write('debug', 0);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $resid = $redata->Restaurant->id;

        if (!$resid) {
            $response['isSucess'] = "false";
            $response['msg'] = "There is no data available";
        } else {
            $this->loadModel('Offer');
            $data = $this->Offer->find('all', array('conditions' => array('Offer.res_id' => $resid)));
            $response['data'] = $data;
            for ($i = 0; $i < count($data); $i++)
                $response['data'][$i]['Offer']['image'] = FULL_BASE_URL . $this->webroot . "files/offers/" . $data[$i]['Offer']['image'];
            $response['isSucess'] = "true";
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    public function api_nearestofferbyadd() {
        configure::write('debug', 0);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
        if (!empty($redata)) {
            $address = $redata->city . ',' . $redata->area . ',' . $redata->address;
            $latlong = $this->getLetLong($address);
            $lat = $latlong['latitude'];
            $long = $latlong['longitude'];
            $this->loadModel("Offer");
            if ($lat == 0 || $long == 0) {
                $response['isSucess'] = "false";
                $response['msg'] = "There is no data available";
            } else {
                $data = $this->Restaurant->find('all', array(
                    "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*"),
                    "ORDER BY" => 'DESC',
                ));
            }
        }


        $cnt = count($data);
        for ($i = 0; $i < $cnt; $i++) {
            if ($data[$i][0]['distance'] >= $this->distance)
                unset($data[$i]);
            if (isset($data[$i]) && count($data[$i]['Offer']) <= 0)
                unset($data[$i]);
        }
        $final = array();
        foreach ($data as $d)
            array_push($final, $d);

        for ($i = 0; $i < count($final); $i++) {


            for ($j = 0; $j < count($final[$i]['Offer']); $j++) {
                $final[$i]['Offer'][$j]['image'] = FULL_BASE_URL . $this->webroot . "files/offers/" . $final[$i]['Offer'][$j]['image'];
            }
        }

        if ($final) {
            $response['isSuccess'] = "true";
            $response['data'] = $final;
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }

        //debug($finaldata);exit;
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    public function api_nearestofferbygeo() {
        configure::write('debug', 0);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        if (!empty($redata)) {
            $lat = $redata->data->Restaurant->latitude; //=30.5389944;
            $long = $redata->data->Restaurant->longitude; //  =75.9550329;
            $this->loadModel("Offer");
            if ($lat == 0 || $long == 0) {
                $response['isSucess'] = "false";
                $response['msg'] = "There is no data available";
            } else {
                $data = $this->Restaurant->find('all', array(
                    "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*"),
                    "ORDER BY" => 'DESC',
                ));
            }
        }


        $cnt = count($data);
        for ($i = 0; $i < $cnt; $i++) {
            if ($data[$i][0]['distance'] >= $this->distance)
                unset($data[$i]);
            if (isset($data[$i]) && count($data[$i]['Offer']) <= 0)
                unset($data[$i]);
        }
        $final = array();
        foreach ($data as $d)
            array_push($final, $d);

        for ($i = 0; $i < count($final); $i++) {
            for ($j = 0; $j < count($final[$i]['Offer']); $j++) {
                $final[$i]['Offer'][$j]['image'] = FULL_BASE_URL . $this->webroot . "files/offers/" . $final[$i]['Offer'][$j]['image'];
            }
        }

        if ($final) {
            $response['isSuccess'] = "true";
            $response['data'] = $final;
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }

        //debug($finaldata);exit;
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    public function api_filterbytype() {
        configure::write('debug', 0);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);

        if (!empty($redata)) {

            $lat = $redata->data->Restaurant->latitude; //=30.5389944;
            $long = $redata->data->Restaurant->longitude; //  =75.9550329;
            $distance = $redata->data->Restaurant->distance;
            $restype = $redata->data->Restaurant->restype;
            $alltype = $redata->data->Restaurant->alltype;
            $restype1 = $redata->data->Restaurant->restype1;
            $alltypein_array = explode(',', $alltype);
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {

                return false;
            } else {
                if ($alltypein_array[0] == 0) {
                    $data = $this->Restaurant->find('all', array(
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else if ($restype == 'Delivery' && $restype1 == '') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.delivery' => 1, 'Restaurant.typeid' => $alltypein_array)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } elseif ($restype1 == 'Takeaway' && $restype == '') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.takeaway' => 1, 'Restaurant.typeid' => $alltypein_array)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } elseif ($restype1 == 'Takeaway' && $restype == 'Delivery') {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.takeaway' => 1, 'Restaurant.delivery' => 1, 'Restaurant.typeid' => $alltypein_array)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('Restaurant.typeid' => $alltypein_array),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                }

                $cnt = count($data);
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i][0]['distance'] < $distance) {
                        $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                    } else {
                        unset($data[$i]);
                    }
                }
                $finaldata = array();
                $j = 0;
                foreach ($data as $d) {
                    $finaldata['Restaurant'][$j] = $d['Restaurant'];
                    $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                    $j++;
                }
            }
            if ($finaldata) {
                $response['error'] = "0";
                $response['Restaurant'] = $finaldata;
                $response['lat'] = $lat;
                $response['lng'] = $long;
                $response['dist'] = $distance;
            } else {
                $response['error'] = "0";
                $response['data'] = "null";
            }
        } else {
            $response['error'] = "0";
            $response['message'] = "There is no data available";
        }

        echo json_encode($response);
        exit;
    }

    public function api_frestaurantslistbyadd() {
        configure::write('debug', 2);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $this->Restaurant->recursive = 1;
        $this->layout = "ajax";
//        $redata = (object)['id'=>1,'user_id'=>1];
        if (!empty($redata)) {
            $area_id = $redata->id;
//            $db = $this->Restaurant->getDataSource();
//            $db->fullDebug = true;
            $data = $this->Restaurant->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'deliverable_areas',
                        'alias' => 'AreaJoin',
                        'type' => 'INNER',
                        'conditions' => array(
                            'AreaJoin.res_id = Restaurant.id',
                            'AreaJoin.area_id = "' . $area_id . '"'
                        )
                    ),
                    array(
                        'table' => 'favrests',
                        'alias' => 'Favrestt',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'Favrestt.res_id = Restaurant.id',
                            'Favrestt.user_id = "' . $redata->user_id . '"'
                        )
                    )
                ),
                'fields' => array('AreaJoin.*', 'Restaurant.*', 'Favrestt.*', 'RestaurantsType.*')
            ));

//            $log = $db->getLog();
//            print_r($log['log']);
//            debug($data); exit;
            $cnt = count($data);
            for ($i = 0; $i < $cnt; $i++) {

                $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
            }
            $finaldata = array();
            $j = 0;
            foreach ($data as $d) {
                $finaldata['Restaurant'][$j] = $d['Restaurant'];

                $finaldata['Restaurant'][$j]['typename'] = $this->RestaurantsType->find('all',array('conditions'=>array('RestaurantsType.id'=>  unserialize($d['Restaurant']['typeid']))));
                if ($d['Favrestt']['id'] != null) {
                    $finaldata['Restaurant'][$j]['favrest'] = 1;
                } else {
                    $finaldata['Restaurant'][$j]['favrest'] = 0;
                }

                $j++;
            }
//            debug($finaldata);exit;
            if ($finaldata) {
                $response['isSuccess'] = "true";
                $response['data'] = $finaldata;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    /**
     *  
     */
    public function api_frestaurantsbyaddname() {
        configure::write('debug', 2);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $this->Restaurant->recursive = 1;
        $this->layout = "ajax";
         ob_start();
        print_r($redata);
        $c = ob_get_clean();
        $fc = fopen('files' . DS . 'detail.txt', 'w');
        fwrite($fc, $c);
        fclose($fc);

        // $redata = (object)['id'=>2,'user_id'=>1,'resname'=>'A'];

        if ($redata) {
            $area_id = $redata->id;
            $res_name = $redata->resname;
//            $db = $this->Restaurant->getDataSource();
//            $db->fullDebug = true;
            $data = $this->Restaurant->find('all', array(
                'conditions' => array(
                    'Restaurant.name LIKE' => '%' . $res_name . '%',
                ),
                'joins' => array(
                    array(
                        'table' => 'deliverable_areas',
                        'alias' => 'AreaJoin',
                        'type' => 'INNER',
                        'conditions' => array(
                            'AreaJoin.res_id = Restaurant.id',
                            'AreaJoin.area_id = "' . $area_id . '"'
                        )
                    ),
                    array(
                        'table' => 'favrests',
                        'alias' => 'Favrestt',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'Favrestt.res_id = Restaurant.id',
                            'Favrestt.user_id = 1'
                        )
                    ),
                ),
                'fields' => array('AreaJoin.*', 'Restaurant.*', 'Favrestt.*', 'RestaurantsType.*')
            ));


//            $log = $db->getLog();
//            print_r($log['log']);
            // debug($data); exit;
            $cnt = count($data);
            for ($i = 0; $i < $cnt; $i++) {

                $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
            }
            $finaldata = array();
            $j = 0;
            foreach ($data as $d) {
                $finaldata['Restaurant'][$j] = $d['Restaurant'];

                $finaldata['Restaurant'][$j]['typename'] = $this->RestaurantsType->find('all',array('conditions'=>array('RestaurantsType.id'=>  unserialize($d['Restaurant']['typeid']))));
                if ($d['Favrestt']['id'] != null) {
                    $finaldata['Restaurant'][$j]['favrest'] = 1;
                } else {
                    $finaldata['Restaurant'][$j]['favrest'] = 0;
                }

                $j++;
            }
        }

            if ($finaldata) {
                $response['isSuccess'] = "true";
                $response['data'] = $finaldata;
            }
  else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
        
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    public function api_frestaurantsbyaddnameb() {
        configure::write('debug', 0);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
//        $redata = (object)['id'=>1,'user_id'=>1];
        if (!empty($redata)) {
            $address = $redata->city;
            $latlong = $this->getLetLong($address);
            //debug($latlong);
            $lat = $latlong['latitude'];
            $long = $latlong['longitude'];
            $res_name = $redata->resname;
//            $db = $this->Restaurant->getDataSource();
//            $db->fullDebug = true;
            $data = $this->Restaurant->find('all', array(
                'conditions' => array(
                    'Restaurant.name LIKE' => '%' . $res_name . '%',
                ),
                "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
            ));

//            $log = $db->getLog();
//            print_r($log['log']);
            //debug($data); exit;
            $cnt = count($data);
            for ($i = 0; $i < $cnt; $i++) {
                if ($data[$i][0]['distance'] < $this->distance) {
                    $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                } else {
                    unset($data[$i]);
                }
            }
            $finaldata = array();
            $j = 0;
            foreach ($data as $d) {
                $finaldata['Restaurant'][$j] = $d['Restaurant'];

                $finaldata['Restaurant'][$j]['typename'] = $this->RestaurantsType->find('all',array('conditions'=>array('RestaurantsType.id'=>  unserialize($d['Restaurant']['typeid']))));
                if ($d['Favrest']['id'] != null) {
                    $finaldata['Restaurant'][$j]['favrest'] = 1;
                } else {
                    $finaldata['Restaurant'][$j]['favrest'] = 0;
                }

                $j++;
            }
//            debug($finaldata);exit;
            if ($finaldata) {
                $response['isSuccess'] = "true";
                $response['data'] = $finaldata;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    public function api_favlist() {
        configure::write('debug', 2);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
        if (!empty($redata)) {
            $this->loadModel('RestaurantsType');
            $user_id = $redata->id;
            $data = $this->Restaurant->find('all', array(
                'joins' => array(
                    array(
                        'table' => 'favrests',
                        'alias' => 'favres',
                        'type' => 'INNER',
                        'conditions' => array(
                            'favres.res_id = Restaurant.id',
                            'favres.user_id = "' . $user_id . '"'
                        )
                    )
                ),
                'fields' => array('favres.*', 'Restaurant.*')
            ));
            $cnt = count($data);
            for ($i = 0; $i < $cnt; $i++) {
                $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
            }
        }
        $finaldata = array();
        $j = 0;
        foreach ($data as $d) {
            $finaldata['Restaurant'][$j] = $d['Restaurant'];
            $finaldata['Restaurant'][$j]['typename'] = $this->RestaurantsType->find('all',array('conditions'=>array('RestaurantsType.id'=>  unserialize($d['Restaurant']['typeid']))));
            $j++;
        }

        if ($finaldata) {
            $response['isSuccess'] = "true";
            $response['data'] = $finaldata;
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    public function api_likeit() {

        configure::write('debug', 0);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
        $this->loadModel('Favrest');
        if (!empty($redata)) {
            $user_id = $redata->User->id;
            $res_id = $redata->Restaurant->resid;
            $data = $this->Favrest->find('count', array('conditions' => array('AND' => array('Favrest.res_id' => $res_id, 'Favrest.user_id' => $user_id))));
            if ($data > 0) {
                $response['data'] = $this->Favrest->deleteAll(array('Favrest.res_id' => $res_id, 'Favrest.user_id' => $user_id));
                $response['error'] = "0";
            } else {
                $arr = array("res_id" => $res_id, "user_id" => $user_id);
                $response['data'] = $this->Favrest->save($arr);
                $response['error'] = "1";
            }
        } else {
            $response['error'] = 1;
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    public function api_tax() {

        configure::write('debug', 2);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $this->Restaurant->recursive = -1;
        $this->layout = "ajax";
        $this->loadModel('Tax');
        if (!empty($redata)) {
            $id = $redata->Restaurant->id;
            $response['error'] = 0;
            $response['data'] = $this->Tax->find('all', array('conditions' => array('Tax.resid' => $id)));
        } else {
            $response['error'] = 1;
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    public function api_mobilefilter() {
        configure::write('debug', 0);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        ob_start();
        print_r($redata);
        $c = ob_get_clean();
        $fc = fopen('files' . DS . 'detail.txt', 'w');
        fwrite($fc, $c);
        fclose($fc);
        $this->layout = "ajax";
        // exit;

        $this->Restaurant->recursive = 2;
        if ($redata) {
            $lat = $redata->data->Restaurant->latitude;
            $long = $redata->data->Restaurant->longitude;
            $this->loadModel("RestaurantsType");
            if ($lat == 0 || $long == 0) {
                return false;
            } else {
                if ($redata->data->Restaurant->typeid == null) {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.review_avg' => $redata->data->Restaurant->review_avg, 'Restaurant.delivery' => $redata->data->Restaurant->delivery, 'Restaurant.takeaway' => $redata->data->Restaurant->takeaway)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else if ($redata->data->Restaurant->review_avg == null) {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.typeid' => $redata->data->Restaurant->typeid, 'Restaurant.delivery' => $redata->data->Restaurant->delivery, 'Restaurant.takeaway' => $redata->data->Restaurant->takeaway)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else if ($redata->data->Restaurant->delivery == NULL) {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.typeid' => $redata->data->Restaurant->typeid, 'Restaurant.review_avg' => $redata->data->Restaurant->review_avg, 'Restaurant.takeaway' => $redata->data->Restaurant->takeaway)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else if ($redata->data->Restaurant->takeaway == NULL) {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.typeid' => $redata->data->Restaurant->typeid, 'Restaurant.review_avg' => $redata->data->Restaurant->review_avg, 'Restaurant.delivery' => $redata->data->Restaurant->delivery)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else if ($redata->data->Restaurant->typeid != null && $redata->data->Restaurant->review_avg != null && $redata->data->Restaurant->takeaway != NULL && $redata->data->Restaurant->delivery != NULL) {
                    $data = $this->Restaurant->find('all', array(
                        'conditions' => array('AND' => array('Restaurant.typeid' => $redata->data->Restaurant->typeid, 'Restaurant.review_avg' => $redata->data->Restaurant->review_avg, 'Restaurant.delivery' => $redata->data->Restaurant->delivery, 'Restaurant.takeaway' => $redata->data->Restaurant->takeaway)),
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                } else {
                    $data = $this->Restaurant->find('all', array(
                        "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                        "ORDER BY" => 'DESC',
                    ));
                }

                $cnt = count($data);
                for ($i = 0; $i < $cnt; $i++) {
                    if ($data[$i][0]['distance'] < $this->distance) {
                        $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                    } else {
                        unset($data[$i]);
                    }
                }
                $finaldata = array();
                $j = 0;
                foreach ($data as $d) {
                    $finaldata['Restaurant'][$j] = $d['Restaurant'];
                    $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                    $j++;
                }
            }
        }
        echo json_encode($finaldata);
        $this->render('ajax');
        exit;
    }

    public function admin_uploadimage() {
        //print_r($_FILES);
        if (!empty($_FILES)) {
            $image = $_FILES['file'];
            $uploadFolder = "restaurants";
            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            if ($image['error'] == 0) {
                $imageName = $image['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;
                move_uploaded_file($image['tmp_name'], $full_image_path);
            }
        }
    }

    public function admin_prouploadimage() {
        //print_r($_FILES);
        if (!empty($_FILES)) {
            $image = $_FILES['file'];
            $uploadFolder = "product";
            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            if ($image['error'] == 0) {
                $imageName = $image['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;
                move_uploaded_file($image['tmp_name'], $full_image_path);
            }
        }
    }

    public function admin_importres() {
        Configure::write("debug", "0");
        if (!empty($_FILES)) {
            $file = $_FILES['file'];
            $uploadFolder = "resfile";
            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            if ($file['error'] == 0) {
                $fileName = $file['name'];
                $full_image_path = $uploadPath . DS . $fileName;
                move_uploaded_file($file['tmp_name'], $full_image_path);
                $messages = $this->Restaurant->import($fileName);
                $this->Session->setFlash($messages['messages'][0]);
            }
        }


        //exit;
    }

    /*
      DELIMITER $$

      DROP FUNCTION IF EXISTS `get_distance_in_miles_between_geo_locations` $$
      CREATE FUNCTION get_distance_in_miles_between_geo_locations(geo1_latitude decimal(10,6), geo1_longitude decimal(10,6), geo2_latitude decimal(10,6), geo2_longitude decimal(10,6))
      returns decimal(10,3) DETERMINISTIC
      BEGIN
      return ((ACOS(SIN(geo1_latitude * PI() / 180) * SIN(geo2_latitude * PI() / 180) + COS(geo1_latitude * PI() / 180) * COS(geo2_latitude * PI() / 180) * COS((geo1_longitude - geo2_longitude) * PI() / 180)) * 180 / PI()) * 60 * 1.1515);
      END $$

      DELIMITER ;

     */

    /**
     * @desc All restaurant listing in specific distance
     * @name All restaurant listing 
     * @link  get_distance_in_miles_between_geo_locations
     */
    public function api_restaurantslistapp() {
        configure::write('debug', 0);
        $this->Restaurant->recursive = 2;
        $this->layout = "ajax";
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        $address = $redata->city . ',' . $redata->area . ',' . $redata->address;
        $latlong = $this->getLetLong($address);
        //debug($latlong);
        $lat = $latlong['latitude'];
        $long = $latlong['longitude'];
        if (!empty($redata)) {
            $this->loadModel("RestaurantsType");

            if ($lat == 0 || $long == 0) {
                $response['isSucess'] = "false";
                $response['msg'] = "There is no data available";
            } else {
                $data = $this->Restaurant->find('all', array(
                    "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,RestaurantsType.*"),
                    "ORDER BY" => 'DESC',
                ));
            }
            $cnt = count($data);
            for ($i = 0; $i < $cnt; $i++) {
                if ($data[$i][0]['distance'] < $this->distance) {
                    $data[$i]['Restaurant']['logo'] = FULL_BASE_URL . $this->webroot . "files/restaurants/" . $data[$i]['Restaurant']['logo'];
                } else {
                    unset($data[$i]);
                }
            }
            $finaldata = array();
            $j = 0;
            foreach ($data as $d) {
                $finaldata['Restaurant'][$j] = $d['Restaurant'];
                $finaldata['Restaurant'][$j]['typename'] = $d['RestaurantsType']['name'];
                $current_time = date("H:i:s", time());
                $sunrise = $d['Restaurant']['opening_time'];
                $sunset = $d['Restaurant']['closing_time'];
                $date1 = DateTime::createFromFormat('H:i:s', $current_time);
                $date2 = DateTime::createFromFormat('H:i:s', $sunrise);
                $date3 = DateTime::createFromFormat('H:i:s', $sunset);
                if ($date1 > $date2 && $date1 < $date3) {
                    $finaldata['Restaurant'][$j]['timestatus'] = "Open";
                } else {
                    $finaldata['Restaurant'][$j]['timestatus'] = "Closed";
                }

                $j++;
            }
            if ($finaldata) {
                $response['isSuccess'] = "true";
                $response['data'] = $finaldata;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "There is no data available";
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }

    public function admin_booked() {
        Configure::write("debug", 0);
        if ($this->request->is("post")) {
            $this->loadModel('Restable');
            $data = $this->request->data;
            $this->Restable->updateAll(array('Restable.booked' => $data['Restable']['booked']), array('Restable.res_id' => $data['Restable']['res_id'], 'Restable.tableno' => $data['Restable']['tableno']));
            return $this->redirect(array('action' => 'menudetai/' . $data['Restable']['res_id'] . '/' . $data['Restable']['tableno']));
        }
    }

    public function admin_uploadresimage($id = NULL) {
        configure::write("debug", 0);
              //echo $this->Session->read("resid");
//       exit;
        if (!empty($_FILES)) {
            $resid=$this->Session->read('resid');
            $image = $_FILES['file'];
            $uploadFolder = "restaurants";
            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            if ($image['error'] == 0) {
                $imageName = $image['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;
                move_uploaded_file($image['tmp_name'], $full_image_path);
                
                $this->loadModel('Gallery');
                $this->request->data['Gallery']['res_id'] =$id;
                $this->request->data['Gallery']['image'] = $imageName;
                $this->Gallery->create();
               // debug($this->request->data);
               $this->Gallery->save($this->request->data);
            }
        } else {
          //  $this->Session->write("resid", $id);
            $this->set('resid', $id);
            $this->loadModel('Gallery');
            $data = $this->Gallery->find('all', array('conditions' => array('Gallery.res_id' => $id)));
            $this->set('gallery', $data);
            
        }
       
    }

    public function admin_getresimage() {
        configure::write("debug", 0);
        $this->layout = "ajax";
        $id = $_POST['id'];
        $rid = $_POST['resid'];
        if ($_POST) {
            $this->loadModel('Gallery');
            $this->Gallery->id = $id;
            $this->Gallery->delete();
            return $this->redirect(array('controller' => 'restaurants', 'action' => 'uploadresimage/' . $rid));
        }
    }

    public function api_advancepayment() {
        $this->layout = "ajax";
        configure::write("debug", 0);
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        ob_start();
        print_r($redata);
        $c = ob_get_clean();
        $fc = fopen('files' . DS . 'detail.txt', 'w');
        fwrite($fc, $c);
        fclose($fc);
        $id = $redata->Table->id;
        $totol = $redata->paypal->total;
        $paymentid = $redata->paypal->paymentid;
        $pstatus = $redata->paypal->status;
        $this->loadModel('TableReservation');
        $d = $this->TableReservation->updateAll(array('TableReservation.total' => $totol, 'TableReservation.paymentid' => $paymentid, 'TableReservation.pstatus' => $pstatus), array('TableReservation.id' => $id));
        if ($d) {
            $response['isSuccess'] = "true";
            $response['data'] = $this->TableReservation->find('first',array('conditions'=>array('TableReservation.id' =>$id)));
        } else {
            $response['isSuccess'] = "false";
            $response['data'] = "no data";
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
        //$this->layout = "ajax";
    }
    

     public function api_getalltype() {
            
            $this->loadModel('RestaurantsType');
            $data = $this->RestaurantsType->find('all');
            if ($data) {
                $response['isSuccess'] = "true";
                $response['data'] = $data;
            }
            else{
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
        
        echo json_encode($response);
        //$this->render('ajax');
        exit;
    }
    
    public function api_mytestjob(){
        
        $this->loadModel('Restable');
            $resbook=$this->Restable->find('all',array('conditions'=>array('Restable.res_id'=>666,'Restable.booked'=>0)));
            if(empty($resbook)){
                $data['tid']="0";
                   
            }
            foreach($resbook as $resb){
              $this->Restable->updateAll(array('Restable.booked'=>1),array('Restable.res_id'=>$resb['Restable']['res_id'],'Restable.tableno'=>$resb['Restable']['tableno']));  
            
                 $data['tid']=$resb['Restable']['tableno']; 
             
              break;
            }            
        $response['isSuccess'] = "true";
        $response['data'] = $data;
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }
     public function api_promocode(){
        configure::write("debug", 0);
        $this->layout = "ajax";      
        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        if($redata){   
        $pcode=$redata->order->orderid;
        $this->loadModel('Promocode');
        $d=$this->Promocode->find('first',array('Promocode.orderid'=>$pcode));
        if($d){            
        $response['isSuccess'] = "true";
        $response['data'] = $pcode;
        $response['promocode'] = base64_decode($d['Promocode']['promocode']);
        }else {
        $response['isSuccess'] = "false";
        $response['data'] = '0';     
        }
        }
        echo json_encode($response);
        $this->render('ajax');
        exit;
    }
	
	public function orderhistory() {
		$this->loadModel('Order');
		$this->loadModel('Review');
		configure::write("debug", 0);
		$uid = $this->Auth->user('id');	
		$orderid = $this->Order->find('all',array(
		'conditions' => array('Order.uid' => $uid), //array of conditions
		'recursive' => 1, //int
		'order' => 'Order.id DESC',
		'limit' => 3,
		'recursive' => 4
		));	
		
		$reviewid = $this->Review->find('all',array(
		'conditions' => array('Review.uid' => $uid), //array of conditions
		'recursive' => 1, //int
		'order' => 'Review.id DESC',
		));
		
		$this->loadModel('Tax');

		$this->set('myorder',$orderid);
		$this->set('reviewid',$reviewid);
		//print_r($orderid); 
		 //echo $idxx = $orderid[0]['Order']['id'];
		 //$this->Order->updateAll(array('Order.dl_status' => 2), array('Order.id' => $idxx));  
		}
		

		public function ordercancel($id) {
		$this->loadModel('Order');
		configure::write("debug", 0);
		
		$this->Order->updateAll(array('Order.dl_status' => 2), array('Order.id' => $id)); 
		 //$this->redirect(array('controller' => 'Order', 'action' => 'orderhistory'));
		 echo "<script>window.location.assign('http://readytodropin.com/restaurants/orderhistory')</script>";
		}
		//$uid = $this->Auth->user('id');	
		public function admin_canceltime() { 
		$this->loadModel('Tax'); 
		 $resr_list = $this->Restaurant->find('list');
		 $this->set('restlist',$resr_list);
		
		if ($this->request->is('post')) {
        $cancel_timenew = $this->request->data['Restaurant']['cancel_time'];
		$residnew = $this->request->data['Restaurant']['resid'];
		
       @$rest_idzz = $this->Tax->find('first',array('conditions'=>array('Tax.resid'=>$residnew)));
	    $rest_idzz['Tax']['resid'];
		if($rest_idzz['Tax']['resid']){
	$upd = $this->Tax->updateAll(array('Tax.cancel_time' => $cancel_timenew),array('Tax.resid'=>$residnew));
			//$this->Review->save($this->request->data);
		}
		else{
			@$rest_surcharge = $this->Tax->find('first');
			//print_r($rest_surcharge);
			//echo $rest_surcharge['Tax']['surcharge'];
			$this->request->data['Tax']['tax'] = 0;
			$this->request->data['Tax']['surcharge'] = $rest_surcharge['Tax']['surcharge'];
			$this->request->data['Tax']['resid'] = $residnew;
			$this->request->data['Tax']['cancel_time'] = $cancel_timenew; 
			//$this->Tax->create();
			$this->Tax->save($this->request->data);
			
		
       // print_r( $upd);
        if($upd){
                        
         $this->Session->setFlash(__('The Cancel time has been saved.'));  
        }else{ 
        $this->Session->setFlash(__('The Cancel time could not be saved. Please, try again.')); 
        }
        }
		
         @$surcharge = $this->Tax->find('first',array('conditions'=>array('Tax.resid'=>$residnew)));
		 @$rest_idz = $this->Restaurant->find('first',array('conditions'=>array('Restaurant.id'=>$residnew)));
        // print_r($surcharge);
         @$this->Session->setFlash(__('Your current Cancel time is '. $surcharge['Tax']['cancel_time']));  
            @$msgg = 'Your current Cancel time is '. $surcharge['Tax']['cancel_time'].' minutes and restaurant name is '.$rest_idz['Restaurant']['name'];
			if(@$surcharge['Tax']['cancel_time'] and @$rest_idz['Restaurant']['name']){  
            $this->set('msgg',$msgg);
			}
			}else{ 
        $this->Session->setFlash(__('Please enter Cancel time')); 
        }
		} 
	
	
	
	
	
	public function admin_canceltimebyrest() { 
		 $uid = $this->Auth->user('id');
		 @$rest_idzz = $this->Restaurant->find('first',array('conditions'=>array('Restaurant.user_id'=>$uid)));
		 $rest_id_get = $rest_idzz['Restaurant']['id'];
		// print_r($rest_idzz);
		// exit;
		 
		$this->loadModel('Tax'); 		
		if ($this->request->is('post')) {
        $cancel_timenew = $this->request->data['Restaurant']['cancel_time'];
		//$residnew = $this->request->data['Restaurant']['resid'];
		
       @$rest_idzz = $this->Tax->find('first',array('conditions'=>array('Tax.resid'=>$rest_id_get)));
	    $rest_idzz['Tax']['resid'];
		if($rest_idzz['Tax']['resid']){
	$upd = $this->Tax->updateAll(array('Tax.cancel_time' => $cancel_timenew),array('Tax.resid'=>$rest_id_get));
			//$this->Review->save($this->request->data);
		}
		else{
			@$rest_surcharge = $this->Tax->find('first');
			//print_r($rest_surcharge);
			//echo $rest_surcharge['Tax']['surcharge'];
			$this->request->data['Tax']['tax'] = 0;
			$this->request->data['Tax']['surcharge'] = $rest_surcharge['Tax']['surcharge'];
			$this->request->data['Tax']['resid'] = $rest_id_get;
			$this->request->data['Tax']['cancel_time'] = $cancel_timenew; 
			//$this->Tax->create();
			$this->Tax->save($this->request->data);
			
		
       // print_r( $upd);
        if($upd){
                        
         $this->Session->setFlash(__('The Cancel time has been saved.'));  
        }else{ 
        $this->Session->setFlash(__('The Cancel time could not be saved. Please, try again.')); 
        }
        }
		
         @$surcharge = $this->Tax->find('first',array('conditions'=>array('Tax.resid'=>$rest_id_get)));
		 @$rest_idz = $this->Restaurant->find('first',array('conditions'=>array('Restaurant.id'=>$rest_id_get)));
        // print_r($surcharge);
         @$this->Session->setFlash(__('Your current Cancel time is '. $surcharge['Tax']['cancel_time']));  
            @$msgg = 'Your current Cancel time is '. $surcharge['Tax']['cancel_time'].' minutes and restaurant name is '.$rest_idz['Restaurant']['name'];
			if(@$surcharge['Tax']['cancel_time'] and @$rest_idz['Restaurant']['name']){  
            $this->set('msgg',$msgg);
			}
			}else{ 
        $this->Session->setFlash(__('Please enter Cancel time')); 
        }
		} 
	
	
	
	
	
	
	public function changepassword() {
	}
	
	public function reservationhistory() {		
		$this->loadModel('Order');		
		$uid = $this->Auth->user('id');		
		$this->set('myorderdetails',$this->Order->find('all',array(
		'conditions' => array('Order.uid' => $uid,'Order.delivery_status'=>0), //array of conditions
		'recursive' => 1, //int
		'order' => 'Order.id DESC',
		'limit' => 5,
		)));
	}
	
	public function res_review($id) {
		
		    $this->loadModel('Review');
            $this->request->data['Review']['resid'] = $id;
            $this->request->data['Review']['name'] = '0'; //$_POST['name_review'];
            $this->request->data['Review']['email'] = '0'; // $_POST['email_review'];
            $this->request->data['Review']['food_quality'] = '0'; // $_POST['food_review'];
            $this->request->data['Review']['price'] = '0'; // $_POST['price_review'];
            $this->request->data['Review']['punctuality'] = $_POST['punctuality_review'];
            $this->request->data['Review']['courtesy'] = '0'; // $_POST['courtesy_review'];
            $this->request->data['Review']['text'] = $_POST['review_text'];
            $this->request->data['Review']['uid'] = $this->Auth->user('id');
			
			$result = $this->Review->find('first', array('conditions' => array('uid' => $this->Auth->user('id'),'resid' => $id)));
			if(!empty($result)){
			echo "<script>alert('already rated!!!')</script>";
			echo "<script>window.location.assign('$this->newbaseurl/restaurants/orderhistory')</script>";
			}
			
			/*$conditions = array( 'Review.uid' => 481);
			
			if ($this->exists($conditions) > 0) {

			echo "<script>alert('Username already exist!!!')</script>";
			}*/else{
			
			
			/*if ($this->User->hasAny(array('Review.uid' => $this->Auth->user('id'),'Review.resid' => $id))) {

				echo "<script>alert('Username already exist!!!')</script>";
				/*echo "<script>window.location.assign('http://readytodropin.com/')</script>";*/

           // }
			
			
			
			$this->Review->save($this->request->data);
			echo "<script>alert('Thanks for Rating and Comments');</script>";
			echo "<script>window.location.assign('$this->newbaseurl/restaurants/orderhistory')</script>";
			
	}}
	
	public function map() {
		echo 'aaaaaaaaaaaaaaaa';
	}
	
	public function orderdetail($order_id = null){
		$this->loadModel('Order');		
	
		$orderid = $this->Order->find('all',array(
		'conditions' => array('Order.id' => $order_id), //array of conditions
		'recursive' => 1, //int
		));	
		
		
	$this->set('order_id',$order_id);
	$this->set('orderid',$orderid);
	}
	

    public function api_searchbynameresturent(){

        configure::write('debug', 2);
       // $this->Restaurant->recursive = 2;

        $lat = $_REQUEST['latitude'];
        $long = $_REQUEST['longitude'];
        $name = $_REQUEST['name'];
        $response['pos']['lat'] = $lat;//= 31.3260152;
        $response['pos']['lat'] = $lat;//= 31.3260152;
        $response['name'] = $name;// =75.5761829;
   
      
        
        //$this->loadModel("RestaurantsType");

            if ($lat == 0 || $long == 0) {
                $response['isSucess'] = "false";
                $response['msg'] = "There is no data available";
            } else {
                $url = FULL_BASE_URL . $this->webroot . "files/restaurants/" ;
                
                $this->distance = 62.1371;
                  $maindistance =$this->distance;
               
                $sql = "";
                if($name!=""){
                    $sql.=" WHERE Restaurant.name LIKE '".$name."%' ";
                }


                if(isset($_REQUEST['type'])){
                	$sql.= " AND (";                	 
			              	$type = explode('--', $_REQUEST['type']);
			                	for($kp=0;$kp<count($type);$kp++){
			                		if($type[$kp]!=""){
			                			if($kp==0){
			                				$sql.= "Restaurant.typeid LIKE '%XXX-".$type[$kp]."%'";
				                		} 
				                		else{
				                			$sql.= " OR Restaurant.typeid LIKE '%XXX-".$type[$kp]."%'";
				                		}	
			                		}                		
			                	}			             
                	$sql .= " ) ";
                }
        


                 $data = $this->Restaurant->query("SELECT get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance, CONCAT('https://rakesh.crystalbiltech.com/freedrink/files/restaurants/', Restaurant.logo ) AS logo,Restaurant.* FROM  `rakesh_freedrink`.`restaurants` AS  `Restaurant` $sql");
                   
            }

            $finaldata = array();
            $j = 0;
            
            foreach ($data as $d) {

                $d['Restaurant']['distance'] = $d[0]['distance'];
                $d['Restaurant']['logo'] = $d[0]['logo']; 
                if($d['Restaurant']['bannerone']!=""){
                    $d['Restaurant']['bannerone']=$url.$d['Restaurant']['bannerone']; 
                }  
                if($d['Restaurant']['bannertwo']!=""){
                    $d['Restaurant']['bannertwo']=$url.$d['Restaurant']['bannertwo'];
                } 
                if($d['Restaurant']['bannerthree']!=""){            
                    $d['Restaurant']['bannerthree']=$url.$d['Restaurant']['bannerthree'];
                }   
                if($d['Restaurant']['bannerfour']!=""){           
                $d['Restaurant']['bannerfour']=$url.$d['Restaurant']['bannerfour'];  
                } 

                $type =  explode('XXX-',substr($d['Restaurant']['typeid'],4));
                if(count($type)==0){                   
                    $alltype ="";
                }
                else{
                    $cod= array();
                    foreach($type as $key=>$value){
                       $cod[]=  array('RestaurantsType.id' =>$value);
                    }
                    $main = array('OR' => $cod);
                    $this->loadModel('RestaurantsType');
                    $alltype = $this->RestaurantsType->find('all',array('conditions' =>$main)); 
                }

                $finaldata['Restaurant'][$j] = $d['Restaurant'];
                $finaldata['Restaurant'][$j]['typename'] = $alltype;

                if (!empty($d['Favrest'])) {
                    $fav_rest_user = array();
                    foreach ($d['Favrest'] as $fav_rest) {
                        array_push($fav_rest_user, $fav_rest['user_id']);
                    }

                    if (isset($redata->user_id)) {
                        $set_as_fav = in_array($redata->user_id, $fav_rest_user);
                        if ($set_as_fav) {
                            $finaldata['Restaurant'][$j]['favrest'] = 1;
                        } else {
                            $finaldata['Restaurant'][$j]['favrest'] = 0;
                        }
                    } else {
                        $finaldata['Restaurant'][$j]['favrest'] = 0;
                    }
                } else {
                    $finaldata['Restaurant'][$j]['favrest'] = 0;
                }

                $j++;
            }
            //debug($finaldata);exit;
            if ($finaldata) {
                $response['isSuccess'] = "true";
                $response['data'] = $finaldata;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
       
        echo json_encode($response);
        
        exit;    
    }


    public function admin_plans() {
    	$this->loadModel('SubscriptionPlan');
     	$resp = $this->SubscriptionPlan->find('all');
        $this->set('staticpages', $resp);
	}

	public function admin_planview($id=null) {
    	$this->loadModel('SubscriptionPlan');
    	$this->SubscriptionPlan->id = $id;

        if (!$this->SubscriptionPlan->exists()) {

            throw new NotFoundException(__('Invalid Plan'));

        }

     	$resp = $this->SubscriptionPlan->find('first',array('conditions' => array('SubscriptionPlan.id'=>$id)));
        
        $this->set('staticpage', $resp);
	}

	public function admin_planedit($id = null) {
		$this->loadModel('SubscriptionPlan');

		$this->SubscriptionPlan->id = $id;

        if (!$this->SubscriptionPlan->exists()) {

            throw new NotFoundException(__('Invalid Plan'));

        }

        if ($this->request->is('post') || $this->request->is('put')) {

        	$bannerone= $this->request->data['SubscriptionPlan']['image'];

 			if ($bannerone['error'] == 0) {
 				$uploadFolder = "restaurants";
          		$uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
          		  $url = FULL_BASE_URL . $this->webroot . "files/restaurants/" ;

                $imageName = $bannerone['name'];
                if (file_exists($uploadPath . DS . $imageName)) {
                    $imageName = date('His') . $imageName;
                }
                $full_image_path = $uploadPath . DS . $imageName;

                $this->request->data['SubscriptionPlan']['image'] = $url.$imageName;               
                move_uploaded_file($bannerone['tmp_name'], $full_image_path);
            }else {
                   unset($this->request->data['SubscriptionPlan']['image']);
            }

				$this->request->data['SubscriptionPlan']['id']=$id;
			if($this->SubscriptionPlan->save($this->request->data)) {

                $this->Session->setFlash(__('The Plan has been saved'));

                $this->redirect(array('action' => 'admin_plans'));

            } else {

                $this->Session->setFlash(__('The Plan could not be saved. Please, try again.'));

            }

        } else {

            $this->request->data = $this->SubscriptionPlan->read(null, $id);

        }

        $this->set('admin_edit', $this->SubscriptionPlan->find('first', array('conditions' => array('SubscriptionPlan.id' => $id))));

    }

    public function api_searchbycity(){
        
        configure::write('debug', 2);
       // $this->Restaurant->recursive = 2;

        $lat = $_REQUEST['latitude'];
        $long = $_REQUEST['longitude'];
        $name = $_REQUEST['city'];
        $response['pos']['lat'] = $lat;//= 31.3260152;
        $response['pos']['lat'] = $lat;//= 31.3260152;
        $response['name'] = $name;// =75.5761829;
   
      
        //$this->loadModel("RestaurantsType");

            if ($lat == 0 || $long == 0) {
                $response['isSucess'] = "false";
                $response['msg'] = "There is no data available";
            } else {
                $url = FULL_BASE_URL . $this->webroot . "files/restaurants/" ;
                
                $this->distance = 62.1371;

                $maindistance =$this->distance;
               
                $sql = "";
                if($name!=""){
                    $sql.=" WHERE Restaurant.city LIKE '".$name."%' ";
                    // $sql.=" WHERE Restaurant.city LIKE '%".$name."%' ";
                }

                if(isset($_REQUEST['type'])){
                    $sql.= " AND (";                     
                            $type = explode('--', $_REQUEST['type']);
                                for($kp=0;$kp<count($type);$kp++){
                                    if($type[$kp]!=""){
                                        if($kp==0){
                                            $sql.= "Restaurant.typeid LIKE '%XXX-".$type[$kp]."%'";
                                        } 
                                        else{
                                            $sql.= " OR Restaurant.typeid LIKE '%XXX-".$type[$kp]."%'";
                                        }   
                                    }                       
                                }                        
                    $sql .= " ) ";
                }
        


                 $data = $this->Restaurant->query("SELECT get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance, CONCAT('https://rakesh.crystalbiltech.com/freedrink/files/restaurants/', Restaurant.logo ) AS logo,Restaurant.* FROM  `rakesh_freedrink`.`restaurants` AS  `Restaurant` $sql");
                   
            }

            $finaldata = array();
            $j = 0;
            
            foreach ($data as $d) {

                $d['Restaurant']['distance'] = $d[0]['distance'];
                $d['Restaurant']['logo'] = $d[0]['logo']; 
                if($d['Restaurant']['bannerone']!=""){
                    $d['Restaurant']['bannerone']=$url.$d['Restaurant']['bannerone']; 
                }  
                if($d['Restaurant']['bannertwo']!=""){
                    $d['Restaurant']['bannertwo']=$url.$d['Restaurant']['bannertwo'];
                } 
                if($d['Restaurant']['bannerthree']!=""){            
                    $d['Restaurant']['bannerthree']=$url.$d['Restaurant']['bannerthree'];
                }   
                if($d['Restaurant']['bannerfour']!=""){           
                $d['Restaurant']['bannerfour']=$url.$d['Restaurant']['bannerfour'];  
                } 

                $type =  explode('XXX-',substr($d['Restaurant']['typeid'],4));
                if(count($type)==0){                   
                    $alltype ="";
                }
                else{
                    $cod= array();
                    foreach($type as $key=>$value){
                       $cod[]=  array('RestaurantsType.id' =>$value);
                    }
                    $main = array('OR' => $cod);
                    $this->loadModel('RestaurantsType');
                    $alltype = $this->RestaurantsType->find('all',array('conditions' =>$main)); 
                }

                $finaldata['Restaurant'][$j] = $d['Restaurant'];
                $finaldata['Restaurant'][$j]['typename'] = $alltype;

                if (!empty($d['Favrest'])) {
                    $fav_rest_user = array();
                    foreach ($d['Favrest'] as $fav_rest) {
                        array_push($fav_rest_user, $fav_rest['user_id']);
                    }

                    if (isset($redata->user_id)) {
                        $set_as_fav = in_array($redata->user_id, $fav_rest_user);
                        if ($set_as_fav) {
                            $finaldata['Restaurant'][$j]['favrest'] = 1;
                        } else {
                            $finaldata['Restaurant'][$j]['favrest'] = 0;
                        }
                    } else {
                        $finaldata['Restaurant'][$j]['favrest'] = 0;
                    }
                } else {
                    $finaldata['Restaurant'][$j]['favrest'] = 0;
                }

                $j++;
            }
            //debug($finaldata);exit;
            if ($finaldata) {
                $response['isSuccess'] = "true";
                $response['data'] = $finaldata;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
       
        echo json_encode($response);
        
        exit;    
    
    }
    
    public function admin_planhist(){
        configure::write('debug',0); 
        $this->loadModel('UserPlan');
        $this->UserPlan->recursive = 2;
        $plans = $this->UserPlan->find('all');
        $this->set('plan',$plans); 
            // print_r($plans);exit;
    }

    public function admin_earned(){

        $this->loadModel('UserCoupon');
        $this->UserCoupon->recursive = 2;
        $plans = $this->UserCoupon->find('all',array('fields'=>'UserCoupon.*,(SELECT count(*) FROM `user_coupons` where invited_by = UserCoupon.invited_by and status=1) as counter','conditions'=>array('status'=>1),'group'=>'invited_by'));
      
        $this->set('plan',$plans); 
            // print_r($plans);exit;
    }
    
    public function admin_drinkhist(){
        configure::write('debug',0); 
        $this->loadModel('UserDrink');
        $this->UserDrink->recursive = 2;
        $plans = $this->UserDrink->find('all');
        //print_r($plans);exit; 
        $this->set('plan',$plans); 
        
    }

    public function api_topbar(){
          configure::write('debug', 2);
       // $this->Restaurant->recursive = 2;

        $lat = $_REQUEST['latitude'];
        $long = $_REQUEST['longitude'];
       
        $response['pos']['lat'] = $lat;//= 31.3260152;
        $response['pos']['lat'] = $lat;//= 31.3260152;
      
   
      
        
        //$this->loadModel("RestaurantsType");

            if ($lat == 0 || $long == 0) {
                $response['isSucess'] = "false";
                $response['msg'] = "There is no data available";
            } else {
                $url = FULL_BASE_URL . $this->webroot . "files/restaurants/" ;
                $maindistance =$this->distance;
               
                $sql = "";
                
                    $sql.=" WHERE Restaurant.is_featured = 1 ";
               


                if(isset($_REQUEST['type'])){
                	$sql.= " AND (";                	 
			              	$type = explode('--', $_REQUEST['type']);
			                	for($kp=0;$kp<count($type);$kp++){
			                		if($type[$kp]!=""){
			                			if($kp==0){
			                				$sql.= "Restaurant.typeid LIKE '%XXX-".$type[$kp]."%'";
				                		} 
				                		else{
				                			$sql.= " OR Restaurant.typeid LIKE '%XXX-".$type[$kp]."%'";
				                		}	
			                		}                		
			                	}			             
                	$sql .= " ) ";
                }
        


                 $data = $this->Restaurant->query("SELECT get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance, CONCAT('https://rakesh.crystalbiltech.com/freedrink/files/restaurants/', Restaurant.logo ) AS logo,Restaurant.* FROM  `rakesh_freedrink`.`restaurants` AS  `Restaurant` $sql");
                   
            }

            $finaldata = array();
            $j = 0;
            
            foreach ($data as $d) {

                $d['Restaurant']['distance'] = $d[0]['distance'];
                $d['Restaurant']['logo'] = $d[0]['logo']; 
                if($d['Restaurant']['bannerone']!=""){
                    $d['Restaurant']['bannerone']=$url.$d['Restaurant']['bannerone']; 
                }  
                if($d['Restaurant']['bannertwo']!=""){
                    $d['Restaurant']['bannertwo']=$url.$d['Restaurant']['bannertwo'];
                } 
                if($d['Restaurant']['bannerthree']!=""){            
                    $d['Restaurant']['bannerthree']=$url.$d['Restaurant']['bannerthree'];
                }   
                if($d['Restaurant']['bannerfour']!=""){           
                $d['Restaurant']['bannerfour']=$url.$d['Restaurant']['bannerfour'];  
                } 

                $type =  explode('XXX-',substr($d['Restaurant']['typeid'],4));
                if(count($type)==0){                   
                    $alltype ="";
                }
                else{
                    $cod= array();
                    foreach($type as $key=>$value){
                       $cod[]=  array('RestaurantsType.id' =>$value);
                    }
                    $main = array('OR' => $cod);
                    $this->loadModel('RestaurantsType');
                    $alltype = $this->RestaurantsType->find('all',array('conditions' =>$main)); 
                }

                $finaldata['Restaurant'][$j] = $d['Restaurant'];
                $finaldata['Restaurant'][$j]['typename'] = $alltype;

                if (!empty($d['Favrest'])) {
                    $fav_rest_user = array();
                    foreach ($d['Favrest'] as $fav_rest) {
                        array_push($fav_rest_user, $fav_rest['user_id']);
                    }

                    if (isset($redata->user_id)) {
                        $set_as_fav = in_array($redata->user_id, $fav_rest_user);
                        if ($set_as_fav) {
                            $finaldata['Restaurant'][$j]['favrest'] = 1;
                        } else {
                            $finaldata['Restaurant'][$j]['favrest'] = 0;
                        }
                    } else {
                        $finaldata['Restaurant'][$j]['favrest'] = 0;
                    }
                } else {
                    $finaldata['Restaurant'][$j]['favrest'] = 0;
                }

                $j++;
            }
            //debug($finaldata);exit;
            if ($finaldata) {
                $response['isSuccess'] = "true";
                $response['data'] = $finaldata;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }
       
        echo json_encode($response);
        
        exit;    
    
    }


}