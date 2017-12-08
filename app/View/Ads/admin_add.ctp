<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div style="border-top:0px;" class="box box-primary box_browser box_social">
            <div class="box-header with-border">
              <h3 class="box-title">Addads</h3>
            </div>
<?php echo $this->Form->create('Ad',array('type'=>'file')); ?>
	
	<?php
               
		echo $this->Form->input('name',array('class'=>'form-control'));
                 echo $this->Form->input('image',array('type'=>'file','class'=>'form-control brows_inpt'));
		
	?>
	<div class="box-footer">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div></div>
</section>