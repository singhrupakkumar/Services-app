<?php

App::uses('AppModel', 'Model');

class Tax extends AppModel {

    public $displayField = 'resid';
    
    public $belongsTo = array(
        'Restaurant' => array(
            'className' => 'Restaurant',
            'foreignKey' => 'resid',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
