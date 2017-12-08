<?php
App::uses('AppModel', 'Model');
class Product extends AppModel {


  
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category', 
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),'User' => array(
            'User' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
		'Country' => array(
            'User' => 'Country',
            'foreignKey' => 'origincountry',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
		
    );
////////////////////////////////////////////////////////////

    // public $hasMany = array(
    //     'UserDrink' => array(
    //         'className' => 'Offer',
    //         'foreignKey' => 'drinkid',
    //         'dependent' => true,
    //         'conditions' => '',
    //         'fields' => '',
    //         'order' => '',
    //         'limit' => '',
    //         'offset' => '',
    //         'exclusive' => '',
    //         'finderQuery' => '',
    //         'counterQuery' => ''
    //     )
    // );


}