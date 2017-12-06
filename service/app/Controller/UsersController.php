<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'Payment-Gateway-master', array('file' => 'Payment-Gateway-master' . DS . 'cryptobox.class.php'));
App::import('Vendor', 'twilio-php-master', array('file' => 'twilio-php-master' . DS . 'Twilio'. DS .'autoload.php'));
use Twilio\Rest\Client;

class UsersController extends AppController {

////////////////////////////////////////////////////////////

public $components = array(

        'Session',

        'Auth',

        'RequestHandler',

    );

    public function beforeFilter() {



        parent::beforeFilter();



        $this->Auth->allow('api_deletepatient', 'api_login','api_savelocation' ,'api_otpverify', 'api_saveimage', 'api_fblogin', 'api_googlelogin', 'api_registration', 'admin','api_view', 'admin_login','admin_resetbyadmin','api_contact', 'api_forgotpwd', 'api_trackorder', 'api_addresslist', 'api_resetpwd','walletipn', 'api_wallet', 'api_loginwork', 'api_ccresponse', 'api_ccresponsepickup', 'api_ccresponsewallet', 'ccresponse','emailverify','webverifyemail','api_verifyEmail','strposa','api_test','api_editprofile','api_userinfo','api_addprovider','api_getotp');

         

    }

    public function admin_login(){
      Configure::write("debug", 2);

        $this->layout = "admin2";


        if ($this->request->is('post')) { 
            $sesid = $this->Session->id();
			$this->request->data['User']['username'] = $this->request->data['User']['username'];
			$this->request->data['User']['password'] = $this->request->data['User']['password'];
            if ($this->Auth->login()) {

				
                $this->User->id = $this->Auth->user('id');

                $this->User->saveField('logins', $this->Auth->user('logins') + 1);

                $this->User->saveField('last_login', date('Y-m-d H:i:s'));


                $updatesess = $this->Session->id();
				
				//die($this->Auth->user());
                if ($this->Auth->user('role') == 'admin') {
					
					
                    $uploadURL = Router::url('/') . 'app/webroot/upload';

                    $_SESSION['KCFINDER'] = array(

                        'disabled' => false,

                        'uploadURL' => $uploadURL,
                        'uploadDir' => ''
                    );


				
                    return $this->redirect(array('controller' => 'Users',
                                'action' => 'admin_index',
                                'manager' => false,
                                'admin' => true
                    ));

                }else {

                    $this->Session->setFlash('Login is incorrect');

                }



            } else {

                $this->Session->setFlash('Login is incorrect');



            }



        }



    }
		
////////////////////////Api ////////////////////////////////////
	 public function api_userinfo() {
		 Configure::write('debug',0);
        $this->layout = 'ajax';
        $uid = $this->request->data['uid'];

        if ($this->request->is('post')) {
			$user  = $this->User->find('first',array('conditions'=>array('User.id'=>$uid)));
			
			if($user){
			$response['isSucess'] = 'true';
			
			if($user['User']['image']){
			$user['User']['image'] = Router::url('/', true).'/files/profile_pic/'.$user['User']['image'];	
			}else{
			 $user['User']['image'] = Router::url('/', true).'/files/profile_pic/avatar.png';	
			}
			
			$response['data'] = $user;	
			}else{
			$response['isSucess'] = 'false';
			$response['data'] = '';	
			}
				 	
		}
		 
	echo json_encode($response);
	exit;
		 
	 }
         
         
        public function api_savelocation() {
            Configure::write('debug',0);
            $this->layout = 'ajax';
            $uid = $this->request->data['uid'];
            $lat = $this->request->data['lat'];
            $long = $this->request->data['long'];
            $address = $this->request->data['address'];
            if ($this->request->is('post')) {
			$update = $this->User->updateAll(array('User.latitude' =>"'$lat'",'User.longitude' =>"'$long'"), array('User.id' => $uid));
			$user = $this->User->find('first',array('conditions'=>array('User.id'=>$uid)));
			if($update){
			$response['status'] = true;
			$response['msg'] = 'Location has been saved successfully!';	
			$response['data'] = $user;	
			}else{
			$response['status'] = false;
			$response['msg'] = 'try again';	
			$response['data'] = '';	
			}
				 	
		}
		 
	echo json_encode($response);
	exit;
		 
	 }  
	 
	  public function api_saveaddress() {
		 Configure::write('debug',0);
        $this->layout = 'ajax';
        $uid = $this->request->data['uid'];
        $landmark = $this->request->data['landmark'];
        $optional_name = $this->request->data['optionalname'];
		if(!empty($optional_name)){
			$optional_name = $optional_name;
		}else{
		$optional_name = '';	
		}
        $address = $this->request->data['address'];
        if ($this->request->is('post')) {
			  $update = $this->User->updateAll(array('User.landmark' =>"'$landmark '",'User.optionalname' =>"'$optional_name '",'User.address' =>"'$address'"), array('User.id' => $uid));
			  
			$user = $this->User->find('first',array('conditions'=>array('User.id'=>$uid)));
			
			if($update){
			$response['status'] = true;
			$response['msg'] = 'Address has been saved successfully!';	
			$response['data'] = $user;	
			}else{
			$response['status'] = false;
			$response['msg'] = 'try again';	
			$response['data'] = '';	
			}
				 	
		}
		 
	echo json_encode($response);
	exit;
		 
	 } 
	
////////////////////////////////////////////////////////////







    public function logout() {

        $this->Session->setFlash('Good-Bye');



        $_SESSION['KCEDITOR']['disabled'] = true;



        unset($_SESSION['KCEDITOR']);



        return $this->redirect($this->Auth->logout());



    }







