 
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
              <h3 class="box-title">Add static page</h3>
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
               <?php echo $this->Form->create('Staticpage',array('id'=>'tab','type'=>'file')); ?>
  <div class="box-body"> 
                    <div class="form-group">
                        <label>Position</label>
                        <?php echo $this->Form->select('position',array('about'=>'About Us','support'=>'Support', 'policy' => 'Privacy Policy', 'terms' => 'Terms & Services'),
                         array('class'=>'form-control','empty' => '--Select position--','required'))
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="data[Staticpage][title]" class="form-control span12">                        
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="8" cols="6" name="data[Staticpage][description]"  id="edi" ></textarea>
                    </div>

                    <input type="hidden" name="data[Staticpage][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="data[Staticpage][status]" value="1">

               <div class="box-footer">
    <?= $this->Form->button(__('Submit'),array('class'=>'btn btn-success')) ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div>
</div>
    <?= $this->Form->end() ?>

</div>
</div>
</div>
</div>
</div>
</section>
    
   <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
    <!--script type="text/javascript">
    tinymce.init({
             selector: "textarea",
             plugins : "media"
    });
    </script-->
	<script>
tinymce.init({
selector: 'textarea',
plugins: [
"code", "charmap", "link"
],
toolbar: [
"undo redo | styleselect | bold italic | link | alignleft aligncenter alignright | charmap code" | "media"
]
});
</script>
	
	
	