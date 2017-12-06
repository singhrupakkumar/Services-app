<div class="times form">
<?php echo $this->Form->create('Time'); ?>
	<fieldset>
		<legend><?php echo __('Edit Time'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('res_id');
		echo $this->Form->input('mopen');
		echo $this->Form->input('mclose');
		echo $this->Form->input('topen');
		echo $this->Form->input('tclose');
		echo $this->Form->input('wopen');
		echo $this->Form->input('wclose');
		echo $this->Form->input('thopen');
		echo $this->Form->input('thclose');
		echo $this->Form->input('fopen');
		echo $this->Form->input('fclose');
		echo $this->Form->input('satopen');
		echo $this->Form->input('satclose');
		echo $this->Form->input('sunopen');
		echo $this->Form->input('sunclose');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Time.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Time.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Times'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('controller' => 'restaurants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
	</ul>
</div>
