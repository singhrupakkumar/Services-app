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
              <h3 class="box-title">Add Your Services</h3>
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
                <form method="post">
              <div class="box-body"> 
                        
		     <div class="form-group">
                        <label>Select Service</label>
                        <select name="service[]" class="form-control" multiple="multiple">
                             <option>Select Your Service</option>
                             <?php if($servicelist){
                                foreach($servicelist as $k=> $list){ 
                                 
                            ?>
                             <option value="<?php echo $k;?>"><?php echo $list;?></option>
                             <?php }} ?> 
                         </select>
                    </div>
              
		
                   

                    <div class="box-footer">
                    <?= $this->Form->button(__('Add'),array('class'=>'btn btn-success')) ?>
                    </div>
             </div>
               </form>

</div>
</div>


</div>
</div>
</div>
</div>
</div>
</section>