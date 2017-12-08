<?php
App::uses('AppModel', 'Model');
/**
 * Service Model
 *
 */
class Service extends AppModel
{
	
	
		public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
                        'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SubCategory' => array(
			'className' => 'SubCategory',
			'foreignKey' => 'sub_catid',
                        'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		,
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'provider_id',
                        'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	  public $hasMany = array(
  
    );


}
