<?php
header('Access-Control-Allow-Origin: *'); 



/**

 * Application level Controller

 *

 * This file is application-wide controller file. You can put all

 * application-wide controller-related methods here.

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

App::uses('Controller', 'Controller');

App::uses('HttpSocket', 'Network/Http');

$HttpSocket = new HttpSocket();



/**

 * Application Controller

 *

 * Add your application-wide methods in the class below, your controllers

 * will inherit them.

 *

 * @package       app.Controller

 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller

 */

class AppController extends Controller {

    

    public $newbaseurl;



////////////////////////////////////////////////////////////

    public $components = array(

        'Session',

        'Auth',

        /* 'DebugKit.Toolbar', */

        'RequestHandler',

        'Ctrl'

            //'Security',

    );

    public $helpers = array('Html');



////////////////////////////////////////////////////////////

    public function beforeFilter() {            

        //  echo $this->name;exit;

        //$this->Session->delete('Shop');
     header('Access-Control-Allow-Origin: *'); 
        $this->newbaseurl = $this->baseurl();



        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => true);



        $this->Auth->loginRedirect = array('controller' => 'orders', 'action' => 'index', 'admin' => true);



        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => false);

        $this->Auth->authorize = array('Controller');


        $this->Auth->authenticate = array(

            'Form' => array(

                'userModel' => 'User',

                'fields' => array(

                    'username' => 'username',

                    'password' => 'password'

                ),

                'scope' => array(

                    'User.active' => 1,

                )

            )

        );

        // $this->rqWriter();

        if (isset($this->request->params['admin']) && ($this->request->params['prefix'] == 'admin')) {



            if ($this->Session->check('Auth.User')) {

                $this->set('authUser', $this->Auth->user());

                $loggedin = $this->Session->read('Auth.User');

                $this->set(compact('loggedin'));

                $this->layout = 'adminLte';

            }

        } elseif (isset($this->request->params['buyer']) && ($this->request->params['prefix'] == 'buyer')) {

            if ($this->Session->check('Auth.User')) {

                $this->set('authUser', $this->Auth->user());

                $loggedin = $this->Session->read('Auth.User');

                $this->set(compact('loggedin'));

                $this->layout = 'customer';

            }

        } else {

            $this->Auth->allow();

        }

    $social = 1;

        $this->set('social',$social);

        $user_id = $this->Auth->user('id');

        $this->set("loggeduser", $user_id);

        $this->set("loggedusername", $this->Auth->user('name'));

        $user_role = $this->Auth->user('role');

        $this->set("loggedUserRole", $user_role);

        $cr = $this->Ctrl->getList();

        $this->set('controllerLists', $cr);



        $this->set('base_url',Router::fullbaseUrl());

        

        $this->loadModel('User');
        if($this->Auth->user()){

        $userimage = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
        $userimagedata = $userimage['User']['image'];
        

        $userroledata = $userimage['User']['role'];

        $this->set('userimage',$userimagedata);

        $this->set('roledata',$userroledata);

        
        }

        //  $this->loadModel('ExchangeRate');

        //  $aaaaaa = $this->ExchangeRate->find('all',array('order'=> 'ExchangeRate.exchange_money DESC'));

         $this->set('aaaaaa',1);
    }

     public function baseurl(){

        return Router::fullbaseUrl();

    }

////////////////////////////////////////////////////////////




