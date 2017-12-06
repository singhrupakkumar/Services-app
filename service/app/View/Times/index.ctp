<div class="times index">
	<h2><?php echo __('Times'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('res_id'); ?></th>
			<th><?php echo $this->Paginator->sort('mopen'); ?></th>
			<th><?php echo $this->Paginator->sort('mclose'); ?></th>
			<th><?php echo $this->Paginator->sort('topen'); ?></th>
			<th><?php echo $this->Paginator->sort('tclose'); ?></th>
			<th><?php echo $this->Paginator->sort('wopen'); ?></th>
			<th><?php echo $this->Paginator->sort('wclose'); ?></th>
			<th><?php echo $this->Paginator->sort('thopen'); ?></th>
			<th><?php echo $this->Paginator->sort('thclose'); ?></th>
			<th><?php echo $this->Paginator->sort('fopen'); ?></th>
			<th><?php echo $this->Paginator->sort('fclose'); ?></th>
			<th><?php echo $this->Paginator->sort('satopen'); ?></th>
			<th><?php echo $this->Paginator->sort('satclose'); ?></th>
			<th><?php echo $this->Paginator->sort('sunopen'); ?></th>
			<th><?php echo $this->Paginator->sort('sunclose'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($times as $time): ?>
	<tr>
		<td><?php echo h($time['Time']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($time['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $time['Restaurant']['id'])); ?>
		</td>
		<td><?php echo h($time['Time']['mopen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['mclose']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['topen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['tclose']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['wopen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['wclose']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['thopen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['thclose']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['fopen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['fclose']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['satopen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['satclose']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['sunopen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['sunclose']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $time['Time']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $time['Time']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $time['Time']['id']), array(), __('Are you sure you want to delete # %s?', $time['Time']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Time'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('controller' => 'restaurants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
	</ul>
</div>
