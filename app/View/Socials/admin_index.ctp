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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <table class="table table-bordered table-hover dataTable">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php //echo $this->Paginator->sort('icon'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($socials as $social): ?>
	<tr>
		<td><?php echo h($social['Social']['id']); ?>&nbsp;</td>
		<td><?php echo h($social['Social']['name']); ?>&nbsp;</td>
		<td><?php //echo h($social['Social']['icon']); ?>&nbsp;</td>
		<td><?php echo h($social['Social']['link']); ?>&nbsp;</td>
		<td><?php echo h($social['Social']['created']); ?>&nbsp;</td>
		<td><?php echo h($social['Social']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $social['Social']['id']),array('class'=>'btn btn-primary btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $social['Social']['id']),array('class'=>'btn btn-success btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $social['Social']['id']), array( __('Are you sure you want to delete # %s?', $social['Social']['id']),'class'=>'btn btn-danger btn-xs')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>

</div>
 </div>
</div>
 </div>

</section>