    public function admin_logout() {

        $this->Session->setFlash('Good-Bye');
        $_SESSION['KCEDITOR']['disabled'] = true;
        unset($_SESSION['KCEDITOR']);
        $this->Auth->logout();
        return $this->redirect('/admin');
    }




////////////////////////////////////////////////////////////





    public function admin_index() {

        Configure::write("debug", 0);
        $users = $this->User->find('all', array('conditions' => array('User.role' => 'provider')));

        $this->set(compact('users'));  
    }


    public function admin_customerindex() {



        Configure::write("debug", 0);
        

        $users = $this->User->find('all', array('conditions' => array('User.role' => 'customer')));

        $this->set(compact('users')); 



    }





////////////////////////////////////////////////////////////







    public function admin_view($id = null) {


        Configure::write("debug", 0);
        $this->User->id = $id;



        if (!$this->User->exists()) {



            throw new NotFoundException('Invalid user');



        }



        $this->set('user', $this->User->read(null, $id));



    }

    public function admin_add() {

        Configure::write("debug", 0);

        if ($this->request->is('post')) {

            if ($this->User->hasAny(array('User.email' => $this->request->data['User']['email']))) {

                $this->Session->setFlash(__('Email already exist in Database!!!'));

                return $this->redirect(array('action' => 'add'));

            }

		   $zipcode = $this->request->data['User']["postal"];
		   $zipcode = str_replace(' ', '+', $zipcode);
		   $url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBQrWZPh0mrrL54_UKhBI2_y8cnegeex1o&address=".$zipcode."&sensor=true";
		   $details=file_get_contents($url);
		   $result = json_decode($details,true);
		   $lat=$result['results'][0]['geometry']['location']['lat'];
		   $long=$result['results'][0]['geometry']['location']['lng'];    
		   
		   $this->request->data['User']['latitude'] = $lat;
		   $this->request->data['User']['longitude'] = $long;
			
			
            $this->request->data['User']['username'] = $this->request->data['User']['email'];

			
			$image = $this->request->data['User']['image'];
            $uploadFolder = "profile_pic";
            //full path to upload folder
            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            //check if there wasn't errors uploading file on serwer
            if ($image['error'] == 0) {
                //image file name
                $imageName = $image['name'];
                //check if file exists in upload folder
                if (file_exists($uploadPath . DS . $imageName)) {
                    //create full filename with timestamp
                    $imageName = date('His') . $imageName;
                }
                //create full path with image
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['User']['image'] = $imageName;
                move_uploaded_file($image['tmp_name'], $full_image_path);
               
            }else { 
                $this->request->data['User']['image'] = '';
            }
			
			
            $this->User->create();



            if ($this->User->save($this->request->data)) {

                $this->Session->setFlash('The user has been saved');
				
				
				$to = $this->request->data['User']['email'];

				$subject = "Welcome";

				$txt = "You have been registered with us successfully.";

				// To send HTML mail, the Content-type header must be set
				$headers[] = 'MIME-Version: 1.0';
				$headers[] = 'Content-type: text/html; charset=iso-8859-1';

				// Additional headers

				$headers[] = 'From: Service <demo@example.com>';


				// Mail it
				$mail = mail($to, $subject, $txt, implode("\r\n", $headers));
				
				if($this->request->data['User']["role"] == 'provider'){
					return $this->redirect(array('action' => 'index'));
				}else{
					return $this->redirect(array('action' => 'customerindex'));
					return $this->redirect(array('action' => 'customerindex'));
				}
                
					

            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.');
            }



        }



    }



   public function admin_activate($id = null) {
        $this->User->id = $id;
        if ($this->User->exists()) {
            $x = $this->User->save(array(
                'User' => array(
                    'active' => '1'
                )
            ));
            $this->Session->setFlash(__("Activated successfully."));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__("Unable to activate."));
            $this->redirect($this->referer());
        }
    }

    public function admin_deactivate($id = null) {
        $this->User->id = $id;
        if ($this->User->exists()) {
            $x = $this->User->save(array(
                'User' => array(
                    'active' => '0'
                )
            ));
            $this->Session->setFlash(__("Activated successfully."));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__("Unable to activate."));
            $this->redirect($this->referer());
        }
    }
	

public function forgetpwd() {



    Configure::write("debug", 0);



    $this->User->recursive = -1;



    if (!empty($this->data)) {



        if (empty($this->data['User']['username'])) {



            $this->Session->setFlash('Please Provide Your Username that You used to Register with Us');



        } else {



            $username = $this->data['User']['username'];



            $fu = $this->User->find('first', array('conditions' => array('User.username' => $username)));



            if ($fu['User']['email']) {



                if ($fu['User']['active'] == "1") {



                    $key = Security::hash(CakeText::uuid(), 'sha512', true);



                    $hash = sha1($fu['User']['email'] . rand(0, 100));



                    $url = Router::url(array('controller' => 'Users', 'action' => 'reset'), true) . '/' . $key . '#' . $hash;



                    $ms = "<p>Welcome To Truelab</p><p>Click the Link below to reset your password.</p><br /> " . $url;



                    $fu['User']['tokenhash'] = $key;



                    $this->User->id = $fu['User']['id'];



                    if ($this->User->saveField('tokenhash', $fu['User']['tokenhash'])) {



                        $l = new CakeEmail('smtp');



                        $l->emailFormat('html')->template('default', 'default')->subject('Reset Your Password')



                        ->to($fu['User']['email'])->send($ms);



                        $this->set('smtp_errors', "none");



                        $this->Session->setFlash(__('Check Your Email To Reset your password', true));



                        $this->redirect(array('controller' => 'Products', 'action' => 'index'));



                    } else {



                        $this->Session->setFlash("Error Generating Reset link");



                    }



                } else {



                    $this->Session->setFlash('This Account is not Active yet.Check Your mail to activate it');



                }



            } else {



                $this->Session->setFlash('Username does Not Exist');



            }



        }



    }



}







