<div class="dishes form">
<?php echo $this->Form->create('Dish'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Dish'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cat_id');
		echo $this->Form->input('restaurant_id');
		echo $this->Form->input('name');
		echo $this->Form->input('dish_image');
		echo $this->Form->input('details');
		echo $this->Form->input('descrption');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('status');
		echo $this->Form->input('is_deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Dish.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Dish.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('action' => 'index')); ?></li>
	</ul>
</div>
