<?php
App::uses('AppModel', 'Model');
/**
 * RestaurantsType Model
 *
 */
class RestaurantsType extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'restaurants_type';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

}
