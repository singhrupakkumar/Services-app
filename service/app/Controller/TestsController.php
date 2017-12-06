<?php



App::uses('AppController', 'Controller');



/**

 * Users Controller

 *

 * @property User $User

 * @property PaginatorComponent $Paginator

 * @property SessionComponent $Session

 * @property Customer $Customer Description

 * @property Combination $Combination Description

 * @property PhpExcel $PhpExcel Description

 */

class TestsController extends AppController {



    public $components = array('Paginator', 'Session', 'PhpExcel');

    //public $helpers = array('PhpExcel');



    public function beforeFilter() {

        parent::beforeFilter();

        $this->Auth->allow(array('index','test'));

    }



    public function index() {



        $indexInfo['description'] = "User Registration(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/users/registration";

        $indexInfo['parameters'] = 'firstname:test
                                    lastname:testlastname
                                    email:test@gmail.com
                                    username:test@gmail.com
                                    phonenumber:85568645454
                                    password:123456<br>';
        $indexarr[] = $indexInfo;

        $indexInfo['description'] = "User Login(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/users/login";

        $indexInfo['parameters'] = 'email:test@gmail.com password:12345<br>';
         $indexarr[] = $indexInfo;

        $indexInfo['description'] = "User Edit Profile(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/users/editprofile";

        $indexInfo['parameters'] = 'firstname:test
                                    lastname:test1lastname
                                    email:test1@gmail.com
                                    id:1175
                                    phonenumber:8767565345
                                    image:weg23tuhj2uyu23yu3<br>';
        
        $indexarr[] = $indexInfo;

        $indexInfo['description'] = "User Forgot Password(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/users/forgetpwd";

        $indexInfo['parameters'] = 'username:test1@gmail.com<br>';
        
        $indexarr[] = $indexInfo;


        $indexInfo['description'] = "Add Patients(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/patients/addpatients";

        $indexInfo['parameters'] = 'doctorid:1
                                    name:Methu thomas
                                    address:It park chandigarh
                                    phonenumber:9876565432
                                    dob:15 Apr 1980
                                    doctorname:Dr.Try Don
                                    doctornumber:8787654345
                                    doctorfaxnumber:0113345466
                                    doctorid:1<br>';
            
        $indexarr[] = $indexInfo;

        
        $indexInfo['description'] = "View Patient(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/patients/viewpatients";

        $indexInfo['parameters'] = 'id:1<br>';
        
        $indexarr[] = $indexInfo;
        
        $indexInfo['description'] = "Phlebotomist Accept Decline request(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/tasks/acceptdecline";

        $indexInfo['parameters'] = 'id:1
                                    status:1
                                    date:2017-04-24 16:05:11
                                    reason:out of city<br>';
        
        
        $indexarr[] = $indexInfo;


        $indexInfo['description'] = "User info(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/users/userinfo";

        $indexInfo['parameters'] = 'id:1 <br>';
        
        
        $indexarr[] = $indexInfo;

        $indexInfo['description'] = "User Patient List(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/patients/userpatientlist";

        $indexInfo['parameters'] = 'id:1 <br>';
        
        
        $indexarr[] = $indexInfo;

        $indexInfo['description'] = "User Accepted Patient(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/patients/useracceptpatientlist";

        $indexInfo['parameters'] = 'id:1 <br>';
        
        
        $indexarr[] = $indexInfo;

        $indexInfo['description'] = "Client Patient List(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/users/clientpatientlist";

        $indexInfo['parameters'] = 'id:1 <br>';
        
        
        $indexarr[] = $indexInfo;

         $indexInfo['description'] = "User Decline Patient(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/patients/userdeclinepatientlist";

        $indexInfo['parameters'] = 'id:1 <br>';
        
        
        $indexarr[] = $indexInfo;
       
        $indexInfo['description'] = "List of all test(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/patients/listofalltest";

        $indexInfo['parameters'] = '';
        
        
        $indexarr[] = $indexInfo;
        
        $indexInfo['description'] = "Test Request Send(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/users/sendrequesttest";

        $indexInfo['parameters'] = 'testid:1,2,3
                                    patientid:100
                                    doctorid:100
                                    fasting:1,3<br>';
        
        
        $indexarr[] = $indexInfo;
        
        $indexInfo['description'] = "Edit patient Profile(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/patients/editpatientprofile";

        $indexInfo['parameters'] = 'id : 1
                                    name : rubu
                                    address : it park
                                    dob : 15 April 1990
                                    doctorname : shal
                                    doctornumber : 97672774673
                                    doctorfaxnumber :4434434342
                                    fasting : 1
                                    phonenumber : 76343<br>';
        
        
        $indexarr[] = $indexInfo;
       
        
        $indexInfo['description'] = "Delete patient(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/users/deletepatient";

        $indexInfo['parameters'] = 'id : 10 <br>';
        $indexarr[] = $indexInfo;
        
        
        $indexInfo['description'] = "Search patient(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/users/search";

        $indexInfo['parameters'] = 'name: jas<br>';
        $indexarr[] = $indexInfo;
        
        $indexInfo['description'] = "Client canceled user list(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/users/clientpatientlist";

        $indexInfo['parameters'] = 'id:1 <br>';
        $indexarr[] = $indexInfo;
        
        $indexInfo['description'] = "User Info according to test(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/users/userinfoacctotest";

        $indexInfo['parameters'] = 'id:1 
                                    testid:3<br>';
        $indexarr[] = $indexInfo;
        
        $indexInfo['description'] = "Client History(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/users/clienthistory";

        $indexInfo['parameters'] = 'id:1193 <br>';
        
        $indexarr[] = $indexInfo;
        
        
        $indexInfo['description'] = "Client Scheduled List(post method)";

        $indexInfo['url'] = FULL_BASE_URL . $this->webroot . "api/patients/clientscheduledlist";

        $indexInfo['parameters'] = 'id:1175 <br>';
        
        $indexarr[] = $indexInfo;
        
        
        $this->set('IndexDetail', $indexarr);

    }
    
    
}