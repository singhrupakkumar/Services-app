<?php
App::uses('AppModel', 'Model');
/**
 * Dish Model
 *
 * @property Cat $Cat
 * @property n $n
 */
class TableReservation extends AppModel {

        /**
 * Validation rules
 *
 * @var array
 */
    public $belongsTo = array(
           'Restaurant' => array(
            'className' => 'Restaurant',
            'foreignKey' => 'res_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        )

);
}
