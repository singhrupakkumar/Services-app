 
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
                 <?php 
                    echo $this->Form->input('provider_id', ['options' => $provider_list, 'label' => 'Provider:', 'class' => 'form-control','empty' => 'Choose Provider','required']);
					
					echo $this->Form->input('provider_id', ['options' => $provider_list, 'label' => 'Provider:', 'class' => 'form-control','empty' => 'Choose Provider','required']);
					?> 
                                               
                                               
				
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="data[Service][name]" class="form-control span12">                        
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
 

	
	
	