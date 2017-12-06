<style>
#rubu{
  display: table;
    float: none;
    margin: 0 auto; 
}
   
</style>
<div class="col-sm-8" id="rubu">



<div class="rgistr-container">
<div class="login-header"><span class="login-user-icon"><img src="http://demo.neoglobal.se/omega/assets/images/user-icon.png" alt=""></span>Register on Omega Market</div>
<div class="login-form">
<p>You are making the right choice by registering on Omega Market! We are the only auction-style (with fixed price listings too) marketplace specialized in market goods! Choose your username and your password and you will be all set to start trading on our marketplace through a secure Escrow system.</p>
<p>You can also enter a <strong>login phrase</strong> that will be displayed to you when you login. This will ensure that you are on the real Omega Market site and not on a phishing page. This is not mandatory but recommended. Please note that we <strong>highly recommend</strong> that you enter a PGP public key in your profile; this will enable two-factor authentication (2FA) for more security.</p>

<div class="register-data">
 
 <?php echo $this->Form->create('User',array('class' => 'form-horizontal regitrfrm'));?>
 <h2>User Information</h2>
      <strong><?php $x = $this->Session->flash(); ?>
                  <?php if ($x) { ?>
                  <div class="alert danger">
                      <span class="icon"></span>
                      <strong><?php echo $x; ?></strong>
                  </div>
                  <?php } ?>
      </strong>

  <div class="form-group">
      <label class="control-label col-sm-3" for="email">Username<span>*</span>:</label>
     <div class="col-sm-9">
      <?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control','required','placeholder' => 'Username')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Password<span>*</span>:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->password('password', array('label' => false, 'class' => 'form-control','required','placeholder' => 'Password')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Confirm Password<span>*</span>:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->password('Confirm_password', array('label' => false, 'class' => 'form-control','required','placeholder' => 'Confirm Password')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Six-digit PIN<span>*</span>:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('six_digit_pin', array('label' => false, 'class' => 'form-control','required','placeholder' => 'Six-digit PIN')); ?>
    </div>
    
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Login phrase:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('profile_pin_hash', array('label' => false, 'class' => 'form-control','placeholder' => 'Login phrase')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Role:</label>
    <div class="col-sm-9">
    <?php echo $this->Form->input('role', array('label' => false, 'class' => 'form-control','required',
    'options' => array('vendor'=>'vender','buyer'=>'buyer'),
      )); ?>
    </div>
  </div>
  
   <h2>Profile Information</h2>
  <div class="form-group">
    <label class="control-label col-sm-3" for="email">ICQ:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('icq', array('label' => false, 'class' => 'form-control','placeholder' => 'ICQ')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">AOL:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('aol', array('label' => false, 'class' => 'form-control','placeholder' => 'AOL')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Website:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('website', array('label' => false, 'class' => 'form-control','placeholder' => 'Website')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Profile text:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('profile_text', array('label' => false, 'class' => 'form-control','placeholder' => 'Profile text')); ?>
    </div>
  </div>
  
    <h2>Key Information</h2>
  <div class="form-group">
    <label class="control-label col-sm-3" for="email">PGP public key:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->textarea('pgp_public_key', array('label' => false, 'class' => 'form-control','placeholder' => 'PGP public key')); ?>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn defult_btn pull-right">Join Market</button>
    </div>
  </div>
 <?= $this->Form->end() ?>
</div>
</div>
<div class="clear"></div>
</div>



</div>
