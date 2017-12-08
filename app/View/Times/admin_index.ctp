    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
 <section class="content">
      <div class="row">
        <div  style="padding:0;" class="col-xs-12">
          <div style="width: 99%;margin: 0 auto;" class="box">
            <div class="box-header">
              <h3 class="box-title">Time Schedule</h3>
            </div>
	<table class="table table-bordered table-hover dataTable">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('res_id'); ?></th>
			<th><?php echo $this->Paginator->sort('Monday Open'); ?></th>
			<th><?php echo $this->Paginator->sort('Monday Close'); ?></th>
			<th><?php echo $this->Paginator->sort('Tuesday Open'); ?></th>
			<th><?php echo $this->Paginator->sort('Tuesday Close'); ?></th>
			<th><?php echo $this->Paginator->sort('Wednesday Open'); ?></th>
			<th><?php echo $this->Paginator->sort('Wednesday Close'); ?></th>
			<th><?php echo $this->Paginator->sort('Thursday Open'); ?></th>
			<th><?php echo $this->Paginator->sort('Thursday Close'); ?></th>
			<th><?php echo $this->Paginator->sort('Friday Open'); ?></th>
			<th><?php echo $this->Paginator->sort('Friday Close'); ?></th>
			<th><?php echo $this->Paginator->sort('Saturday Open'); ?></th>
			<th><?php echo $this->Paginator->sort('Saturday Close'); ?></th>
			<th><?php echo $this->Paginator->sort('Sunday Open'); ?></th>
			<th><?php echo $this->Paginator->sort('Sunday Close'); ?></th>
                        
                        
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($times as $time): ?>
	<tr>
		<td><?php echo h($time['Time']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($time['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $time['Restaurant']['id'])); ?>
		</td>
		<td><?php echo h($time['Time']['mopen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['mclose']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['topen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['tclose']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['wopen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['wclose']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['thopen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['thclose']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['fopen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['fclose']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['satopen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['satclose']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['sunopen']); ?>&nbsp;</td>
		<td><?php echo h($time['Time']['sunclose']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $time['Time']['id']),array('class'=>'btn btn-primary btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $time['Time']['id']),array('class'=>'btn btn-success btn-xs')); ?>

			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dishCategory['DishCategory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $time['Time']['id']),'class'=>'btn btn-danger btn-xs')); ?>
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
		echo $this->Paginator->prev('< ' . __('previous'). ' >', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next('< ' . __('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3 class="headng"><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Time'), array('action' => 'add')); ?></li>
		
</div>
 </div>
</div>
 </div>

</section>
