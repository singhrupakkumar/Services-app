<?php
App::uses('AppModel', 'Model');
class AvailableDate extends AppModel {
     public $belongsTo = array(
      'User' => array(
          'className' => 'User',
          'foreignKey' => 'provider_id',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      )
  );
  
  
  
 
}
?>