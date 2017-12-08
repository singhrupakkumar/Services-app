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

class ClientsController extends AppController {

    //var $name = 'Restaurant';

    /**
     * Components
     *
     * @var array
 **/
    public $components = array('Paginator', 'Flash');
    /**
     
     * index method
     *
     * @return void
     */
    
    public function admin_index(){
        echo "ajay";exit;
    }   
    public function admin_add(){
        configure::write('debug',2);
         
        if($this->request->is('post')){
            //print_r($this->request->data);exit;
            $this->loadModel('Patient');
            $this->loadModel('User');
            $this->Patient->create();
            $this->request->data['Patient']['doctorid']=$this->Auth->user('id');
           $patient = $this->Patient->save($this->request->data);
           if($patient){
               return $this->flash(__('The Patient has been saved.'), array('action' => 'index'));
           }
        }
    }
    

}