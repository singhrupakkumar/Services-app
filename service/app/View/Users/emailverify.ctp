 
        
        
        
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
    <h3>Email Verification </h3>
       
        <form method="post" action="<?php echo $this->webroot?>users/webverifyemail">
        <label for="verificationcode">Verification Code</label>
        <input type="text" name="verification_code"  placeholder="verification code" />
          <br />  <br />
          <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email" />
          <br />  <br />
        <input type="submit" name="sub" class="btn btn-primary" value="Submit" />
        </form> 
       
       
              
</div>
</div>
</div>

        