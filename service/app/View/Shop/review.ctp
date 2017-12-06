<style>
@media (max-width: 1280px) {
.frm .control span{   padding: 1px 0 0;}}
@media (max-width: 980px) {
.container.margin_60_35 {
    margin-top: -14% !important;
    padding-top: 0 !important;
}
.credit {
    margin-bottom: 0;
    margin-left: 0;
    margin-top: 8px;
	 padding: 11px 14px 11px 18px;
}
#cart_box{margin-top:0 !important; padding-top:0 !important;}
.fa.fa-credit-card{float:right;}
.container.margin_60_35 {
    margin-top: -9% !important;
    padding-top: 0 !important;
}
}
@media (max-width: 800px) {

.credit {
    margin-bottom: 0;
    margin-left: 0;
    margin-top: 8px;
	 padding: 11px 14px 11px 18px;
}
#cart_box{margin-top:0 !important; padding-top:0 !important;}
.fa.fa-credit-card{float:right;}
.container.margin_60_35 {
    margin-top: -12% !important;
    padding-top: 0 !important;
}
}
@media (max-width: 768px) {

.control.control--radio > span {
    float: left;
    font-size: 14px;
}
.credit {
    margin-bottom: 0;
    margin-left: 0;
    margin-top: 8px;
	 padding: 11px 14px 11px 18px;
}
#cart_box{margin-top:0 !important; padding-top:0 !important;}
.fa.fa-credit-card{float:right;}
.container.margin_60_35 {
    margin-top: -11% !important;
    padding-top: 0 !important;
}
}
@media (max-width: 360px) {
.container.margin_60_35 {
    margin-top: -44% !important;
    padding-top: 0 !important;
}
.credit {
    margin-bottom: 0;
    margin-left: 0;
    margin-top: 8px;
	 padding: 11px 14px 11px 18px;
}
#cart_box{margin-top:0 !important; padding-top:0 !important;}
.fa.fa-credit-card{float:right;}
.container.margin_60_35 {
    margin-top: -26% !important;
    padding-top: 0 !important;
}
}
@media (max-width: 320px) {
.container.margin_60_35 {
    margin-top: -44% !important;
    padding-top: 0 !important;
}
.credit {
    margin-bottom: 0;
    margin-left: 0;
    margin-top: 8px;
}
.container.margin_60_35 {
    margin-top: -26% !important;
    padding-top: 0 !important;
}

}
.row.rowwww {
    margin-top: 4%;
}
.box_style_12 {
    margin-top: -4.5% !important;
}
</style>
<?php
//debug($shop['Order']);exit;
//print_r($get_restutant_detail);
echo $this->Html->script(array('jquery.validate.js', 'additional-methods.js', 'shop_review.js'), array('inline' => false));
?>
<div class="banner_slide" style="width:100% !important; overflow:hidden;"> 
	<img style="width:100% !important;" src="<?php echo $this->webroot ?>files/restaurants/<?php echo $res_logo; ?>" />
   <h2><?php echo $res_name; ?></h2>
    <div class="abcdef"> </div>
</div><!--banner_slide-->
    
    

    <div class="bg_reserv bg_reserv255"> 
       <div class="container">
  			<div class="row top_a"> 
        		<div class="icon-wrap wrap_icon"><img src="<?php echo $this->webroot ?>img/icon-reserve-app.svg"></div>
  			 <h2>RESERVATIONS AVAILABLE WITH THE DROP IN APP</h2>
      <p><?php echo $res_name; ?> accepts requests for reservations through the Drop In mobile app.</p>
 			</div><!--row-->
       </div><!--container-->
   </div> <!--bg_reserv-->
     <?php
	 //print_r($get_restutant_detail); 
//print_r($myshop);




?>
<br/><br/><br/><br/><br/><br/>


