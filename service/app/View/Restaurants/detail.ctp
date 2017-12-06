<style> 
@media (max-width: 414px){
.addtocart {
    margin: 0 6.5%;
}
.center_price strong {
    font-weight: 400;
    font-size: 15px;
}

}
@media (max-width: 375px){
.center_price strong {
    font-weight: 400;
    font-size: 15px;
}

}
@media (max-width: 320px){

.banner_slide555 {
    height: 104px !important;
}
}
.banner_slide555{
	    height: 393px ;
}

.box_style_2 h2.inner {
    background-color: #d71f26;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    color: #fff;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 22px;
    font-weight: 600;
    margin: -25px -23px 25px -8px !important;
}

</style>



<div class="banner_slide banner_slide555" style="width:100% !important; overflow:hidden;"> 
	<img style="width:100% !important; margin-top: -25%;" src="<?php echo $this->webroot ?>files/restaurants/<?php echo $restaurant['Restaurant']['logo'];?>" class="banner_img" />
   <h2><?php echo $restaurant['Restaurant']['name'];?></h2>
   <div class="abcdef"> </div>
</div>
    
    <div class="bg_reserv bg_reserv3"> 
       <div class="container">
  			<div class="row top_a"> 
        		<div class="icon-wrap wrap_icon"><img src="<?php echo $this->webroot; ?>img/icon-reserve-app.svg"></div>
  			 <h2>RESERVATIONS AVAILABLE WITH THE DROP IN APP</h2>
      <p><?php echo $restaurant['Restaurant']['name']; ?> accepts requests for reservations through the Drop In mobile app.</p>
      
      <!--div class="btn3">
  	 <button class="btn-rsrv-light3 active1"> Dine In </button>
     <button class="btn-rsrv-light3"> Pick up  </button>
      </div-->
 			</div><!--row-->
       </div><!--container-->
   </div> <!--bg_reserv-->
     
     
     
       <div class="container padding">
  			<div class="row top_a">
            	<div class="col-60 width_chg1"> 
                	<header class="entry-header">
						<h1 class="entry-title"><!--menu--></h1>	
        			</header>
                <div class="entry-content">
		<ul id="fdm-menu-1">


<li class="fdm-column">

<?php foreach ($DishSubcat['DishSubcat'] as $discat) { ?>
           <?php //echo $discat['id']; ?><?php //echo $discat['name']; ?>

<!--<br/><br/>-->
	<ul class="fdm-section">
        <li class="fdm-section-header"><h3><?php echo $discat['name']; ?></h3></li>
        <?php foreach($product as $pdata){  if($discat['id']==$pdata['Product']['dishsubcat_id']) {?>
        
        <li class="fdm-item-has-price">
			<div class="fdm-item-panel">
				<p class="fdm-item-title"><?php echo $pdata['Product']['name']; ?></p>
                <div class="fdm-item-price-wrapper">
					<span class="fdm-item-price">
                    <?php $menu_price = $pdata['Product']['price'];
						echo number_format($menu_price,3);?>
                    </span>
  					<span> <?php echo $this->Form->button('Add to Cart', array('class' => 'btn addtocart', 'id' => 'addtocart', 'id' => $pdata['Product']['id']));?></span>                   
				</div>
                <div class="fdm-item-content">
				<p><?php echo $pdata['Product']['description']; ?></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</li><!--fdm-item-has-price-->
      
         <?php
		   //print_r($pdata['Product']['asp']);
		   //echo 'aaaaaaaaaaaaaaaaa';
		    if(($pdata['Product']['asp'])) { ?>
                        
                    <div class="modal fade" id="myModal-<?php echo $pdata['Product']['id'] ; ?>" role="dialog">
                        <div class="modal-dialog popup1">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="box_style_2" id="main_menu">
                                    <?php if(!empty($pdata['Product']['asp'])) {?>
                                    <h2 class="inner">Associated product</h2>
               
                
                                  <?php    //print_r($pdata['Product']['asp']); 
                                  foreach($pdata['Product']['asp'] as $asp){ ?>
                                  <span class="main_content_box">
                                   <span class="left_heading">    
                                <h5><?php echo $asp['Product']['name']; ?></h5>
                               
                                <p>
                                        <?php echo $asp['Product']['description']; ?>
                                </p>
                                </span>
                           <span class="center_price"> 
                                <strong>$ <?php echo $asp['Product']['price']; ?></strong>
                            </span>
                          <span class="right_btn"> 
                         <?php echo $this->Form->button('Add to Cart', array('class' => 'btn btn-primary addtocart', 'id' => 'addtocart', 'id' => $asp['Product']['id']));
						 ?></span> 
						 </span>
						 <?php
                                    } }
                                  ?>
                               <!-- <br/><br/><br/><br/> <br/><br/><br/><br/>-->
                                <?php /*if(!empty($pdata['Product']['Alergy'])) {?>
                               <h2 class="inner">Alergy</h2>    
                               
                                  <?php    //print_r($pdata['Product']['Alergy']); 
                                  foreach($pdata['Product']['Alergy'] as $alg){ ?>
                                       
                                <h5><?php echo $alg['Alergy']['name']; ?></h5>
                               
                                <p>
                                        <?php echo $alg['Alergy']['about']; ?>
                                </p>
                           
                               
                            
                          
                        <?php 
                                } }*/
                                  ?>       
                                   

                                </div><!-- End box_style_1 -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                      <?php } ?>
        
        
        
        
        
        <?php } } ?>
        
        
        <?php }?>






