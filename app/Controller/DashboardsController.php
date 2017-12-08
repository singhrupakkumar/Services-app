<?php
App::uses('AppController', 'Controller');
class DashboardsController extends AppController {
       public function beforeFilter() {
        parent::beforeFilter();
       
    }

    public function admin_dashboard() {
//        Configure::write("debug", 2);
//        $this->loadModel('Dashboard');
//        $data=$this->Dashboard->find('all',array('limit'=>30, 'order' => array(
//                'Dashboard.id' => 'desc'
//            )));
//        $this->set('data',$data);
    }
    public function admin_dashboardview($id=NULL) {
        Configure::write("debug", 2);
        $this->loadModel('Dashboard');
        $data=$this->Dashboard->find('all',array('conditions'=>array('Dashboard.id'=>$id)),array('limit'=>30, 'order' => array(
                'Dashboard.id' => 'desc'
            )));
        $this->set('data',$data);
    }
}