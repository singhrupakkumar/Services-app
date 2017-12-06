<?php
App::uses('AppModel', 'Model');
class Userdetail extends AppModel {

////////////////////////////////////////////////////////////

 public $useTable = 'users'; 

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );


////////////////////////////////////////////////////////////

}
