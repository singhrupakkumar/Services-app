<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class SplitpaymentsController extends AppController {

//////////////////////////////////////////////////
    public $components = array(
        'Cart'
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->disableCache();
        // $this->Auth->allow('');
    }

    /**
     * 
     * @param type $id
     * @throws NotFoundException
     */
    public function admin_tableview($id = NULL) {
        Configure::write("debug", 0);
        $this->layout = "admin";
        $this->loadModel('Product');
        $this->loadModel('Cart');
        $this->loadModel('Restaurant');
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
     * 
     * @param type $id
     * @param type $table
     * @throws NotFoundException
     */
    public function admin_menudetai($id = null, $table = null) {
        Configure::write('debug', 0);
        $this->Restaurant->recursive = 2;
        $this->loadModel('DishCategory');
        $this->loadModel('Product');
        $this->loadModel('Restaurant');
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

    /**
     * cartdetail method
     *
     * @throws NotFoundException
     * @param string $id
     * @param string $id
     * @return void
     */
    public function admin_cartdetail($id = null, $table = null, $dishid = NULL) {
        $this->loadModel('Restaurant');
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

    public function admin_ConfirmOrder() {
        Configure::write("debug", 2);
        if($this->request->is("post")){
        $id=$this->request->data['TableReservation']['id'];
        $this->loadModel('TableReservation');
        $this->loadModel('Order');
        $TableReservation=$this->TableReservation->find('first',array('conditions'=>array('TableReservation.id'=>$id)));
        $uid=$TableReservation['TableReservation']['uid'];
        $this->loadModel('User');
        $UserData=$this->User->find('first',array('conditions'=>array('User.id'=>$uid)));
        if($UserData['User']['email']){
            $email=$UserData['User']['email'];
        }else {
            $email=$UserData['User']['username'];
        } 
        $shop=$this->Session->read('Shop');
        $order = $shop;
        $order['Order']['status'] = 1;
        $order['Order']['order_type'] = "TR";
        $save = $this->Order->saveAll($order, array('validate' => 'first'));
        if ($save) {
            $this->set(compact('shop'));
            $email = new CakeEmail();
            $email->from('restaurants@test.com')
                    ->cc('ashutosh@avainfotech.com')
                    ->to('ashutosh@avainfotech.com')
                    ->subject('Shop Order')
                    ->template('order')
                    ->emailFormat('html')
                    ->viewVars(array('shop' => $shop))
                    ->send('html');
            return $this->redirect(array('action' => 'success'));
        } else {
            $errors = $this->Order->invalidFields();
            $this->set(compact('errors'));
        }
        }
    }
    public function admin_success() {
        $shop = $this->Session->read('Shop');
        $this->Cart->clear();
        if (empty($shop)) {
            return $this->redirect('/admin');
        }
        $this->set(compact('shop'));
    }
    
}
