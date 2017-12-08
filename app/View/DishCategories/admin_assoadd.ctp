   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary box_register">
            <div class="box-header with-border">
              <h3 class="box-title">User Registration</h3>
            </div>
 
<?php echo $this->Form->create('DishCategory',array('type'=>'file')); ?>
 <div class="box-body"> 
	<?php
		echo $this->Form->input('name',array('required' => true));
		echo $this->Form->input('isshow',array('type'=>'hidden','value'=>'1'));
		//echo $this->Form->input('res_id', array('type' => 'hidden'));
        echo $this->Form->input('image',array('type'=>'file'));
		echo $this->Form->input('res_id', array('type' => 'hidden','value'=>$rest_id));
	?>
<div class="box-footer">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div></div></div>
</section>
