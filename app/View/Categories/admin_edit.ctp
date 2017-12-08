<style>
	.form_outer form .input{
		width:100%;
		float:left;
		margin-bottom:11px;
	}
</style>
<!--<div class="page_heading">
	<h2>Edit Category</h2>
</div>-->
<section class="content">
<div class="row">
    <div class="col col-sm-6">
		<div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit</h3>
						<?php echo $this->Session->flash();?>
			<?php echo $this->Form->create('Category'); ?>
			<?php echo $this->Form->input('id'); ?>
            <?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary main_btn gaptop')); ?>
			<?php echo $this->Form->end(); ?>
                        </div>
                    </div>
		</div>
</div>
</section>