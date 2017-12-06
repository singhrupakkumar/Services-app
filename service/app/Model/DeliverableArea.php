<?php
App::uses('AppModel', 'Model');
/**
 * Area Model
 *
 * @property City $City
 */
class DeliverableArea extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Restaurant' => array(
			'className' => 'Restaurant',
			'foreignKey' => 'res_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
