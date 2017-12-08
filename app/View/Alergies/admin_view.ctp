<div class="row">
<div class="col-sm-3">
<div class="dishCategories view">
<h2><?php echo __('Alergy'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($alergy['Alergy']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($alergy['Alergy']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('About'); ?></dt>
		<dd>
			<?php echo h($alergy['Alergy']['about']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($alergy['Alergy']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($alergy['Alergy']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
<div class="col-sm-3">
<div class="actions action_menu">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Alergy'), array('action' => 'edit', $alergy['Alergy']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Alergy'), array('action' => 'delete', $alergy['Alergy']['id']), array(), __('Are you sure you want to delete # %s?', $alergy['Alergy']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Alergies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alergy'), array('action' => 'add')); ?> </li>
	</ul>
</div>
</div>
</div>

