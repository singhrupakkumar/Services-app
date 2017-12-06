<div class="taxes form">
<?php echo $this->Form->create('Promocode'); ?>
	<fieldset>
		<legend><?php echo __('Add Promocode'); ?></legend>
	<?php
             
		echo $this->Form->input('promocode');
                echo $this->Form->input('res_id',array('type'=>'hidden','value'=>$resid));
                echo $this->Form->input('percentage');
                echo $this->Form->input('expired',array('label'=>'Expire Time'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li>
                <?php echo $this->Html->link('View all Promocode', array('controller' => 'promocodes', 'action' => 'index', $resid), array('class' => 'btn btn-default btn-xs')); ?>     
                </li>    
	</ul>
</div>