<!-- Content ================================================== -->
<?php echo $this->Form->create('Order'); ?>
<div class="container margin_60_35">
    <div class="row rowwww">
       

        <div class="col-md-8">
            <div class="box_style_2 box_style_12">
                <!--<h2 class="inner">Payment methods</h2>-->

                <!--<div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer Info</h3>
                    </div>
                    <div class="panel-body">
                        First Name: <?php //echo $shop['Order']['first_name']; ?><br />
                        Last Name: <?php //echo $shop['Order']['last_name']; ?><br />
                        Email: <?php //echo $shop['Order']['email']; ?><br />
                        Phone: <?php //echo $shop['Order']['phone']; ?>
                    </div>
                </div>-->

                <!--<div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Shipping Address</h3>
                    </div>
                    <div class="panel-body">
                        Shipping Address: <?php //echo $shop['Order']['shipping_address']; ?><br />
                        Shipping City: <?php //echo $shop['Order']['shipping_city']; ?><br />
                        Shipping Zip: <?php //echo $shop['Order']['shipping_zip']; ?><br />
                        Delivery Schedule Day: <?php //echo $shop['Order']['delivery_schedule_day']; ?><br />
                        Delivery Schedule Time: <?php //echo $shop['Order']['delivery_schedule_time']; ?><br />
                        Notes: <?php //echo $shop['Order']['notes']; ?><br />
                    </div>
                </div>-->



                
     <!--<div class="col-60"> -->

						<h1 class="methods1"> Payment methods</h1>	
        
                 <div class="frm"> 
                 	<form action="" method="post">
                    <table> 
                    	<tr> 
                        	 <td colspan="2">
                             <div class="credit">
                          <label class="control control--radio" style="    margin: -3px 0 0 0;">
								
							<input type="radio" name="payment_method" value="creditcard">
				  			<div class="control__indicator"></div>
                            <span>Credit Card</span>
							</label>   
                             <i class="fa fa-credit-card" aria-hidden="true" style=" margin: 0 -6px 0 0 !important;"></i>
                            </div> 
                             </td>
                        </tr>
                        <!--<tr> 
                            <td colspan="2"> <input type="text" name="fstnme" placeholder="First and lastname"> </td>
                        </tr>
                        <tr> 
                        	<td>&nbsp;  </td>
                        </tr>
                        <tr> 
                        	 <td colspan="2"> <b> Card number </b> </td>
                        </tr>
                        <tr> 
                             <td colspan="2"> <input type="text" name="lstnme" placeholder="Card number"> </td>
                        </tr>
                        <tr> 
                        	<td>&nbsp;  </td>
                        </tr>
                        <tr> 
                        	 <td class="half"> <b> Expiration date </b> </td>
                             <td class="half"> <b> Security code</b> </td>
                        </tr>
                        <tr> 
                          <td class="half small"> 
                          	<input type="text" name="mm" placeholder="mm"> 
                            <input type="text" name="yy" placeholder="yyyy">
                          </td>
                          <td class="half small2"> 
                          	<input type="text" name="ccv" placeholder="CCV"> 
                            <span> <img src="<?php //echo $this->webroot ?>img/credit_card.jpg"> <span> Last 3 digits</span> </span>
                          </td>
                        </tr>
                        
                             <tr> 
                        	<td>&nbsp;  </td>
                        </tr>-->
                        <!--<tr> 
                        	  <td colspan="2">
                              <div class="payment_select" id="paypal" style="position: relative; float: left;
    width: 100%;
    margin: 9px 0;
    height: 43px; ">
                <label class="control control--radio"> <input type="radio" value="paypal" name="payment_method" class="icheck">
               <div class="control__indicator"></div>
                            <span class="mymoney">  Pay with paypal </span> 
                
                
               </label>
  
                
            </div>
                             </td>
     
                             </tr>-->
                             <!--<tr>
                               <td colspan="2">
               
                <div class="payment_select nomargin" style="position: relative; float: left;
    width: 100%;
    margin: 9px 0;
    height: 43px;">
                 <label class="control control--radio"><input type="radio" value="cod" name="payment_method" class="icheck">
         	<div class="control__indicator"></div>
                            <span class="mymoney"> Pay with cash </span></label>
                <i class="icon_wallet" style="top:8px; position: absolute; right: 13px;"></i>
            </div>
                 
          
                             </td>
                             </tr> -->
                             
                                   
                             <tr> 
                             
         <td colspan="2">
                             <div class="credit" style="position: relative; float: left;
    width: 100%;
    margin: 9px 0;
    height: 43px;">
                          <label class="control control--radio" style="    margin: -2px 0 0 0;">
								
							<input type="radio" name="payment_method" value="wallet" id="wallet">
							<div class="control__indicator" style="top:5px !important;"></div>
                            <span class="mymoney">  Use Wallet Money: KD<?php echo $walletmoney['User']['loyalty_points']; ?></span> 
							</label>   
                             <i class="icon-wallet" aria-hidden="true" style="
    font-size: 27px;
    color: #696969;
    float: right;
    margin: -3px -12px 0px 0 !important;
    line-height: 0;
    padding: 0;
    "></i>
                            </div> 
                             </td>                     
                             
                             
                             
                        </tr>
                        
                 
                    </table>
                 	</form>
                 
                 </div>
 
                  
                <!--col-60</div>-->           
                
                
                
                
                
                
                
                
                
                
                
                
