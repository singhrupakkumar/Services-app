<style>
	.form_outer form .input{
		width:100%;
		float:left;
		margin-bottom:11px;
	}
	.message{
		color:red;
	}
</style>
<section class="content-header marginbtm">
      <h1>
       Add Category
      </h1>
	 <?php echo $this->Session->flash();?>
</section>
<section class="content">
<div class="row">
    <div class="col-sm-6">
		<div class="box">
                    <div class="box-body"> 
			<?php echo $this->Form->create('Category'); ?> 
			<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary main_btn margintop')); ?>
			<?php echo $this->Form->end(); ?>
                    </div>
		</div>
    </div>
</div>
</section>