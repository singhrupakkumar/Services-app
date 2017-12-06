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
                    <h3 class="box-title">Ads list</h3>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
	<table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			

			<th><?php echo $this->Paginator->sort('name'); ?></th>
                        <th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
            
	<?php foreach ($dishSubcats as $dishSubcat): ?>
	<tr>
		
		
		<td><?php echo h($dishSubcat['Ad']['name']); ?>&nbsp;</td>
                <td><img src="<?php echo $this->webroot?>/files/ads/<?php echo h($dishSubcat['Ad']['image']); ?>" width="100px" height="100px"/>&nbsp</td>

		<td><?php echo h($dishSubcat['Ad']['created']); ?>&nbsp;</td>
		<td><?php echo h($dishSubcat['Ad']['modified']); ?>&nbsp;</td>
<!--		<td><?php //echo h($dishSubcat['DishSubcat']['status']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dishSubcat['Ad']['id']),array('class'=>'btn btn-primary btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dishSubcat['Ad']['id']),array('class'=>'btn btn-success btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dishSubcat['Ad']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dishSubcat['Ad']['id']),'class'=>'btn btn-danger btn-xs')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
    </div>
	<p class="">
	<?phpheadng
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
            </div></div></div>
</section>
