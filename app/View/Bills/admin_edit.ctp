    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
		            <div class="box-header">
              <h3 class="box-title">Edit Bill</h3>
            </div>
          <!-- general form elements -->
      
<!--            <div class="box-header with-border">
              <h2 style="margin:0 !important">Edit User Details</h2>
            </div>-->
 
    <div class="box box-primary">

          

   
        <?php echo $this->Form->create('Bill');?>
       <div class="box-body">    
        <?php echo $this->Form->input('id'); ?>
        <?php // echo $this->Form->input('role', array('class' => 'form-control', 'options' => array('admin' => 'admin', 'customer' => 'customer','rest_admin'=>'Restaurant Admin'),'default'=> $this->request->data['User']['role'] )); ?>
	    <br />
        <?php echo $this->Form->input('title', array('class' => 'form-control', 'label' => 'Company Name', 'required')); ?>
        <br />
		<?php echo $this->Form->input('description', array('class' => 'form-control', 'type' => 'textarea', 'required')); ?>
		<br /> 
        <div class="input text"><label for="">Bill Type</label>
        <select name="data[Bill][bill_type]" class="form-control selectpicker" required>
		<option>Select bill type</option>
		<option data-icon="fa fa-mobile" value="mobile" <?php if($user['Bill']['bill_type'] == 'mobile'){ echo 'selected'; } ?>>Mobile</option>
        <option data-icon="fa fa-bolt" value="electricity" <?php if($user['Bill']['bill_type'] == 'electricity'){ echo 'selected'; } ?>>Electricity</option>
		<option data-icon="fa fa-square" value="gas" <?php if($user['Bill']['bill_type'] == 'gas'){ echo 'selected'; } ?>>Gas</option>
		<option data-icon="fa fa-tint" value="water" <?php if($user['Bill']['bill_type'] == 'water'){ echo 'selected'; } ?>>Water</option>
		<option data-icon="fa fa-globe" value="internet" <?php if($user['Bill']['bill_type'] == 'internet'){ echo 'selected'; } ?>>Internet</option>
		<option data-icon="fa fa-usb" value="cable" <?php if($user['Bill']['bill_type'] == 'cable'){ echo 'selected'; } ?>>cable</option>
		<option data-icon="fa fa-shield" value="home-security" <?php if($user['Bill']['bill_type'] == 'home-security'){ echo 'selected'; } ?>>Home security</option>
		<option data-icon="fa fa-car" value="car-insurance" <?php if($user['Bill']['bill_type'] == 'car-insurance'){ echo 'selected'; } ?>>Car insurance</option>
		<option data-icon="fa fa-heartbeat" value="life-insurance" <?php if($user['Bill']['bill_type'] == 'life-insurance'){ echo 'selected'; } ?>>Life insurance</option>
		<option data-icon="fa fa-money" value="car-payment" <?php if($user['Bill']['bill_type'] == 'car-payment'){ echo 'selected'; } ?>>Car payment</option>
		<option data-icon="fa fa-home" value="home" <?php if($user['Bill']['bill_type'] == 'home'){ echo 'selected'; } ?>>Home</option>
		<option data-icon="fa fa-book" value="other" <?php if($user['Bill']['bill_type'] == 'other'){ echo 'selected'; } ?>>Other</option>
		</select>
        </div>
        <br /> 
        <?php echo $this->Form->input('amount', array('class' => 'form-control', 'required')); ?>
		 <br /> 

         <div class="input text"><label id="cstatus" for="">Customer Status</label>
         <select name="data[Bill][status]" class="form-control">
<option value="0" <?php if($user['Bill']['status'] == "0") echo "selected"; ?>>Pending</option>
<option value="1" <?php if($user['Bill']['status'] == "1") echo "selected"; ?>>Approved</option>
<option value="2" <?php if($user['Bill']['status'] == "2") echo "selected"; ?>>Rejected</option>
</select>
  </div> 


   
 <br /> 

         <div class="input text"><label id="pstatus" for="">Payment Status</label>
         <select name="data[Bill][status]" class="form-control">
<option value="0" <?php if($user['Bill']['payment_status'] == "0") echo "selected"; ?>>Unpaid</option>
<option value="1" <?php if($user['Bill']['payment_status'] == "1") echo "selected"; ?>>Paid</option>
</select>
  </div> 
<br />
       

 <div class="box-footer">
   <?php echo $this->Form->button('Update', array('class' => 'btn btn-primary')); ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div></div>
</section>

<style>
.prcheck > label {
    float: left;
    margin-left: 5px;
    width: auto;
}
.prcheck > input {
    float: left;
}
#BillAdminEditForm #pstatus::after{
content: '';
}
#BillAdminEditForm #cstatus::after{
content: '';
}
</style>
<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#img").change(function(){
    readURL(this);
});
</script>