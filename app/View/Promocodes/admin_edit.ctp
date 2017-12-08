<div class="taxes form">
<?php echo $this->Form->create('Promocode'); ?>
	<fieldset>
		<legend><?php echo __('Edit Promocode'); ?></legend>
	<?php
                echo $this->Form->input('promocode');
                echo $this->Form->input('res_id',array('type'=>'hidden'));
                echo $this->Form->input('percentage');
                echo $this->Form->input('expired',array('label'=>'Expire Time'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
