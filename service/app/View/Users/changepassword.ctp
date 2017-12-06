  <div class="col-sm-8">
                
                
               <div class="rgistr-container">
<h1><i class="fa fa-users" aria-hidden="true"></i> My Information</h1>
<strong><?php $x = $this->Session->flash(); ?>
                  <?php if ($x) { ?>
                  <div class="alert success">
                      <span class="icon"></span>
                      <strong><?php echo $x; ?></strong>
                  </div>
                  <?php } ?>
      </strong>
<div class="login-form">
<p>Here, you can edit your profile information including your password, store name, ICQ, and PGP key. Be careful to avoid putting information that may reveal your true identity, such as real-life website, name, or any piece of information that would allow somebody to find out who you really are. We value the privacy and safety of our users. Please note that your username cannot be changed. You can leave the password fields blank if you do not wish to change it.</p>

<div class="register-data">
 <?php echo $this->Form->create('User', array('id' => 'changepassword','class'=>'form-horizontal regitrfrm')); ?>
 <h2>User Information</h2>
  <div class="form-group">
    <label class="control-label col-sm-3" for="password">Password<span>*</span>:</label>
    <div class="col-sm-9">
      <input name="data[User][old_password]" type="password" class="form-control" value="" placeholder="New Password" id="login-pass" />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Conform Password<span>*</span>:</label>
    <div class="col-sm-9">
      
      <input name="data[User][new_password]" type="password" class="form-control" value="" placeholder="New Password" id="login-pass" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn defult_btn pull-right">Save changes</button>
    </div>
  </div>
<?php echo $this->Form->end(); ?>
</div>
</div>
<div class="clear"></div>
</div>

   
                </div>