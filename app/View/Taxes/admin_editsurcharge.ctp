<div class="taxes form">
<div class="user_restaurant labl inpt">
    <div class="col-sm-6">
<?php echo $this->Form->create(); ?>
	<fieldset>
		<legend><?php echo __('Edit Surcharge'); ?></legend>
	<?php
		//echo $this->Form->input('id');
		//echo $this->Form->input('resid');
		echo $this->Form->input('surcharge',array('required'=>'required','type'=>'text'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</br></br>
<b><?php echo $msgg; ?></b>
</br>
</div>
	</div>
</div>

