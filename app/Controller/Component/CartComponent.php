<?php

class CartComponent extends Component {

//////////////////////////////////////////////////

    public $components = array('Session');
//////////////////////////////////////////////////

    public $controller;

//////////////////////////////////////////////////

    public function __construct(ComponentCollection $collection, $settings = array()) {
        $this->controller = $collection->getController();
        parent::__construct($collection, array_merge($this->settings, (array) $settings));
    }

//////////////////////////////////////////////////

    public function startup(Controller $controller) {
        //$this->controller = $controller;
    }

//////////////////////////////////////////////////

    public $maxQuantity = 99;

//////////////////////////////////////////////////
     public function adminaddqr($id=NULL, $quantity = NULL, $productmodId = NULL, $tid = NULL) {
                  
        if ($productmodId) {
            $productmod = ClassRegistry::init('Productmod')->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                   'AND'=>array(
                    'Productmod.id' => $productmodId,
                    'Productmod.product_id' => $id
                ))
            ));
        }

        if (!is_numeric($quantity)) {
            $quantity = 1;
        }

        $quantity = abs($quantity);

        if ($quantity > $this->maxQuantity) {
            $quantity = $this->maxQuantity;
        }

        if ($quantity == 0) {
            $this->remove($id);
            return;
        }

        $product = $this->controller->Product->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Product.id' => $id
            )
        ));
      
        if (empty($product)) {
            return false;
        }

        if ($this->Session->check('Shop.OrderItem.' . $id . '.Product.productmod_name')) {
            $productmod['Productmod']['id'] = $this->Session->read('Shop.OrderItem.' . $id . '.Product.productmod_id');
            $productmod['Productmod']['name'] = $this->Session->read('Shop.OrderItem.' . $id . '.Product.productmod_name');
            $productmod['Productmod']['price'] = $this->Session->read('Shop.OrderItem.' . $id . '.Product.price');
        }

        if (isset($productmod)) {
            $product['Product']['productmod_id'] = $productmod['Productmod']['id'];
            $product['Product']['productmod_name'] = $productmod['Productmod']['name'];
            $product['Product']['price'] = $productmod['Productmod']['price'];
            $productmodId = $productmod['Productmod']['id'];
            $data['productmod_id'] = $product['Product']['productmod_id'];
            $data['res_id'] = $product['Product']['res_id'];
            $data['productmod_name'] = $product['Product']['productmod_name'];
        } else {
            $product['Product']['productmod_id'] = '';
            $product['Product']['productmod_name'] = '';
            $productmodId = 0;
            $data['productmod_id'] = '';
            $data['productmod_name'] = '';
        }

        $data['product_id'] = $product['Product']['id'];
        $data['name'] = $product['Product']['name'];
        $data['weight'] = $product['Product']['weight'];
        $data['price'] = $product['Product']['price'];
         $data['image'] = $product['Product']['image'];
        $data['tno'] = $tid;
        $data['quantity'] = $quantity;
        $data['subtotal'] = sprintf('%01.2f', $product['Product']['price'] * $quantity);
        $data['totalweight'] = sprintf('%01.2f', $product['Product']['weight'] * $quantity);
        $data['Product'] = $product['Product'];
        $data['res_id'] = $product['Product']['res_id'];
        $this->Session->write('Shop.OrderItem.' . $id . '_' . $tid, $data);
        $this->Session->write('Shop.Order.shop', 1);
        $this->Session->write('Shop.Order.tno', $tid);


        $this->Cart = ClassRegistry::init('Cart');

        $cartdata['Cart']['sessionid'] = $this->Session->id();
        $cartdata['Cart']['quantity'] = $quantity;
        $cartdata['Cart']['product_id'] = $product['Product']['id'];
        $cartdata['Cart']['name'] = $product['Product']['name'];
        $cartdata['Cart']['weight'] = $product['Product']['weight'];
        $cartdata['Cart']['weight_total'] = sprintf('%01.2f', $product['Product']['weight'] * $quantity);
        $cartdata['Cart']['price'] = $product['Product']['price'];
        $cartdata['Cart']['image'] = $product['Product']['image'];
        $cartdata['Cart']['resid'] = $product['Product']['res_id'];
        $cartdata['Cart']['subtotal'] = sprintf('%01.2f', $product['Product']['price'] * $quantity);
        $cartdata['Cart']['tno'] = $tid;
        //$cartdata['Cart']['uid'] = $uid;

        $existing = $this->Cart->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'AND' => array(
                    'Cart.resid' => $product['Product']['res_id'],
                    'Cart.product_id' => $product['Product']['id'],
                    'Cart.tno' => $tid,
                ))
        ));
        if ($existing) {
            $cartdata['Cart']['id'] = $existing['Cart']['id'];
        } else {
            $this->Cart->create();
        }
        $this->Cart->save($cartdata, false);

        $this->cart();

        return $product;
    }
    /**
     * 
     * @param type $id
     * @param type $quantity
     * @param type $productmodId
     * @param type $tid
     * @return boolean|string
     */
    public function adminadd($id, $quantity = 1, $productmodId = null, $tid = NULL) {

        if ($productmodId) {
            $productmod = ClassRegistry::init('Productmod')->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Productmod.id' => $productmodId,
                    'Productmod.product_id' => $id,
                )
            ));
        }

        if (!is_numeric($quantity)) {
            $quantity = 1;
        }

        $quantity = abs($quantity);

        if ($quantity > $this->maxQuantity) {
            $quantity = $this->maxQuantity;
        }

        if ($quantity == 0) {
            $this->remove($id);
            return;
        }

        $product = $this->controller->Product->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Product.id' => $id
            )
        ));
        if (empty($product)) {
            return false;
        }

        if ($this->Session->check('Shop.OrderItem.' . $id . '.Product.productmod_name')) {
            $productmod['Productmod']['id'] = $this->Session->read('Shop.OrderItem.' . $id . '.Product.productmod_id');
            $productmod['Productmod']['name'] = $this->Session->read('Shop.OrderItem.' . $id . '.Product.productmod_name');
            $productmod['Productmod']['price'] = $this->Session->read('Shop.OrderItem.' . $id . '.Product.price');
        }

        if (isset($productmod)) {
            $product['Product']['productmod_id'] = $productmod['Productmod']['id'];
            $product['Product']['productmod_name'] = $productmod['Productmod']['name'];
            $product['Product']['price'] = $productmod['Productmod']['price'];
            $productmodId = $productmod['Productmod']['id'];
            $data['productmod_id'] = $product['Product']['productmod_id'];
            $data['res_id'] = $product['Product']['res_id'];
            $data['productmod_name'] = $product['Product']['productmod_name'];
        } else {
            $product['Product']['productmod_id'] = '';
            $product['Product']['productmod_name'] = '';
            $productmodId = 0;
            $data['productmod_id'] = '';
            $data['productmod_name'] = '';
        }

        $data['product_id'] = $product['Product']['id'];
        $data['name'] = $product['Product']['name'];
        $data['weight'] = $product['Product']['weight'];
        $data['price'] = $product['Product']['price'];
         $data['image'] = $product['Product']['image'];
        $data['tno'] = $tid;
        $data['quantity'] = $quantity;
        $data['subtotal'] = sprintf('%01.2f', $product['Product']['price'] * $quantity);
        $data['totalweight'] = sprintf('%01.2f', $product['Product']['weight'] * $quantity);
        $data['Product'] = $product['Product'];
        $data['res_id'] = $product['Product']['res_id'];
        $this->Session->write('Shop.OrderItem.' . $id . '_' . $tid, $data);
        $this->Session->write('Shop.Order.shop', 1);
        $this->Session->write('Shop.Order.tno', $tid);


        $this->Cart = ClassRegistry::init('Cart');

        $cartdata['Cart']['sessionid'] = $this->Session->id();
        $cartdata['Cart']['quantity'] = $quantity;
        $cartdata['Cart']['product_id'] = $product['Product']['id'];
        $cartdata['Cart']['name'] = $product['Product']['name'];
        $cartdata['Cart']['weight'] = $product['Product']['weight'];
        $cartdata['Cart']['weight_total'] = sprintf('%01.2f', $product['Product']['weight'] * $quantity);
        $cartdata['Cart']['price'] = $product['Product']['price'];
        $cartdata['Cart']['image'] = $product['Product']['image'];
        $cartdata['Cart']['resid'] = $product['Product']['res_id'];
        $cartdata['Cart']['subtotal'] = sprintf('%01.2f', $product['Product']['price'] * $quantity);
        $cartdata['Cart']['tno'] = $tid;
        //$cartdata['Cart']['uid'] = $uid;

        $existing = $this->Cart->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'AND' => array(
                    'Cart.sessionid' => $this->Session->id(),
                    'Cart.product_id' => $product['Product']['id'],
                    'Cart.tno' => $tid,
                ))
        ));
        if ($existing) {
            $cartdata['Cart']['id'] = $existing['Cart']['id'];
        } else {
            $this->Cart->create();
        }
        $this->Cart->save($cartdata, false);

        $this->cart();

        return $product;
    }

    /**
     * 
     * @param type $id
     * @param type $quantity
     * @param type $productmodId
     * @return boolean|string
     */
    public function add($id, $quantity = 1, $productmodId = null) {

        if ($productmodId) {
            $productmod = ClassRegistry::init('Productmod')->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Productmod.id' => $productmodId,
                    'Productmod.product_id' => $id,
                )
            ));
        }

        if (!is_numeric($quantity)) {
            $quantity = 1;
        }

        $quantity = abs($quantity);

        if ($quantity > $this->maxQuantity) {
            $quantity = $this->maxQuantity;
        }

        if ($quantity == 0) {
            $this->remove($id);
            return;
        }

        $product = $this->controller->Product->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Product.id' => $id
            )
        ));
        if (empty($product)) {
            return false;
        }

        if ($this->Session->check('Shop.OrderItem.' . $id . '.Product.productmod_name')) {
            $productmod['Productmod']['id'] = $this->Session->read('Shop.OrderItem.' . $id . '.Product.productmod_id');
            $productmod['Productmod']['name'] = $this->Session->read('Shop.OrderItem.' . $id . '.Product.productmod_name');
            $productmod['Productmod']['price'] = $this->Session->read('Shop.OrderItem.' . $id . '.Product.price');
        }

        if (isset($productmod)) {
            $product['Product']['productmod_id'] = $productmod['Productmod']['id'];
            $product['Product']['productmod_name'] = $productmod['Productmod']['name'];
            $product['Product']['price'] = $productmod['Productmod']['price'];
            $productmodId = $productmod['Productmod']['id'];
            $data['productmod_id'] = $product['Product']['productmod_id'];
            $data['res_id'] = $product['Product']['res_id'];
            $data['productmod_name'] = $product['Product']['productmod_name'];
        } else {
            $product['Product']['productmod_id'] = '';
            $product['Product']['productmod_name'] = '';
            $productmodId = 0;
            $data['productmod_id'] = '';
            $data['productmod_name'] = '';
        }

        $data['product_id'] = $product['Product']['id'];
        $data['name'] = $product['Product']['name'];
        $data['weight'] = $product['Product']['weight'];
        $data['price'] = $product['Product']['price'];
        $data['quantity'] = $quantity;
        $data['subtotal'] = sprintf('%01.3f', ($product['Product']['price'] * $quantity));
        $data['totalweight'] = sprintf('%01.2f', $product['Product']['weight'] * $quantity);
        $data['Product'] = $product['Product'];
        $data['res_id'] = $product['Product']['res_id'];
        $this->Session->write('Shop.OrderItem.' . $id, $data);
        $this->Session->write('Shop.Order.shop', 1);

        $this->Cart = ClassRegistry::init('Cart');

        $cartdata['Cart']['sessionid'] = $this->Session->id();
        $cartdata['Cart']['quantity'] = $quantity;
        $cartdata['Cart']['product_id'] = $product['Product']['id'];
        $cartdata['Cart']['name'] = $product['Product']['name'];
        $cartdata['Cart']['weight'] = $product['Product']['weight'];
        $cartdata['Cart']['weight_total'] = sprintf('%01.2f', $product['Product']['weight'] * $quantity);
        $cartdata['Cart']['price'] = $product['Product']['price'];
        $cartdata['Cart']['resid'] = $product['Product']['res_id'];
        $cartdata['Cart']['subtotal'] = sprintf('%01.3f', ($product['Product']['price'] * $quantity));
		
		$this->Session->write('Shop.Order.total', sprintf('%01.3f', ($product['Product']['price'] * $quantity)));
		
		
        //$cartdata['Cart']['uid'] = $uid;

        $existing = $this->Cart->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Cart.sessionid' => $this->Session->id(),
                'Cart.product_id' => $product['Product']['id'],
            )
        ));
        if ($existing) {
            $cartdata['Cart']['id'] = $existing['Cart']['id'];
        } else {
            $this->Cart->create();
        }
        $this->Cart->save($cartdata, false);

        $this->cart();

        return $product;
    }

    /**
     * 
     * @param type $id
     * @param type $quantity
     * @param type $productmodId
     * @param type $uid
     * @return boolean|string
     */
    public function appadd($id, $uid = NULL ) {

        $service = ClassRegistry::init('Service')->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Service.id' => $id
            )
        ));

			
        if (empty($service)) {
            return false;
        }
        $data['service_id'] = $service['Service']['id'];
        $data['name'] = $service['Service']['name'];
        $data['price'] = $service['Service']['price'];
        $data['Service'] = $service['Service'];
        $this->Session->write('Shop.OrderItem.' . $id , $data);
        $this->Session->write('Shop.Order.shop', 1);

        $this->Cart = ClassRegistry::init('Cart');
        $cartdata['Cart']['service_id'] = $service['Service']['id'];
        $cartdata['Cart']['name'] = $service['Service']['name'];
        $cartdata['Cart']['price'] = $service['Service']['price'];
        $cartdata['Cart']['provider_id'] = $service['Service']['provider_id'];
        $cartdata['Cart']['uid'] = $uid;

        $existing = $this->Cart->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Cart.uid' => $uid,
                'Cart.service_id' => $service['Service']['id'],
            )
        ));
        if ($existing) {
            $cartdata['Cart']['id'] = $existing['Cart']['id'];
        } else {
            $this->Cart->create();
        }
        $this->Cart->save($cartdata, false);

        $this->cart();

        return $service;
    }
    /**
     * 
     * @param type $id
     * @param type $quantity
     * @param type $productmodId
     * @param type $uid
     * @return boolean|string
     */
    public function appaddqr($id, $quantity = 1, $productmodId = null, $uid = NULL, $sid = NULL,$tid = NULL) {

        if ($productmodId) {
            $productmod = ClassRegistry::init('Productmod')->find('first', array(
                'recursive' => -1,
                'conditions' => array(
                    'Productmod.id' => $productmodId,
                    'Productmod.product_id' => $id,
                )
            ));
        }

        if (!is_numeric($quantity)) {
            $quantity = 1;
        }

        $quantity = abs($quantity);

        if ($quantity > $this->maxQuantity) {
            $quantity = $this->maxQuantity;
        }

        if ($quantity == 0) {
            $this->remove($id);
            return;
        }

        $product = $this->controller->Product->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Product.id' => $id
            )
        ));
        if (empty($product)) {
            return false;
        }

        if ($this->Session->check('Shop.OrderItem.' . $id . '.Product.productmod_name')) {
            $productmod['Productmod']['id'] = $this->Session->read('Shop.OrderItem.' . $id . '.Product.productmod_id');
            $productmod['Productmod']['name'] = $this->Session->read('Shop.OrderItem.' . $id . '.Product.productmod_name');
            $productmod['Productmod']['price'] = $this->Session->read('Shop.OrderItem.' . $id . '.Product.price');
        }
        if (isset($productmod)) {
            $product['Product']['productmod_id'] = $productmod['Productmod']['id'];
            $product['Product']['productmod_name'] = $productmod['Productmod']['name'];
            $product['Product']['price'] = $productmod['Productmod']['price'];
            $productmodId = $productmod['Productmod']['id'];
            $data['productmod_id'] = $product['Product']['productmod_id'];
            $data['res_id'] = $product['Product']['res_id'];
            $data['productmod_name'] = $product['Product']['productmod_name'];
        } else {
            $product['Product']['productmod_id'] = '';
            $product['Product']['productmod_name'] = '';
            $productmodId = 0;
            $data['productmod_id'] = '';
            $data['productmod_name'] = '';
        }
        $data['product_id'] = $product['Product']['id'];
        $data['tno'] = $tno;
        $data['sessionid'] = $sid;
        $data['name'] = $product['Product']['name'];
        $data['weight'] = $product['Product']['weight'];
        $data['price'] = $product['Product']['price'];
        $data['quantity'] = $quantity;
        $data['subtotal'] = sprintf('%01.2f', ($product['Product']['price'] * $quantity));
        $data['totalweight'] = sprintf('%01.2f', $product['Product']['weight'] * $quantity);
        $data['Product'] = $product['Product'];
        $data['res_id'] = $product['Product']['res_id'];
        $this->Session->write('Shop.OrderItem.' . $id . '_' . $productmodId, $data);
        $this->Session->write('Shop.Order.shop', 1);
        $this->Cart = ClassRegistry::init('Cart');
        $cartdata['Cart']['sessionid'] = $sid;
        $cartdata['Cart']['tno'] = $tid;
        $cartdata['Cart']['quantity'] = $quantity;
        $cartdata['Cart']['product_id'] = $product['Product']['id'];
        $cartdata['Cart']['name'] = $product['Product']['name'];
        $cartdata['Cart']['weight'] = $product['Product']['weight'];
        $cartdata['Cart']['weight_total'] = sprintf('%01.2f', $product['Product']['weight'] * $quantity);
        $cartdata['Cart']['price'] = $product['Product']['price'];
        $cartdata['Cart']['resid'] = $product['Product']['res_id'];
        $cartdata['Cart']['subtotal'] = sprintf('%01.2f', ($product['Product']['price'] * $quantity));
        $cartdata['Cart']['uid'] = $uid;
        $cartdata['Cart']['image'] = $product['Product']['image'];

        $existing = $this->Cart->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Cart.sessionid' => $this->Session->id(),
                'Cart.product_id' => $product['Product']['id'],
            )
        ));
        if ($existing) {
            $cartdata['Cart']['id'] = $existing['Cart']['id'];
        } else {
            $this->Cart->create();
        }
        $this->Cart->save($cartdata, false);

        $this->cart();

        return $product;
    }

