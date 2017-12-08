<div class="row">
<div class="col-sm-12">
<div class="restaurantsTypes view">
<h2 style="padding-left:15px;"><?php echo __('Free Drink Category'); ?></h2>
	<dl class="typed">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($Drink['Drink']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($Drink['Drink']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($Drink['Drink']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($Drink['Drink']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
<div class="col-sm-12">
<div class="actions action_menu">
	<h3><?php echo __('Actions'); ?></h3>
	&nbsp;	&nbsp;

	<?php echo $this->Html->link(__('Edit Free Drink Category'), array('action' => 'edit', $Drink['Drink']['id']),array('class'=>'btn btn-info')); ?> 
	<?php echo $this->Form->postLink(__('Delete Free Drink Category'), array('action' => 'delete', $Drink['Drink']['id']), array('class'=>'btn btn-danger'), __('Are you sure you want to delete # %s?', $Drink['Drink']['id'])); ?> 
	<?php echo $this->Html->link(__('List Free Drink Categorys'), array('action' => 'index'),array('class'=>'btn btn-primary')); ?> 
	<?php echo $this->Html->link(__('New Free Drink Category'), array('action' => 'add'),array('class'=>'btn btn-warning')); ?> 
	
</div>
</div>
</div>

<style>

.typed{
    background: #fff;
    float: left;
    width: 96%;
    margin: 0 2%;
}
.restaurantsTypes.view dt {
    width: 20%;
    float: left;
    padding: 10px;
    border-bottom: 1px solid #ccc;
}
.restaurantsTypes.view dd{
    margin-left: 0;
    width: 80%;
    float: left;
    padding: 10px;
    border-bottom: 1px solid #ccc;
}
</style>