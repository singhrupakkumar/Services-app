<div class="restaurantsTypes form">
<?php echo $this->Form->create('RestaurantsType'); ?>
	<fieldset>
		<legend><?php echo __('Add Restaurants Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Restaurants Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
