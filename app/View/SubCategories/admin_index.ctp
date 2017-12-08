<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
		        <div class="box-header">
                    <h3 class="box-title">Sub Category</h3>
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

    <table style="font-size:12px;" id="subcategory" class="table table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th><?php echo 'Name';?></th>
        <th><?php echo 'Category';?></th>
        <th><?php echo 'Description';?></th>
        <th><?php echo 'Image';?></th>
        <th><?php echo 'Created';?></th>
        <th class="actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($subcategory as $subcat): ?>
    <tr>
	    <td><?php echo $subcat['SubCategory']['name']; ?></td>
        <td><?php echo $subcat['Category']['name']; ?></td>
        <td><?php echo $subcat['SubCategory']['description']; ?></td>
        <td> <?php echo $this->Html->image('/files/subcatimage/'.$subcat['SubCategory']['image'], array('alt' => $subcat['SubCategory']['name'],'width'=>100,'height'=>100));?>
		</td>   

        <td><?php 
         $created = explode(' ', $subcat['SubCategory']['created']);
         $date1 = str_replace('-', '/', $created[0]);
         echo date('m-d-Y',strtotime($date1)); ?></td>
        <td class="actions">
            <?php echo $this->Html->link('View', array('action' => 'view', $subcat['SubCategory']['id']), array('class' => 'btn btn-primary btn-xs view1')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $subcat['SubCategory']['id']), array('class' => 'btn btn-primary btn-xs')); ?>					
            <?php echo $this->Form->postLink('Delete SubCategory', array('action' => 'delete', $subcat['SubCategory']['id']), array('class' => 'btn btn-danger  btn-xs'), __('Are you sure you want to delete # %s?', $subcat['SubCategory']['id'])); ?>
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
        $('#subcategory').DataTable();
    } );
</script>