<div class="taxes view">
<h2><?php echo __('Promocode'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tax['Promocode']['id']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Promocode'); ?></dt>
		<dd>
			<?php echo h($tax['Promocode']['promocode']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Percentage'); ?></dt>
		<dd>
			<?php echo h($tax['Promocode']['percentage']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Expire'); ?></dt>
		<dd>
			<?php echo h($tax['Promocode']['expired']); ?>
			&nbsp;
		</dd>
            
	</dl>
</div>
