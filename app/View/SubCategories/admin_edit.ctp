<section class="content-header marginbtm">
      <h1>
      Edit Sub Category
      </h1>
</section>

<section class="content">
<div class="row">
    <div class="col-sm-6">
		<div class="box">
             <div class="box-body"> 
				<?php echo $this->Form->create('SubCategory',array('type'=>'file')); ?>

				<?php
					echo $this->Form->input('id');
					 echo $this->Form->input('category_id', ['options' => $dishCategories,'class'=>'form-control' ,'label' => 'Category Name:']); 
					echo $this->Form->input('name',['class'=>'form-control']);
					//echo $this->Form->input('status');
				?>
							 
				   <?php 
					
					echo $this->Form->input('image',array('type'=>'file','class'=>'form-control','id'=>'subcatimage'));
					?>
					<div class="sub_cat">
					<img src="<?php echo $this->webroot;?>files/subcatimage/<?php echo $this->request->data['SubCategory']['image']; ?>" width="100" height="100"/ class="previewHolder">
					</div>
					<input type="hidden" value="<?php echo $this->request->data['SubCategory']['image']; ?>" name="data[SubCategory][img]"/>	
					
				 <div class="form-group"> 
				<?php
				echo $this->Form->Submit('Submit',['class'=>'btn btn-primary main_btn margintop']);
				?>	
				</div>	

				<?php
				echo $this->Form->end();
				?>	
			</div>
		</div>
    </div>
</div>
</section>
<script>
 
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#subcatimage").change(function() {
  readURL(this);
});
</script> 



