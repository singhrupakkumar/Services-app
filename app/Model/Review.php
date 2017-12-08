<?php
App::uses('AppModel', 'Model');
/**
 * Dish Model
 *
 * @property Cat $Cat
 * @property n $n
 */
class Review extends AppModel {

/**
 * Display field
 *
 * @var string
 */
  public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'uid',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),'Restaurant' => array(
			'className' => 'Restaurant',
			'foreignKey' => 'resid',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
  