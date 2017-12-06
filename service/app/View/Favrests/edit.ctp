<div class="favrests form">
<?php echo $this->Form->create('Favrest'); ?>
	<fieldset>
		<legend><?php echo __('Edit Favrest'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('res_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Favrest.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Favrest.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Favrests'), array('action' => 'index')); ?></li>
	</ul>
</div>
