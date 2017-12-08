<?php

App::uses('AppModel', 'Model');

class StatusCancel extends AppModel {
    public $useTable = 'status_cancels';
    
   public $hasMany = array(
        'Patient' => array(
            'className' => 'Patient',
            'foreignKey' => 'id',
            'dependent' => true,
        )
    );
}