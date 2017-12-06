<?php
App::uses('AppModel', 'Model');
class UserDrink extends AppModel {
    public $useTable = 'user_drinks';
  
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'userid',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true,
            'counterScope' => array(),
        ),
        'Restaurant' => array(
            'className' => 'Restaurant',
            'foreignKey' => 'resid',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true,
            'counterScope' => array(),
        )
        ,
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'drinkid',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true,
            'counterScope' => array(),
        )
    );
}
