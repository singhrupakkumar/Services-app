<?php
App::uses('AppModel', 'Model');
class User extends AppModel {

////////////////////////////////////////////////////////////

 public $useTable = 'users'; 


	  
////////////////////////////////////////////////////////////

    public function beforeSave($options = array()) {
        if(isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
	
	
	  public $hasMany = array( 
        'Providerservice'=>array(
            'className'=>'Providerservice',
            'foreignKey'=>'provider_id',
            'dependent'=>true
        ),
		 'Userdoc'=>array(
            'className'=>'Userdoc',
            'foreignKey'=>'user_id',
            'dependent'=>true
        )
    );

////////////////////////////////////////////////////////////

}
