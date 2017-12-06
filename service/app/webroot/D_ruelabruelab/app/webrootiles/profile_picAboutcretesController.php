<?php

/**

 * 

 */

App::uses('AppController', 'Controller');

App::uses('CakeEmail', 'Network/Email');



class AboutcretesController extends AppController {

////////////////////////////////////////////////////////////

    public function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow(array('api_hotelcode','api_guidetocrete','api_guidetocretebeaches','guidebeachesbyparams','api_creteextras','api_creteextrasdetail','api_map','api_search','api_maplist','api_guidetovillages','api_guidetocities','api_regionofcrete','api_beachesregionbyarea','api_beachesbyarea'));
    }

    public function api_aboutcrete(){

		Configure::write('debug',0);
		$this->loadModel('AboutCrete');
        	$this->AboutCrete->recursive = 2; 
			$check = $this->AboutCrete->find('all',array('order' => 'id asc'));
			$response['result'] = $check;
		    $response['status'] = true;
            $response['msg'] = 'About Crete';


		echo json_encode($response);
        exit;
	}

	public function api_guidetocrete(){

		Configure::write('debug',2);
		$this->loadModel('GuideCrete');
        	$this->GuideCrete->recursive = 3; 
			$check = $this->GuideCrete->find('all');
			$response['result'] = $check;
		    $response['status'] = true;
            $response['msg'] = 'Guide to Crete';

		echo json_encode($response);
        exit;
	}

    public function api_guidetocities(){

        Configure::write('debug',0);
        $this->loadModel('GuideList');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['GuideList']['id'] = $redata->GuideList->id;

        if ($this->request->is('post')) {

            $check = $this->GuideList->find('all', array('conditions' => array(
                    "GuideList.guidecreteid" => $this->request->data['GuideList']['id']
                )));

            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Cities info';

        } else {
            
           $response['status'] = False;
           $response['msg'] = 'Villages doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }

    public function api_regionofcrete(){

        Configure::write('debug',0);
        $this->loadModel('GuideVillage');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['GuideVillage']['region'] = $redata->GuideVillage->region;

        if ($this->request->is('post')) {

            $check = $this->GuideVillage->find('all', array('conditions' => array(
                    "GuideVillage.region" => $this->request->data['GuideVillage']['region']
                )));
            
            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Villages info';

        } else {
            
           $response['status'] = False;
           $response['msg'] = 'Villages doesnot exists.';   

        }

        echo json_encode($response);
        exit;

    }

    public function api_guidetovillages(){

        Configure::write('debug',0);
        $this->loadModel('GuideVillage');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['GuideVillage']['id'] = $redata->GuideVillage->id;

        if ($this->request->is('post')) {
            // $this->GuideCrete->recursive = 2; 
            $check = $this->GuideVillage->find('all', array('conditions' => array(
                    "GuideVillage.guidelistid" => $this->request->data['GuideVillage']['id']
                )));
            //,"contain" => array('GuideData','GuideCrete')
            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Villages info';

        } else {
            
           $response['status'] = False;
           $response['msg'] = 'Villages doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }

	public function api_guidetocretebeaches(){

		Configure::write('debug',0);
        $this->loadModel('GuideCrete');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['GuideCrete']['id'] = $redata->GuideCrete->id;

        if ($this->request->is('post')) {
        	$this->GuideCrete->recursive = 2; 
			$check = $this->GuideCrete->find('all', array('conditions' => array(
                    "GuideCrete.id" => $this->request->data['GuideCrete']['id']
                )));
			//,"contain" => array('GuideData','GuideCrete')
			$response['result'] = $check;
		    $response['status'] = true;
            $response['msg'] = 'Info';

		} else {
            
           $response['status'] = False;
           $response['msg'] = 'Info doesnot exists.';   

        }

        echo json_encode($response);
        exit;
	}

	public function api_guidebeachesbyparams(){
		
		Configure::write('debug',0);
        $this->loadModel('GuideBeache');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['GuideBeache']['id'] = $redata->GuideBeache->id;

        if ($this->request->is('post')) {
        	$check = $this->GuideBeache->find('all', array('conditions' => array(
                    "GuideBeache.guidedataid" => $this->request->data['GuideBeache']['id']
            )));

        	$response['result'] = $check;
		    $response['status'] = true;
            $response['msg'] = 'Beaches info';

        } else {
            
           $response['status'] = False;
           $response['msg'] = 'Beaches doesnot exists.';   

        }

		echo json_encode($response);
        exit;
	}

	public function api_creteextras(){
		
		Configure::write('debug',0);
        $this->loadModel('CreteExtra');

        	$check = $this->CreteExtra->find('all');

        	$response['result'] = $check;
		    $response['status'] = true;
            $response['msg'] = 'Crete List';

		echo json_encode($response);
        exit;
	}

	public function api_creteextrasdetail(){
		
		Configure::write('debug',0);
        $this->loadModel('GuideShopping');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['GuideShopping']['id'] = $redata->GuideShopping->id;

        if ($this->request->is('post')) {

        	$check = $this->GuideShopping->find('all', array('conditions' => array(
                    "GuideShopping.creteextraid" => $this->request->data['GuideShopping']['id']
            )));

        	$response['result'] = $check;
		    $response['status'] = true;
            $response['msg'] = 'Crete Data';

        } else {
            
           $response['status'] = False;
           $response['msg'] = 'Crete Data doesnot exists.';   

        }

		echo json_encode($response);
        exit;
	}

    public function api_search(){
        configure::write('debug', 0);
        $this->loadModel('GuideBeache');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);       
        $product_name = $redata->GuideBeache->title;
        
        if($product_name){
        $conditions = array('GuideBeache.title Like' =>'%'.$product_name.'%');
        $resp = $this->GuideBeache->find('all',array('conditions'=>array($conditions),'limit'=>5));

        if ($resp) {
            $response['isSuccess'] = "true";
            $response['data'] = $resp;
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "No Data Available";
        }
        } else {
            $response['isSuccess'] = "false";
            $response['msg'] = "Please select some other beach";
        }
        
        echo json_encode($response);
        exit;
    
    }

    public function api_maplist(){
        
        Configure::write('debug',0);
        $this->loadModel('GuideCrete');

            $check = $this->GuideCrete->find('all',array('fields'=>array('id','title')));
            $checks = array_pop($check);
            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'List of map.';

        echo json_encode($response);
        exit;
    }

    public function api_mapdata(){
        
        Configure::write('debug',0);
        $this->loadModel('GuideList');
        $this->loadModel('GuideVillage');
        $this->loadModel('GuideBeache');
        $this->loadModel('GuideData');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata); 

        $id = $redata->Guide->id;
        $name = $redata->Guide->title;

        if($id == "1"){

        	$check = $this->GuideList->find('all', array('conditions' => array(
                    "GuideList.guidecreteid" => $id
            )));

            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Data of map.';

        }else if($id == "2"){

        	$check = $this->GuideVillage->find('all');

            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Data of map.';

        }else if($id == "3"){

        	$data = $this->GuideData->find('all', array('conditions' => array(
                    "GuideData.guidecreteid" => $id
            )));
            foreach ($data as $key => $value) {
            	$guidedataid = $value['GuideData']['id'];

            	$check[] = $this->GuideBeache->find('all', array('conditions' => array(
                    "GuideBeache.guidedataid" => $guidedataid
            )));
            }

            $response['result'] = array_filter($check);
            $response['status'] = true;
            $response['msg'] = 'Data of map.';

        }else if($id == "4"){

        	$data = $this->GuideData->find('all', array('conditions' => array(
                    "GuideData.guidecreteid" => $id
            )));
            foreach ($data as $key => $value) {
            	$guidedataid = $value['GuideData']['id'];

            	$check[] = $this->GuideBeache->find('all', array('conditions' => array(
                    "GuideBeache.guidedataid" => $guidedataid
            )));
            }

            $response['result'] = array_filter($check);
            $response['status'] = true;
            $response['msg'] = 'Data of map.';

        } else {

        	$data = $this->GuideData->find('all', array('conditions' => array(
                    "GuideData.guidecreteid" => $id
            )));

            $response['result'] = $data;
            $response['status'] = true;
            $response['msg'] = 'Data of map.';

        }

        echo json_encode($response);
        exit;
    }

    public function api_beachesregionbyarea(){

        Configure::write('debug',0);
        $this->loadModel('GuideBeache');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['GuideBeache']['guidedataid'] = $redata->GuideBeache->id;

        if ($this->request->is('post')) {

            $check = $this->GuideBeache->find('all', array(
                    "conditions" => array("GuideBeache.guidedataid" => $this->request->data['GuideBeache']['guidedataid']),
                    "fields" => array("GuideBeache.region"),
                    "group" => "region",
                ));

            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Coast List';

        } else {
            
           $response['status'] = False;
           $response['msg'] = 'Coast List doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }

    public function api_beachesbyarea(){

        Configure::write('debug',0);
        $this->loadModel('GuideBeache');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['GuideBeache']['region'] = $redata->GuideBeache->region;

        if ($this->request->is('post')) {
            
            $check = $this->GuideBeache->find('all', array(
                    "conditions" => array("GuideBeache.region" => $this->request->data['GuideBeache']['region'])
                ));

            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Beaches by area list';

        } else {
            
           $response['status'] = False;
           $response['msg'] = 'Beache doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }

}