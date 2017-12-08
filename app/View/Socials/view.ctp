<div class="socials view">
<h2><?php echo __('Social'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($social['Social']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($social['Social']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icon'); ?></dt>
		<dd>
			<?php echo h($social['Social']['icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($social['Social']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($social['Social']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($social['Social']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Social'), array('action' => 'edit', $social['Social']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Social'), array('action' => 'delete', $social['Social']['id']), array(), __('Are you sure you want to delete # %s?', $social['Social']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Socials'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social'), array('action' => 'add')); ?> </li>
	</ul>
</div>
