<?php

//ob_start();

App::uses('AppController', 'Controller');

App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'Payment-Gateway-master', array('file' => 'Payment-Gateway-master' . DS . 'cryptobox.class.php'));
class UserdetailsController extends AppController {

////////////////////////////////////////////////////////////

public $components = array(

        'Session',

        'Auth',

        'RequestHandler',

    );

    public function beforeFilter() {



        parent::beforeFilter();



        $this->Auth->allow('login','api_deletepatient', 'admin_add', 'api_login', 'api_otpverify', 'api_saveimage', 'api_fblogin', 'api_registration', 'admin','api_view', 'admin_login','admin_resetbyadmin','api_contact', 'api_forgetpwd', 'api_trackorder', 'api_addresslist', 'api_resetpwd', 'api_fblogin', 'walletipn', 'api_wallet', 'api_loginwork', 'api_ccresponse', 'api_ccresponsepickup', 'api_ccresponsewallet', 'ccresponse','emailverify','webverifyemail','api_verifyEmail','strposa','api_test','api_editprofile','api_userinfo','api_clientpatientlist','api_clientacceptpatientlist','api_patienttestlist');

         

    }


      public function admin_index() {



        Configure::write("debug", 2);
        

        $users = $this->Bill->find('all');

        $this->set(compact('users')); 



    } 


	
	
}