//////////////////////////////////////////////////

    public function remove($id) {
        
        
        if ($this->Session->check('Shop.OrderItem.' . $id)) {
            $product = $this->Session->read('Shop.OrderItem.' . $id);
            $this->Session->delete('Shop.OrderItem.' . $id);

            ClassRegistry::init('Cart')->deleteAll(
                    array(
                'Cart.sessionid' => $this->Session->id(),
                'Cart.product_id' => $id,
                    ), false
            );

            $this->cart();
            return $product;
        }
        return false;
    }
    
    public function adminremove($id=NULL,$tid=NULL) {
        if ($this->Session->check('Shop.OrderItem.' . $id)) {
            $product = $this->Session->read('Shop.OrderItem.' . $id);
            $this->Session->delete('Shop.OrderItem.' . $id);

            ClassRegistry::init('Cart')->deleteAll(
                    array(
               'AND'=>array(
                'Cart.sessionid' => $this->Session->id(),
                'Cart.product_id' => $id,
                'Cart.tno' => $tid,
                   ) ), false
            );

            $this->cart();
            return $product;
        }
        return false;
    }

//////////////////////////////////////////////////

    public function cart() {
        $shop = $this->Session->read('Shop');
        $quantity = 0;
        $weight = 0;
        $subtotal = 0;
        $total = 0;
        $order_item_count = 0;

        if (count($shop['OrderItem']) > 0) {
            foreach ($shop['OrderItem'] as $item) {
                $quantity += $item['quantity'];
                $weight += $item['totalweight'];
                $subtotal += $item['subtotal'];
                $total += $item['subtotal'];
                $order_item_count++;
            }
            $d['order_item_count'] = $order_item_count;
            $d['quantity'] = $quantity;
            $d['weight'] = sprintf('%01.2f', $weight);			
            $d['subtotal'] = number_format($subtotal,3); //sprintf('%01.2f', $subtotal);
            $d['total'] = number_format($total,3); //sprintf('%01.2f', $total);
            $this->Session->write('Shop.Order', $d + $shop['Order']);
            return true;
        } else {
            $d['quantity'] = 0;
            $d['weight'] = 0;
            $d['subtotal'] = 0;
            $d['total'] = 0;
            $this->Session->write('Shop.Order', $d + $shop['Order']);
            return false;
        }
    }

