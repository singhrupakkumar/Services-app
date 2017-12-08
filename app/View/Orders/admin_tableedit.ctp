<?php 
//print_r($this->request->data);
//exit;
?>
<h2 style="margin-left:15px;">Admin Edit Order</h2>
<div class="row">
    <div class="col col-lg-12">
        <?php echo $this->Form->create('TableReservation'); ?>
        <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('fname', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('lname', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('phone', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('address', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('city', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('zip', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('d_day', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('d_time', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('notes', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('no_of_people', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('table_no', array('class' => 'form-control')); ?>
        <?php echo $this->Form->input('created', array('class' => 'form-control')); ?>
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-success'));?>
        <?php echo $this->Form->end();?>

    </div>
</div>

<style>
.input {
	width:100%;
	float:left;
	margin-bottom: 15px;
	}
 .input label{
    float: left;
    width: 10%;
}

.input input{
    float: left;
    width: 90%;
}

#TableReservationNotes{
	float: left;
    width: 90%;
	}
.input select{
	width:15%;
	float:left;
	}
#TableReservationAdminTableeditForm{
width: 97%;
margin: 0 auto 15px;
background: #fff;
padding: 15px;
	}
	
.btn.btn-primary{
	margin-bottom: 15px;
	}
</style>