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
		 <div class="box-header">
                    <h3 class="box-title">All Pending Bills</h3>
                </div>
            <div class="box form_sec">
               
                <div class="main-content">
                    <?php $x = $this->Session->flash(); ?>
                    <?php if ($x) { ?>
                    <div class="alert success">
                        <span class="icon"></span>
                        <strong></strong><?php echo $x; ?>
                    </div>
                    <?php }  
 ?>
  <div class='searchByDate'>
    
    <input name="" id="" placeholder="Search By Month/Year" class="date-picker-search" />
 
 </div>
    <table style="font-size:12px;" id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th><?php echo 'User Name'; ?></th>
        <th><?php echo 'User Email'; ?></th>
        <th><?php echo 'Company Name'; ?></th>
        <th><?php echo 'Bill Type';?></th>
		<th><?php echo 'Bill Amount'; ?></th>
		<th><?php echo 'Due Date';?></th>
        <th><?php echo 'Created';?></th>
        <th class="actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
	    <td><?php echo h($user['User']['first_name'].' '.$user['User']['last_name']); ?></td>
         <td><?php echo $user['User']['email']; ?></td>
        <td><?php echo h($user['Bill']['title']); ?></td>
        <td><?php echo $user['Bill']['bill_type']; ?></td>
        <td><?php echo h($user['Bill']['amount']); ?></td>
        <td>
        <?php 
         $due_date = explode(' ', $user['Bill']['due_date']);
         $date1 = str_replace('-', '/', $due_date[0]);
         echo date('m-d-Y',strtotime($date1)); ?>
        </td>
        <td><?php 
         $created = explode(' ', $user['Bill']['created']);
         $date2 = str_replace('-', '/', $created[0]);
         echo date('m-d-Y',strtotime($date2)); ?></td>
       
	   <td class="actions">
            <?php echo $this->Html->link('View', array('action' => 'view', $user['Bill']['id']), array('class' => 'btn btn-primary btn-xs view1')); ?>				
            <?php echo $this->Form->postLink('Delete Bill', array('action' => 'pendingdelete', $user['Bill']['id']), array('class' => 'btn btn-danger  btn-xs'), __('Are you sure you want to delete # %s?', $user['Bill']['title'])); ?>
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
		
		$('#example').DataTable();
		
	   $('.date-picker-search').datepicker({
     changeMonth: true,
     changeYear: true,
	 showButtonPanel: true,
     dateFormat: 'MM yy',

     onClose: function() {
        var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
		var d = $(this).val();
		
		$('#example tbody tr').each(function(){
		if($(this).data('date') == d){
		$(this).show();
		}else{
		$(this).hide();
		}
		});
     },

     beforeShow: function() {
       if ((selDate = $(this).val()).length > 0) 
       {
          iYear = selDate.substring(selDate.length - 4, selDate.length);
          iMonth = jQuery.inArray(selDate.substring(0, selDate.length - 5), 
                   $(this).datepicker('option', 'monthNames'));
          $(this).datepicker('option', 'defaultDate', new Date(iYear, iMonth, 1));
          $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
       }
    }
  });
		
		
		
    } );
</script>

		<style>
.ui-datepicker-calendar {
    display: none !important;
    }
	.searchByDate 
	{
    width: auto;
    float: right;
    position: absolute;
    right: 23%;
    top: 16px;
	 z-index: 999999;
}
.date-picker-search{

width: auto;
height: 31px;


}
</style>