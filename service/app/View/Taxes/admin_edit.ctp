<div class="taxes form">
<?php echo $this->Form->create('Tax'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tax'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('resid');
		echo $this->Form->input('tax');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tax.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Tax.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Taxes'), array('action' => 'index')); ?></li>
	</ul>
</div>
