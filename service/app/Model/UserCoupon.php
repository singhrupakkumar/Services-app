<?php
App::uses('AppModel', 'Model');
class UserCoupon extends AppModel {
    public $useTable = 'user_coupons';  
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'invited_by'
        )
    );
}
