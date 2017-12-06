<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
 public function beforeFilter() {
        parent::beforeFilter();
		
        $this->loadModel('Staticpage');
          $AboutUs=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'about','Staticpage.status'=>1))));
          $this->set('staticabout',$AboutUs);
		  
		  $careerpage=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'career','Staticpage.status'=>1))));
          $this->set('careerdetails',$careerpage);
		  
		   $teampage=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'team','Staticpage.status'=>1))));
          $this->set('teamdetails',$teampage);
		  
		  $servicepage=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'service','Staticpage.status'=>1))));
          $this->set('servicedetails',$servicepage);
		  
		   $terms=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'terms','Staticpage.status'=>1))));
          $this->set('termsdetails',$terms);
		  
		  
		  $privacypolicy=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'privacypolicy','Staticpage.status'=>1))));
          $this->set('privacypolicydetails',$privacypolicy);
		  
		  $this->loadModel('User'); //FOR CONTACT US PAGE ADMIN EMAIL
		  $contact=$this->User->find('all',array('conditions'=>array('AND'=>array('User.role'=>'admin','User.id'=>1))));
          $this->set('adminemail',$contact);
		  
		  
		  /*$orderhistory=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'orderhistory','Staticpage.status'=>1))));
          $this->set('orderhistory',$orderhistory);*/
		  
		 /* $reservationhistory=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'reservationhistory','Staticpage.status'=>1))));
          $this->set('reservationhistory',$reservationhistory);*/
		  
		  /*$changepassword=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'changepassword','Staticpage.status'=>1))));
          $this->set('changepassword',$changepassword);*/
		  
		   $faq0=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'faq','Staticpage.status'=>1,'Staticpage.category'=>0))));
          $this->set('faq0',$faq0);
		  
		  
		  $faq1=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'faq','Staticpage.status'=>1,'Staticpage.category'=>1))));
          $this->set('faq1',$faq1);
		  
		  
		  $faq2=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'faq','Staticpage.status'=>1,'Staticpage.category'=>2))));
          $this->set('faq2',$faq2);
		  
		  
		  $faq3=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'faq','Staticpage.status'=>1,'Staticpage.category'=>3))));
          $this->set('faq3',$faq3);
		  
		  
		  $faq4=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'faq','Staticpage.status'=>1,'Staticpage.category'=>4))));
          $this->set('faq4',$faq4);
		  
		  
		  $faq5=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'faq','Staticpage.status'=>1,'Staticpage.category'=>5))));
          $this->set('faq5',$faq5);
		  
		  
		  $faq6=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'faq','Staticpage.status'=>1,'Staticpage.category'=>6))));
          $this->set('faq6',$faq6);
		  
		  
		  $faq7=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'faq','Staticpage.status'=>1,'Staticpage.category'=>7))));
          $this->set('faq7',$faq7);
 }
/**
 * Controller name
 *
 * @var string
 */
    public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
    public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
    public function display() {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));
        $this->render(implode('/', $path));
    }
	
	
	/*public function team() {

	}
	public function career() {		
	
	}
	public function contact() {

	}
	public function terms() {

	}
	public function privacyandpolicy() {

	}*/
	
	
}
