<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<?php// print_r($coinName); die; ?>
<title><?php echo $coinName; ?> Pay-Per-Registration Cryptocoin Payment Example</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='Expires' content='-1'>
<meta name='robots' content='all'>
<script src='../cryptobox.min.js' type='text/javascript'></script>
</head>
<body style='font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#666;margin:0'>
<div align='center'>
<div style='width:100%;height:auto;line-height:50px;background-color:#f1f1f1;border-bottom:1px solid #ddd;color:#49abe9;font-size:18px;'>
	7. GoUrl <b>Pay-Per-Registration</b> Example (<?php echo $coinName; ?> payments). Use it on your website. 
	<div style='float:right;'><a style='font-size:15px;color:#389ad8;margin-right:20px' href='<?= "//".$_SERVER["HTTP_HOST"].str_replace(".php", "-multi.php", $_SERVER["REQUEST_URI"]); ?>'>Multiple Crypto</a><a style='font-size:15px;color:#389ad8;margin-right:20px' href='https://gourl.io/<?= strtolower($coinName) ?>-payment-gateway-api.html#p4'>PHP Source</a><a style='font-size:15px;color:#389ad8;margin-right:20px' href='https://github.com/cryptoapi/Bitcoin-Payment-Gateway-ASP.NET/tree/master/GoUrl/Views/Examples/PayPerRegistration.cshtml'>ASP.NET Source</a><a style='font-size:15px;color:#389ad8;margin-right:20px' href='https://wordpress.org/plugins/gourl-bitcoin-payment-gateway-paid-downloads-membership/'>Wordpress</a><a style='font-size:15px;color:#389ad8;margin-right:20px' href='https://gourl.io/<?= strtolower($coinName) ?>-payment-gateway-api.html'>Other Examples</a></div>
</div>
<br>
<h1>Example - Paid Registration</h1>
<h3>Website Registration Form. Protection against spam!</h3>
<br>
<img alt='Cryptocoin Registration Form' border='0' src='https://gourl.io/images/example8.png'>

<a name='i'></a>

<?php if ($successful): ?>

	<div align='center' style='margin:40px;font-size:24px;color:#339e2e;font-weight:bold'>You have been successfully registered on our website!</div>
	
<?php else: ?>

	<form name='form1' style='font-size:14px;color:#444' action="pay-per-registration.php#i" method="post">
		<table cellspacing='20'>
			<tr><td colspan='2'><b>NEW USER</b><?php echo $error; ?><input type='text' style='display: none'><input type='password' style='display: none'></td></tr>
			<tr><td width='100'>Name: </td><td width='300'><input style='padding:6px;font-size:18px;' size='30' type="text" name="fname" value="<?php echo $fname; ?>"></td></tr>
			<tr><td>Email: </td><td><input style='padding:6px;font-size:18px;' size='40' type="text" name="femail" value="<?php echo $femail; ?>"></td></tr>
			<tr><td>Password: </td><td><input style='padding:6px;font-size:18px;' size='35' type="password" name="fpassword" value="<?php echo $fpassword; ?>"><br><br></td></tr>
		</table>
	</form>

	<div style='width:600px;padding-top:10px'>
			<div style='font-size:12px; margin:5px 0 5px 390px;'>Language: &#160; <?php echo $languages_list; ?></div>

			<?php echo $box->display_cryptobox(true, 540, 230, "border-radius:15px;border:2px dashed #eee;padding:3px 6px;margin:10px"); ?>
	</div>
	
	<?php if (!$box->is_paid()): ?>
		<br>* You need to pay <?php echo $coinName; ?>s (~<?php echo $amountUSD; ?> US$) for register on our website<br>
	<?php endif; ?>	
	
	<br><br>
	<button onclick='document.form1.submit()' style='padding:6px 20px;font-size:18px;'>Register</button>
	
<?php endif; ?> 	


</div><br><br><br><br><br><br>
<div style='position:absolute;left:0;'><a target="_blank" href="http://validator.w3.org/check?uri=<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"><img src="https://gourl.io/images/w3c.png" alt="Valid HTML 4.01 Transitional"></a></div>
</body>
</html>