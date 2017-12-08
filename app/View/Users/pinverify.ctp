
        
  <!-------------left-side---------------------->

<!-----------------right-side---------------->
                <div class="col-sm-8">
                
                
               <div class="rgistr-container">
<h1><i class="fa fa-users" aria-hidden="true"></i>Verify Pin</h1>
<strong><?php $x = $this->Session->flash(); ?>
                  <?php if ($x) { ?>
                  <div class="alert success">
                      <span class="icon"></span>
                      <strong><?php echo $x; ?></strong>
                  </div>
                  <?php } ?>
      </strong>
<div class="login-form">
  <div class="register-data">
  <?php echo $this->Form->create('User',array('Controller' => 'UsersController','action'=>'pinverify','class'=>'form-horizontal regitrfrm'));?>
  <?php echo $this->Form->input('id'); ?>
    <div class="form-group">
      <label class="control-label col-sm-3" for="six_digit_pin">Six-digit PIN<span>*</span>:</label>
      <div class="col-sm-9">
      <?php echo $this->Form->input('six_digit_pin', array('label'=>false,'class' => 'form-control')); ?>
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