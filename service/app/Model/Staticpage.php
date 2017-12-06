<?php
App::uses('AppModel', 'Model');
/**
 * Staticpage Model
 *
 * @property User $User
 */
class Staticpage extends AppModel {

/**
 * Use database config
 *
 * @var string
 */


/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
        public $actsAs = array('Containable');


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
