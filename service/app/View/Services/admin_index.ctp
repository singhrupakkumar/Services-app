<!-- Content Header (Page header) -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
		        <div class="box-header">
                    <h3 class="box-title">Services</h3>
					<?php echo $this->Html->link(__('Add Service'), array('action' => 'add', $provider_id), array('class' => 'btn btn-primary btn-xs')); ?>
					
                </div>
            <div class="box form_sec">

                <div class="main-content">
                    <?php $x = $this->Session->flash(); ?>
                    <?php if ($x) { ?>
					<div class="msgflash">
                    <?php echo $x;  ?>
					<span>X</span>
                    </div>
                    <?php }  
 ?>

    <table style="font-size:12px;" id="example111" class="table table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th><?php echo 'Name';?></th>
        <th><?php echo 'Category';?></th>
        
        <th><?php echo 'Sub Category';?></th>
        <th><?php echo 'Description';?></th>
        <th><?php echo 'Created';?></th>
        <th class="actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($services as $service): ?>
    <tr>
	    <td><?php echo h($service['Service']['name']); ?></td>
        <td><?php echo h($service['Service']['category_id']); ?></td>
        <td><?php echo h($service['Service']['sub_catid']); ?></td>
        <td><?php echo h($service['Service']['description']); ?></td>

        <td><?php 
         $created = explode(' ', $service['Service']['created']);
         $date1 = str_replace('-', '/', $created[0]);
         echo date('m-d-Y',strtotime($date1)); ?>
		 </td>
        <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $service['Service']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
                                    
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $service['Service']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Delete'),array('action' => 'delete', $service['Service']['id']), array('confirm'=>__('Are you sure you want to delete # %s?', $service['Service']['id']),'class' => 'btn btn-danger btn-xs')); ?>
                                 
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>
</div></div>
</section>



<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#example111').DataTable();
    } );
</script>