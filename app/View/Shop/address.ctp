<?php //print_r($userdataz);

/*if($timez>=29){
	$newtime = 15;	
}
if($timez>=30){
	$newtime = 15;	
}*/
print_r($timez);

$namenn = array('');
$namenn = $userdataz['User']['name'];	
$emailnn = $userdataz['User']['email'];
$phonenn = $userdataz['User']['phone'];
@$username = (explode(" ",$namenn));
if($username[1]){ 
@$usernew = $username[1];
}else{
$usernew="";	
}
?>
<style> .rowww {
    margin-top: -5%;
}
.banner_slide5555{
	    height: 393px ;
}

</style>

<div class="banner_slide banner_slide5555" style="width:100% !important; overflow:hidden;"> 
	<img style="width:100% !important; margin-top: -25%;" src="<?php echo $this->webroot ?>files/restaurants/<?php echo $restaurant['Restaurant']['logo'];?>" class="banner_img" />
   <h2><?php echo $restaurant['Restaurant']['name'];?></h2>
   <div class="abcdef"> </div>
</div>
    
    <div class="bg_reserv bg_reserv22"> 
       <div class="container">
  			<div class="row top_a"> 
        		<div class="icon-wrap wrap_icon"><img src="<?php echo $this->webroot ?>img/icon-reserve-app.svg"></div>
  			 <h2>RESERVATIONS AVAILABLE WITH THE DROP IN APP</h2>
      <p><?php echo $restaurant['Restaurant']['name']; ?> accepts requests for reservations through the Drop In mobile app.</p>
 			</div><!--row-->
       </div><!--container-->
   </div> <!--bg_reserv--> 



<!-- Content ================================================== -->
<?php echo $this->Form->create('Order'); ?>
<div class="container margin_60_35">
    <div class="row rowww">
      
