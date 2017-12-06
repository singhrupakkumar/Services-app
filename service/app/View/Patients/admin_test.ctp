<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box form_sec">
                <div class="box-header">
                    <h3 class="box-title">Patient Tests</h3>
                </div>
                <div class="main-content">
                    <?php $x = $this->Session->flash(); ?>
                    <?php if ($x) { ?>
                    <div class="alert success">
                        <span class="icon"></span>
                        <strong></strong><?php echo $x; ?>
                    </div>
                    <?php }  
 ?>
<div class="container"><h2>Patients Tests Status</h2></div>

<div id="exTab2">	
	<ul class="nav nav-tabs">
		<li class="active">
       		<a  href="#1" data-toggle="tab">Unschedule</a>
		</li>
		<li>
                    <a href="#2" data-toggle="tab">Schedule</a><div class="right_number"><?php if($count_schedule > 0){ echo $count_schedule;  } ?></div>
		</li>
		<li>
                    <a href="#3" data-toggle="tab">Accepted</a><div class="right_number"><?php if($count_accept > 0){ echo $count_accept; } ?></div>
		</li>
        
       <li>
           <a href="#4" data-toggle="tab">Decline</a><div class="right_number"><?php if($count_decline > 0){ echo $count_decline; } ?></div>
		</li>

        <!-- <li>
        	<a href="#5" data-toggle="tab">Cancel</a>
		</li> -->
		</ul>
			<div class="tab-content ">
				<div class="tab-pane active" id="1">
    <table style="font-size:12px;" id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>

        <th><?php echo 'Test name'; ?></th>
        <th><?php echo 'Users'; ?></th>
        <th><?php echo 'Assign'; ?></th>
    </tr>
    </thead>
    <tbody>
  <?php  
     foreach ($tests as $test): 
	 	if($test['PatientTest']['status'] == 0){
	 ?>
    <tr>
	<?php echo $this->Form->create('PatientTest'); ?>
    	<?php echo $this->Form->input('patient_row_id', array('type' => 'hidden', 'value' => $test['PatientTest']['id'])); ?>
        <?php echo $this->Form->input('patient_id', array('type' => 'hidden', 'value' => $test['PatientTest']['patientid'])); ?>
          <td><?php echo $this->Form->input('test', array('type' => 'checkbox', 'value' => $test['Test']['id'], 'label' => array('class' => 'testchck', 'text'=>$test['Test']['test']))); ?></td>
        <td><?php echo $this->Form->input('users', array('type' => 'select', 'options' => $usersel, 'class' => "form-control")); ?></td>
        <td><?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?></td>
        </form>
   </tr> 
  <?php
  	}
     endforeach; ?>
    </tbody>
</table> 
</div>
<div class="tab-pane" id="2">
    <table style="font-size:12px;" id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>

        <th><?php echo 'Test name'; ?></th>
        <th><?php echo 'Users'; ?></th>
       <!-- <th><?php //echo 'Assign'; ?></th>-->
    </tr>
    </thead>
    <tbody>
  <?php  
     foreach ($tests as $test): 
	 	if($test['PatientTest']['status'] == 1){
	 ?>
    <tr>
    	<?php echo $this->Form->input('patient_row_id', array('type' => 'hidden', 'value' => $test['PatientTest']['id'])); ?>
        <?php echo $this->Form->input('patient_id', array('type' => 'hidden', 'value' => $test['PatientTest']['patientid'])); ?>
       <td><?php echo $this->Form->input('test', array('type' => 'checkbox', 'value' => $test['Test']['id'], 'label' => array('class' => 'testchck', 'text'=>$test['Test']['test']))); ?></td>
        <td><?php echo $this->Form->input('users', array('type' => 'select', 'options' => $usersel, 'default'=>$test['PatientTest']['userid'],  'class' => "form-control", "disabled" => "disabled")); ?></td>
   </tr> 
  <?php
  	}
     endforeach; ?>
    </tbody>
