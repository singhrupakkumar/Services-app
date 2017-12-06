<div class="times form">
<?php echo $this->Form->create('Time'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Time'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('res_id');
		echo $this->Form->input('mopen',array('label'=>'Monday Open:-'));
		echo $this->Form->input('mclose',array('label'=>'Monday Close:-'));
		echo $this->Form->input('topen',array('label'=>'Tuesday Open:-'));
		echo $this->Form->input('tclose',array('label'=>'Tuesday Close:-'));
		echo $this->Form->input('wopen',array('label'=>'Wednesday Open:-'));
		echo $this->Form->input('wclose',array('label'=>'Wednesday Close:-'));
		echo $this->Form->input('thopen',array('label'=>'Thursday Open:-'));
		echo $this->Form->input('thclose',array('label'=>'Thursday Close:-'));
		echo $this->Form->input('fopen',array('label'=>'Friday Open:-'));
		echo $this->Form->input('fclose',array('label'=>'Friday Close:-'));
		echo $this->Form->input('satopen',array('label'=>'Saturday Open:-'));
		echo $this->Form->input('satclose',array('label'=>'Saturday Close:-'));
		echo $this->Form->input('sunopen',array('label'=>'Sunday Open:-'));
		echo $this->Form->input('sunclose',array('label'=>'Sunday Close:-'));
	?>
                     <div class="form-group">
                    <?php echo $this->Form->input('mcl', array('class' => 'form-control1', 'type'=>'checkbox', 'label' => 'Monday Closed:')); ?>
                </div>
                 <div class="form-group">
                    <?php echo $this->Form->input('tcl', array('class' => 'form-control1', 'type'=>'checkbox', 'label' => 'Tuesday Closed:')); ?>
                </div>
                 <div class="form-group">
                    <?php echo $this->Form->input('wcl', array('class' => 'form-control1', 'type'=>'checkbox', 'label' => 'Wednesday Closed:')); ?>
                </div>
                 <div class="form-group">
                    <?php echo $this->Form->input('thcl', array('class' => 'form-control1', 'type'=>'checkbox', 'label' => 'Thrusday Closed:')); ?>
                </div>
                 <div class="form-group">
                    <?php echo $this->Form->input('fcl', array('class' => 'form-control1', 'type'=>'checkbox', 'label' => 'Friday Closed:')); ?>
                </div>
                 <div class="form-group">
                    <?php echo $this->Form->input('satcl', array('class' => 'form-control1', 'type'=>'checkbox', 'label' => 'Saturday Closed:')); ?>
                </div>
                 <div class="form-group">
                    <?php echo $this->Form->input('suncl', array('class' => 'form-control1', 'type'=>'checkbox', 'label' => 'Sunday Closed:')); ?>
                </div>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Time.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Time.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Times'), array('action' => 'index')); ?></li>
		
	</ul>
</div>
