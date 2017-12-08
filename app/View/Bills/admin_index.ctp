<!-- Content Header (Page header) -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<!--  <section class="content-header">
<h1>
Dashboard
<small>Control panel</small>
</h1>

</section> -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
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
    <div class="addBill"><?php echo $this->Html->link('Add Bill', array('controller' => 'bills', 'action' => 'add', $userID), array('class' => 'btn btn-primary btn-xs')); ?></div>
    <table style="font-size:12px;" id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>

        <th><?php echo 'Company Name'; ?></th>
        <th><?php echo 'Bill Type';?></th>
		<th><?php echo 'Bill Amount'; ?></th>
		<th><?php echo 'Due Date';?></th>
		<th><?php echo 'Payment Status';?></th>
		<th><?php echo 'Customer Status'; ?></th>
        <th><?php echo 'Created';?></th>
        <th class="actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['Bill']['title']; ?></td>
        <td><?php echo $user['Bill']['bill_type']; ?></td>
        <td><?php echo $user['Bill']['amount']; ?></td>
        <td><?php 
         $due_date = explode(' ', $user['Bill']['due_date']);
         $date1 = str_replace('-', '/', $due_date[0]);
         echo date('m-d-Y',strtotime($date1)); ?></td>
		<td><?php if($user['Bill']['payment_status'] == 1){ echo 'Paid';}else{ echo 'Unpaid'; } ?></td>
		<td><?php if($user['Bill']['status'] == 1){ echo 'Approved';}elseif($user['Bill']['status'] == 2){ echo 'Rejected'; }else{ echo 'Pending'; } ?></td>
        <td><?php 
         $created = explode(' ', $user['Bill']['created']);
         $date2 = str_replace('-', '/', $created[0]);
         echo date('m-d-Y',strtotime($date2)); ?></td>
       
	   <td class="actions">
	        <select class="form-control status_drop" data-id="<?php echo $user['Bill']['id']; ?>">
			
			<option value="0" <?php if($user['Bill']['payment_status'] == 0){ echo 'selected'; } ?>>Unpaid</option>
			<option value="1" <?php if($user['Bill']['payment_status'] == 1){ echo 'selected'; } ?>>Paid</option>
			<option value="" >Flag</option>
			</select>
		    
            <?php echo $this->Html->link('View', array('action' => 'view', $user['Bill']['id']), array('class' => 'btn btn-primary btn-xs view1')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $user['Bill']['id']), array('class' => 'btn btn-primary btn-xs')); ?>					
            <?php echo $this->Form->postLink('Delete Bill', array('action' => 'delete', $user['Bill']['id']), array('class' => 'btn btn-danger  btn-xs'), __('Are you sure you want to delete # %s?', $user['Bill']['title'])); ?>
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
	
	$('.status_drop').each(function(){
	$(this).change(function(){
	var status = $(this).val();
	var id= $(this).data('id');
	var url = '<?php echo $this->webroot.'bills/status'; ?>'
	$.post( url, {status:status, id:id}, function( data ) {
	  if(data=='success'){
	  window.location.reload();
	  }
	});
	});
	});
	
        $('#example').DataTable();
    } );
</script>