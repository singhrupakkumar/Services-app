<style> 
.btn5534{
	width:15%;	
}
@media (max-width: 1280px) { 

}
@media (max-width: 980px) { 
.btn5534 {
      margin: -4px 29%;
    width: 21%;
}
.icon-wrap.wrap_icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 50%;
    height: 60px;
    margin-bottom: 5.2%;
    margin-left: 47.5%;
}
}
@media (max-width: 800px) { 
.btn5534 {
    margin: 4px 36%;
    width: 21%;
}
.icon-wrap.wrap_icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 50%;
    height: 60px;
    margin-bottom: 6%;
    margin-left: 46%;
}
}
@media (max-width: 768px) { 

.btn5534 {
    margin: 4px 38%;
    width: 21%;
}
}
@media (max-width: 414px){
.icon-wrap.wrap_icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 50%;
    height: 60px;
    margin-bottom: 0;
       margin-left: 42% !important;
    margin-top: -11% !important;
}
.newsletter-cta {
    margin-left: 35%;
}
.btn5534 {
    margin: 0px 32%;
    width: 36%;
}
}
@media (max-width: 375px){
.btn5534 {
    margin: 0 28%;
    width: 45%;
}

.icon-wrap.wrap_icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 50%;
    height: 60px;
    margin-bottom: 0;
       margin-left: 41% !important;
    margin-top: -11% !important;
}
.newsletter-cta {
    margin-left: 33%;
}
}
@media (max-width: 360px) { 
.btn5534 {
    margin: 10px 26%;
    width: 46%;
}
.icon-wrap.wrap_icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 50%;
    height: 60px;
    margin-bottom: 12%;
    margin-left: 41%;
    margin-top: -13%;
    position: relative;
    width: 60px;
}
.one11 {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #cecece;
    color: #545454;
    float: left;
    font-size: 16px;
    margin-right: 1%;
    margin-top: 0 !important;
    padding: 5px 0;
    width: 100%;
}
}
@media (max-width: 320px) { 
.icon-wrap.wrap_icon {
    background: #fff none repeat scroll 0 0;
    border-radius: 50%;
    height: 60px;
    margin-bottom: 12%;
    margin-left: 39%;
    margin-top: -13%;
    position: relative;
    width: 60px;
}
.one11 {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #cecece;
    color: #545454;
    float: left;
    font-size: 16px;
    margin-right: 1%;
    margin-top: 0 !important;
    padding: 5px 0;
    width: 100%;
}.btn553 {
    bottom: -20%;
}
.btn5534 {
    bottom: 0 !important;
    margin: -13px 26%;
    width: 46%;
}
}

</style>


 <?php
	 //print_r($restaurant); ?>
<div class="banner_slide" style="width:100% !important; overflow:hidden; position:relative;"> 
	<img style="width:100% !important; position:absolute; top:0; right:0; left:0; bottom:0; margin:auto;" src="<?php echo $this->webroot ?>files/restaurants/<?php echo $restaurant['Restaurant']['logo'];?>" class="banner_img" />
   <h2><?php echo $restaurant['Restaurant']['name'];?></h2>
   <div class="abcdef"> </div>
</div>
   
    
   	<div class="bg_reserv"> 
       <div class="container">
  		<div class="row top_a"> 
        <div class="icon-wrap wrap_icon"><img src="<?php echo $this->webroot; ?>img/icon-reserve-app.svg"></div>
  			 <h2 class="re_drop1">RESERVATIONS AVAILABLE WITH THE DROP IN APP</h2>
      <p class="re_drop2"><?php echo $restaurant['Restaurant']['name']; ?> 
      <?php $latitudex = $restaurant['Restaurant']['latitude']; ?>
      <?php $longitudex = $restaurant['Restaurant']['longitude'];
	  		global $latitudex,$longitudex;
	   ?>
      accepts requests for reservations through the Drop in mobile app.</p>
      <div class="btn3 btn553 btn5534" style="">
      <center>
      <?php /*@$commission_pick = $restaurant['Restaurant']['commission_pick']; 
	  		@$deliveryz = $restaurant['Restaurant']['reservation'];
	  		 //$deliveryz = $restaurant['Restaurant']['delivery'];
	         @$takeawayz = $restaurant['Restaurant']['takeaway'];
	  if($deliveryz==1){*/
	   ?>
      
  	<?php @$pickupcode = $_REQUEST['xzHv'];
			//$pickupcode = base64_decode($pickupcode)
	 ?>
      <?php 
	  //print_r($discategory['DishCategory']);
	  if($discategory['DishCategory']){
	   foreach ($discategory['DishCategory'] as $dact) {?>
     
                   <a class='one11' href="<?php echo $this->webroot; ?>restaurants/detail/<?php echo base64_encode ($restaurant['Restaurant']['id']); ?>/<?php echo base64_encode ($dact['id']); if($pickupcode){?>/1?xzHv=SeY<?php }else{echo '/0';}?>" class="active btn-rsrv-light3"><?php echo $dact['name']; ?></a>
                    
     
     
     
      
      <?php //}
	  }}
	  /*if($takeawayz==1){
	  ?>
     <?php
	 if($discategory['DishCategory']){
	   foreach ($discategory['DishCategory'] as $dact) {?>
     <?php } ?> 
                   <a class='one2' href="<?php echo $this->webroot; ?>restaurants/detail/<?php echo $restaurant['Restaurant']['id']; ?>/<?php echo $dact['id']; ?>/1?pickup=yes" class="active btn-rsrv-light3">Pick Up</a>
                    
                      <?php }} */?>
                      </center>
      </div>
    	</div>
       </div>
     </div> 
      
      
      
    <div class="search_res1 rec ">  	
<div class="container">
  <div class="row">
  		<div class="col-75">
        	<img src="<?php echo $this->webroot; ?>img/icon-neighborhood-transparent.svg" class="neigh">
      <p class="newsletter-cta-text">Want recommendations, chef insights, local tips and more sent straight to your inbox?</p>
        </div>
        <div class="col-25n"> 
        	 <a href="http://readyto.com/pages/contact" class="newsletter-cta">Yes, Please!</a>
        </div>
  </div><!--row-->
  </div>
  </div>
  

















                       