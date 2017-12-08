    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
 
      <?php echo $this->Form->create('User',array('role'=>'form', 'type' => 'file'));?>
      <div class="box-body">    
       <?php echo $this->Form->input('role', array('class' => 'form-control', 'options' => array('admin' => 'Admin', 'customer' => 'Customer'))); ?>
        <br />
        <?php echo $this->Form->input('first_name', array('class' => 'form-control','required')); ?>
        <br />
		<?php echo $this->Form->input('last_name', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('email', array('class' => 'form-control','placeholder'=>'Email','label'=>'Email','required')); ?>
        <br />
        <?php echo $this->Form->input('password', array('class' => 'form-control','required')); ?>
        <br />
        <?php echo $this->Form->input('phonenumber', array('class' => 'form-control', 'type' => 'number', 'required')); ?>
        <br />
        <img id="blah" style="display:none;" src="#" height="50" width="50" alt="your image" />		
        <?php echo $this->Form->input('image', array('class' => 'form-control', 'type' => 'file', 'id' => 'img')); ?>
		<br /> 
        <?php echo $this->Form->input('dob', array('class' => 'form-control', 'placeholder' => 'MM/DD/YYYY')); ?>
		 <br /> 
        <?php echo $this->Form->input('address', array('class' => 'form-control')); ?>
		 <br /> 
        <?php //echo $this->Form->input('tokenhash', array('class' => 'form-control','label'=>'Unique Device Token','required')); ?>

 <div class="box-footer">
   <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary btn-success')); ?>
</div>
</div>
    <?= $this->Form->end() ?>

</div></div></div>
</section>
<script>
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