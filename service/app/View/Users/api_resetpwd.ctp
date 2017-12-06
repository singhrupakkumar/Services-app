 <style> 
 
 .login_frm {
       background: #fff none repeat scroll 0 0;
    border-radius: 7px;
    box-shadow: 0 0 5px #ccc;
    margin: 13vh 5% 0;
    padding: 15px;
    width: 90%;
}
.login_frm .login_b h3 {
     border-bottom: 1px solid #ddd;
    font-size: 19px;
    font-weight: 800;
    margin: 0;
    padding: 8px 0 14px;
    text-align: center;
    text-transform: uppercase;
    width: 100%;
}
 .login_frm label{
    width: 100%;
    float: left;
    font-weight: 700;
    margin-bottom: 5px;
    color: #414141;
    font-size: 14px;
}
 .login_frm .inputname {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.btn-primary {
      background-color: #337ab7;
    border: medium none;
    border-radius: 5px;
    color: #fff;
    padding: 7px 0;
    width: 17%;
}

.loign_form p {
    margin: 26px 0;

}
 </style>
 
 <div class="con_main">
     	<div class="container">
        
          <div class="page_inn fg"><!--page inn start-->
        
        <div class="col-sm-3"></div>
     <div class="col-sm-6">
     <div class="login_box_m login_frm">
         <?php $x=$this->Session->flash(); 
           if($x)
           {
               echo $x;
           }
         ?>
   <div class="login_b"><h3>Forgot Password</h3></div>
   <div class="loign_form ">
     <?php echo $this->Form->create('User',array('id'=>'reset'));   ?>
       <p><label>  Password  <i>*</i></label><span> <input type="password" id="pass5" class="inputname" name="data[User][password1]" required ></span></p>
       <p><label>  Confirm Password <i>*</i></label><span><input type="password" class="inputname"  name="data[User][password_confirm]" required></span></p>
      </div>
      
   <div class="login_buttonn "><input type="submit" name="submit" value="Submit" class="btn-primary"></div>
     <?php $this->Form->end(); ?>
     </div> </div>
   
   <div class="col-sm-3"></div>
   

   </div></div>
     </div><!--page inn end-->
     
   