 <style> 
 .login_box_m {
    float: left;
    width: 100%;
	    margin-top: 8%;
}
 .message {
    background: rgba(0, 0, 0, 0.1) none repeat scroll 0 0;
    color: #d71f26;
    float: left;
    font-size: 15px;
    padding: 3px 0;
    text-align: center;
    width: 100%;
}
.login_b2 {
        background: #f9f9f9 none repeat scroll 0 0;
    box-shadow: 0 0 1px #c5c5c5;
    float: left;
        margin-bottom: 10%;
    width: 100%;
	
}
.login_b2 h1 {
    background: #d71f26 none repeat scroll 0 0;
    border-top-left-radius: 5px;
    border-top-right-radius: 6px;
    color: #fff;
    font-size: 18px;
    padding: 15px 16px;
    text-align: center;
    text-transform: uppercase;
}
.Worry {
    font-size: 16px;
    line-height: 27px;
    margin-bottom: 6%;
}
.login_outer_frm{
	width:100%;
	float:left;
	padding:20px;	
}
#UserForgetpwdForm label {
    color: #666;
    font-size: 15px;
    text-transform: uppercase;
}
#UserForgetpwdForm input[type='text'] {
    line-height: 22px;
    margin-bottom: 4%;
}
.login_buttonn input[type='submit'] {
	background: #d71f26 none repeat scroll 0 0;
    border-radius: 7px;
    color: #fff;
    float: right;
    font-size: 16px;
    padding: 7px 0;
    text-transform: uppercase;
    width: 40%;
}
.btm_frm{
	    width: 100%;
    float: left;
       background: #e4e4e4;
    padding: 15px 20px;
	
}
.btm_frm a{
    color: #4a4a4a;
    font-size: 13px;		
}
 </style>
 
 <div class="con_main">
     	<div class="container">
        
          <div class="page_inn"><!--page inn start-->
        
        <div class="col-sm-3"></div>
     <div class="col-sm-6">
    
     
     <div class="login_box_m">
         <?php $x=$this->Session->flash(); 
           if($x)
           {
               echo $x;
           }
           
         
         ?>
          
          
          <div class="login_b2">
   <div class="login_b"><h1>Forgot Password</h1></div>
  <div class="login_outer_frm">
   <div class="loign_form">
   
   <p class="Worry"> Don't Worry! Just fill in your email and we'll help you reset your password </p>
   
     <?php echo $this->Form->create('User');   ?>
   <p><label>  Username <i>*</i></label><span> <input type="text" class="form-control" name="data[User][username]" placeholder="Email Address"  ></span></p>
       
      </div>
      
      <div class="login_buttonn "><input type="submit" class="" name="submit" value="SEND EMAIL"></div>
   </div>
   	<div class="btm_frm">
    
            <a href="<?php echo $this->webroot;?>admin/users/login" class="btn btn-info">Back to Login</a>
     </div>
   </div>
    <?php $this->Form->end(); ?>
     </div> </div>
   
   <div class="col-sm-3"></div>
   

   </div></div>
     </div><!--page inn end-->