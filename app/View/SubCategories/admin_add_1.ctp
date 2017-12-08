<div class="row">
<div class="col-sm-3">
<div class="dishSubcats form">
<?php echo $this->Form->create('DishSubcat'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Dish Subcat'); ?></legend>
	<?php
                echo $this->Form->input('dish_catid', ['options' => $dishCategories, 'label' => 'Dish Category Name:']); 
		echo $this->Form->input('name');
		//echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
<div class="col-sm-3">
<div class="actions action_menu">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Dish Subcats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Dish Categories'), array('controller' => 'dish_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Category'), array('controller' => 'dish_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
</div>
