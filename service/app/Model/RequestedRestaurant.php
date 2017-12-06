<?php
App::uses('AppModel', 'Model');
class RequestedRestaurant extends AppModel {
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true,
            'counterScope' => array(),
        ),
        'Theme' => array(
            'className' => 'Theme',
            'foreignKey' => 'theme_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true,
            'counterScope' => array(),
        )
    );
}