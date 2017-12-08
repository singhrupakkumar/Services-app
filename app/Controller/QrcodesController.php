<?php

//ob_start();

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class QrcodesController extends AppController {

////////////////////////////////////////////////////////////

    public function beforeFilter() {
        parent::beforeFilter();
       
    }

////////////////////////////////////////////////////////////

    public function admin_add(){
//        array(
//	'Qrcode' => array(
//		'res_id' => '624',
//		'tableno' => '1'
//	)
//) 
        if($this->request->is("post")){ 
        $res_id=$this->request->data['Qrcode']['res_id'];
        $table_id=$this->request->data['Qrcode']['tableno'];
       $data='<img style="-webkit-user-select: none" src="https://chart.googleapis.com/chart?chs=500x600&cht=qr&chl='.$res_id.'-'.$table_id.'&choe=UTF-8">';
        }else {
            $data="no data ";
        }
        
        $this->set('data',$data);
    }
    
}
