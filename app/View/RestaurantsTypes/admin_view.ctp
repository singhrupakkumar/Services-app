<div class="row">
<div class="col-sm-12">
<div class="restaurantsTypes view">
<h2 style="padding-left:15px;"><?php echo __('Restaurants Type'); ?></h2>
	<dl class="typed">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($restaurantsType['RestaurantsType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($restaurantsType['RestaurantsType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($restaurantsType['RestaurantsType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($restaurantsType['RestaurantsType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
<div class="col-sm-12">
<div class="actions action_menu">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Restaurants Type'), array('action' => 'edit', $restaurantsType['RestaurantsType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Restaurants Type'), array('action' => 'delete', $restaurantsType['RestaurantsType']['id']), array(), __('Are you sure you want to delete # %s?', $restaurantsType['RestaurantsType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurants Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurants Type'), array('action' => 'add')); ?> </li>
	</ul>
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