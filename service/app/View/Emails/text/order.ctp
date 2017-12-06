<div style="width: 60%;">
    <table width="100%" align="center" bgcolor="#ffffff" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td width="100%">

                </td>
            </tr>
            <tr>

            </tr>
            <tr>
                <td align="center" valign="top">
                    <table width="100%" align="center" bgcolor="#ffffff" border="0" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                                <td height="20" valign="top"></td>
                            </tr>

                            <tr>
                                <td align="center" valign="top">
                                    <font style="font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#353535">     
                                    <strong>Order Confirmed</strong>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td height="20" valign="top"></td>
                            </tr>
                            <tr>
                                <td height="20" valign="top"></td>
                            </tr>
                            <tr>
                                <td align="left" valign="top"> 
                                    <font style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#212121;line-height:20px">
                                    Hi  <?php echo $shop['Order']['first_name']; ?><?php echo $shop['Order']['last_name']; ?>,<br><br>
                                    <?php
                                    $i = 1;
                                    foreach ($shop['OrderItem'] as $orderitem) {
                                        ?>
                                        (<?php echo $i++; ?>) <?php echo $orderitem['Product']['name']; ?> - For Order status call -123456789 <br></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" valign="top"></td>
                                </tr>
                                <tr>	
                                    <td align="center" style="padding:10px;border:2px dashed #999999">
                                        <strong>
                                            <font style="font-family:Helvetica,sans-serif;font-size:14px;color:#353535">
                                            $<?php echo $orderitem['Product']['price']; ?>
                                            <?php echo $orderitem['quantity']; ?>
                                            $<?php echo $orderitem['subtotal']; ?>
                                            </font>
                                            <font style="font-family:Helvetica,sans-serif;font-size:14px;color:#eb603b"></font></strong>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="20" valign="top"></td>
                                </tr>

                                <tr>
                                    <td align="left" valign="top"> 
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tbody><tr>
                                                    <td colspan="2" bgcolor="#f3f3f3" style="padding:5px">
                                                        <font style="font-family:Helvetica,sans-serif;font-size:14px;color:#353535"><strong>Information about your order:</strong></font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                    </td></tr><tr><td colspan="3" style="font-size:14px;padding:14px;padding-right:5px">
                                                        <table width="100%" bgcolor="" cellpadding="0" cellspacing="0" border="0" style="line-height:20px;">
                                                            <tbody><tr>
                                                                    <td width="30"><strong><?php echo $shop['Order']['quantity']; ?> X</strong></td>
                                                                    <td><strong><?php //echo $ord['Order']['recipe_names']; ?></strong></td>
                                                                    <td width="60" align="right"><strong>$<?php echo $shop['Order']['total']; ?></strong></td>
                                                                </tr>

                                                            </tbody></table>
                                                    </td></tr>



                                                <tr>
                                                    <td bgcolor="#f3f3f3" style="padding:5px">
                                                        <font style="font-family:Helvetica,sans-serif;font-size:14px;color:#353535"><strong>Price:</strong></font>
                                                    </td>
                                                    <td bgcolor="#f3f3f3" style="padding:5px" align="right">
                                                        <font style="font-family:Helvetica,sans-serif;font-size:14px;color:#353535">
                                                        $<?php echo $shop['Order']['total']; ?></font>
                                                    </td>
                                                </tr><br/><br/>
                                        <?php } ?>
                                        <tr>
                                            <td bgcolor="#f3f3f3" style="padding:5px">
                                                <font style="font-family:Helvetica,sans-serif;font-size:14px;color:#353535"><strong>Total:</strong></font>
                                            </td>
                                            <td bgcolor="#f3f3f3" style="padding:5px" align="right">
                                                <font style="font-family:Helvetica,sans-serif;font-size:14px;color:#353535">
                                                <strong> <?php echo $shop['Order']['quantity']; ?></strong></font>
                                            </td>
                                        </tr><br/><br/>
                                        <tr>

                                        </tr>
                                        <br/><br/>
                                        <tr>
                                            <td valign="top">
                                                <font style="font-family:Helvetica,sans-serif;font-size:14px;color:#353535"><strong>Customer Information:</strong></font><br>
                                                Name:- <?php echo $shop['Order']['first_name'] . " " . $shop['Order']['last_name']; ?>
                                                <br>
                                                Address:- <?php echo $shop['Order']['shipping_address']; ?>
                                                <br>  City:- <?php echo $shop['Order']['shipping_city']; ?> 
                                                <br>  Zip:- <?php echo $shop['Order']['shipping_zip']; ?> 
                                                <br>

                                                Email:- <?php echo $shop['Order']['email']; ?><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#212121">
                                                For any other questions, please call us at 123456789.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:14px">
                                                <a href="#"> <img src="<?php echo $this->Html->url('/img/email_logoa.png', true); ?>" width="255" height="53"></a></td> 
                                        <a href="#"> We love your feedback</a></td>  
                                </td>
                            </tr>
                            <tr style="float: right;">
                                <td>
                                    Like us on: <a href="#"> <img src="<?php echo $this->Html->url('/img/email_facebook.png', true); ?>" width="40" height="40"></a>
                                    <a href="#"> <img src="<?php echo $this->Html->url('/img/email_twitter.png', true); ?>" width="40" height="40"></a>
                                    <a href="#"> <img src="<?php echo $this->Html->url('/img/email_Instagram.png', true); ?>" width="40" height="40"></a></td> 
                                </td>
                            </tr>

                        </tbody></table>
                </td>
            </tr>
            <tr>
                <td height="10" valign="top"></td>
            </tr>
        </tbody></table>
</td></tr><tr>
    <td height="10" valign="top"></td>
</tr>
<tr>
    <td valign="top" align="left"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody><tr> 
                </tr>
            </tbody></table></td>
</tr>
</tbody></table>
</div>