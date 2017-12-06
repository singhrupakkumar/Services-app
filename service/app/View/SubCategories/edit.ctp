<div class="dishSubcats form">
<?php echo $this->Form->create('DishSubcat'); ?>
	<fieldset>
		<legend><?php echo __('Edit Dish Subcat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dish_catid');
		echo $this->Form->input('name');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DishSubcat.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('DishSubcat.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Dish Subcats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Dish Categories'), array('controller' => 'dish_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Category'), array('controller' => 'dish_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
