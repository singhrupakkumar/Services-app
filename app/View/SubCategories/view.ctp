<div class="dishSubcats view">
<h2><?php echo __('Dish Subcat'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dish Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dishSubcat['DishCategory']['name'], array('controller' => 'dish_categories', 'action' => 'view', $dishSubcat['DishCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dish Subcat'), array('action' => 'edit', $dishSubcat['DishSubcat']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dish Subcat'), array('action' => 'delete', $dishSubcat['DishSubcat']['id']), array(), __('Are you sure you want to delete # %s?', $dishSubcat['DishSubcat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dish Subcats'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Subcat'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dish Categories'), array('controller' => 'dish_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Category'), array('controller' => 'dish_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
