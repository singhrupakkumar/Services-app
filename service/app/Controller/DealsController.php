<?php
App::uses('AppController', 'Controller');
//App::uses('ConnectionManager', 'Model');
/**
 * Restaurants Controller
 *
 * @property Restaurant $Restaurant
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 */

class DealsController extends AppController {

    //var $name = 'Restaurant';

    /**
     * Components
     *
     * @var array
 
    /**
     * index method
     *
     * @return void
     */
	 public function myview(){
		 Configure::write("debug", "2");		
		//$this->loadModel('Product');	
		$getdata = $this->Deal->find('all');
		print_r($getdata);
	 }
    

}