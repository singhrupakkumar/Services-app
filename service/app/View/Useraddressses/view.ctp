<div class="useraddressses view">
<h2><?php echo __('Useraddresss'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($useraddresss['Useraddresss']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($useraddresss['User']['name'], array('controller' => 'users', 'action' => 'view', $useraddresss['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($useraddresss['Useraddresss']['address']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Useraddresss'), array('action' => 'edit', $useraddresss['Useraddresss']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Useraddresss'), array('action' => 'delete', $useraddresss['Useraddresss']['id']), array(), __('Are you sure you want to delete # %s?', $useraddresss['Useraddresss']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Useraddressses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Useraddresss'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
