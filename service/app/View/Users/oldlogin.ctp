<style> 
.login_frm_popup{
	border:1px solid #e2e2e2;	
}
.login_frm_popup h3{color: #444;}
footer.Footer {
    position: fixed;
    bottom: 0;
    left: 0;
}
.login_frm label {
    color: #444;
    font-size: 14px;
}
 @media (max-width: 800px) {
	 footer.Footer {
    position: relative;
    bottom: 0;
    left: 0;
}}
 @media (max-width: 768px) {}
 @media (max-width: 360px) {} 
 @media (max-width: 320px) {}
</style>


<div class="container">
    <div class="col-sm-6 col-sm-offset-4">
    <div class="login_frm login_frm_popup">
    <h3>Login</h3>
        <?php echo $this->Form->create('User', array('action' => 'login')); ?>
        <?php echo $this->Form->input('username', array('class' => 'form-control', 'autofocus' => 'autofocus')); ?>
        <br />
        <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
         <input type="hidden" name="data[User][server]" value="<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
        <br />
        <?php echo $this->Form->button('Login', array('class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end(); ?>        
</div>
</div>
</div>

