<?php
App::uses('AppController', 'Controller');
class ServicesController extends AppController {

////////////////////////////////////////////////////////////

    public $components = array('Paginator');
    public function beforeFilter() {
       parent::beforeFilter();
        $this->Auth->allow(array('api_servicelist','api_provideraddservice'));
        
      
    }
	    public $distance = 30;     

/////////////////////All Api///////////////////////////////////////

		public function api_servicelist(){
		    Configure::write("debug", 0);
			$this->layout = 'ajax';	
			$this->loadModel('Providerservice'); 
			
			$providerid = $this->request->data['provider_id'];
			if($providerid){
			$options = array('conditions' => array('Service.status'=>1));
			$data = $this->Service->find('all', $options);
			
			$options = array('conditions' => array('Providerservice.provider_id'=>$providerid));
			$providerservice = $this->Providerservice->find('all', $options);
			$keys = array();
			foreach($providerservice as $k){
			    
			 $keys[] =   $k['Providerservice']['service_id']; 
			}
			
			foreach($data as &$d){
			    if(in_array($d['Service']['id'], $keys)){
			        $d['Service']['checked'] = "true";
			    }else{
			       $d['Service']['checked'] = "false";  
			    }
			}
			
			if($data){
				$response['status'] = true; 
				$response['service'] = $data; 
				$response['providerservice'] = $providerservice; 
				}else{
				$response['status'] = false; 
				$response['msg'] = "Unable to get data";
			} 
			}else{
				$response['status'] = false; 
				$response['msg'] = "Please post provider_id";
			}
			echo json_encode($response); 
			exit;
			
		}
		
		public function api_provideraddservice(){
			Configure::write("debug", 0);
			$this->layout = 'ajax';
			$this->loadModel('Providerservice'); 	
			if($this->request->is('post')){
			$provider_id = $this->request->data['provider_id'];
			$service_id = $this->request->data['service_id'];
			$options = array('conditions' =>array('AND'=>array('Providerservice.provider_id'=>$provider_id,'Providerservice.service_id'=>$service_id)));
			$data = $this->Providerservice->find('first', $options);
			if($data){
                              $this->Providerservice->id = $data['Providerservice']['id'];
                              if($this->Providerservice->delete()){
                                $response['status'] = true; 
                                $response['msg'] = "Service deleted!";    
                              }else{ 
                                $response['status'] = false; 
                                $response['msg'] = "Something Wrong";    
                              }
			}else{
			$this->request->data['Providerservice']['service_id'] =	$service_id;
			$this->request->data['Providerservice']['provider_id'] =	$provider_id;
			$this->Providerservice->create();
			if($this->Providerservice->save($this->request->data)){
				$response['status'] = true; 
				$response['msg'] = "Service added";	
				
					
			}else{
			    $response['status'] = false; 
			    $response['msg'] = "Something Wrong";	
			}	
				
				
			}
				
				
			}
		 
			echo json_encode($response); 
			exit;	
		}

		public function api_searchservice(){
			configure::write('debug', 0);
		    $this->loadModel('User');
			$this->layout = "ajax";
		    $this->User->recursive = 2; 
			if($this->request->is('post')){
			//$lat = 30.7294341;
			//$long = 76.84461499999999;	
			$lat =  $this->request->data['lat'];
			$long = $this->request->data['long']; 	
				
		    $data = $this->User->find('all', array('conditions'=>array('User.role'=>'provider'),"fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,User.latitude,User.longitude) as distance", "User.*"),
                     "ORDER BY" => 'DESC',
                ));	
                
            $provider_service_id = array();
			$cnt = count($data);
            for ($i = 0; $i < $cnt; $i++) {
                if ($data[$i][0]['distance'] < $this->distance) {
				 if(!empty($data[$i]['Providerservice'])){
				     foreach($data[$i]['Providerservice'] as $service){
				     $provider_service_id[] = $service['service_id'];
				     }
				 }
                }
				else {
                    unset($data[$i]);
                }
            }
                  $this->Service->recursive = 2;     
                  $servi =  $this->Service->find('all',array('conditions'=>array('Service.id'=>$provider_service_id)));
        
            foreach($servi as &$cat){
                
					if($cat['Category']['image']){
					$cat['Category']['image'] = FULL_BASE_URL . $this->webroot . "files/catimage/" . $cat['Category']['image'];	
					}else{
					$cat['Category']['image'] = FULL_BASE_URL . $this->webroot . "files/catimage/noimage.png";		
					}	
        
            }	
		
		
	
			foreach($servi as &$key){

				if(!empty($key['Category']['SubCategory'])){

					foreach($key['Category']['SubCategory'] as $k => &$subcat){


						//if(in_array($subcat['id'],$subcatids)){ 
							

						if($subcat['image']){
						$subcat['image'] = FULL_BASE_URL . $this->webroot . "files/subcatimage/" .$subcat['image'];	
						}else{
						$subcat['image'] = FULL_BASE_URL . $this->webroot . "files/subcatimage/noimage.png";
						} 		
							
					//	}else{
						

				// 			if($subcat['image']){
				// 		$subcat['image'] = FULL_BASE_URL . $this->webroot . "files/subcatimage/" .$subcat['image'];	
				// 		}else{
				// 		$subcat['image'] = FULL_BASE_URL . $this->webroot . "files/subcatimage/noimage.png";
				// 		}		
						//unset($key['Category']['SubCategory'][$k])	;  
					//	}
					
					}
					
			
				}

		    }
		

			$counter = 0;
			foreach($servi as $d)
			{
				$new_data[$counter++] = $d;
			}
                
     
                
            if ($new_data) {
                $response['isSuccess'] = "true";
                $response['data'] =  $new_data;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }	
			}else{
			    $response['isSuccess'] = "false";
                $response['msg'] = "Lat Long Required";	
			}	


