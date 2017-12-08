<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit ads</h3>
            </div>
<?php echo $this->Form->create('Ad',array('type'=>'file')); ?>
     <div class="box-body"> 
	<?php
		echo $this->Form->input('id',array('class'=>'form-control'));
		
		echo $this->Form->input('name',array('class'=>'form-control'));
	
	?>
                 <img src="<?php echo $this->webroot;?>files/ads/<?php echo $this->request->data['Ad']['image']; ?>" width="100" height="100"/>
                <input type="hidden" value="<?php echo $this->request->data['Ad']['image']; ?>" name="data[Ad][img]"/>	
                <?php 
        
        echo $this->Form->input('image',array('type'=>'file','class'=>'form-control'));
        ?>
	
 <div class="box-footer">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div></div>
</section>
