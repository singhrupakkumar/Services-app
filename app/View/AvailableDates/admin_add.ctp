 
 <style>
	.spre_ing{
	padding-bottom:10px !important;
	}
	</style>
 
 
 <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
		<div class="box-header spre_ing">
              <h3 class="box-title">Add Available Days</h3>
            </div>
          <!-- general form elements -->
          <div class="box box-primary">
            
        <p>
            <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong>Success!</strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
        </p>
        <div class="row">
         
			<div class="box-body"> 
            <div class="col-md-12">                
               <?php echo $this->Form->create('AvailableDate',array('id'=>'tab','type'=>'file')); ?>
			<div class="box-body"> 	
                    <div class="form-group">
                        <label>Days</label>
                        <input type="text" name="data[AvailableDate][days]" class="form-control span12" required/>
                        <input type="hidden" name="data[AvailableDate][provider_id]" value="<?php echo $provider_id; ?>" class="form-control span12"> 
                    </div>
                            
                    <div class="form-group">
                        <label>Open Time</label>
                        <input type="time" name="data[AvailableDate][open]" class="form-control span12" required/>
                    </div>
                    <div class="form-group">
                        <label>Close Time</label>
                        <input type="time" name="data[AvailableDate][close]" class="form-control span12" required/>
                    </div>        
        


               <div class="box-footer">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div>
</div>


</div>
</div>
</div>
</div>
</div>
</section>
 

	
	
	