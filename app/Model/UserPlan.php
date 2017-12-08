<?php
App::uses('AppModel', 'Model');
class UserPlan extends AppModel {
    public $useTable = 'user_plans';

  
   public $belongsTo = array(
        'SubscriptionPlan' => array(
            'className' => 'SubscriptionPlan',
            'foreignKey' => 'plan_id', 
        ),
       'User' => array(
         'className' => 'User',
         'foreignKey' => 'user_id'
    )
    );  
   
}
