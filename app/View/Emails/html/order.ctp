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
        <td style="color:#787878;">Welcome To Dropin</td>
      </tr>
      <tr>
        <td>
        <h2 style="color:#005fa0; font-weight:900; padding:10px 0; background: #fff; border-bottom:1px solid #d71f26; border-top:1px solid #d71f26;">Thanks! <br /><p style="color:#333; font-size:16px; margin:3px 0;">for order</p></h2>
        <p style="color:#999;">Thank you for order</b></p>
        </td>
      </tr>

    </table>
    
    <table width="400" border="0" cellpadding="7" cellspacing="0" text-align="center" style="text-align:center; margin:0px auto; border:none; margin-bottom:0px;">
    
    	<tbody>
        	<tr>
        <td colspan="2"><h3>Hi <?php echo $shop['Order']['first_name'] ." ".$shop['Order']['last_name']; ?> Your Order Details Are:</h3></td>
        </tr>
        </tbody>
    
    </table>
    
   <table width="400" border="1" cellpadding="7" cellspacing="0" text-align="left" style="text-align:left; margin:0px auto; border-color:#ddd;">
		
		<tbody>
        
        
		<tr>
			<th>Phone:</th>
			<td><?php echo $shop['Order']['phone']; ?></td>
		</tr>
		<tr>
			<th>Email:</th>
			<td><?php echo $shop['Order']['email']; ?></td>
		</tr>
		<tr>
			<th>Order Type:</th>
			<td><?php echo $shop['Order']['order_type']; ?></td>
		</tr>
		
        <tr>
			<th>Quantity:</th>
			<td><?php echo $shop['Order']['quantity']; ?></td>
		</tr>
		</tbody>
	</table>
    
    <table width="400" border="0" cellpadding="7" cellspacing="0" text-align="center" style="text-align:center; margin:0px auto; border:none; margin-bottom:0px;">
    
    	<tbody>
        	<tr>
        <td colspan="2"><h3>Order Items Details Are:</h3></td>
        </tr>
        </tbody>
    
    </table>
	
	<table width="400" border="1" cellpadding="10" cellspacing="0" text-align="left" style="text-align:left; margin:0px auto; border-color:#ddd; ">
		
        
		<thead>
		<tr>
			<th>No. Of items</th>
			<th>Item</th>
			<th style="text-align:right;">Price </th>
		</tr>
		</thead>
		<tbody>
         <?php
		 $a = 1;
		  foreach ($shop['OrderItem'] as $orderitem) {?>
		<tr>
			<th><?php echo $a; ?></th>
			<td><?php echo $orderitem['quantity']; ?> X <?php echo $orderitem['name']; ?></td>
			<td style="text-align:right;"><?php echo $orderitem['price']; ?></td>
		</tr>
	<?php
	$a++; 
	 }?>
		<tr>
			<td colspan="3">
				<table width="100%" border="0">
					<tr style="text-align:right;">
						<th><b>Subtotal:</b></th>
						<td><?php echo $shop['Order']['subtotal']; ?></td>
					</tr>
					<tr style="text-align:right; font-size:20px; padding-top:15px;">
						<th><b>Total:</b></th>
						<td><b><?php echo $shop['Order']['total']; ?></b></td>
					</tr>
				</table>
			</td>
		</tr>
		</tbody>
	</table>
</div>