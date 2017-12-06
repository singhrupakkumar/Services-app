    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary box_register">
            <div class="box-header with-border">
              <h3 class="box-title">Associated Product Edit</h3>
            </div>
<?php echo $this->Form->create('DishCategory',array('type'=>'file')); ?>
  <div class="box-body"> 


		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('required' => true));
                ?>
                <img style="margin-top:6px;" src="<?php echo $this->webroot;?>files/catimage/<?php echo $this->request->data['DishCategory']['image']; ?>" width="100" height="100"/>
                <input type="hidden" value="<?php echo $this->request->data['DishCategory']['image']; ?>" name="data[DishCategory][img]"/>	
	<?php 
        
        echo $this->Form->input('image',array('type'=>'file'));
        ?>
	
<div class="box-footer">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div></div></div>
</section>

