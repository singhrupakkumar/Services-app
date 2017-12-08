<style>
#rubu{
  display: table;
    float: none;
    margin: 0 auto; 
}
   
</style>
<div class="col-sm-8" id="rubu">
<div class="login-container">
<div class="login-header"><span class="login-user-icon"><img src="http://demo.neoglobal.se/omega/assets/images/user-icon.png" alt=""></span>Login to Omega Market</div>
<div class="login-form">
<p>Welcome to Omega Market! Please login to access the marketplace. If you do not have an account, you can <a href="register">register</a> to get access to the listings. Registrations are free and open to everyone. </p>
<strong><?php $x = $this->Session->flash(); ?>
                  <?php if ($x) { ?>
                  <div class="alert success">
                      <span class="icon"></span>
                      <strong><?php echo $x; ?></strong>
                  </div>
                  <?php } ?>
      </strong>
<div class="login-form-data">
 <?php echo $this->Form->create('User',array('class' => 'form-horizontal loginfrm'));?>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Username:</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control','required','placeholder' => 'Enter username')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10">
      <?php echo $this->Form->password('password', array('label' => false, 'class' => 'form-control','required','placeholder' => 'Enter password')); ?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn defult_btn">Submit</button>
    </div>
  </div>
<?= $this->Form->end() ?> 
</div>
</div>
<div class="clear"></div>
</div>



</div>
