<section class="content">
	
	<div class="row">
		
		<div class="col-sm-6">
			<div class="box box-primary">
				<div class="restaurantsTypes form">
					<?php echo $this->Form->create('Patient',array('enctype'=>'multipart/form-data','type'=>'file')); ?>
					
					<fieldset>
						<legend><?php echo __('Add Patient'); ?></legend>
						<?php
							echo $this->Form->input('name',array('required' => true));
                                                        echo $this->Form->input('address',array('required' => true));
							echo $this->Form->input('phonenumber',array('required' => true));
                                                        echo $this->Form->input('dob',array('required' => true));
                                                        echo $this->Form->input('insurancename',array('required' => true));
                                                        echo $this->Form->input('insurancenumber',array('required' => true));
                                                        echo $this->Form->input('doctorname',array('required' => true));
                                                        echo $this->Form->input('doctornumber',array('required' => true));
                                                        echo $this->Form->input('doctorfaxnumber',array('required' => true));
                                                        echo $this->Form->input('diagnosis',array('required' => true));
						?>
						
					</fieldset>
					
					<?php echo $this->Form->button('Submit', array('class' => 'btn btn-success')); ?>
					
				</div>
			</div>
		</div>
		
		
	</div>
</section>

<style>
	.restaurantsTypes.form {
    padding: 10px;
	}
	
	#RestaurantsTypeLogo {
    height: auto;
	}
	.input {
    width: 100%;
    float: left;
	margin-bottom: 10px;
	}
	label {
    width: 20%;
    float: left;
    padding-left: 0px !important;
	}
	.input input {
    width: 80% !important;
    float: left;
	}
</style>