//////////////////////////////////////////////////

    public function clear() {
        ClassRegistry::init('Cart')->deleteAll(array('Cart.sessionid' => $this->Session->id()), false);
        $this->Session->delete('Shop');
    }

//////////////////////////////////////////////////
    public function checkcrt($uid, $pid) {
        $shop = ClassRegistry::init('Cart')->find('all', array(
            'conditions' => array(
                'AND' => array(
                    'Cart.uid' => $uid,
                    'Cart.service_id' => $pid
        ))));
        return $shop;
    }
      public function checkcrtqr($id, $uid,$tid,$resid) {
        $shop = ClassRegistry::init('Cart')->find('all', array(
            'conditions' => array(
                'AND' => array(
                    'Cart.product_id' => $id,
                    'Cart.uid' => $uid,
                    'Cart.tno' => $tid,
                   'Cart.resid' => $resid
        ))));
        return $shop;
    }

    public function appcart($uid, $sid) {
        $shop = ClassRegistry::init('Cart')->find('all', array(
            'conditions' => array(
                'AND' => array(
                    'Cart.uid' => $uid,
                    'Cart.sessionid' => $sid
        ))));
        $quantity = 0;
        $weight = 0;
        $subtotal = 0;
        $total = 0;
        $order_item_count = 0;

        $cnt = count($shop);
        for ($i = 0; $i < $cnt; $i++) {

            $shop[$i]['Cart']['image'] = FULL_BASE_URL . "/files/product/" . $shop[$i]['Cart']['image'];
        }


        if (count($shop) > 0) {
            foreach ($shop as $item) {
                $quantity += $item['Cart']['quantity'];
                $weight += $item['Cart']['weight'];
                $subtotal += $item['Cart']['subtotal'];
                $total += $item['Cart']['subtotal'];
                $order_item_count++;
            }
            $d['order_item_count'] = $order_item_count;
            $d['quantity'] = $quantity;
            $d['weight'] = sprintf('%01.2f', $weight);
            $d['subtotal'] = sprintf('%01.3f', $subtotal);
            $d['total'] = sprintf('%01.3f', $total);
            return array($d, $shop);
        } else {
            $d['quantity'] = 0;
            $d['weight'] = 0;
            $d['subtotal'] = 0;
            $d['total'] = 0;
            return array($d, $shop);
        }
    }
    public function appcartqr($rid,$tid) {
        $shop = ClassRegistry::init('Cart')->find('all', array(
            'conditions' => array(
                'AND' => array(
                    
                    'Cart.resid' => $rid,
                    'Cart.tno' => $tid
                    ))));
        $quantity = 0;
        $weight = 0;
        $subtotal = 0;
        $total = 0;
        $order_item_count = 0;

        $cnt = count($shop);
        for ($i = 0; $i < $cnt; $i++) {

            $shop[$i]['Cart']['image'] = FULL_BASE_URL . "/files/product/" . $shop[$i]['Cart']['image'];
        }


        if (count($shop) > 0) {
            foreach ($shop as $item) {
                $quantity += $item['Cart']['quantity'];
                $weight += $item['Cart']['weight'];
                $subtotal += $item['Cart']['subtotal'];
                $total += $item['Cart']['subtotal'];
                $order_item_count++;
            }
            $d['order_item_count'] = $order_item_count;
            $d['quantity'] = $quantity;
            $d['weight'] = sprintf('%01.2f', $weight);
            $d['subtotal'] = sprintf('%01.2f', $subtotal);
            $d['total'] = sprintf('%01.2f', $total);
            return array($d, $shop);
        } else {
            $d['quantity'] = 0;
            $d['weight'] = 0;
            $d['subtotal'] = 0;
            $d['total'] = 0;
            return array($d, $shop);
        }
    }

}
