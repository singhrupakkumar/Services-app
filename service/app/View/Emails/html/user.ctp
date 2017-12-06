<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet"> 


<style>
	body{margin:0px auto;padding:0;background:#f2f2f2; font-family: 'Lato', sans-serif; padding:10px;}
	.main_outer {
	border: 5px solid #fff;
	box-shadow: 0 0 5px #D4D4D4;
	background: #f9f9f9;
	border-radius: 4px;
	width: 580px;
}
	
	@media only screen and (max-width: 580px){
		.main_outer{width:550px;}
		}
	@media only screen and (max-width: 480px){
		.main_outer{width:450px;}
		}
	@media only screen and (max-width: 360px){
		.main_outer{width:330px;}
	}
	
	@media only screen and (max-width: 320px){
		.main_outer{width:290px;}
		}
</style>
<div class="main_outer" style="margin:0px auto; text-align:center; background:#fff;">
	<table width="100%" border="0">
      
      <tr>
        <td style="padding-top:35px;"><img src="http://readytodropin.com/img/color_logo.png" alt="images" /></td>
      </tr>
      <tr>
        <td style="color:#787878;"><h3>Welcome To Dropin</h3></td>
      </tr>
      <tr>
        <td>
     
         <p style="color:#999;">Click on the given link to change your password</p>
        <p>Thanks You</p>
        </td>
      </tr>

    </table>


<?php
if($linktext){
echo @$linktext;
}
?>