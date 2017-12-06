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
        <td colspan="2"><h3>Hi <?php echo $shop['TableReservation']['fname'] ." ".$shop['TableReservation']['lname']; ?> Your Order Details Are:</h3></td>
        </tr>
        </tbody>
    
    </table>
    
     <table width="400" border="1" cellpadding="7" cellspacing="0" text-align="left" style="text-align:left; margin:0px auto; border-color:#ddd;">
		<tbody>
		<tr>
			<th>Phone:</th>
			<td><?php echo $shop['TableReservation']['phone']; ?></td>
		</tr>
		<tr>
			<th>Email:</th>
			<td><?php echo $shop['TableReservation']['email']; ?></td>
		</tr>
		<tr>
			<th>Order Type:</th>
			<td><?php echo $shop['TableReservation']['order_type']; ?></td>
		</tr>
		<tr>
			<th>No. of person:</th>
			<td><?php echo $shop['TableReservation']['no_of_people']; ?></td>
		</tr>
        <tr>
			<th>Quantity:</th>
			<td><?php echo $shop['TableReservation']['quantity']; ?></td>
		</tr>
        <tr>
			<th>Subtotal:</th>
			<td><?php echo $shop['TableReservation']['subtotal']; ?></td>
		</tr>
        <tr>
			<th>Total:</th>
			<td><?php echo $shop['TableReservation']['total']; ?></td>
		</tr>
		</tbody>
	</table>
</div>