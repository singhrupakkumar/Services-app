    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
		            <div class="box-header with-border">
              <h3 class="box-title">Add Bill</h3>
            </div>
          <!-- general form elements -->
          <div class="box box-primary">

                    <?php $x = $this->Session->flash(); ?>
                    <?php if ($x) { ?>
                    <div class="alert success">
                        <span class="icon"></span>
                        <strong></strong><?php echo $x; ?>
                    </div>
                    <?php }  
 ?> 
      <?php echo $this->Form->create('Bill',array('role'=>'form'));?>
      <div class="box-body">   
        <?php echo $this->Form->input('title', array('label' => 'Company Name', 'class' => 'form-control','required')); ?>
        <br />
		<?php echo $this->Form->input('description', array('type' => 'textarea','class' => 'form-control','required')); ?>
        <br />
		<div class="input text"><label for="">Bill Type</label>
		<select name="data[Bill][bill_type]" class="form-control selectpicker" required>
		<option value=''>Select bill type</option>
		<option data-icon="fa fa-mobile" value="mobile">Mobile</option>
        <option data-icon="fa fa-bolt" value="electricity">Electricity</option>
		<option data-icon="fa fa-square" value="gas">Gas</option>
		<option data-icon="fa fa-tint" value="water">Water</option>
		<option data-icon="fa fa-globe" value="internet">Internet</option>
		<option data-icon="fa fa-usb" value="cable">cable</option>
		<option data-icon="fa fa-shield" value="home-security">Home security</option>
		<option data-icon="fa fa-car" value="car-insurance">Car insurance</option>
		<option data-icon="fa fa-heartbeat" value="life-insurance">Life insurance</option>
		<option data-icon="fa fa-money" value="car-payment">Car payment</option>
		<option data-icon="fa fa-home" value="home">Home</option>
		<option data-icon="fa fa-book" value="other">Other</option>
		</select>
		</div>
       
        <br />
        <?php echo $this->Form->input('amount', array('type' => 'number', 'class' => 'form-control','required')); ?>
		 <br />
        <?php echo $this->Form->input('due_date', array('type' => 'text', 'class' => 'form-control datepicker','required')); ?>
        <br/>		
        <?php //echo $this->Form->input('tokenhash', array('class' => 'form-control','label'=>'Unique Device Token','required')); ?>

 <div class="box-footer">
   <?php echo $this->Form->button('Add Bill', array('class' => 'btn btn-primary btn-success')); ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div></div></div>
</section>

<script>
$('.datepicker').datepicker();
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
			$('#blah').show();
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#img").change(function(){
    readURL(this);
});

</script>
