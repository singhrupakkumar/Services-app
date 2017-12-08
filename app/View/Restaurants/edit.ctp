<div class="restaurants form">
<?php echo $this->Form->create('Restaurant'); ?>
	<fieldset>
		<legend><?php echo __('Edit Restaurant'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('name');
		echo $this->Form->input('phone');
		echo $this->Form->input('owner_name');
		echo $this->Form->input('owner_phone');
		echo $this->Form->input('street');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('country');
		echo $this->Form->input('details');
		echo $this->Form->input('description');
		echo $this->Form->input('logo');
		echo $this->Form->input('website');
		echo $this->Form->input('email');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Restaurant.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Restaurant.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmark Dishes'), array('controller' => 'bookmark_dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark Dish'), array('controller' => 'bookmark_dishes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('controller' => 'dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish'), array('controller' => 'dishes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurats Reviews'), array('controller' => 'restaurats_reviews', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurats Review'), array('controller' => 'restaurats_reviews', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Checkins'), array('controller' => 'user_checkins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Checkin'), array('controller' => 'user_checkins', 'action' => 'add')); ?> </li>
	</ul>
</div>