public function reset($token = null) {



    configure::write('debug', 0);



    $this->User->recursive = -1;



    if (!empty($token)) {



        $u = $this->User->findBytokenhash($token);



        if ($u) {



            $this->User->id = $u['User']['id'];



            if (!empty($this->data)) {



                if ($this->data['User']['password'] != $this->data['User']['password_confirm']) {



                    $this->Session->setFlash("Both the passwords are not matching...");



                    return;



                }



                $this->User->data = $this->data;



                $this->User->data['User']['email'] = $u['User']['email'];



                    $new_hash = sha1($u['User']['email'] . rand(0, 100)); //created token



                    $this->User->data['User']['tokenhash'] = $new_hash;



                    if ($this->User->validates(array('fieldList' => array('password', 'password_confirm')))) {



                        if ($this->User->save($this->User->data)) {



                            $this->Session->setFlash('Password Has been Updated');



                            $this->redirect(array('controller' => 'Products', 'action' => 'index'));



                        }



                    } else {



                        $this->set('errors', $this->User->invalidFields());



                    }



                }



            } else {



                $this->Session->setFlash('Token Corrupted, Please Retry.the reset link 



                    <a style="cursor: pointer; color: rgb(0, 102, 0); text-decoration: none;



                    background: url("http://files.adbrite.com/mb/images/green-double-underline-006600.gif") 



                    repeat-x scroll center bottom transparent; margin-bottom: -2px; padding-bottom: 2px;"



                    name="AdBriteInlineAd_work" id="AdBriteInlineAd_work" target="_top">work</a> only for once.');



            }



        } else {



            $this->Session->setFlash('Pls try again...');



            $this->redirect(array('controller' => 'pages', 'action' => 'login'));



        }



    }







////////////////////////////////////////////////////////////







    public function admin_edit($id = null) {



        Configure::write("debug", 0);



        $this->User->id = $id;

        if (!$this->User->exists()) {



            throw new NotFoundException('Invalid user');



        }

        if ($this->request->is('post') || $this->request->is('put')) {

		    $image = $this->request->data['User']['image'];
            $uploadFolder = "profile_pic";
            //full path to upload folder
            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            //check if there wasn't errors uploading file on serwer
            if ($image['error'] == 0) {
                //image file name
                $imageName = str_replace(' ', '_', $image['name']);;
                //check if file exists in upload folder
                if (file_exists($uploadPath . DS . $imageName)) {
                    //create full filename with timestamp
                    $imageName = date('His') . $imageName;
                }
                //create full path with image
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['User']['image'] = $imageName;
                move_uploaded_file($image['tmp_name'], $full_image_path);
                $this->User->id = $id;
            }else {

                $admin_edit = $this->User->find('first', array('conditions' => array('User.id' => $id)));
                $this->request->data['User']['image'] = !empty($admin_edit['User']['image']) ? $admin_edit['User']['image'] : ' ';
            }
		
		
            if ($this->User->save($this->request->data)) {

                $this->Session->setFlash('The user has been saved');
				
                return $this->redirect(array('action' => 'index'));
				
  
            } else {



                $this->Session->setFlash('The user could not be saved. Please, try again.');



            }



        } else {



            $this->request->data = $this->User->read(null, $id);
            $userData = $this->User->find('first', array('conditions' => array('User.id' => $id)));
            $this->set('user', $userData);

        }



    }










////////////////////////////////////////////////////////////







    public function admin_password($id = null) {



        $this->User->id = $id;



        if (!$this->User->exists()) {



            throw new NotFoundException('Invalid user');



        }



        if ($this->request->is('post') || $this->request->is('put')) {



            if ($this->User->save($this->request->data)) {



                $this->Session->setFlash('The user has been saved');



                $this->redirect(array('action' => 'index'));



            } else {



                $this->Session->setFlash('The user could not be saved. Please, try again.');



            }



        } else {



            $this->request->data = $this->User->read(null, $id);



        }



    }


////////////////////////////////////////////////////////////


    public function admin_delete($id = null) {

        $this->loadModel('Bill');

        if (!$this->request->is('post')) {



            throw new MethodNotAllowedException();



        }



        $this->User->id = $id; 

  

        if (!$this->User->exists()) {



            throw new NotFoundException('Invalid user');  



        }

        $role = $this->User->find('first', array('conditions' => array('User.id' => $id)));

        if ($this->User->delete()) {



            $this->Session->setFlash('User deleted');


            $this->Bill->query('DELETE FROM bills WHERE user_id = "'.$id.'"');
			if($role == 'provider'){
				return $this->redirect(array('action' => 'index'));
			}else{
				return $this->redirect(array('action' => 'customerindex'));
			}
            



        }



        $this->Session->setFlash('User was not deleted');



        return $this->redirect(array('action' => 'index'));



    }



public function api_verify($id = null) {











    Configure::write('debug', 0);







    $id = base64_decode($id);







    $this->User->id = $id;







    $arr1 = $this->User->query("update `users` set `status`='1' where `id`=$id");







    $this->Session->setFlash(__('Congratulations your account has been verified!!! Now you can login!!! '));







    return $this->redirect('/');



}

    /**



     * facebook login



     */



    public function api_changepassword() { 
        configure::write('debug', 0);
        $this->layout = "ajax";
        if ($this->request->is('post')) {
            $password = AuthComponent::password($this->request->data['old_password']);
            $em = $this->request->data['email'];
            $pass = $this->User->find('first', array('conditions' => array('AND' => array('User.password' => $password, 'User.email' => $em))));
		

            if ($pass) {
                $this->User->data['User']['password'] = $this->request->data['new_password'];
                $this->User->id = $pass['User']['id'];

                 if ($this->User->exists()) {
                    $pass['User']['password'] = $this->request->data['new_password'];
                    if ($this->User->save()) {
						$userData = $this->User->find('first', array('conditions' => array('User.email' => $em)));
                        $response['isSucess'] = 'true';
						$response['data'] = $userData;
                        $response['msg'] = "your password has been updated";
                    }
                }
            } else {
                $response['isSucess'] = 'false';
                $response['msg'] = "Your old password did not match";

            }
        }

      echo json_encode($response);
	  exit;
    }



	
 public function api_forgotpwd() { 
	configure::write('debug', 0);
    $this->layout = "ajax";
    if ($this->request->is('post')) {
    $username = $this->request->data['username'];
    $this->User->recursive = -1;
    $fu = $this->User->find('first', array('conditions' => array('User.username' => $username)));
    if ($fu['User']['username']) {
        $key = Security::hash(CakeText::uuid(), 'sha512', true);
        $hash = sha1($fu['User']['username'] . rand(0, 100));
        $url = Router::url(array('controller' => 'users', 'action' => 'api_resetpwd'), true) . '/' . $key . '#' . $hash;
        $ms = '<body><table width="500" border="0" cellpadding="10" cellspacing="0" style="margin: 0px auto; background: #f0f0f0; text-align: center"><tr style="background: #f0f0f0"><td style="text-align: center; padding-top: 20px; padding-bottom: 20px"> <img alt="img" style="height: 97px;" src="'.FULL_BASE_URL . $this->webroot . 'img/logo.png"/></td> </tr><tr><td> <h2>Welcome to Home Service</h2> <p>Click on button to reset your password.</p> <p><a href="'. $url .'" style="background: #cb202d; padding:15px 20px; text-transform:uppercase; display:inline-block; color:#fff; border-radius: 4px; text-decoration:none; font-weight:500;" >Reset your password</a></p> <h3>Thank you</h2> </td> </tr></table> </body>';
        $fu['User']['reset_url'] = $key;
        $this->User->id = $fu['User']['id'];       
        if ($this->User->saveField('reset_url', $fu['User']['reset_url'])){
            $l = new CakeEmail('default');
            $l->emailFormat('html')->template('default', 'default')->subject('Reset Your Password')->from(array('info@rakesh.crystalbiltech.com'=>'Home Service'))->to($fu['User']['email'])->send($ms);
            $response['isSucess'] = 'true';
            $response['msg'] = 'Check Your Email for reset your password';
        } else {
            $response['isSucess'] = 'false';
            $response['msg'] = 'Error Generating Reset link';
        }
    } else {
        $response['isSucess'] = 'false';
        $response['msg'] = 'Email ID does Not Exist';
    }
    }
    echo json_encode($response);
    exit;
}



 public function api_resetpwd($token = null) {
    configure::write('debug', 0);
	//echo $token; exit;
    $this->User->recursive = -1;
    if (!empty($token)) {
        $u = $this->User->findByreset_url($token);
		//print_r($u); exit;
        if ($u) {
            $this->User->id = $u['User']['id'];
            if (!empty($this->data)) {                  
             $this->request->data['User']['password']=$this->request->data['User']['password1'];
             if ($this->request->data['User']['password'] != $this->request->data['User']['password_confirm']) {
                $this->Session->setFlash("Both the passwords are not matching...");
                return;
            }
            $this->User->data = $this->data;
            $this->User->data['User']['email'] = $u['User']['email'];
            $this->User->data['User']['username'] = $u['User']['email'];
                    // $new_hash = sha1($u['User']['email'] . rand(0, 100)); //created token
                    // $this->User->data['User']['tokenhash'] = $new_hash;
            $this->User->data['User']['reset_url'] = "ddd";
            if ($this->User->validates(array('fieldList' => array('password', 'password_confirm')))) {
                if ($this->User->save($this->User->data)) {
                    $this->Session->setFlash('Password has been Updated.');
                    return;
                }
            } else {
                $this->set('errors', $this->User->invalidFields());
            }
        }
    } else {
        $this->Session->setFlash('Token Corrupted, Please Retry.the reset link 
            <a style="cursor: pointer; color: rgb(0, 102, 0); text-decoration: none;
            background: url("http://files.adbrite.com/mb/images/green-double-underline-006600.gif") 
            repeat-x scroll center bottom transparent; margin-bottom: -2px; padding-bottom: 2px;"
            name="AdBriteInlineAd_work" id="AdBriteInlineAd_work" target="_top">work</a> only for once.');
    }
} 
else {
    $this->Session->setFlash('Pls try again...');
           // $this->redirect(array('controller' => 'pages', 'action' => 'login'));
}
}




    ///////////29 aug 2016/////////////////////////////   

    public function api_contact() {
	
        Configure::write('debug',0);
        $this->layout = 'ajax';
		

        if ($this->request->is('post')) {

				$to = 'rakhi@avainfotech.com';
        $from = $this->request->data['email'];
        $subject = 'Arion Pay';
		$msg = '<b>Subject : </b>'.$this->request->data['subject'].'<br/><b>Message : </b>'.$this->request->data['msg'];

				// To send HTML mail, the Content-type header must be set
				$headers[] = 'MIME-Version: 1.0';
				$headers[] = 'Content-type: text/html; charset=iso-8859-1';

				// Additional headers

				$headers[] = 'From: <'.$from.'>';


				// Mail it
				$mail = mail($to, $subject, $msg, implode("\r\n", $headers));
				if($mail){
					$response['status'] = true;
                    $response['msg'] = 'Thank you for contacting us. We will contact you soon';
				}else{
					$response['status'] = false;
					$response['msg'] = 'Please try again';
					
				}

            
        }

        echo json_encode($response);
        exit;
    

    }

    public function api_view() {
        configure::write('debug',0);
        $email = $this->request->data['id'];

		$getuser = $this->User->find('first', array('conditions' => array('User.id' => $email)));

        if ($getuser) {
            $getuser['User']['name'] =  $getuser['User']['firstname'].' '.$getuser['User']['firstname'];
            $response['status'] = true;
            $response['data'] = $getuser; 
        } else {
            $response['status'] = false;
            $response['msg'] = 'Unable to get data';
        }
        echo json_encode($response);
        exit;

    }


	
	
	 public function api_login() {
        Configure::write('debug', 0);
        $this->layout = 'ajax';
        $this->request->data['User']['username'] = $this->request->data['email'];
        $pass = $this->request->data['password'];
        if ($this->request->is('post')) {
            $check = $this->User->find('first', array('conditions' => array('AND' => array(
                    "User.username" => $this->request->data['User']['username'],
					"User.role" => $this->request->data['role'],
					"User.active" => $this->request->data['status']
                )), 'fields' => array('username'), 'recursive' => '-1'));


            $this->request->data['User']['username'] = $check['User']['username'];
            $this->request->data['User']['password'] = $pass;

            if (!$this->Auth->login()) {


                $response['msg'] = 'User is not valid'; 
                $response['status'] = false;
            } else {
                $user = $this->User->find('first', array('conditions' => array('id' => $this->Auth->user('id'))));

                $response['status'] = true;
                $response['msg'] = 'You have successfully logged in';
                $response['data'] = $user;
                //$response['name'] = $user['User']['name'];
            }
        }

        echo json_encode($response);
        exit;
    }
	

	public function api_otpverify() {
        Configure::write('debug',0);
        $this->layout = 'ajax';
        if ($this->request->is('post')) {
		    $role = 'provider';
            $check = $this->User->find('first', array('conditions' => array( 'AND' => array(
					"User.otp" =>  $this->request->data['otp'],
					"User.role" => $role
                )), 'recursive' => '-1'));
                
                
			if(!empty($this->request->data['otp'])){	
           $check = '1234' ;
           // if (count($check) < 1) {
			if ($check != $this->request->data['otp']) {	
				$response['status'] = false;
                $response['msg'] = 'Invalid otp';
            } else {
                if($this->request->data['phone']){
                                
			        $user = $this->User->find('first', array('conditions' => array('User.phonenumber' => $this->request->data['phone'])));

					$user['User']['name'] = $user['User']['firstname'].' '.$user['User']['lastname'];
					$ext = pathinfo($user['User']['image'], PATHINFO_EXTENSION);
                    if($ext){
                    $user['User']['image'] = Router::url('/', true).'/files/profile_pic/'.$user['User']['image'];
                    }else{
                    $user['User']['image'] = Router::url('/', true).'/files/profile_pic/avatar.png';   
                    }
					$this->User->id = $user['User']['id'];
                    $this->User->saveField('otp',' ');
					$response['status'] = true; 
					$response['data'] = $user;
                    $response['status'] = true;					
                    $response['msg'] = 'You have successfully logged in';
                    
                    }else{
                         $response['status'] = false;					
                         $response['msg'] = 'Please post phone number';
                    }
            }
			}else{
				 $response['status'] = false;					
                 $response['msg'] = 'Please post otp';
				
			}
        }

        echo json_encode($response);
        exit;
    }



	public function api_registration() {
		
        Configure::write('debug',0);
        $this->layout = 'ajax';
		if ($this->request->is('post')) {
			$email = $this->request->data['email'];
                        $phonenumber = $this->User->find('count', array('conditions' => array('User.phonenumber' => $this->request->data['phone'])));
			$emailCount = $this->User->find('count', array('conditions' => array('User.email' => $email)));
			if($emailCount > 0){
				    $response['status'] = false;
				    $response['msg'] = 'Email already exists!';
                        }elseif($phonenumber > 0){
                                    $response['status'] = false;
				    $response['msg'] = 'Phone number already exists!';
                        }else{
			   $zipcode = $this->request->data["postalcode"];
			   $zipcode = str_replace(' ', '+', $zipcode);
			   $url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBQrWZPh0mrrL54_UKhBI2_y8cnegeex1o&address=".$zipcode."&sensor=true";
			   $details=file_get_contents($url);
			   $result = json_decode($details,true);
			   $lat=$result['results'][0]['geometry']['location']['lat'];
			   $long=$result['results'][0]['geometry']['location']['lng'];    
			   $this->request->data['User']['firstname'] = $this->request->data['firstname'];
			   $this->request->data['User']['lastname'] = $this->request->data['lastname'];
			   $this->request->data['User']['role'] = 'user'; 
			   $this->request->data['User']['active'] = $this->request->data['status'];
			   $this->request->data['User']['push_token'] = $this->request->data['push_token'];
			   $this->request->data['User']['latitude'] = $lat;
			   $this->request->data['User']['longitude'] = $long;
                           $this->request->data['User']['phonenumber'] = $this->request->data['phone'];
			   $this->request->data['User']['address'] = $this->request->data['address'];
			   $this->request->data['User']['username'] = $this->request->data['email'];
			   $this->request->data['User']['email'] = $this->request->data['email'];
			   $this->request->data['User']['password'] = $this->request->data['password'];
			   $this->request->data['User']['postal'] = $this->request->data["postalcode"];
			   $this->request->data['User']['country'] = $this->request->data["country"];
			    $this->User->create();

				if ($this->User->save($this->request->data)) {

					$to = $this->request->data['email'];

					$subject = "Welcome";

					$txt = "You have been registered with us successfully.";

					// To send HTML mail, the Content-type header must be set
					$headers[] = 'MIME-Version: 1.0';
					$headers[] = 'Content-type: text/html; charset=iso-8859-1';

					// Additional headers

					$headers[] = 'From: Service <demo@example.com>';


					// Mail it
					$mail = mail($to, $subject, $txt, implode("\r\n", $headers));
					$lastInsertId = $this->User->getLastInsertId();
					$getUsr = $this->User->find('first', array('conditions' => array('User.id' => $lastInsertId)));
				
					$response['status'] = true;
					$response['data'] = $getUsr;
					$response['msg'] = 'Register successfully';	

				} else {
					$response['status'] = false;
					$response['msg'] = 'The user could not be saved. Please, try again.';
				}
			   
			}
        }

        echo json_encode($response);
        exit;
    }
	/******************Provider add***********************/
	public function api_addprovider() {
		
        Configure::write('debug',0);
        $this->layout = 'ajax';

		if ($this->request->is('post')) {
			$number = $this->request->data['phone'];
			$randnom = rand(1119, 9999);
		if(!empty($number)){	
		// Your Account SID and Auth Token from twilio.com/console
		$sid = 'AC7dfdf2d646800d8f35c17f2902d207e4';
		$token = '0ffc5f2b8fcdee04ff4b0d85b42b7c61';
		$client = new Client($sid, $token);
		// Use the client to do fun stuff like send text messages!
		$client->messages->create(
			// the number you'd like to send the message to
			'+918865867270',
			array(
				// A Twilio phone number you purchased at twilio.com/console
				'from' => '(619) 825-2511',
				// the body of the text message you'd like to send
				'body' => "Your Verification number : ".$randnom 
			)
		);
		}
			
			
			$email = $this->request->data['email'];
			$emailCount = $this->User->find('count', array('conditions' => array('User.email' => $email)));
                        $phonenumber = $this->User->find('count', array('conditions' => array('User.phonenumber' => $this->request->data['phone'])));
			if($emailCount > 0){
				    $response['status'] = false;
				    $response['msg'] = 'Email already exists!';
                        }elseif($phonenumber > 0){
                                    $response['status'] = false;
				    $response['msg'] = 'Phone number already exists!';
                        }else{
			   $zipcode = $this->request->data["postalcode"];
			   $zipcode = str_replace(' ', '+', $zipcode);
			   $url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBQrWZPh0mrrL54_UKhBI2_y8cnegeex1o&address=".$zipcode."&sensor=true";
			   $details=file_get_contents($url);
			   $result = json_decode($details,true);
			   $lat=$result['results'][0]['geometry']['location']['lat'];
			   $long=$result['results'][0]['geometry']['location']['lng'];    
			   $this->request->data['User']['firstname'] = $this->request->data['firstname'];
			   $this->request->data['User']['lastname'] = $this->request->data['lastname'];
			   $this->request->data['User']['role'] = 'provider'; 
			   $this->request->data['User']['provider_type'] = $this->request->data['provider_type']; 
			   $this->request->data['User']['active'] = 1;
			   $this->request->data['User']['push_token'] = $this->request->data['push_token'];
			   $this->request->data['User']['otp'] = $randnom ;
			   $this->request->data['User']['latitude'] = $lat;
			   $this->request->data['User']['longitude'] = $long;
                            $this->request->data['User']['phonenumber'] = $this->request->data['phone'];
			   $this->request->data['User']['address'] = $this->request->data['address'];
			   $this->request->data['User']['username'] = $this->request->data['email'];
			   $this->request->data['User']['email'] = $this->request->data['email'];
			   $this->request->data['User']['passport_no'] = $this->request->data['pass'];
			   $this->request->data['User']['profession'] = $this->request->data['profession'];
			   $this->request->data['User']['institution'] = $this->request->data['institution'];
			   $this->request->data['User']['course'] = $this->request->data['course'];
			   $this->request->data['User']['c_year'] = $this->request->data['c_year'];
			   $this->request->data['User']['password'] = 'fsfgdfg';
			   $this->request->data['User']['postal'] = $this->request->data["postalcode"];
			   $this->request->data['User']['country'] = $this->request->data["country"];
			    $this->User->create();

				if ($this->User->save($this->request->data)) {

					$to = $this->request->data['email'];

					$subject = "Welcome";

					$txt = "You have been registered as provider with us successfully.";

					// To send HTML mail, the Content-type header must be set
					$headers[] = 'MIME-Version: 1.0';
					$headers[] = 'Content-type: text/html; charset=iso-8859-1';

					// Additional headers

					$headers[] = 'From: Service <demo@example.com>';


					// Mail it
					$mail = mail($to, $subject, $txt, implode("\r\n", $headers));
					$lastInsertId = $this->User->getLastInsertId();
					$getUsr = $this->User->find('first', array('conditions' => array('User.id' => $lastInsertId)));
				
					$response['status'] = true;
					$response['data'] = $getUsr;
					$response['msg'] = 'Register successfully';	

				} else {
					$response['status'] = false;
					$response['msg'] = 'The user could not be saved. Please, try again.';
				}
			   
			}
        }

        echo json_encode($response);
        exit;
    }
	
	/******************get otp***********************/

	/***********************************/
	
	public function api_getotp() {
	    

         Configure::write('debug',0);
            $this->layout = 'ajax';
		if ($this->request->is('post')) {		
			$number = $this->request->data['number'];
                      
			if(!empty($number)){       
                            
                             $user = $this->User->find('first',array('conditions'=>array('User.phonenumber'=>$number)));
                         
                     
                       if($user){
				
				$randnom = rand(1119, 9999);
				// Your Account SID and Auth Token from twilio.com/console
				$sid = 'AC7dfdf2d646800d8f35c17f2902d207e4';
				$token = '0ffc5f2b8fcdee04ff4b0d85b42b7c61';
				$client = new Client($sid, $token);
				// Use the client to do fun stuff like send text messages!
				$client->messages->create(
					// the number you'd like to send the message to
					'+918865867270',
					array(
						// A Twilio phone number you purchased at twilio.com/console
						'from' => '(619) 825-2511',
						// the body of the text message you'd like to send
						'body' => "Your Otp number : ".$randnom 
					)
				);
				
				        $response['status'] = true;
		                $response['msg'] = 'Send successfully.'; 
                                
                       }else{
                          $response['status'] = false;
		                $response['msg'] = 'You are not register with this number.'; 
                       }   
				
			}else{
				$response['status'] = false;
				$response['msg'] = 'Please enter your mobile number.';	
			}	
			
		}
		
		echo json_encode($response);
		exit;
	}
	
	public function api_savedocs() {
        Configure::write('debug',0);
        $this->layout = 'ajax';
		$this->loadModel('Userdoc');
        $id = $this->request->data['id'];
        if ($this->request->is('post')) {
		$image = $this->request->data['img'];
		
		if(!empty($image)){
        $img = base64_decode($image);

        $im = imagecreatefromstring($img);

        if ($im !== false) {

            $image = "1" . time() . ".png";

            imagepng($im, WWW_ROOT . "files" . DS . "userdocs" . DS . $image);

            imagedestroy($im);
            
        
        }
		
		 $this->Userdoc->create();
         $this->request->data['Userdoc']['image'] = $image;
         $this->request->data['Userdoc']['user_id'] = $id; 
          if ($this->Userdoc->save($this->request->data)) {
			  
			$docs = $this->Userdoc->find('all',array('conditions'=>array('Userdoc.user_id'=>$id))) ;
			foreach($docs as &$d){
				if($d['Userdoc']['image']){
					$d['Userdoc']['image'] = Router::url('/', true).'/files/userdocs/'.$d['Userdoc']['image'];
				}
			}
			
			$response['status'] = true;
			$response['docs'] = $docs;
            $response['msg'] = 'Docs has been updated successfully';  
			  
		  }else{
			$response['status'] = false;
            $response['msg'] = 'Something wrong';
     
        }
        
		}else{
		  	$response['status'] = false;
            $response['msg'] = 'Please post image';  
		}
   
        }

        echo json_encode($response);
        exit;
    }

		public function api_editprofile() {
        Configure::write('debug',0);
        $this->layout = 'ajax';
		
     
        if ($this->request->is('post')) {
		$id = $this->request->data['id'];	
			if($id){

       $check = $this->User->query('UPDATE users SET firstname = "'.$this->request->data['firstname'].'", lastname = "'.$this->request->data['lastname'].'", phonenumber = "'.$this->request->data['phonenumber'].'" WHERE id = "'.$id.'"');

		$getUsr = $this->User->find('first', array('conditions' => array('User.id' => $id)));

			$response['status'] = true;
			$response['data'] = $getUsr;
            $response['msg'] = 'Profile has been updated successfully';
			}
			else{
			$response['status'] = false;
            $response['msg'] = 'post user id';	
			}	
        }

        echo json_encode($response);
        exit;
    }
	
	
	
	public function api_saveimage() {
        Configure::write('debug',0);
        $this->layout = 'ajax';
		
       
        if ($this->request->is('post')) {

		$email = $this->request->data['id'];
		$image = $this->request->data['img'];
		if(!empty($image )){
        $img = base64_decode($image);

        $im = imagecreatefromstring($img);

        if ($im !== false) {

            $image = "1" . time() . ".png";

            imagepng($im, WWW_ROOT . "files" . DS . "profile_pic" . DS . $image);

            imagedestroy($im);
            
        
        }
  
        if($im != ''){ 

       $check = $this->User->query('UPDATE users SET image = "'.$image.'" WHERE email = "'.$email.'"');

        }else{

       $check = $this->User->query('UPDATE users SET image = "'.$image.'" WHERE email = "'.$email.'"'); 
        }

			$response['status'] = true;
			$response['image'] = Router::url('/', true).'/files/profile_pic/'.$image;
            $response['msg'] = 'Image has been updated successfully';
         

		}else{
			$response['status'] = false;
            $response['msg'] = 'Please select image';
			
		}	
        }

        echo json_encode($response);
        exit;
    }
	
	
	 public function api_fblogin() { 

        Configure::write('debug', 0);
        $this->layout = "ajax";
        $this->User->recursive = -1;
        if ($this->request->is('post')) {
            $this->request->data['User']['username'] = $this->request->data['email'];
           // $this->request->data['User']['username'] = $this->request->data['name'];
			$str = $this->request->data['name'];
			if ($str == trim($str) && strpos($str, ' ') !== false) {
				$name = explode(' ', $str);
			}
			$this->request->data['User']['firstname'] = $name[0];
			$this->request->data['User']['lastname'] = $name[1];
			$this->request->data['User']['name'] = $str;
            $this->request->data['User']['email'] = $this->request->data['email'];
            $this->request->data['User']['fb_id'] = $this->request->data['fbId'];
            $this->request->data['User']['active'] = 1;
            $this->request->data['User']['role'] = "user";

            if (!$this->User->hasAny(array
                        ('User.email' => $this->request->data['User']['email'])
                    )) {
                $this->request->data['User']['image']=$this->request->data['image'];
                $this->User->create();
                $this->request->data['User']['role'] = 'user';
                $this->request->data['User']['active'] = 1;
                if ($this->User->save($this->request->data)) {
                    $user = $this->User->find('first', array('conditions' => array('email' => $this->request->data['email'])));
                    $this->User->id = $this->User->getLastInsertID();
                    
                    $response['status'] = true;
                    $response['data'] = $user;
                } else {
                    $response['status'] = false;
                    $response['msg'] = 'Sorry please try again';
                }
				
	
				
            } else {
                $user = $this->User->find('first', array('conditions' => array('email' => $this->request->data['email'])));
                
                if($this->Auth->login($user)){
					
				 $ext = pathinfo($user['User']['image'], PATHINFO_EXTENSION);
                    if($ext){

						$fbId=$this->request->data['fbId'];
				
                        $this->User->updateAll(
                                array('User.fb_id' => "'".$fbId."'"),
                                array('User.id'=>$user['User']['id'])
                                );

                      $user['User']['image'] = Router::url('/', true).'/files/profile_pic/'.$user['User']['image'];

                    }else{

                        $image=$this->request->data['image'];
                        if($image){
                        $fbId=$this->request->data['fbId'];
					
                        $this->User->updateAll(
                                array('User.image'=>"'".$image."'", 'User.fb_id' => "'".$fbId."'"),
                                array('User.id'=>$user['User']['id'])
                                );
                        }else{
                        $img = Router::url('/', true).'/files/profile_pic/avatar.png';
						$fbId=$this->request->data['fbId'];
		
                        $this->User->updateAll(
                                array('User.image'=>"'".$img."'",'User.fb_id' => "'".$fbId."'"),
                                array('User.id'=>$user['User']['id'])
                                );
                        }

						
					}
					$response['status'] = true;
                    $response['data'] = $user;	
					
				}else{
				   $response['status'] = false;
                   $response['data'] = '';	
				   $response['msg'] = 'Try again';
				}
                    
                 
                
            }
        }
       echo json_encode($response);
	   exit;
    }
	
	 public function api_googlelogin() {  
        Configure::write('debug', 0);
        $this->layout = "ajax";
        $this->User->recursive = -1;
        if ($this->request->is('post')) {

            $this->request->data['User']['username'] = $this->request->data['email'];
			$str = $this->request->data['name'];
			if ($str == trim($str) && strpos($str, ' ') !== false) {
				$name = explode(' ', $str);
			}
			$this->request->data['User']['firstname'] = $this->request->data['firstname'];
			$this->request->data['User']['lastname']  = $this->request->data['lastname'];
            $this->request->data['User']['email'] = $this->request->data['email']; 
            $this->request->data['User']['google_id'] = $this->request->data['google_id'];
			
            if (!$this->User->hasAny(array
                        ('User.email' => $this->request->data['User']['email'])
                    )) {
                $this->request->data['User']['image']=$this->request->data['image'];
                $this->User->create();
                $this->request->data['User']['role'] = 'user';
                $this->request->data['User']['active'] = 1;
				$this->request->data['User']['password'] = $this->request->data['User']['email'];
                if ($this->User->save($this->request->data)) {
                    $user = $this->User->find('first', array('conditions' => array('email' => $this->request->data['email'])));
                    $this->User->id = $this->User->getLastInsertID();
                    
                    $response['status'] = true; 
                    $response['data'] = $user;
                } else {
                    $response['status'] = false;
                    $response['msg'] = 'Sorry please try again';
                }
				
            } else {
                $user = $this->User->find('first', array('conditions' => array('email' => $this->request->data['email'])));
                
					if($this->Auth->login($user)){
					
                    $ext = pathinfo($user['User']['image'], PATHINFO_EXTENSION);
				    if($ext){

						$google_id=$this->request->data['google_id'];
						
                        $this->User->updateAll(
                                array('User.google_id' => "'".$google_id."'"),
                                array('User.id'=>$user['User']['id'])
                                );
                        $user['User']['image'] = Router::url('/', true).'/files/profile_pic/'.$user['User']['image'];

                    }else{

                        $image=$this->request->data['image'];
                        if($image){
						$google_id=$this->request->data['google_id'];
						
                        $this->User->updateAll(
                                array('User.image'=>"'".$image."'",'User.google_id' => "'".$google_id."'"),
                                array('User.id'=>$user['User']['id'])
                                );
                        }else{
                        $img = Router::url('/', true).'/files/profile_pic/avatar.png';
                        $google_id=$this->request->data['google_id'];
					
                        $this->User->updateAll(
                                array('User.image'=>"'".$img."'",'User.google_id' => "'".$google_id."'"),
                                array('User.id'=>$user['User']['id'])
                                );
                        }
					}

					$response['status'] = true;
                    $response['data'] = $user;	
					}else{
				    $response['status'] = false;
                    $response['data'] = '';
					$response['msg'] = 'try again';
					}	

            
        }

    }
	
	   echo json_encode($response);
	   exit; 
	
}


}
