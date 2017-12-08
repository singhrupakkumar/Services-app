<div class="dishSubcats index">
	<h2><?php echo __('Picodes'); ?></h2>
	<div class="table-responsive">
	<table class="table table-bordered" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('res_id'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
                        <th><?php echo $this->Paginator->sort('pincode'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($picodes as $picode): ?>
	<tr>
		<td><?php echo h($picode['Picode']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($picode['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $picode['Restaurant']['id'])); ?>
		</td>
		<td><?php echo h($picode['Picode']['price']); ?>&nbsp;</td>
                <td><?php echo h($picode['Picode']['pincode']); ?>&nbsp;</td>
		<td><?php echo h($picode['Picode']['created']); ?>&nbsp;</td>
		<td><?php echo h($picode['Picode']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $picode['Picode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $picode['Picode']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $picode['Picode']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $picode['Picode']['id']))); ?>
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
<div class="col-sm-3">
<div class="actions action_menu">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Picode'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('controller' => 'restaurants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
</div>
