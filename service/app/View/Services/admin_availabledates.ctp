<section class="admin_main-sec">
    <div class="sec_inner">
        <div class="row">
            <div class="col-md-12">
                <div class="page-headeing">
                    <h1 class="page-title"><i class="fa fa-bars" aria-hidden="true"></i><?php echo __('Unavailable Dates'); ?></h1>
                </div>
            </div>
            
            <div class="btn-toolbar list-toolbar"> 
            <div class="add_new">
                <a href="<?php echo $this->Html->url(array('controller' => 'unavailableDates','action' => 'add',$restaurant_id));
 ?>"><span class="btn btn-primary"><i class="fa fa-plus"></i> Add New Unavailable Date</span></a>
            </div>
            
        </div>
            
            
            <div class="col-sm-8">
                <div class="page_content">
                    <div class="restaurants index">
                        <table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Restaurant','restaurant_id'); ?></th>
			<th><?php echo $this->Paginator->sort('unavailabledate'); ?></th>
                        <th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($unavailable as $date): ?>
	<tr>
		<td><?php echo h($date['UnavailableDate']['id']); ?>&nbsp;</td>
		<td><?php echo h($date['UnavailableDate']['restaurant_id']); ?>&nbsp;</td>
		<td><?php echo h($date['UnavailableDate']['unavailabledate']); ?>&nbsp;</td>
                <td><?php echo h($date['UnavailableDate']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(''), array('controller'=>'unavailableDates','action' => 'view', $date['UnavailableDate']['id']) ,array('class'=>'btn btn-default btn-xs fa fa-eye','title'=>'View')); ?>
			<?php echo $this->Html->link(__(''), array('controller'=>'unavailableDates','action' => 'edit', $date['UnavailableDate']['id']),array('class'=>'btn btn-default btn-xs fa fa-pencil','title'=>'Edit')); ?>
			
			<?php echo $this->Form->postLink(__(''), array('controller'=>'unavailableDates','action' => 'delete', $date['UnavailableDate']['id']), array('class'=>'btn btn-default btn-xs fa fa-trash','title'=>'Delete'), __('Are you sure you want to delete # %s?', $date['UnavailableDate']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
                    </div><!-- End Here -->
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