<?php
/*

                <div class="payment_select">
                    <label><input type="radio" value="creditcard" checked name="payment_method" class="icheck">Credit card</label>
                    <i class="icon_creditcard"></i>
                </div>         
                
                
                
                
                
                
                
<!--                <div class="form-group">
                    <label>Name on card</label>
                    <input type="text" class="form-control" id="name_card_order" name="name_card_order" placeholder="First and last name">
                </div>
                <div class="col col-sm-4">

                    <strong>Credit or debit card</strong>

                    <br />

<?php echo $this->Form->input('creditcard_number', array('label' => false, 'class' => 'form-control ccinput', 'type' => 'tel', 'maxLength' => 16, 'autocomplete' => 'off')); ?>

                </div>
                <div class="col col-sm-2">

                    <strong>Card Security Code</strong>

                    <a tabindex="9999" id="cscpop" role="button" data-placement="top" data-toggle="popover" data-trigger="focus" title="Card Security Code (CSC)" data-content="<small><strong>Visa, MasterCard, Discover</strong><br /><img src=<?php echo Router::url('/'); ?>img/visa.png><br / >The security code is the last three digits of the number that appears on the back of your card in the signature bar. <br /><br /><strong>American Express</strong><br /><img src=<?php echo Router::url('/'); ?>img/amex.png><br />The security code is the four digits located on the front of the card, on the right side.</small>"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>

                    <br />

<?php echo $this->Form->input('creditcard_code', array('label' => false, 'class' => 'form-control', 'type' => 'tel', 'maxLength' => 4)); ?>

                </div>
            </div>

            <br />

            <div class="row">
                <div class="col col-sm-3">
                    <?php
                    echo $this->Form->input('creditcard_month', array(
                        'label' => 'Expiration Month',
                        'class' => 'form-control',
                        'options' => array(
                            '01' => '01 - January',
                            '02' => '02 - February',
                            '03' => '03 - March',
                            '04' => '04 - April',
                            '05' => '05 - May',
                            '06' => '06 - June',
                            '07' => '07 - July',
                            '08' => '08 - August',
                            '09' => '09 - September',
                            '10' => '10 - October',
                            '11' => '11 - November',
                            '12' => '12 - December'
                        )
                    ));
                    ?>
                </div>
                <div class="col col-sm-3">
                    <?php
                    echo $this->Form->input('creditcard_year', array(
                        'label' => 'Expiration Year',
                        'class' => 'form-control',
                        'options' => array_combine(range(date('y'), date('y') + 10), range(date('Y'), date('Y') + 10))
                    ));
                    ?>
                </div>
            </div>
            
           */ ?>

           
            <!--<div class="payment_select nomargin">
                <label><input type="radio" value="cod" name="payment_method" class="icheck">Pay with cash</label>
                <i class="icon_wallet"></i>
            </div>-->
        </div><!-- End box_style_1 -->
    </div><!-- End col-md-6 -->

    <div class="col-md-4" id="sidebar" style="margin-top:0;">
        <div class="theiaStickySidebar">
            <div id="cart_box">
                <h3>Your order <i class="icon_cart_alt pull-right"></i></h3>
                <div id="added_items_chk"></div>
              
              
                <div class="row" id="options_2">
<?php /*if ($shop['Order']['option_1'] != 'takeaway') { ?>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <label><input type="radio" value="delivery" checked  name="option_2" class="icheck">Delivery</label>
                        </div>
<?php } else { ?>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <label><input type="radio" value="takeaway" checked name="option_2" class="icheck">Take Away</label>
                        </div>
<?php } */?>
                </div><!-- Edn options 2 -->
                <hr>
                <div id="total_items_chk"></div> 

               
               
                <button class="btn_full" >Confirm your order</a>
            </div><!-- End cart_box -->
        </div><!-- End theiaStickySidebar -->
    </div><!-- End col-md-3 -->

</div><!-- End row -->
</div><!-- End container -->
<?php echo $this->Form->end(); ?>






