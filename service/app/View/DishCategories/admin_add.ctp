    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary box_register">
            <div class="box-header with-border">
              <h3 class="box-title">Add DishCategory</h3>
            </div>
 <?php if($msgg){echo $msgg;}else{ ?>
<?php echo $this->Form->create('DishCategory',array('type'=>'file')); ?>
   <div class="box-body">              
	<?php
		echo $this->Form->input('name',array('required' => true));
         echo $this->Form->input('image',array('type'=>'file'));
		//echo $this->Form->input('status');
		echo $this->Form->input('res_id', array('type' => 'hidden','value'=>$rest_id));
		
		
		//test code
		//echo $this->Form->input('test',array('options'=>$disid,'id'=>'testid'));
?>


 <div class="box-footer">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
</div>
</div>
    <?= $this->Form->end();  }?>

</div></div></div>
</section>
<!--<script>
$(document).ready(function(){
	$('#testid').change(function(){
		//alert($('#testid').val());
		var catid = $('#testid').val();
		$.post('https://www.readytodropin.com/admin/dish_categories/add',{idx:catid},function(q){
			console.log(q);
			});
		});
	
	});
</script>-->