<br/><br/>
        <div class="col-md-8">
            <div class="box_style_2" id="order_process" style="box-shadow: 0 0 1px #c5c5c5;">
                <h2 class="inner">Your order details</h2>
                <div class="form-group">
                    <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'placeholder' => 'First name', 'required' => 'required', 'maxlength'=>'40', 'value'=>$username[0])); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'placeholder' => 'Last name' , 'required' => 'required', 'maxlength'=>'40', 'value'=>$usernew)); ?>
                </div>
                <div class="form-group"><label>Phone</label>
                    <?php echo $this->Form->text('phone', array('class' => 'form-control', 'placeholder' => 'Telephone/mobile' , 'required' => 'required' , 'type' => 'text', 'autocomplete' => 'off', 'maxlength' => '20', 'value'=>$phonenn)); ?>	
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required', 'type' => 'email', 'maxlength'=>'40', 'value'=>$emailnn)); ?>
                </div>
                
                
                
                <?php @$pickupcode = $_REQUEST['xzHv'];
				if($pickupcode=='SeY'){
				 ?>
                
                <div class="form-group">
                    <?php echo $this->Form->input('pickup_date', array('class' => 'form-control', 'placeholder' => 'Date', 'required' => 'required', 'type' => 'date')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('pickup_time', array('class' => 'form-control', 'placeholder' => 'Time', 'required' => 'required', 'type' => 'time')); ?>
                </div>
                <?php }?>
                
               <?php /*
                
                <div class="form-group">

                    <?php echo $this->Form->input('shipping_address', array('class' => 'form-control', 'placeholder' => 'Your full address', 'required' => 'required', 'maxlength'=>'500')); ?>

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('shipping_city', array('class' => 'form-control', 'placeholder' => 'Your City', 'required' => 'required', 'maxlength'=>'500')); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group"><label>Shipping Zip</label>
                            <?php /*echo $this->Form->text('shipping_zip', array('class' => 'form-control', 'placeholder' => 'Your postal code', 'required' => 'required', 'max'=>'20', 'type' => 'number'));?>
                            
                            <?php echo $this->Form->text('shipping_zip', array('class' => 'form-control', 'placeholder' => 'Your postal code' , 'required' => 'required' , 'type' => 'text', 'autocomplete' => 'off', 'maxlength' => '20')); ?>		
                        </div>
                    </div>
                </div>
               */ ?>
                
                <?php @$pickupcode = $_REQUEST['xzHv'];
				if($pickupcode!=='SeY'){
				 ?>
                
                <hr> 
                <div class="row border_res">
                <h2 class="t_res"> TABLE RESERVATIONS </h2>
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <label>Date</label>
                            <select class="form-control" name="data[Order][delivery_schedule_day]" id="delivery_schedule_day" required>
                                <option value="" selected>Select day</option>
                                <option value="Today">Today</option>
                                <option value="Tomorrow">Tomorrow</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <label>Time</label>
                            <select class="form-control" name="data[Order][delivery_schedule_time]" id="delivery_schedule_time" required>
                                <option value="" selected>Select time</option>
                                <option value="11.30am">11.30am</option>
                                <option value="11.45am">11.45am</option>
                                <option value="12.15am">12.15am</option>
                                <option value="12.30am">12.30am</option>
                                <option value="12.45am">12.45am</option>
                                <option value="01.00pm">01.00pm</option>
                                <option value="01.15pm">01.15pm</option>
                                <option value="01.30pm">01.30pm</option>
                                <option value="01.45pm">01.45pm</option>
                                <option value="02.00pm">02.00pm</option>
                                <option value="07.00pm">07.00pm</option>
                                <option value="07.15pm">07.15pm</option>
                                <option value="07.30pm">07.30pm</option>
                                <option value="07.45pm">07.45pm</option>
                                <option value="08.00pm">08.00pm</option>
                                <option value="08.15pm">08.15pm</option>
                                <option value="08.30pm">08.30pm</option>
                                <option value="08.45pm">08.45pm</option>
                            </select>
                        </div>
                    </div>
                    
                
                	<div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <label>Person</label>
                            <select class="form-control" name="data[Order][noofperson]" id="" required>
                                <option value="" selected>Person</option>
                                <?php
								$t = 1;
								for($t=1; $t<=50; $t++){
									?>
                                    <option value="<?php echo $t; ?>"><?php echo $t; ?></option>
                                    <?php
									
								}
								
								 ?>
                                
                        
                            </select>
                        </div>
                    </div>
    
                </div>
                <hr>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">


                        <?php echo $this->Form->textarea('notes', array('class' => 'form-control', 'placeholder' => 'Notes for the restaurant', 'maxlength'=>'500')); ?>

                    </div>
                </div>
            </div><!-- End box_style_1 -->
        </div><!-- End col-md-6 -->
        
        
        <div class="col-md-4" id="sidebar">
            <div class="theiaStickySidebar">
                <div id="cart_box">
                    <h3>Your order <i class="icon_cart_alt pull-right"></i></h3>
                    <div id="added_items_chk" style="font-size:16px;">

                    </div>
                    <hr>
                    <input type="hidden" value="<?php echo $restaurant['Restaurant']['id']; ?>"  name="data[Order][restaurant_id]" >
                    <input type="hidden" value="<?php echo $loggeduser; ?>"  name="data[Order][uid]" >
                    <div class="row" id="options_2">
                
                		
                
                        <?php //if ($restaurant['Restaurant']['delivery'] == 1) { ?>
                            <div style="display: none" class="col-lg-6 col-md-12 col-sm-12 col-xs-6" style="font-size:16px; padding-left:0;">
                                <label> <input checked="checked" type="radio" id="deli" value="delivery"  name="delivery" >  <b> Delivery </b> </label>
                            </div>
                        <?php  //}if ($restaurant['Restaurant']['takeaway'] == 1) { ?>
                            <!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-6" style="padding-left:0;" > 
                                <label>  <input type="radio" value="takeaway"  id="tkway"   name="delivery" >Take Away</label>
                            </div>-->
                     	   <?php /*}*/ ?>
                    </div><!-- Edn options 2 -->                   
                    <input type="hidden" name="rid" id="reid" value="<?php echo $restaurant['Restaurant']['id']; ?>">
                    <div id="showdiv" style="display: none" style="font-size:16px;">
                    Pin Code<input type="text" value="123456" id="chpin" name="pin">
                    <div id="pincheck"></div>
                    <div id="dlchrg"> </div>
                    </div>
                    <hr>
                    <div id="total_items_chk"  style="font-size:16px;"></div> 
                    <hr>
                    <button class="btn_full"> Confirm Your Order </button>
                    
                   <!-- <a class="btn_full_outline" href="<?php //echo $this->webroot ?>restaurants/addresmenu/<?php //echo $restaurant['Restaurant']['id']; ?>"><i class="icon-right"></i> Add other items</a>-->
                </div><!-- End cart_box -->
            </div><!-- End theiaStickySidebar -->
        </div><!-- End col-md-3 -->

    </div><!-- End row -->
</div><!-- End container -->
<?php echo $this->Form->end(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

        $("#OrderPhone").keydown(function (event) {


            if (event.shiftKey == true) {
                event.preventDefault();
            }

            if ((event.keyCode >= 48 && event.keyCode <= 58) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

            } else {
                event.preventDefault();
            }
            
            if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                event.preventDefault();

        });
		
		
		
		
		
		
		
		
		
		$("#OrderShippingZip").keydown(function (event) {


            if (event.shiftKey == true) {
                event.preventDefault();
            }

            if ((event.keyCode >= 48 && event.keyCode <= 58) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

            } else {
                event.preventDefault();
            }
            
            if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                event.preventDefault();

        });
	});
</script>