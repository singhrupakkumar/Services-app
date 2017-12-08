
  <!-------------left-side---------------------->
        	
<!-----------------right-side---------------->
                <div class="col-sm-8">
                
                
               <div class="rgistr-container">
<h1><i class="fa fa-users" aria-hidden="true"></i> My Information</h1>
<div class="login-form">
<strong><?php $x = $this->Session->flash(); ?>
                  <?php if ($x) { ?>
                  <div class="alert success">
                      <span class="icon"></span>
                      <strong><?php echo $x; ?></strong>
                  </div>
                  <?php } ?>
      </strong>
<p>Here, you can edit your profile information including your password, store name, ICQ, and PGP key. Be careful to avoid putting information that may reveal your true identity, such as real-life website, name, or any piece of information that would allow somebody to find out who you really are. We value the privacy and safety of our users. Please note that your username cannot be changed. You can leave the password fields blank if you do not wish to change it.</p>

<div class="register-data">
 <?php echo $this->Form->create('User',array('Controller' => 'UsersController','action'=>'profile','class'=>'form-horizontal regitrfrm'));?>
 <?php echo $this->Form->input('id'); ?>
 <h2>User Information</h2>
  <div class="form-group">
    <label class="control-label col-sm-3" for="username">Username<span>*</span>:</label>
    <div class="col-sm-9">
    <?php echo $this->Form->input('username', array('label'=>false,'class' => 'form-control')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="profile_pin_hash">Login phrase<span>*</span>:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('profile_pin_hash', array('label'=>false,'class' => 'form-control')); ?>
    </div>
  </div>

   <h2>Profile Information</h2>
  <div class="form-group">
    <label class="control-label col-sm-3" for="icq">ICQ:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('icq', array('label'=>false,'class' => 'form-control')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="aol">AOL:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('aol', array('label'=>false,'class' => 'form-control')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="website">Website:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('website', array('label'=>false,'class' => 'form-control')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="profile_text">Profile text:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('profile_text', array('label'=>false,'class' => 'form-control')); ?>
    </div>
  </div>
  
    <h2>Key Information</h2>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pgp_public_key">PGP public key:</label>
    <div class="col-sm-9">
      <?php echo $this->Form->textarea('pgp_public_key', array('label'=>false,'class' => 'form-control')); ?>
    </div>
  </div>
   <div class="form-group">
   <div class="col-sm-12">
   <div class="pull-right">
   Two factor authentication : <input type="checkbox">
   </div>
   </div>
   </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <?php echo $this->Form->button('Submit', array('value'=>'Save Changes','class' => 'btn defult_btn pull-right')); ?>
    </div>
  </div>
 <?= $this->Form->end() ?></div>
</div>
<div class="clear"></div>
</div>

   
        		</div>
        	</div>
    	</div>
	</div>
    </div>