public function SendPushNotificationsAndroid($token,$title,$body){
      $ch = curl_init("https://fcm.googleapis.com/fcm/send");

        //The device token.
    //    $token = "e4zpjrGzM14:APA91bGw0Br76SUow45FfAbHkC9Bdl3wJ1rw5RvxQTIZcIrwzyiw5Pk05HL12Pkw7n6An-FXsZ5n9q-4woDnzraRBbg6ob9bFjCuvoY615CfsNbYiN8_wNyEWDNwISCy-WI3T2sGudsQ";

        //Title of the Notification.
      //  $title = "The North Remembers";

        //Body of the Notification.
      //  $body = "Bear island knows no king but the king in the north, whose name is stark.";

        //Creating the notification array.
        $notification = array('title' =>$title , 'body' => $body, 'vibrate'=> true, 'sound'=> true, 'content-available' => true, 'priority' => 'high');
        
        //This array contains, the token and the notification. The 'to' attribute stores the token.
         $data = array('title' => $title, 'body' => $body);
        $arrayToSend = array('to' => $token, 'notification' => $notification, 'data' => $data);
        

        //Generating JSON encoded string form the above array.
        $json = json_encode($arrayToSend);

        //Setup headers:

   $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key=AIzaSyD0xpY6ftiMHx8F02IfvDO__jXfsvMvwgI';
//AIzaSyB4GmW7VECHsrVM6_YLlTGSRvrhOCcLPbo
        //Setup curl, add headers and post parameters.
     //curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
     curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
     curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
     
     curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, true);  
     curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POST, 1);
        //curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);       

        //Send the request
        $response = curl_exec($ch);

        //Close request
        curl_close($ch);
        
        return $response;
        
        
        
        
    }




    public function isAuthorized($user) {

        if (($this->params['prefix'] === 'admin') && ($user['role'] != 'admin') && ($user['role'] != 'client')) {

            echo '<a href="' . $this->webroot . 'users/logout">Logout</a><br />';

            die('Invalid request for ' . $user['role'] . ' user.');

        }

        if (($this->params['prefix'] === 'customer') && ($user['role'] != 'customer')) {

            echo '<a href="' . $this->webroot . 'users/logout">Logout</a><br />';

            die('Invalid request for ' . $user['role'] . ' user.');

        }



        if ($this->Auth->user('role') == 'rest_admin') {

            $authorized_pages = $this->Ctrl->getList();

            // print_r($authorized_pages);

            $resadmin_access_controller = array('restaurants', 'orders', 'products', 'picodes', 'dish_categories', 'dish_subcats','times','reviews');

            foreach ($authorized_pages as $ct) {

                $contrl[] = strtolower(str_replace(' ', '_', $ct['displayName']));

            }

            $contrl_a = array_diff($contrl, $resadmin_access_controller);

            $this->set("authocss", $contrl_a);

            if (in_array($this->params['controller'], $contrl_a)) {

                $unAuthorized = "Unauthorized Access";

                $this->set(compact('unAuthorized'));

                $this->set("authorized_pages", $authorized_pages);

                $this->render('/Pages/unauthorized');

            }

        }



        if ($this->Auth->user('role') == 'admin') {

            $this->loadModel('Userpermission');

            $AuthPermission = $this->Userpermission->find('first', array('conditions' => array('Userpermission.user_id' => $this->Auth->user('id'))));

            //print_r($AuthPermission);

            if ($AuthPermission) {

                $authorized_pages = unserialize($AuthPermission['Userpermission']['view_pages']);

                // map array values to lower case as controller name is in lower case

                $authorized_pages = array_map('strtolower', $authorized_pages);

                

                $this->set("authocss", $authorized_pages);

//                if (!in_array($this->params['controller'], $authorized_pages)) {

//                    $unAuthorized = "Unauthorized Access";

//                    $this->set(compact('unAuthorized'));

//                    $this->render('/Pages/unauthorized');

//                }

            }

        }



        return true;

    }



////////////////////////////////////////////////////////////

    public function admin_switch($field = null, $id = null) {

        $this->autoRender = false;

        $model = $this->modelClass;

        if ($this->$model && $field && $id) {

            $field = $this->$model->escapeField($field);

            return $this->$model->updateAll(array($field => '1 -' . $field), array($this->$model->escapeField() => $id));

        }

        if (!$this->RequestHandler->isAjax()) {

            return $this->redirect($this->referer());

        }

    }



////////////////////////////////////////////////////////////

    public function admin_editable() {

        $model = $this->modelClass;

        $id = trim($this->request->data['pk']);

        $field = trim($this->request->data['name']);

        $value = trim($this->request->data['value']);

        $data[$model]['id'] = $id;

        $data[$model][$field] = $value;

        $this->$model->save($data, false);

        $this->autoRender = false;

    }



///////////////////////////////////////////////////////////



    public function admin_tagschanger() {

        $value = '';

        asort($this->request->data['value']);

        foreach ($this->request->data['value'] as $k => $v) {

            $value .= $v . ', ';

        }

        $value = trim($value);

        $value = rtrim($value, ',');

        $this->Product->id = $this->request->data['pk'];

        $s = $this->Product->saveField('tags', $value, false);

        $this->autoRender = false;

    } 

   

}