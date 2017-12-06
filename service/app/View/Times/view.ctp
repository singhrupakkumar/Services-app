<div class="times view">
<h2><?php echo __('Time'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($time['Time']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Restaurant'); ?></dt>
		<dd>
			<?php echo $this->Html->link($time['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $time['Restaurant']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mopen'); ?></dt>
		<dd>
			<?php echo h($time['Time']['mopen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mclose'); ?></dt>
		<dd>
			<?php echo h($time['Time']['mclose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Topen'); ?></dt>
		<dd>
			<?php echo h($time['Time']['topen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tclose'); ?></dt>
		<dd>
			<?php echo h($time['Time']['tclose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wopen'); ?></dt>
		<dd>
			<?php echo h($time['Time']['wopen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wclose'); ?></dt>
		<dd>
			<?php echo h($time['Time']['wclose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thopen'); ?></dt>
		<dd>
			<?php echo h($time['Time']['thopen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thclose'); ?></dt>
		<dd>
			<?php echo h($time['Time']['thclose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fopen'); ?></dt>
		<dd>
			<?php echo h($time['Time']['fopen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fclose'); ?></dt>
		<dd>
			<?php echo h($time['Time']['fclose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Satopen'); ?></dt>
		<dd>
			<?php echo h($time['Time']['satopen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Satclose'); ?></dt>
		<dd>
			<?php echo h($time['Time']['satclose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sunopen'); ?></dt>
		<dd>
			<?php echo h($time['Time']['sunopen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sunclose'); ?></dt>
		<dd>
			<?php echo h($time['Time']['sunclose']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Time'), array('action' => 'edit', $time['Time']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Time'), array('action' => 'delete', $time['Time']['id']), array(), __('Are you sure you want to delete # %s?', $time['Time']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Times'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Time'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('controller' => 'restaurants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
	</ul>
</div>
