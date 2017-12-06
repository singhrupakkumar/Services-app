<div class="dishes view">
<h2><?php echo __('Dish'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cat Id'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['cat_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restaurant Id'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['restaurant_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dish Image'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['dish_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descrption'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['descrption']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Deleted'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['is_deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dish'), array('action' => 'edit', $dish['Dish']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dish'), array('action' => 'delete', $dish['Dish']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dish['Dish']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish'), array('action' => 'add')); ?> </li>
	</ul>
</div>
