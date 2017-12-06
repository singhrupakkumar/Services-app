<style>
.login_frm {
  width: 100%;
  padding: 15px;
  background: #fff;
  border-radius: 7px;
  box-shadow: 0 0 5px #ccc;
  margin-top: 20vh;
}
.login_frm h3 {
  margin: 0;
  width: 100%;
  text-transform: uppercase;
  text-align: center;
  font-size: 19px;
  font-weight: 800;
  border-bottom: 1px solid #ddd;
  padding-bottom: 10px;
  margin-bottom: 10px;
}

.footer{
	width:100%;
	position:absolute;
	bottom:0;
	}
.content{
	margin-top:0;
	padding:0 !important;
	}
	
</style>


<div class="login_outer" style="background:#e2e2e2;">
<div class="container">

    <div class="col-sm-4 col-sm-offset-4">
    <div class="login_frm">
    <h3>Login</h3>

        <?php echo $this->Form->create('User', array('action' => 'login')); ?>
        <?php echo $this->Form->input('username', array('class' => 'form-control', 'autofocus' => 'autofocus')); ?>
        <br />
        <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->button('Login', array('class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end(); ?>
        
</div>
    </div>
</div>
</div>