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
   <div class="login_b"><h1>Forget password</h1></div>
   <div class="loign_form">
     <?php echo $this->Form->create('User',array('id'=>'reset'));   ?>
       <p><label>  password  <i>*</i></label><span> <input type="password" id="pass5" name="data[User][password]" required ></span></p>
       <p><label>  Confirm Password <i>*</i></label><span><input type="password"  name="data[User][password_confirm]" required></span></p>
      </div>
      
   <div class="login_buttonn "><input type="submit" name="submit" value="Submit"></div>
     <?php $this->Form->end(); ?>
     </div> </div>
   
   <div class="col-sm-3"></div>
   

   </div></div>
     </div><!--page inn end-->
     <script type="text/javascript">
          $(document).ready(function() {
                $("#reset").validate({
                    errorElement: 'span',
                    rules: {
                      "data[User][password]": "required",
                        "data[User][password_confirm]": {
                            required: true,
                            minlength: 8,
                            equalTo: "#pass5"
                        }
                    },
                    messages: {
                           "data[User][password_confirm]": {
                            required: "Please Enter confirm password",
                            equalTo: "Confirm Password is not matching your Password"
                        }
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            });
            
         </script>