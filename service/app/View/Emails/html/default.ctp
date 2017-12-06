<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

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
      
      <!-- <<tr>
        <td style="padding-top:35px;"><img src="http://readytodropin.com/img/color_logo.png" alt="images" /></td>
      </tr>
     tr>
        <td style="color:#787878;">Welcome To Dropin</td>
      </tr>
      <tr>
        <td>
     <p style="color:#999;"><h5>Thanks for registration with us</h5></p>
        <p style="color:#999;">Copy the given code to complete the registration process</p>
       
        </td>
      </tr>-->

    </table>


<?php
$content = explode("\n", $content);

foreach ($content as $line):
    echo '<p> ' . $line . "</p>\n";
endforeach;
?>