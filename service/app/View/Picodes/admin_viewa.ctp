<div class="row">
<div class="col-sm-3">
<div class="dishCategories view">
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
</div>
<div class="col-sm-3">
<div class="actions action_menu">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Picode'), array('action' => 'edita', $picode['Picode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Picode'), array('action' => 'deletea', $picode['Picode']['id']), array(), __('Are you sure you want to delete # %s?', $picode['Picode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Picodes'), array('action' => 'indexa')); ?> </li>
		<li><?php echo $this->Html->link(__('New Picode'), array('action' => 'adda')); ?> </li>
	
</div>
</div>
</div>
