<div class="picodes form">
<?php echo $this->Form->create('Picode'); ?>
	<fieldset>
		<legend><?php echo __('Edit Picode'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('res_id');
                echo $this->Form->input('pincode');
		echo $this->Form->input('price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Picode.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Picode.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Picodes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('controller' => 'restaurants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
	</ul>
</div>
