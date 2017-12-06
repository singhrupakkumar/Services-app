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
      <h1>
       Categories
      </h1>
	 <?php echo $this->Session->flash();?>
</section>

			<section class="content-header">
<div class="row">
	<div class="col-sm-12">
		<div class="box">		
			<table style="font-size:12px;" id="categoriesdata" class="table table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
		
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th class="actions">Actions</th>
				</tr>
			</thead>
			<tbody>	
                 <?php if(!empty($categories)){?>
				<?php foreach ($categories as $category): ?>
					<tr>
						<td><?php echo h($category['Category']['id']); ?></td>
					
						<td><?php echo h($category['Category']['name']); ?></td>
						<td><?php echo h($category['Category']['description']); ?></td>
						<td><?php echo h($category['Category']['created']); ?></td>
					
						<td class="actions">
							<?php echo $this->Html->link('View', array('action' => 'view', $category['Category']['id']), array('class' => 'btn btn-primary')); ?>
							<?php echo $this->Html->link('Edit', array('action' => 'edit', $category['Category']['id']), array('class' => 'btn btn-success')); ?>
							<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('class' => 'delete1 btn btn-danger'), __('Are you sure you want to delete # %s?', $category['Category']['id']));?>
						</td>
					</tr>
				<?php endforeach; ?>
                                <?php }else{
                                ?>
                                        <center><?php echo "No Result Found";?></center>
                                <?php } ?>
			</tbody>				
			</table>
		</div>
	</div>
</div>
</section>
 <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#categoriesdata').DataTable();
    } );
</script>
