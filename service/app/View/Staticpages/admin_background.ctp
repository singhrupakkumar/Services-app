 <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Background For App</h3><br>
           
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
            <?php echo $this->Form->create('Background',array('type'=>'file')); ?>
               <div class="box-body"> 
                <div class="col-md-12">   
                    <div class="form-group">
                     
                      <img src="<?php echo $this->webroot; ?>/files/staticpage/<?php echo $background['Background']['name']; ?>" alt="Not Image" height="70px" width="100px">
                        <?php echo $this->Form->input('image',array('type'=>'file','required'));?>
                        <h5 class="box-title" style="font-size:14px;">Dimensions : 1080 × 1920px</h5> 
                    </div>
                    <div class="box-footer">
                        <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
                    </div>
                </div>
    <?= $this->Form->end() ?>

</div>
</div>
</section>
  