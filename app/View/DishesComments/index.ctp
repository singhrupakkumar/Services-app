<div class="dishesComments index">
	<h2><?php echo __('Dishes Comments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('dish_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('is_deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($dishesComments as $dishesComment): ?>
	<tr>
		<td><?php echo h($dishesComment['DishesComment']['id']); ?>&nbsp;</td>
		<td><?php echo h($dishesComment['DishesComment']['user_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dishesComment['Dish']['name'], array('controller' => 'dishes', 'action' => 'view', $dishesComment['Dish']['id'])); ?>
		</td>
		<td><?php echo h($dishesComment['DishesComment']['comment']); ?>&nbsp;</td>
		<td><?php echo h($dishesComment['DishesComment']['image']); ?>&nbsp;</td>
		<td><?php echo h($dishesComment['DishesComment']['created']); ?>&nbsp;</td>
		<td><?php echo h($dishesComment['DishesComment']['modified']); ?>&nbsp;</td>
		<td><?php echo h($dishesComment['DishesComment']['status']); ?>&nbsp;</td>
		<td><?php echo h($dishesComment['DishesComment']['is_deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dishesComment['DishesComment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dishesComment['DishesComment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dishesComment['DishesComment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dishesComment['DishesComment']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Dishes Comment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('controller' => 'dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish'), array('controller' => 'dishes', 'action' => 'add')); ?> </li>
	</ul>
</div>
