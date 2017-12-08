<?php

App::uses('AppModel', 'Model');

class StatusHistory extends AppModel {
    public $useTable = 'status_historys';
    
    public $belongsTo = array(
        'Patient' => array(
            'className' => 'Patient',
            'foreignKey' => 'patientid',
            'dependent' => true,
        )
    );
   
}
