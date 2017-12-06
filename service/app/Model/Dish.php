<?php
App::uses('AppModel', 'Model');
/**
 * Dish Model
 *
 * @property Cat $Cat
 * @property n $n
 */
class Dish extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
        

// The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'DishCategory' => array(
			'className' => 'DishCategory',
			'foreignKey' => 'cat_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                'Restaurant' => array(
			'className' => 'Restaurant',
			'foreignKey' => 'restaurant_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        public $hasMany = array(
		'FavouriteDish' => array(
			'className' => 'FavouriteDish',
			'foreignKey' => 'dish_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
            'UserCheckin' => array(
			'className' => 'UserCheckin',
			'foreignKey' => 'dish_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
            );
        /**
 * Validation rules
 *
 * @var array
 */
public $validate = array(
		);
}
