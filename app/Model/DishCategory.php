<?php
App::uses('AppModel', 'Model');
/**
 * DishCategory Model
 *
 */
class DishCategory extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    
	public $displayField = 'name';
        
        public $hasMany = array(
            'DishSubcat' => array(
            'className' => 'DishSubcat',
            'foreignKey' => 'dish_catid',
             'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
        ),
    );

}
