<?php
App::uses('AppModel', 'Model');
class Bill extends AppModel {

////////////////////////////////////////////////////////////

 public $useTable = 'bills'; 


    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

////////////////////////////////////////////////////////////

}
