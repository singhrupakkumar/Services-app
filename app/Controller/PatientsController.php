<?php

App::uses('AppController', 'Controller');

App::uses('CakeEmail', 'Network/Email');

class PatientsController extends AppController {


    public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('api_addpatients','api_viewpatients','api_userpatientlist','api_useracceptpatientlist','api_userdeclinepatientlist','api_clientscheduledlist');
   }

    public function api_addpatients() {      

  	Configure::write("debug", 0);
        $name = $_POST['name'];
        $doctorid = $_POST['doctorid'];
        $address = $_POST['address'];
        $phonenumber = $_POST['phonenumber'];
        $dob = $_POST['dob'];

        $doctorname = $_POST['doctorname'];

        $doctornumber = $_POST['doctornumber'];

        $doctorfaxnumber = $_POST['doctorfaxnumber'];

        if ($this->request->is('post')) {


            $this->loadModel('Patient');

            $this->Patient->create();
            $savedata = $this->Patient->save($this->request->data);

            if($savedata){                       
                $response['status'] = 1;
                $response['msg'] = 'Patients Registration has been successfully Completed. ';
                $response['error'] = 0;     						   
            }
        }else {
            $response['msg'] = 'Sorry please try again';

            $response['status'] =2;  
            $response['error'] = 1;   
        }
        echo json_encode($response);
        exit;
    }


    public function api_viewpatients(){
        Configure::write("debug", 0);
    	$id = $_POST['id'];

        if ($this->request->is('post')) {

            $this->loadModel('Patient');
            $this->loadModel('PatientTest');          
            $this->loadModel('Test');

            //$this->Patient->recursive = 2;
            $patientdetail = $this->Patient->find('first',array('conditions'=>array('id'=>$id)));
            //$this->PatientTest->recursive = 2;
            $Testdetail= $this->PatientTest->find('all',array('conditions'=>array('patientid'=>$id),'order' => array('PatientTest.id' => 'DESC'),'recursive' => 2,'contain'=>'Test'));
            // print_r($Testdetail); die;
            $response['status'] = 1;

            $response['msg'] = $patientdetail;
            $response['msg1'] = $Testdetail;
            $response['error'] = 0; 
   	} else {

            $response['msg'] = 'Sorry please try again';

            $response['status'] =2;  

            $response['error'] = 1;   
    }

        echo json_encode($response);
        exit;

    }


	public function api_userpatientlist(){

	Configure::write("debug", 0);
		$uid = $_POST['id'];

		if ($this->request->is('post')) {
                    

                    $this->loadModel("PatientTest"); 

                    $this->loadModel("Patient");

                    $this->PatientTest->recursive = 2;

                    $patientlists = $this->PatientTest->find("all", array('conditions' => array('PatientTest.userid' => $uid, 'PatientTest.status' => 1),'order' => array('PatientTest.id' => 'DESC' )));
                    if(!empty($patientlists)) {		

                        $response['msg'] = $patientlists;
                        $response['error'] = 0; 

                    }else{
                        $response['msg'] = 'No Data Avilable';
                        $response['error'] = 1; 
                    }	
		 }else{
                    $response['msg'] = 'No Post Data Avilable';
                    $response['error'] = 1; 

		 }
        echo json_encode($response);
        exit;

	}
	public function api_useracceptpatientlist(){
            $uid = $_POST['id'];
            if ($this->request->is('post')) {
                    $this->loadModel("PatientTest"); 
                    $this->loadModel("Patient");
                    $this->PatientTest->recursive = 2;
                    $patientlists = $this->PatientTest->find("all", array('conditions' => array('PatientTest.userid' => $uid, 'PatientTest.status' => 2),'recursive' => 2));
                    if(!empty($patientlists)) {		
                        $response['msg'] = $patientlists;

                        $response['error'] = 0; 
                    }else{
                        $response['msg'] = 'No Data Avilable';
                        $response['error'] = 1; 
                    }	
             }else{
                $response['msg'] = 'No Post Data Avilable';
                $response['error'] = 1; 
             }
            echo json_encode($response);

            exit;

	}
	public function api_userdeclinepatientlist(){

            $uid = $_POST['id'];
            if ($this->request->is('post')) {
                $this->loadModel("PatientTest"); 

                $this->loadModel("Patient");
                $this->PatientTest->recursive = 2;
                $patientlists = $this->PatientTest->find("all", array('conditions' => array('AND' => array('PatientTest.userid' => $uid, 'PatientTest.status' => 4))));
                if(!empty($patientlists)) {		
                        $response['msg'] = $patientlists;

                        $response['error'] = 0; 

                }else{
                        $response['msg'] = 'No Data Avilable';

                        $response['error'] = 1; 


                }	
            }else{
                $response['msg'] = 'No Post Data Avilable';

                $response['error'] = 1; 

            }
            echo json_encode($response);

            exit;

	}

        /**************** Edit Profile Patients *************************/
        
    public function api_editpatientprofile() {
        configure::write('debug', 0);
       
        $this->loadModel('Patient');
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address  = $_POST['address'];
        $dob  = $_POST['dob'];
        $doctorname = $_POST['doctorname'];
        $doctornumber = $_POST['doctornumber'];
        $doctorfaxnumber = $_POST['doctorfaxnumber'];
       
        $phonenumber = $_POST['phonenumber'];

        $data = $this->Patient->updateAll(array('Patient.name' => "'name'", 'Patient.address' => "'$address'", 
            'Patient.dob' => "'$dob'", 'Patient.phonenumber' => "'$phonenumber'", 'Patient.doctorname' => "'$doctorname'", 'Patient.doctornumber' => "'$doctornumber'", 'Patient.doctorfaxnumber' => "'$doctorfaxnumber'"), array('Patient.id' => $id));
        if ($data) {
            $response['data'] = $_POST;
            $response['error'] = 0;
            $response['isSucess'] = 'true';
        }
        else{
            $response['error'] = 1;
            $response['error'] = 1;
            $response['isSucess'] = 'false';
        }   
        echo json_encode($response);
        exit;
}

        /********* Patients Listing ************/

	public function admin_index(){

		Configure::write("debug", 0);
                $this->loadModel('User');
                
                if($this->Auth->user('role')=='client'){
                    //echo $this->Auth->user('role');
                    $patients_lists = $this->Patient->find('all',array('conditions'=>array('Patient.doctorid'=>$this->Auth->user('id'))));
                }else{
                    //echo $this->Auth->user('id');
                    $patients_lists = $this->Patient->find('all');
                }
		//$patients_lists = $this->Patient->find('all');

		$this->set(compact('patients_lists'));
	}



	/**************** View Patient Details ************************/
	public function admin_view($id = null){

		Configure::write("debug", 0);

		//$this->User->id = $id;

        $this->set('patient', $this->Patient->read(null, $id));
	}

	/************** Edit Patient ******************/
	public function admin_edit($id = null){

		Configure::write("debug", 0);
		if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Patient->save($this->request->data)) {

                $this->Session->setFlash('The Patient has been saved');

                return $this->redirect(array('action' => 'index'));


			}else {
                $this->Session->setFlash('The Patient could not be saved. Please, try again.');
            }
		}else{

			$this->request->data = $this->Patient->read(null, $id);


		}

	}

	/************** Delete Patient ******************/
    public function admin_delete($id = null) {

        //$this->User->id = $id;
        $deletepatient = $this->Test->deleteAll(array('Patient.id' => $id));
        if ($deletepatient) {

            $this->Session->setFlash('Patient deleted');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Patient was not deleted');
        return $this->redirect(array('action' => 'index'));
    }

	/********************* Patient Test By id ***********************************/

	public function admin_test($id = null) {
            Configure::write("debug", 0);
            $this->loadModel("PatientTest");
            $this->loadModel("Patient");
            $this->loadModel("StatusRecord");
            $this->loadModel("User");
            $this->loadModel("Test");
      
            if ($this->request->is('post')) {
		//echo '<pre>'; print_r($this->request->data); echo '</pre>'; die();
		$update_row = $this->request->data['PatientTest']['patient_row_id'];
                $pid = $this->request->data['PatientTest']['patient_id'];
                $schdueleddate = date('Y-m-d h:i:s');
		$udateuser = $this->request->data['PatientTest']['users'];
                $patient_data = $this->Patient->find("first", array("conditions" => array('Patient.id' => $pid)));
                $doctor_id = $patient_data['Patient']['doctorid'];
		$update_patient = $this->PatientTest->updateAll(array('PatientTest.userid' => "'$udateuser'",'PatientTest.schdueleddate' => "'$schdueleddate'", 'PatientTest.doctorid' => "'$doctor_id'",'PatientTest.status' => '1'), array('PatientTest.id' => $update_row));
		//$update_status = $this->StatusRecord->updateAll(array('StatusRecord.userid' => "'$udateuser'", 'StatusRecord.status' => '1'), array('StatusRecord.patienttestid' => $update_row));
		if($update_patient){
                    return $this->redirect(array('action' => 'test', $id));
        	}
            }
            $testids = array();
            $testsdata = array();
            $this->PatientTest->recursive = 2;
            $tests = $this->PatientTest->find('all', array('conditions' => array('PatientTest.patientid' => $id)));
            $users = $this->User->find('all', array('conditions' => array('User.role' => 'user')));
            $usersel = array();
            foreach($users as $user){
                $usersel[$user['User']['id']] = $user['User']['firstname'] . ' ' . $user['User']['lastname'];
            }
            /********* count schedule tests ***********/ 
            $countdecline_test = $this->PatientTest->find("count", array('conditions'=> array('AND' => array('PatientTest.status' => 3, 'PatientTest.patientid' => $id))));
            $countaccept_test = $this->PatientTest->find("count", array('conditions'=> array('AND' => array('PatientTest.status' => 2, 'PatientTest.patientid' => $id))));
            $countsch_test = $this->PatientTest->find("count", array('conditions'=> array('AND' => array('PatientTest.status' => 1, 'PatientTest.patientid' => $id))));
            $this->set('count_schedule', $countsch_test);
            $this->set('count_decline', $countdecline_test);
            $this->set('count_accept', $countaccept_test);
            /******************************************/
            $this->set(compact('usersel'));
            $this->set(compact('tests'));

	}
	/***************** Tests Listing ***************************/

	public function admin_testindex(){
            Configure::write("debug", 0);

            $this->loadModel("Test");
            $alltest = $this->Test->find("all");
            $this->set(compact('alltest'));

	}

	public function admin_testedit($id = null){
            Configure::write("debug", 0);

            $this->loadModel("Test");

            if($this->request->is('post') || $this->request->is('put')) {

                if($this->Test->save($this->request->data)) {

                    $this->Session->setFlash('The Test has been saved');

                    return $this->redirect(array('action' => 'testindex'));

                }else {

                    $this->Session->setFlash('The Test could not be saved. Please, try again.');

                }
            }else{
                $this->request->data = $this->Test->read(null, $id);
            }
	}
	public function admin_testview($id = null){

            Configure::write("debug", 0);

            $this->loadModel("Test");

           $this->set('test', $this->Test->read(null, $id));
	}

    public function admin_testdelete($id = null) {

        Configure::write("debug", 0);
	$this->loadModel("Test");
        
        $deletetest = $this->Test->deleteAll(array('Test.id' => $id));
        if ($deletetest) {

            $this->Session->setFlash('Test deleted');

            return $this->redirect(array('action' => 'testindex'));
        }

        $this->Session->setFlash('Test was not deleted');

        return $this->redirect(array('action' => 'testindex'));

    }
	public function admin_reschedule($ptestid = null, $pid = null, $tid = null){
            Configure::write("debug", 0);

            $usersel = array();
            $users = $this->User->find('all', array('conditions' => array('User.role' => 'user')));
            foreach($users as $user){
                $usersel[$user['User']['id']] = $user['User']['firstname'] . ' ' . $user['User']['lastname'];
            }
            $this->set(compact('usersel'));
            if($this->request->is("post")) {
                $this->loadModel("PatientTest");
		$this->loadModel("User");
		$this->loadModel("StatusReschedule");
		$this->request->data['StatusReschedule']['patienttestid'] = $ptestid;
		$this->request->data['StatusReschedule']['patientid'] = $pid;
		$this->request->data['StatusReschedule']['testid'] = $tid;
		$this->request->data['StatusReschedule']['status'] = 5;
                $this->request->data['StatusReschedule']['admin_reason'] = $this->request->data['StatusReschedule']['admin_reason'];
		$this->request->data['StatusReschedule']['reason'] = '';
                $this->request->data['StatusReschedule']['userid'] = $this->request->data['StatusReschedule']['users'];
		$this->request->data['StatusReschedule']['date'] = $this->request->data['StatusReschedule']['date']['year'] . '-' . $this->request->data['StatusReschedule']['date']['month'] . '-' . $this->request->data['StatusReschedule']['date']['day'] . ' ' . $this->request->data['StatusReschedule']['date']['hour'] . ':' . $this->request->data['StatusReschedule']['date']['min'] . ':' . '01';

		$udateuser = $this->request->data['StatusReschedule']['users'];
                $udateschdate = $this->request->data['StatusReschedule']['date'];
		if($this->StatusReschedule->save($this->request->data)){
                    $this->PatientTest->updateAll(array('PatientTest.userid' => "'$udateuser'", 'PatientTest.status' => '1','PatientTest.schdueleddate' => "'$udateschdate'", 'PatientTest.reason ' => Null, 'PatientTest.declinedate ' => Null), array('PatientTest.id' => $ptestid));
                    return $this->redirect(array('action' => 'index'));
		}

            }
	}
	public function admin_cancel($ptestid = null, $pid = null, $tid = null){
		Configure::write("debug", 0);

		if($this->request->is("post")) {
                    $this->loadModel("PatientTest");
                    $this->loadModel("Patient");
                    $this->loadModel("User");
                    $this->loadModel("StatusCancel");
                    $patient_data = $this->Patient->find("first", array("conditions" => array('Patient.id' => $pid)));
                    $doctor_id = $patient_data['Patient']['doctorid'];
                    $this->request->data['StatusCancel']['doctorid'] = $doctor_id;
                    $this->request->data['StatusCancel']['patienttestid'] = $ptestid;
                    $this->request->data['StatusCancel']['patientid'] = $pid;
                    $this->request->data['StatusCancel']['testid'] = $tid;
                    $this->request->data['StatusCancel']['status'] = 4;
                    $this->request->data['StatusCancel']['admin_reason'] = $this->request->data['StatusCancel']['admin_reason'];
                    $this->request->data['StatusCancel']['reason'] = '';
                    $this->request->data['StatusCancel']['userid'] = $this->request->data['StatusCancel']['users'];
                    $this->request->data['StatusCancel']['date'] = $this->request->data['StatusCancel']['date']['year'] . '-' . $this->request->data['StatusCancel']['date']['month'] . '-' . $this->request->data['StatusCancel']['date']['day'] . ' ' . $this->request->data['StatusCancel']['date']['hour'] . ':' . $this->request->data['StatusCancel']['date']['min'] . ':' . '01';
                    $udateuser = $this->request->data['StatusCancel']['users'];
                    if($this->StatusCancel->save($this->request->data)){
                        $this->PatientTest->updateAll(array('PatientTest.userid' => "'$udateuser'", 'PatientTest.status' => '4'), array('PatientTest.id' => $ptestid));
                        return $this->redirect(array('action' => 'index'));
                    }

		}
	}
        /************** Add New Test From Admin ***********************/
        public function admin_addtest(){
            Configure::write("debug", 0);
            $this->loadModel("Test");
            if($this->request->is("post")){
                
                $this->Test->create();
                if($this->Test->save($this->request->data)){
                    return $this->redirect(array('action' => 'testindex'));
                }
            }
            
        }
	public function api_listofalltest(){
            $this->loadModel('Test');
            $test = $this->Test->find('all');
            $response['status'] = 1;

            $response['msg'] = $test;
            $response['error'] = 0; 

            echo json_encode($response);
            exit;

	}
        
        public function api_doctorcanceledpatientlist(){
            Configure::write("debug", 0);
            $uid = $_POST['id'];
            if ($this->request->is('post')) {
                    $this->loadModel("StatusCancel");  
                    $this->loadModel("Patient");

                    //$this->StatusCancel->recursive = 2;
                    $patientlists = $this->StatusCancel->find("all", array('conditions' =>array('doctorid' => $uid),'recursive' => 2,'contain'=>'Patient'));
                    if(!empty($patientlists)) {		
                        $response['msg'] = $patientlists;

                        $response['error'] = 0; 
                    }else{
                        $response['msg'] = 'No Data Avilable';
                        $response['error'] = 1; 
                    }	
             }else{
                $response['msg'] = 'No Post Data Avilable';
                $response['error'] = 1; 
             }
            echo json_encode($response);

            exit;

	}
        
        public function api_uploadreport(){
            Configure::write("debug", 0);
            $id = $_POST['id'];
            $fileName = $_FILES['report'];   
            
            $reportdate = date("Y-m-d H:i:s");   
            $uploadData = '';
            if ($this->request->is('post')) {  
                    $this->loadModel("PatientTest");
                   define ('SITE_ROOT', realpath(dirname(__FILE__)));
//                     $uploadPath = FULL_BASE_URL . $this->webroot . "files/profile_pic/";
                   $uploadPath = "D:\truelab\truelab\app\webroot\files\profile_pic";
                     
                    $uploadFile = $uploadPath.$fileName['name'];

                    if(move_uploaded_file($fileName['tmp_name'],$uploadFile)){
                       
                        $record = $uploadData->name['name'];

                    $this->PatientTest->updateAll(array('PatientTest.report' => "'$record'",'PatientTest.reportdate' => "'$reportdate'"), array('PatientTest.id' => $id));  
                    $response['msg'] = 'Report Updated';
                    $response['error'] = 0; 
                    }
            } else{
                $response['msg'] = 'No Post Data Avilable';
                $response['error'] = 1; 
            }
           
            echo json_encode($response);
            exit;

	}
        public function api_clientscheduledlist(){
            Configure::write("debug", 0);
            $uid = $_POST['id'];
            if ($this->request->is('post')) {
                    $this->loadModel("PatientTest"); 
                    $this->loadModel("Patient");
                    $this->PatientTest->recursive = 2;
                    $patientlists = $this->PatientTest->find("all", array('conditions' => array('PatientTest.doctorid' => $uid, 'PatientTest.status' => 2),'recursive' => 2));
                    if(!empty($patientlists)) {		
                        $response['msg'] = $patientlists;

                        $response['error'] = 0; 
                    }else{
                        $response['msg'] = 'No Data Avilable';
                        $response['error'] = 1; 
                    }	
             }else{
                $response['msg'] = 'No Post Data Avilable';
                $response['error'] = 1; 
             }
            echo json_encode($response);

            exit;

        }

}