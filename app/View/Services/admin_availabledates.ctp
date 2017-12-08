<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<style>
	.form_outer{
		margin-bottom:20px;
	}
	.form_outer table{
		width:100%;
		margin:0px;
	}
</style>

<section class="content-header marginbtm">

      <h3>
       Provider Available Days
      </h3>
    	<?php echo $this->Html->link(__('Add More'), array('controller'=>'availableDates','action' => 'add', $provider_id), array('class' => 'btn btn-primary btn-xs')); ?>
	 <?php echo $this->Session->flash();?>
</section>

			<section class="content-header">
<div class="row">
	<div class="col-sm-12">
		<div class="box">		
			<table style="font-size:12px;" id="days" class="table table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('Days'); ?></th>
					<th><?php echo $this->Paginator->sort('Open'); ?></th>
                                        <th><?php echo $this->Paginator->sort('Close'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th class="actions">Actions</th>
				</tr>
			</thead>
			<tbody>	
                         <?php if(!empty($provider['AvailableDate'])){ ?>
				<?php foreach ($provider['AvailableDate'] as $days): ?>
					<tr>
						<td><?php echo h($days['days']); ?></td>
					
						<td><?php echo h($days['open']); ?></td>
						<td><?php echo h($days['close']); ?></td>
						<td><?php echo h($days['created']); ?></td>
					
						<td class="actions">
							<?php echo $this->Html->link('Edit', array('controller'=>'availableDates','action' => 'edit', $days['id']), array('class' => 'btn btn-success')); ?>
							<?php echo $this->Html->link(__('Delete'), array('controller'=>'availableDates','action' => 'delete', $days['id']), array('class' => 'delete1 btn btn-danger'), __('Are you sure you want to delete # %s?', $days['id']));?>
						</td>
					</tr>
                         <?php endforeach; } ?>
                           
			</tbody>				
			</table>
		</div>
	</div>
</div>
</section>
 <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#days').DataTable();
    } );
</script>