		echo json_encode($response);
        exit;
	
		}
	  
	  
		public function api_searchservicebytype(){
		    configure::write('debug', 0);
		    $this->loadModel('User');
			$this->layout = "ajax";
		    $this->User->recursive = 2; 
			if($this->request->is('post')){
    	        $lat =  $this->request->data['lat'];
    			$long = $this->request->data['long']; 	
    			$cat_id = $this->request->data['cat_id']; 	
    			$provider_type = $this->request->data['provider_type'];
    			$distance = $this->request->data['distance']; 		
				
		    $data = $this->User->find('all', array('conditions'=>array('User.role'=>'provider'),"fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,User.latitude,User.longitude) as distance", "User.*"),
                     "ORDER BY" => 'DESC',
                ));	
                
            $provider_service_id = array();
			$cnt = count($data);
            for ($i = 0; $i < $cnt; $i++) {
                if ($data[$i][0]['distance'] < $distance) {
				 if(!empty($data[$i]['Providerservice'])){
				     foreach($data[$i]['Providerservice'] as $service){
				     $provider_service_id[] = $service['service_id'];
				     }
				 }
                }
				else {
                    unset($data[$i]);
                }
            }
                  $this->Service->recursive = 2;     
                  $servi =  $this->Service->find('all',array('conditions'=>array('AND'=>array('Service.id'=>$provider_service_id,'Service.category_id'=>$cat_id,'User.provider_type'=>trim($provider_type)))));
        
            foreach($servi as &$cat){
                
					if($cat['Category']['image']){
					$cat['Category']['image'] = FULL_BASE_URL . $this->webroot . "files/catimage/" . $cat['Category']['image'];	
					}else{
					$cat['Category']['image'] = FULL_BASE_URL . $this->webroot . "files/catimage/noimage.png";		
					}	
        
            }	
		
		
	
			foreach($servi as &$key){

				if(!empty($key['Category']['SubCategory'])){

					foreach($key['Category']['SubCategory'] as $k => &$subcat){


						//if(in_array($subcat['id'],$subcatids)){ 
							

						if($subcat['image']){
						$subcat['image'] = FULL_BASE_URL . $this->webroot . "files/subcatimage/" .$subcat['image'];	
						}else{
						$subcat['image'] = FULL_BASE_URL . $this->webroot . "files/subcatimage/noimage.png";
						} 		
							
					//	}else{
						

				// 			if($subcat['image']){
				// 		$subcat['image'] = FULL_BASE_URL . $this->webroot . "files/subcatimage/" .$subcat['image'];	
				// 		}else{
				// 		$subcat['image'] = FULL_BASE_URL . $this->webroot . "files/subcatimage/noimage.png";
				// 		}		
						//unset($key['Category']['SubCategory'][$k])	;  
					//	}
					
					}
					
			
				}

		    }
		

			$counter = 0;
			foreach($servi as $d)
			{
				$new_data[$counter++] = $d;
			}
                
     
                
            if ($new_data) {
                $response['isSuccess'] = "true";
                $response['data'] =  $new_data;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }	
			}else{
			    $response['isSuccess'] = "false";
                $response['msg'] = "Lat Long Required";	
			}	


		echo json_encode($response);
        exit;
		
		}

	  
	  	public function api_allservice(){
			
			configure::write('debug', 0);
			//$this->Service->recursive = 2;
			$this->layout = "ajax";
			$this->loadModel('SubCategory');
			if($this->request->is('post')){
			//$lat = 30.7294341;
			//$long = 76.84461499999999;	
			$catid =  $this->request->data['catid'];
		
			$subcatid = $this->request->data['subcatid'];	
			$data['SubCat'] = $this->SubCategory->find('first', array('conditions' => array('SubCategory.id' => $subcatid)));	
		    $data['Service'] = $this->Service->find('all', array('conditions' => array('AND' => array('Service.category_id' => $catid,'Service.sub_catid' => $subcatid, 'Service.status' => 1)),'group' =>'Service.name'
                    ));	
            
            if ($data) {
                $response['isSuccess'] = "true";
                $response['data'] = $data;
            } else {
                $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";
            }	
			 }else{
			    $response['isSuccess'] = "false";
                $response['msg'] = "There is no data available";	
			}  	

		echo json_encode($response);
        exit;

			
		}
	  
	  
	  
	  
