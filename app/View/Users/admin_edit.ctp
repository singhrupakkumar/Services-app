    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
		            <div class="box-header">
              <h3 class="box-title">User Edit</h3>
            </div>
          <!-- general form elements -->
      
<!--            <div class="box-header with-border">
              <h2 style="margin:0 !important">Edit User Details</h2>
            </div>-->
 
    <div class="box box-primary">

          

   
        <?php echo $this->Form->create('User', array('type' =>'file'));?>
       <div class="box-body">    
        <?php echo $this->Form->input('id'); ?>
        <?php // echo $this->Form->input('role', array('class' => 'form-control', 'options' => array('admin' => 'admin', 'customer' => 'customer','rest_admin'=>'Restaurant Admin'),'default'=> $this->request->data['User']['role'] )); ?>
	    <br />
		<?php echo $this->Form->input('role', array('class' => 'form-control','type'=>'hidden')); ?>
        <?php echo $this->Form->input('firstname', array('class' => 'form-control')); ?>
        <br />
		<?php echo $this->Form->input('lastname', array('class' => 'form-control')); ?>
		<br /> 
         <?php echo $this->Form->input('email', array('class' => 'form-control','readOnly'=>'required')); ?>
        <br /> 
        <?php echo $this->Form->input('phonenumber', array('class' => 'form-control')); ?>
        <br />
        <img id="blah" height="50" width="50" src="<?php if($user['User']['image'] != ''){ echo $this->webroot.'files/profile_pic/'.$user['User']['image']; }else{ echo $this->webroot.'files/profile_pic/avatar.png';} ?>">		
        <?php echo $this->Form->input('image', array('class' => 'form-control', 'type' => 'file', 'id' => 'img')); ?>
		 <br /> 
        <?php echo $this->Form->input('address', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('active', array('type' => 'checkbox')); ?>


 <div class="box-footer">
   <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
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