</li>
	</ul>
	
</div>
           </div>
                <br/><br/>
                <div class="col-25n outer_shd width_chg2">    
            <div class="theiaStickySidebar">
                <div id="cart_box" >
                    <h3>Your order <i class="icon_cart_alt pull-right"></i></h3>
                    <div id="added_items">

                    </div>
                   
                    <div class="row" id="options_2">
                       <?php if($restaurant['Restaurant']['reservation']==1){ ?>
                        <div style="display:none;" class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <label><input type="radio" value="" checked name="option_1" class="icheck">Delivery</label>
                        </div>
                        <?php } if($restaurant['Restaurant']['takeaway']==1) {?>
                        <div style="display:none;" class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                            <label><input type="radio" value="" checked name="option_2" class="icheck">Take Away</label>
                        </div>
                        <?php } ?>
                    </div><!-- Edn options 2 -->

                   
                    <div id="total_items"></div>                   
                    <hr>
                     <?php @$pickupcode = $_REQUEST['xzHv']; ?>
                    <?php 
                   if($loggeduser){ 
                   if($pickupcode=='SeY'){?>
                    <a class="btn_full" href="<?php echo $this->webroot ?>shop/address/<?php echo base64_encode ($restaurant['Restaurant']['id']); ?>?xzHv=<?php echo $pickupcode;?>">Order now</a>
                    <?php } else{
						
						?>
                    
                    <a class="btn_full" data-min='<?php echo $restaurant['Restaurant']['min_order']; ?>' id='orderR' href="<?php echo $this->webroot ?>shop/address/<?php echo base64_encode ($restaurant['Restaurant']['id']); ?>">Order now</a>
                    <?php }?>
                    
                    
                   <?php } else{?>
                    <a href="#0" data-toggle="modal" class="btn_full" data-target="#login_2">Confirm Your Order</a>
                   <?php }?>
                </div><!-- End cart_box -->
            </div><!-- End theiaStickySidebar -->
        </div><!-- End col-md-3 -->
                
         
                
            </div><!--row-->
       </div><!--container-->
        
