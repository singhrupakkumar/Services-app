<div class="favrests view">
<h2><?php echo __('Favrest'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($favrest['Favrest']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Res Id'); ?></dt>
		<dd>
			<?php echo h($favrest['Favrest']['res_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($favrest['Favrest']['user_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Favrest'), array('action' => 'edit', $favrest['Favrest']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Favrest'), array('action' => 'delete', $favrest['Favrest']['id']), array(), __('Are you sure you want to delete # %s?', $favrest['Favrest']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Favrests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Favrest'), array('action' => 'add')); ?> </li>
	</ul>
</div>
