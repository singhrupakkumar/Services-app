<div class="restaurants index">
  
	<h2><?php echo __('Restaurants'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('owner_name'); ?></th>
			<th><?php echo $this->Paginator->sort('owner_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
<!--			<th><?php //echo $this->Paginator->sort('details'); ?></th>-->
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('logo'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('latitude'); ?></th>
			<th><?php echo $this->Paginator->sort('longitude'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($restaurants as $restaurant): ?>
	<tr>
		<td><?php echo h($restaurant['Restaurant']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($restaurant['User']['id'], array('controller' => 'users', 'action' => 'view', $restaurant['User']['id'])); ?>
		</td>
		<td><?php echo h($restaurant['Restaurant']['name']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['phone']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['owner_name']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['owner_phone']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['street']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['city']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['state']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['zip']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['country']); ?>&nbsp;</td>
<!--		<td><?php //echo h($restaurant['Restaurant']['details']); ?>&nbsp;</td>-->
		<td><?php echo h($restaurant['Restaurant']['description']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['logo']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['website']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['email']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['latitude']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['longitude']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['created']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['modified']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($restaurant['Restaurant']['status']); ?>&nbsp;</td>
        <td><?php echo h($restaurant['Restaurant']['open_time']); ?>&nbsp;</td>
        <td><?php echo h($restaurant['Restaurant']['close_time']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $restaurant['Restaurant']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $restaurant['Restaurant']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $restaurant['Restaurant']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $restaurant['Restaurant']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Restaurant'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmark Dishes'), array('controller' => 'bookmark_dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark Dish'), array('controller' => 'bookmark_dishes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('controller' => 'dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish'), array('controller' => 'dishes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurats Reviews'), array('controller' => 'restaurats_reviews', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurats Review'), array('controller' => 'restaurats_reviews', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Checkins'), array('controller' => 'user_checkins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Checkin'), array('controller' => 'user_checkins', 'action' => 'add')); ?> </li>
	</ul>
</div>