<style>
.popup1 {
    margin: 10% auto;
}
.popup1 inner{
	margin:0;
}
.popup1 .box_style_2{
	margin-top:18px;
}
.main_content_box {
    border-bottom: 1px solid #ccc;
    float: left;
    margin: 0 0 10px;
    padding-bottom: 15px;
    width: 100%;
}
.left_heading h5 {
    color:#d71f26;
    font-size: 17px;
    font-weight: 500;
    text-transform: uppercase !important;
	width:100%;
	float:left;
}
.center_price strong{
	font-weight:400;
}
.left_heading {
    float: left;
    width: 40%;
}
.left_heading h5{
	text-transform:capitalize;
}
.center_price {
    float: left;
    padding: 8px 0;
    text-align: center;
    width: 25%;
	color:#7d7d7d;
}
.right_btn {
    float: right;
    margin: 6px 0;
    width: 35%;
}
.right_btn button{
	float:right;
	width:auto;
}
.left_heading > p {
    color: #818181;
    float: left;
    font-size: 14px;
    line-height: 17px;
    width: 100%;
}

.popup1 .inner {
    text-transform: capitalize;
}

 @media (max-width: 320px) {


.addtocart {
    margin: 0;
    padding: 5px 10px;
}
.center_price{
	font-size:13px !important;
}

 }

 @media (max-width: 360px) {


.center_price {
    font-size: 14px;
    margin: 18px 0 !important;
}
.addtocart {
    margin: 0;
}
.right_btn {
    margin: 22px 0 !important;
}

 }

