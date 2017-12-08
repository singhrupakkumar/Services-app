<div class="row">
<div class="col-sm-3">
<div class="dishSubcats form">
<?php echo $this->Form->create('Alergy'); ?>
	<fieldset>
		<legend><?php echo __('Add Alergy'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('about');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
<div class="col-sm-3">
<div class="actions action_menu">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Alergies'), array('action' => 'index')); ?></li>
	</ul>
</div>
</div>
</div>
    