</table> 
				</div>
        		<div class="tab-pane" id="3">
    <table style="font-size:12px;" id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>

        <th><?php echo 'Test name'; ?></th>
        <th><?php echo 'Users'; ?></th>
        <th><?php echo 'Date'; ?></th>
    </tr>
    </thead>
    <tbody>
  <?php  
     foreach ($tests as $test): 
	 	if($test['PatientTest']['status'] == 2 && !empty($test)){
	 ?>
    <tr>
    	<?php echo $this->Form->input('patient_row_id', array('type' => 'hidden', 'value' => $test['PatientTest']['id'])); ?>
       <td><?php echo $this->Form->input('test', array('type' => 'checkbox', 'value' => $test['Test']['id'], 'label' => array('class' => 'testchck', 'text'=>$test['Test']['test']))); ?></td>
       
        <td><?php echo $this->Form->input('users', array('type' => 'select', 'options' => $usersel, 'default'=>$test['PatientTest']['userid'], 'class' => "form-control", "disabled" => "disabled" )); ?></td>
       <td> <?php echo $this->Form->input('date', array('disabled' => 'disabled', 'type' => 'text', 'value' => $test['PatientTest']['date'])); ?></td>
   </tr> 
  <?php
  	}
     endforeach; ?>
    </tbody>
</table> 
				</div>
        		<div class="tab-pane" id="4">
    <table style="font-size:12px;" id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>

        <th><?php echo 'Test name'; ?></th>
        <th><?php echo 'Users'; ?></th>
        <th><?php echo 'Reason'; ?></th>
        <th><?php echo 'Assign'; ?></th>
    </tr>
    </thead>
    <tbody>
  <?php  
     foreach ($tests as $test): 
	 	if($test['PatientTest']['status'] == 3){
	 ?>
    <tr>
	<?php echo $this->Form->create('PatientTest'); ?>
        <?php echo $this->Form->input('patienttestid', array('type' => 'hidden', 'value' => $test['PatientTest']['id'])); ?>
       <td><?php echo $this->Form->input('test', array('type' => 'checkbox', 'value' => $test['Test']['id'], 'label' => array('class' => 'testchck', 'text'=>$test['Test']['test']))); ?></td>
        <td><?php echo $this->Form->input('users', array('type' => 'select', 'options' => $usersel, 'default'=>$test['PatientTest']['userid'], 'class' => "form-control" )); ?></td>
         <td> <?php echo $this->Form->input('reason', array('disabled' => 'disabled','type' => 'textarea', 'value' => $test['PatientTest']['reason'])); ?></td>
        <td><?php echo $this->Html->link('Reschedule', array('action' => 'reschedule', $test['PatientTest']['id'],$test['PatientTest']['patientid'],$test['PatientTest']['testid']), array('class' => 'btn btn-primary btn-xs btn-view')); ?>

       <?php echo $this->Html->link('Cancel', array('action' => 'cancel', $test['PatientTest']['id'],$test['PatientTest']['patientid'],$test['PatientTest']['testid']), array('class' => 'btn  btn-xs btn-info btn-edit')); ?></td>
        <!--<td><?php //echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?></td>-->
        </form>
   </tr> 
  <?php
  	}
     endforeach; ?>
    </tbody>
</table> 
</div>
<!-- <div class="tab-pane" id="5">
    <h3>add clearfix to tab-content (see the css)</h3>
</div> -->
</div>
</div>

<hr></hr>


</div>
</div>
</div></div>
</section>
<style>
.checkbox input[type=checkbox] { margin-left: 0px !important;margin-top:2px;}
.checkbox label{color:#000 !important;}
input, textarea{color:#000 !important;}
</style>

<style>
#exTab2 h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

/* remove border radius for the tab */

#exTab2 .nav-pills > li > a {
  border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab2 .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
}

#exTab2 .tab-content {
  color : white;
  padding :10px 0;
}
.table{
margin-bottom:0px !important;
}
.select label {
    color: #000;
    float: left;
    margin-right: 10px;
    margin-bottom: 0;
    width: auto;
    margin: 10px 15px 10px 0;
}

.form-control {
    width: 60%;
    margin: 0;
}

.right_number {
    width: auto;
    float: left;
    position: absolute;
    right: -3px;
    top: 11px;
    background-color: green;
    border-radius: 50px;
    padding: 0px 6px;
    color: #fff;
}


</style>