/*.popup_cart{
	   background: rgba(0, 0, 0, 0.5) none repeat scroll 0 0;
    height: 100%;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 99999;
} 
.modal-content1 {
	margin:30px auto;
    width: 60%;
}
#definitenew{
	width: 100%;
	float:left;
	background: #fff none repeat scroll 0 0;
	 border-radius: 10px;
	}
.lft_ctnt {
    float: left;
    margin: 20px 0;
    width: 100%;
}
.lft_ctnt > h4 {
    color: #f10;
    float: left;
    font-size: 17px;
    margin: 0;
    width: 100%;
}	
.lft_ctnt > h3 {
    float: left;
    font-size: 20px;
    margin: 0;
    width: 100%;
}
.col-md-6 {
    width: 50%;
}
.col-md-3 {
    width: 25%;
}
.ctr_ctnt {
    float: left;
    margin: 26px 0;
    width: 100%;
}
.ctr_ctnt > input {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #e5e5e5;
    border-radius: 6px;
    font-size: 18px;
    padding: 0 6px;
    width: 28%;
    float: left;
    text-align: center;
   
}
.nn {
    width: 35% !important;
}
.nn {
    border: medium none !important;
    float: left;
    width: 44% !important;
}
.rgt_ctnt {
    float: left;
    font-size: 19px;
    margin: 24px 0;
    width: 100%;
}
.rgt_ctnt span{
	   font-size: 15px;
}
.rgt_ctnt > h3 {
    float: right;
    margin: 0;
    width: 90%;
}
.fst_box {
    border-bottom: 2px solid #e5e5e5;
    float: left;
    margin-top: 35px;
    width: 100%;
}
.base3 {
    color: #111;
    float: left;
    font-size: 16px;
    margin: 16px 0;
    width: auto;
}
.sec_box {
    border-bottom: 2px solid #e5e5e5;
    float: left;
    padding: 0 0 18px;
    width: 100%;
}
.box01 {
    float: left;
    margin-top: 15px;
    text-align: center;
    width: 100%;
	cursor:pointer;
}
.box01 {
    text-align: center;
}
.base2 {
    color: #111;
    float: left;
    font-size: 16px;
    margin: 16px 0;
    padding: 0 15px;
    width: 100%;
}
.bdr {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-bottom: 2px solid #e5e5e5 !important;
    border-image: none;
    border-left: medium none;
    border-right: medium none;
    border-top: medium none;
    float: left;
    padding: 10px 15px 4px;
    width: 100%;
}
.box01 img, .box01 h4, .box01 span{cursor:pointer;}
.bn {
    float: left;
    padding: 15px 0 40px;
    text-align: center;
    width: 100%;
}
.btn.btn-default.b1 {
    background: #444 none repeat scroll 0 0 !important;
    border-color: #444 !important;
    color: #787971;
    float: left;
    margin: 0 45px 0 152px;
    padding: 10px 6px;
    width: 25%;
}
.btn.btn-default.b2 {
    background: #d71f26 none repeat scroll 0 0 !important;
    border: 1px solid #d71f26;
    color: #fff;
    float: left;
    margin-right: 58px;
    padding: 10px 6px;
    width: 25%;
}
.box01 input[type="checkbox"] {
    border: 1px solid #000;
    border-radius: 0;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    height: 15px;
    margin-left: -20px;
    outline: 0 none;
    padding: 0;
    position: absolute;
    top: -2px;
    width: 15px;
	
}*/
</style>   
       
       
      
 <!--  <div class="popup_cart">   
      <div class="modal-content1">
            <div id="definitenew">
            <form id="cart_form" method="POST">
            <div class="col-md-12">
            	<div class="fst_box">
                	<div class="row">
                		<div class="col-md-6">
                        	<div class="lft_ctnt">
                            	<h4>CLASSIC</h4><h3><strong>ww</strong></h3>
                            </div>
                        </div>
                       <div class="col-md-3">
                       		<div class="ctr_ctnt">
                            <input id="decrease" value="-" type="button">
                            <input class="nn" name="quantity" id="htop" value="1" type="text">			
                            <input id="increase" value="+" type="button">
                            </div>
                      	</div>
                        <div class="col-md-3">
                        	<div class="rgt_ctnt">
                            	<span>$</span>
                                <h3 id="displayTotal">2.000</h3>
                            </div>
                       </div>
                    </div>
                </div>
           	</div> 
            
            <div class="col-md-12">
            	<h3 class="base3">veg topping</h3>
            </div>
            <div class="col-md-12">
            	<div class="sec_box">
                	<div class="row">
                    	<div class="col-md-3">
                        	<div class="box01" id="51">
                            	<label>
                                    <input type="checkbox">
                                    <img src="/8bring_akshay/files/product/ofr11.png">
                                    <h4>Spicy Jalapenos</h4>
                                    <span>$30.00</span>
                                </label>
                             </div>
                         </div>
                         <div class="col-md-3">
                         	<div class="box01" id="51">
                                <label><input value="414" name="veg topping1" type="checkbox">
                                <img src="/8bring_akshay/files/product/ofr10.png">
                                <h4>Black Olives</h4>
                                <span>$30.00</span>
                                </label>
                            </div>
                         </div> 
                         	<div class="col-md-3">
                        	<div class="box01" id="51">
                            	<label>
                                    <input type="checkbox">
                                    <img src="/8bring_akshay/files/product/ofr11.png">
                                    <h4>Spicy Jalapenos</h4>
                                    <span>$30.00</span>
                                </label>
                             </div>
                         </div>
                         
                         	<div class="col-md-3">
                        	<div class="box01" id="51">
                            	<label>
                                    <input type="checkbox">
                                    <img src="/8bring_akshay/files/product/ofr11.png">
                                    <h4>Spicy Jalapenos</h4>
                                    <span>$30.00</span>
                                </label>
                             </div>
                         </div>
                         
                      </div>
                   </div>
                </div>
                <div class="col-md-12">
                	<h3 class="base2">SPECIAL REQUEST</h3>
                    <input class="bdr" maxlength="40" id="input-1" placeholder="Notes to chef" name="special" type="text">
                    <div class="bn"> 
                    <input class="btn btn-default b1 btncancel" value="CANCEL" type="button">
                    <input class="btn btn-default b2" value="Add To Cart" id="addtocartProduct" name="addit" type="button">
                    </div>
             </div>
             </form>
             </div>
        </div> 
      </div> -->
      
      
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>   
      <script> 
/*      	$(document).ready(function(e) {
            
	$(".btn.addtocart").click(function(){
		
	$(".popup_cart").fadeIn(800)
	
	});
		$(".btncancel").click(function(){
		
	$(".popup_cart").fadeOut(300)
	
	});
	
	
        });*/
      </script>