////////////////////////////////////////////////////////////

    public function admin_index($id = null) {
        Configure::write("debug", 0);
        $this->set('services', $this->Service->find('all',array('conditions'=>array('Service.provider_id'=>$id))));
        $this->set('provider_id',$id);
    }
	
	public function admin_availabledates($id = null) {
        Configure::write("debug", 2);
		$this->loadModel('User');
		 $provider = $this->User->find('all',array('conditions'=>array(
                        'AND'=>array(
                            'User.id'=>$id,
                            'User.role'=>'provider'    
                        )
                    )
                 ));
        $this->set('provider', $provider);
        $this->set('provider_id',$id);
    }
////////////////////////////////////////////////////////////

    public function admin_view($id = null) {
        if (!$this->Service->exists($id)) {
            throw new NotFoundException('Invalid Service');
        }
        $options = array('conditions' => array('Service.id' => $id));
        $this->set('service', $this->Service->find('first', $options));
    }

////////////////////////////////////////////////////////////

    public function admin_add($provider_id = null) {
	
		$this->loadModel('Category');
		$this->loadModel('SubCategory');
        if ($this->request->is('post')) {
			$this->request->data['Service']['provider_id'] = $provider_id;
            $this->Service->create();
            if ($this->Service->save($this->request->data)) {
                $this->Session->setFlash('The Service has been saved.');
                return $this->redirect($this->referer());
                // return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The Service could not be saved. Please, try again.');
            }
        }
		$this->set('Category', $this->Category->find('list'));
		
    }
	public function admin_subcat() {
		
			Configure::write('debug', 0);    
                 $this->layout = 'ajax';
			$this->loadModel('SubCategory');	 
		  if ($this->request->is('post')) {
			  $cat_id = $this->request->data['id'];
			$subcat = $this->SubCategory->find('all',array('conditions'=>array('SubCategory.category_id'=>$cat_id))) ;
		  }
		echo json_encode($subcat);
       exit;  
	}
	

////////////////////////////////////////////////////////////

    public function admin_edit($id = null) {
		$this->loadModel('Category');
	
        if (!$this->Service->exists($id)) {
            throw new NotFoundException('Invalid Service');
        }
        if ($this->request->is(array('post', 'put'))) {
			$this->Service->id = $id;
            if ($this->Service->save($this->request->data)) {
                $this->Session->setFlash('The Service has been saved.');
			$options = array('conditions' => array('Service.id' => $id));
            $data = $this->request->data = $this->Service->find('first', $options);	
                return $this->redirect(array('action' => 'index/'.$data['Service']['provider_id']));
            } else {
                $this->Session->setFlash('The Service could not be saved. Please, try again.');
            }
        } else {
            $options = array('conditions' => array('Service.id' => $id));
            $this->request->data = $this->Service->find('first', $options);
        }
			$this->set('Category', $this->Category->find('list'));
    }

////////////////////////////////////////////////////////////

    public function admin_delete($id = null) {
        $this->Service->id = $id;
        if (!$this->Service->exists()) {
            throw new NotFoundException('Invalid Service');
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Service->delete()) {
            $this->Session->setFlash('The Service has been deleted.');
        } else {
            $this->Session->setFlash('The Service could not be deleted. Please, try again.');
        }
        return $this->redirect(array('action' => 'index'));
    }

////////////////////////////////////////////////////////////

}
