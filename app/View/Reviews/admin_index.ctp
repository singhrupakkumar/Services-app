<div class="times index">
	<h2 class="headng"><?php echo __('Review'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-bordered table-striped dataTable table_reviews">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Restaurant'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('text'); ?></th>
			<th><?php echo $this->Paginator->sort('food_quality'); ?></th>
			<th><?php echo $this->Paginator->sort('punctuality'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('courtesy'); ?></th>
                         <th><?php echo $this->Paginator->sort('UserName'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
                       
	
                        
                        
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($reviews as $time): ?>
	<tr>
		<td><?php echo h($time['Review']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($time['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $time['Restaurant']['id'])); ?>
		</td>

		<td><?php echo h($time['Review']['name']); ?>&nbsp;</td>
		<td><?php echo h($time['Review']['email']); ?>&nbsp;</td>
		<td><?php echo h($time['Review']['text']); ?>&nbsp;</td>
		<td><?php echo h($time['Review']['food_quality']); ?>&nbsp;</td>
		<td><?php echo h($time['Review']['punctuality']); ?>&nbsp;</td>
		<td><?php echo h($time['Review']['price']); ?>&nbsp;</td>
		<td><?php echo h($time['Review']['courtesy']); ?>&nbsp;</td>
		<td><?php echo h($time['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($time['Review']['created']); ?>&nbsp;</td>
		<td><?php echo h($time['Review']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $time['Review']['id']),array('class'=>'btn btn-success btn-xs')); ?>
			
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $time['Review']['id']), array(), __('Are you sure you want to delete # %s?', $time['Review']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p class="headng">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging headng">
	<?php
		echo $this->Paginator->prev('< ' . __('previous') . ' >', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' =>' '));
		echo $this->Paginator->next('< ' .__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

