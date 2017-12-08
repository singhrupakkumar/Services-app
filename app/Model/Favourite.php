<?php
App::uses('AppModel', 'Model');
/**
 * Alergy Model
 *
 */
class Favourite extends AppModel {

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'proid',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
