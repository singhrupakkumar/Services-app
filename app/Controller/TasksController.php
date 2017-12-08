<?php 

App::uses('AppController', 'Controller');

class TasksController extends AppController {



    public $components = array('Paginator', 'Session', 'PhpExcel');

    //public $helpers = array('PhpExcel');



    public function beforeFilter() {

        parent::beforeFilter();

        $this->Auth->allow(array('api_acceptdecline','api_adminassignedpatients'));

    }

    public function api_acceptdecline(){
    	
    	configure::write('debug', 0);
             $this->loadModel('PatientTest');
             $this->loadModel('StatusAccept');
             $this->loadModel('StatusDecline'); 
             $this->loadModel('StatusCancel');
             $this->loadModel('StatusReschedule');

            
            $patientid = $_POST['patientid'];
            $userid = $_POST['userid'];
            $testid = $_POST['testid'];
            $status = $_POST['status'];
            $date = $_POST['date'];
            $dat = date('Y-m-d h:i:s');
            //$reason = $_POST['reason'];

            if($status == '2'){
                $id = $_POST['id'];
                
                $data = $this->PatientTest->updateAll(array('PatientTest.status' => "'$status'",'PatientTest.date' => "'$date'"), array('PatientTest.id' => $id));

            $this->request->data['StatusAccept']['patienttestid'] = $_POST['id'];
            $this->request->data['StatusAccept']['patientid'] = $_POST['patientid'];
            $this->request->data['StatusAccept']['userid'] = $_POST['userid'];
            $this->request->data['StatusAccept']['testid'] = $_POST['testid'];
            $this->request->data['StatusAccept']['status'] = $_POST['status'];
            $this->request->data['StatusAccept']['date'] = $_POST['date'];

            $this->StatusAccept->create();
            $this->StatusAccept->save($this->request->data);

            }else if($status == '3'){
                $id = $_POST['id'];
                $reason = $_POST['reason'];
            $data = $this->PatientTest->updateAll(array('PatientTest.status' => "'$status'", 'PatientTest.reason' => "'$reason'",'PatientTest.declinedate' => "'$dat'",), array('PatientTest.id' => $id));
            $this->request->data['StatusDecline']['patienttestid'] = $_POST['id'];
            $this->request->data['StatusDecline']['patientid'] = $_POST['patientid'];
            $this->request->data['StatusDecline']['userid'] = $_POST['userid'];
            $this->request->data['StatusDecline']['testid'] = $_POST['testid'];
            $this->request->data['StatusDecline']['status'] = $_POST['status'];
            $this->request->data['StatusDecline']['reason'] = $_POST['reason'];

            $this->StatusDecline->create();
            $this->StatusDecline->save($this->request->data);

            }else if($status == '4'){
                $id = $_POST['id'];
                $reason = $_POST['reason'];
                
            $data = $this->PatientTest->updateAll(array('PatientTest.status' => "'$status'", 'PatientTest.adminreason' => "'$reason'"), array('PatientTest.id' => $id));
            $this->request->data['StatusCancel']['patienttestid'] = $_POST['id'];
            $this->request->data['StatusCancel']['patientid'] = $_POST['patientid'];
            $this->request->data['StatusCancel']['userid'] = $_POST['userid'];
            $this->request->data['StatusCancel']['testid'] = $_POST['testid'];
            $this->request->data['StatusCancel']['status'] = $_POST['status'];
            $this->request->data['StatusCancel']['adminreason'] = $_POST['reason'];

            $this->StatusCancel->create();
            $this->StatusCancel->save($this->request->data);

            }elseif($status == '5'){
                $id = $_POST['id'];
                $reason = $_POST['reason'];
                $data = $this->PatientTest->updateAll(array('PatientTest.status' => '1'), array('PatientTest.id' => $id));

            $this->request->data['StatusReschedule']['patienttestid'] = $_POST['id'];
            $this->request->data['StatusReschedule']['patientid'] = $_POST['patientid'];
            $this->request->data['StatusReschedule']['userid'] = $_POST['userid'];
            $this->request->data['StatusReschedule']['testid'] = $_POST['testid'];
            $this->request->data['StatusReschedule']['status'] = $_POST['status'];
            $this->request->data['StatusReschedule']['admin_reason'] = $_POST['reason'];
            $this->request->data['StatusReschedule']['date'] = $dat;
           
            $this->StatusReschedule->create();
            $this->StatusReschedule->save($this->request->data);

            }else if($status == '0'){
           
            $this->request->data['PatientTest']['patientid'] = $_POST['patientid'];
            $this->request->data['PatientTest']['doctorid'] = $_POST['doctorid'];
            $this->request->data['PatientTest']['testid'] = $_POST['testid'];
            $this->request->data['PatientTest']['status'] = $_POST['status'];
            $data =  $this->PatientTest->create();
            $this->PatientTest->save($this->request->data);
            
            }


            if ($data) {
                $response['data'] = $_POST;
                $response['error'] = 0;
                $response['isSucess'] = 'true';

            }
            else{
                $response['error'] = 1;
                $response['isSucess'] = 'false';
            }   

        echo json_encode($response);

        exit;	
    }


    public function api_adminassignedpatients(){
        
        configure::write('debug', 0);
             $this->loadModel('PatientTest');
             
            $patientid = $_POST['patientid'];

            $data = $this->PatientTest->find('all', array('conditions' => array('patientid' => $patientid)));

            if ($data) {
                $response['data'] = $data;
                $response['error'] = 0;
                $response['isSucess'] = 'true';

            }
            else{
                $response['error'] = 1;
                $response['isSucess'] = 'false';
            }   

        echo json_encode($response);

        exit;   
    }


}