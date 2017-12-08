<div class="dishesComments form">
<?php echo $this->Form->create('DishesComment'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Dishes Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('dish_id');
		echo $this->Form->input('comment');
		echo $this->Form->input('image');
		echo $this->Form->input('status');
		echo $this->Form->input('is_deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DishesComment.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('DishesComment.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Dishes Comments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('controller' => 'dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish'), array('controller' => 'dishes', 'action' => 'add')); ?> </li>
	</ul>
</div>
