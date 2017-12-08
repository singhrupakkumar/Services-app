<div class="taxes form">
<div class="user_restaurant labl inpt">
    <div class="col-sm-6">
<?php echo $this->Form->create(); ?>
	<fieldset>
		<legend><?php echo __('Add Cancelation time'); ?></legend>
		
	<?php
		//echo $this->Form->input('id');
		echo $this->Form->input('resid',array('type'=>'select','options'=>array($restlist))); 
		echo $this->Form->input('cancel_time',array('required'=>'required','placeholder'=>'Cancelation time in minutes'));
	?> 
	<?php if(@$msgg){echo '<p class="msgg">'.$msgg.'</p>';}?>  
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
	</div>
</div>