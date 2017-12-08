<?php

App::uses('AppModel', 'Model');

/**

 * Patient Model

 *

 * 

 */

class Patient extends AppModel {
  
  public $useTable = 'patients'; 

  public $hasMany = array(
        'PatientTest' => array(
            'className' => 'PatientTest',
            'foreignKey' => 'patientid',
            'dependent' => true,
        )
    );

}

