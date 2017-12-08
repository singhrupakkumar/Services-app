 <!-- Content Header (Page header) -->
 

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box form_sec">
            <div class="box-header">
              <h3 class="box-title">Free Drink Category</h3>
              <br>
              <br>
              <?php echo $this->Html->link('Add Free Drink Category', array('action' => 'add'),array('class'=>'btn btn-info')); ?>
              <br>
              <br>
            </div>
    <div class="main-content">
        <?php $x = $this->Session->flash(); ?>
        <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php }   ?>




	<table style="font-size:12px;" id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($Drinks as $Drink): ?>
	<tr>
		<td><?php echo h($Drink['Drink']['id']); ?>&nbsp;</td>
		<td><?php echo h($Drink['Drink']['name']); ?>&nbsp;</td>
		<td><?php echo h($Drink['Drink']['created']); ?>&nbsp;</td>
		<td><?php echo h($Drink['Drink']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $Drink['Drink']['id']),array('class'=>'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $Drink['Drink']['id']),array('class'=>'btn btn-success btn-xs')); ?> 
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $Drink['Drink']['id']),array('class'=>'btn btn-danger btn-xs'), array('confirm' => __('Are you sure you want to delete # %s?', $Drink['Drink']['id'])));
			
			
			 ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>



    </div>
    </div>
	
	
</div>
</div>
</section>



<script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>