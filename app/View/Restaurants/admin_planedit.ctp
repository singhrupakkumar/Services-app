 <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Plan</h3>
            </div>
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
            <?php echo $this->Form->create('SubscriptionPlan',array('id'=>'tab','type'=>'file')); ?>
  <div class="box-body"> 
            <div class="col-md-12">   
                    
                    <div class="form-group">
                        <?php echo $this->Form->input('name',array('class'=>'form-control'));?>
                    </div>

                    <div class="form-group">
                      <?php 
                        echo $this->Html->image($admin_edit['SubscriptionPlan']['image'],array('alt'=>'Not Image','height'=>'70px','width'=>'100px'));
                      ?>
                        <?php echo $this->Form->input('image',array('type'=>'file'));?>      
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('description',array('class'=>'form-control','type'=>'textarea','cols'=>'8','rows'=>'8'));?>
                    </div> 

                    <div class="form-group">
                        <?php echo $this->Form->input('price',array('class'=>'form-control','type'=>'text', 'required','label'=>'Price - EUR'));?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('discount',array('class'=>'form-control','type'=>'text', 'required','label'=>'Discount - EUR (after apply reference code)'));?>
                    </div>
                                                  
                    <div class="box-footer">
                        <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
                    </div>
                </div>
    <?= $this->Form->end() ?>

</div>
</div>
</section>
   