<?php

App::uses('AppController', 'Controller');

class DashboardController extends AppController {

       public function beforeFilter() {

        parent::beforeFilter();

       

    }



    public function admin_dashboard() {


    }

    public function admin_dashboardview($id=NULL) {

        Configure::write("debug", 2);

        $this->loadModel('Dashboard');

        $data=$this->Dashboard->find('all',array('conditions'=>array('Dashboard.id'=>$id)),array('limit'=>30, 'order' => array(

                'Dashboard.id' => 'desc'

            )));

        $this->set('data',$data);

    }



    public function admin_index($id=NULL) {

        Configure::write("debug",2);

        

        $this->loadModel('User');

        $this->loadModel('UserPlan');

        $this->loadModel('Product');     

        $this->loadModel('User');

         $clientusers = $this->User->find('all', array('conditions' => array('User.role'=>'admin')));

        $user = $this->User->find('all', array('conditions' => array('User.role' => 'customer')));

        $this->set(array('client' => $clientusers,'user'=>$user));

    }

}