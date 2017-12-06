<div class="picodes view">
<h2><?php echo __('Picode'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($picode['Picode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restaurant'); ?></dt>
		<dd>
			<?php echo $this->Html->link($picode['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $picode['Restaurant']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($picode['Picode']['price']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Pincode'); ?></dt>
		<dd>
			<?php echo h($picode['Picode']['pincode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($picode['Picode']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($picode['Picode']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Picode'), array('action' => 'edit', $picode['Picode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Picode'), array('action' => 'delete', $picode['Picode']['id']), array(), __('Are you sure you want to delete # %s?', $picode['Picode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Picodes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Picode'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('controller' => 'restaurants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
	</ul>
</div>
