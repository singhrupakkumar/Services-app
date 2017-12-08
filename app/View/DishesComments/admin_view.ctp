<div class="dishesComments view">
<h2><?php echo __('Dishes Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dishesComment['DishesComment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($dishesComment['DishesComment']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dish'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dishesComment['Dish']['name'], array('controller' => 'dishes', 'action' => 'view', $dishesComment['Dish']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($dishesComment['DishesComment']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($dishesComment['DishesComment']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dishesComment['DishesComment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($dishesComment['DishesComment']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($dishesComment['DishesComment']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Deleted'); ?></dt>
		<dd>
			<?php echo h($dishesComment['DishesComment']['is_deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dishes Comment'), array('action' => 'edit', $dishesComment['DishesComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dishes Comment'), array('action' => 'delete', $dishesComment['DishesComment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dishesComment['DishesComment']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Dishes Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dishes Comment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('controller' => 'dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish'), array('controller' => 'dishes', 'action' => 'add')); ?> </li>
	</ul>
</div>
