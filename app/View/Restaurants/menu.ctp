<?php  ?><style> 
  /*======================================*/
/*                 Ratings              */
/*======================================*/




@media (max-width: 414px) {
.icon-wrap.wrap_icon {
    margin-bottom: 7%;
    background: #fff none repeat scroll 0 0;
    border-radius: 50%;
    margin-bottom: 16%;
    margin-bottom: 9% !important;
    margin-left: 46% !important;
    margin-top: -10% !important;
    position: relative;
    width: 60px;
}
.mygallery {
    height: 258px;
	}
.newsletter-cta {
    margin-left: 35%;
   
}	
}
@media (max-width: 375px){
.icon-wrap.wrap_icon {
    margin-bottom: 7%;
    background: #fff none repeat scroll 0 0;
    border-radius: 50%;
    margin-bottom: 16%;
    margin-bottom: 10% !important;
    margin-left: 45% !important;
    margin-top: -12% !important;
    position: relative;
    width: 60px;
}
.mygallery {
    height: 237px;
}
}
@media (max-width: 360px){
.btn553 {
    bottom: -50%;
	
}
}

@media (max-width: 320px){
.btn553 {
    bottom: -50%;
	
}
}
/****** Style Star Rating Widget *****/

.rating {
	 color: #fff;
    float: left;
    padding-bottom: 7px;
    padding-top: 0;
    width: 100%;
}
.testimonial-section::after{
	display:none;
	border:none !important;
}
.ratting_globle h3 {
	float: left;
	font-size: 16px;
	margin: 4px 11px 0 0;
	width: auto;
}
.ratting_main {
	margin: 0;
}
.rating > input {
	display: none;
}
.rating > label:before {
	margin: 3px;
	font-size: 14px;
	font-family: FontAwesome;
	display: inline-block;
	content: "\f005";
}
.rating > .half:before {
	content: "\f089";
	position: absolute;
}
.rating > label {
	color: #ddd;
	float: right;
	padding-bottom: 15px;
}
/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */ .rating:not(:checked) > label:hover, /* hover current star */ .rating:not(:checked) > label:hover ~ label {
	color: #FFD700;
} /* hover previous stars in list */
.rating > input:checked + label:hover, /* hover current star when changing rating */ .rating > input:checked ~ label:hover, .rating > label:hover ~ input:checked ~ label, /* lighten current selection */ .rating > input:checked ~ label:hover ~ label {
	color: #FFED85;
}
.close.close_btn {
	float: right;
}
.user_ratting h4 {
	text-align: center;
	font-size: 18px;
	text-transform: capitalize;
	color: #d71f26;
}
.ratting_edit {
	height: 25px;
	position: relative;
	text-align: center;
	width: 100%;
	line-height: 0;
}
.ratting_edit fieldset {
	float: none;
	margin: 0 auto;
	width: 108px !important;
}
.modal-dialog {
	width: 100%;
	max-width: 560px;
	margin: 3% auto !important;
}
.half {
	width: 0 !important;
}
/*================================
    GENERAL STYLES
    ============================  */

 /* GOOGLE FREE FONTS */
        @import url(http://fonts.googleapis.com/css?family=Oxygen);
        /* BODY STYLE - JUST FOR GOOD LOOK */
        .testimonial-section  {
         
            font-family: 'Oxygen', sans-serif;
           
        }

/*================================
    TESTIMONIAL STYLES
    ============================  */
         .testimonial-section {
    width: 100%;
    height: auto;
    padding: 15px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    position: relative;
    border: 1px solid #fff;
    font-size:12px;
}
.testimonial-section:after {
    top: 100%;
    left: 10%;
    border: solid transparent;
    content: " ";
    position: absolute;
    border-top-color: #fff;
    border-width: 15px;
    margin-left: -15px;
}

.testimonial-section-name {
    margin-top: 30px;
    margin-left: 60px;
    text-align:left;
    color:#000;
}
    .testimonial-section-name img {
        max-width:40px;
        border: 2px solid #fff;
    }
.carousel-indicators-set {
    position:static;
    margin-left:0px;
    width:100%;
}
.bck_Tst{
	background:#fff;	
}
.bg_reserv .row {
    left: 0;
    position: absolute;
    text-align: center;
    top: 6px;
	width:100%;
}
.testimonial-section {
    border: 1px solid #444;
	
}
.carousel-indicators li {
   
    border: 1px solid #444;
}
.carousel-indicators-set {
    margin-left: 0;
    margin-top: 12px;
    position: static;
    width: 100%;
}

.carousel-indicators .active {
    background-color: #444;
}
.ratting_edit > span {
   color: #333;
    float: left;
    font-size: 15px;
    line-height: 25px;
    margin: 0;
}
.rating .popup-form {
    float: right;
    margin: 0;
    max-width: 75px;
    padding: 0;
    width: 66%;
}
.rating #myRegister {
    margin-bottom: 0%;
    margin-top: 0%;
}
.rating .icon_star.voted {
    font-size: 16px;
}
.rating .ratting_edit fieldset {
    float: left;
    margin: 0 5px 0 0;
    min-width: 87px !important;
    padding: 0;
}


 </style>
 

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
      <div class="btn3 btn553">
      <center>
      <?php @$commission_pick = $restaurant['Restaurant']['commission_pick']; 
	  		@$deliveryz = $restaurant['Restaurant']['reservation'];
	  		 //$deliveryz = $restaurant['Restaurant']['delivery'];
	         @$takeawayz = $restaurant['Restaurant']['takeaway'];
	  if($deliveryz==1){
	   ?>
      
  	
      <?php 
	  if($discategory['DishCategory']){
	   foreach ($discategory['DishCategory'] as $dact) {?>
      <?php } ?>
                   <a class='one1' href="<?php echo $this->webroot; ?>restaurants/category/<?php echo base64_encode ($restaurant['Restaurant']['id']); ?>/0" class="active btn-rsrv-light3">Dine In</a>
                   
                 <!--  <a class='one1' href="<?php //echo $this->webroot; ?>restaurants/category/<?php //echo $restaurant['Restaurant']['id']; ?>/<?php //echo $myid; ?>/0" class="active btn-rsrv-light3">Dine In</a>-->
                    
     
     
     
      
      <?php }}
	  if($takeawayz==1){
	  ?>
     <?php
	 if($discategory['DishCategory']){
	   foreach ($discategory['DishCategory'] as $dact) {?>
     <?php } ?> 
                   <a class='one2' href="<?php echo $this->webroot; ?>restaurants/category/<?php echo base64_encode ($restaurant['Restaurant']['id']); ?>/1?xzHv=SeY" class="active btn-rsrv-light3">Pick Up</a>
                   
                   <!--<a class='one2' href="<?php //echo $this->webroot; ?>restaurants/category/<?php //echo $restaurant['Restaurant']['id']; ?>/<?php //echo $myid; ?>/1?<?php echo base64_encode('pickup=yes')?>" class="active btn-rsrv-light3">Pick Up</a>-->
                    
                      <?php }} ?>
                      </center>
      </div>
    	</div>
       </div>
     </div> 
       <style>	   
		  <?php
		  if($deliveryz==1 and $takeawayz==1){
			  ?>
			  .one1{ width: 48%;
    border: 1px solid #cecece;
    padding: 7px 0;
    float: left;
    background: #fff;
    font-size: 18px;
    color: #545454;
    margin-right: 1%; }
				.one2{ width: 48%;
    border: 1px solid #cecece;
    padding: 7px 0;
    float: left;
    background: #fff;
     font-size: 18px;
    color: #545454;
    margin-right: 1%; }
		 	 
			  <?php 
			  }
		  elseif($deliveryz==1){
			  ?>
			  .one1{    
			  width: 48%;
    border: 1px solid #cecece;
    padding: 9px 0;
    float: left;
    background: #fff;
    font-size: 15px;
    color: #545454;
    margin-right: 1%; 
	margin-left: 25%;
			  }
			  <?php 
			  }
			  elseif($takeawayz==1){?>
				 .one2{     width: 48%;
    border: 1px solid #cecece;
    padding: 9px 0;
    float: left;
    background: #fff;
    font-size: 15px;
    color: #545454;
    margin-right: 1%; 
	margin-left: 25%;			 
				 
				 }
					<?php 
					 
			  }
		  ?> 	  
	   </style>
       
       <?php   @$cuisine_title1 = $restaurant['Restaurant']['cuisine_title1']; 
       		   @$cuisine_description1 = $restaurant['Restaurant']['cuisine_description1'];
			   
			   /*$cuisine_title2 = $restaurant['Restaurant']['cuisine_title2']; 
       		   $cuisine_description2 = $restaurant['Restaurant']['cuisine_description2'];
			   
			   $cuisine_title3 = $restaurant['Restaurant']['cuisine_title3']; 
       		   $cuisine_description3 = $restaurant['Restaurant']['cuisine_description3'];*/
			   
			   @$cuisine_title4 = $restaurant['Restaurant']['cuisine_title4']; 
       		   @$cuisine_description4 = $restaurant['Restaurant']['cuisine_description4'];
	   ?>
    <div class="container">
  		<div class="row padding margn_topppp">
        <center>
        
        	<div class="col-md-3 col-md-offset-3 cuisine1" style="">
          		    <img src="<?php echo $this->webroot; ?>img/icon-cuisine.svg" class="icon">           	 
       			  <div class="category"><?php echo $cuisine_title1;?></div>
        		  <div class="value ng-binding"><?php echo $cuisine_description1;?></div>
            </div>
            <!--<div class="col-25">
            	     <img src="<?php //echo $this->webroot; ?>img/icon-neighborhood.svg" class="icon">
       			  <div class="category"><?php //echo $cuisine_title2;?></div>
        		  <div class="value ng-binding"><?php //echo $cuisine_description2;?></div>
            </div>
            <div class="col-25">
            		 <img src="<?php //echo $this->webroot; ?>img/icon-dress-code.svg" class="icon">
       			  <div class="category"><?php //echo $cuisine_title3;?></div>
        		  <div class="value ng-binding"><?php //echo $cuisine_description3;?></div>
            </div>-->
            <div class="col-md-3 wallet">
            		 <img src="<?php echo $this->webroot; ?>img/icon-price.svg" class="icon">
       			  <div class="category"><?php echo $cuisine_title4;?></div>
        		  <div class="value ng-binding"><?php echo $cuisine_description4;?></div>
            </div>
            </center>
      	 </div>  
    </div>
<div class="map"> 
<div id="map_canvas"></div>
<div class="location-info">

          <div class="name1"><?php echo $restaurant['Restaurant']['name']; ?></div>
          <div class="address1"><?php echo $restaurant['Restaurant']['address']; ?></div>
          <?php echo $latitudex = $restaurant['Restaurant']['latitude']; 
       			echo $longitudex = $restaurant['Restaurant']['longitude'];
	  		 	 global $latitudex,$longitudex;
	   ?>
          <!--<div class="links1"><a href="https://www.google.com/maps/@<?php //echo $latitudex;?>,<?php //echo $longitudex;?>,15z?hl=en-GB" target="_blank"><span class="icon-map"></span>View on Map</a>-->
          
          
          <div class="links1"><a href="http://maps.google.com/maps?q=<?php echo $latitudex;?>,<?php echo $longitudex;?>" target="_blank"><span class="icon-map"></span>View on Map</a>
       
       <!--https://www.google.com/maps/place/49.46800006494457,17.11514008755796/@49.46800006494457,17.11514008755796,17z/data=!3m1!4b1-->
       
   <a href="http://maps.google.com/maps/dir//<?php echo $latitudex;?>,<?php echo $longitudex;?>" target="_blank"><span class="icon-map"></span>Get Directions</a>
    <!-- 
    	WORKING CODE
    <div class="links1"><a href="https://www.google.com/maps/place/<?php //echo $latitudex;?>,<?php //echo $longitudex;?>/@<?php// echo $latitudex;?>,<?php //echo $longitudex;?>,17z/data=!3m1!4b1" target="_blank"><span class="icon-map"></span>View on Map</a>-->
          
       
         <!--<a href="https://www.google.com/maps/dir//<?php //echo $restaurant['Restaurant']['name']; ?>/@<?php //echo $latitudex;?>,<?php //echo $longitudex;?>,17z/data=!4m15!1m6!3m5!1s0x390fed21c1298543:0x441f89ff27ea829d!2s<?php //echo $restaurant['Restaurant']['name']; ?>!8m2!3d<?php //echo $latitudex;?>!4d<?php //echo $longitudex;?>!4m7!1m0!1m5!1m1!1s0x390fed21c1298543:0x441f89ff27ea829d!2m2!1d<?php //echo $longitudex;?>!2d<?php //echo $latitudex;?>" target="_blank"><span class="icon-map"></span>Get Directions</a>
         -->
         
         <!-- <a href="https://www.google.com/maps/dir//<?php //echo $restaurant['Restaurant']['name']; ?>/@30.7259419,76.8029728,17z/data=!4m15!1m6!3m5!1s0x390fed21c1298543:0x441f89ff27ea829d!2s<?php //echo $restaurant['Restaurant']['name']; ?>!8m2!3d30.7259419!4d76.8051615!4m7!1m0!1m5!1m1!1s0x390fed21c1298543:0x441f89ff27ea829d!2m2!1d76.8051615!2d30.7259419" target="_blank"><span class="icon-map"></span>View on MapDD</a>-->
          
          
          
          
         <!--  <a href=" https://www.google.com/maps/dir//<?php //echo $latitudex;?>,<?php //echo $longitudex;?>+(<?php //echo $restaurant['Restaurant']['name']; ?>)/@<?php //echo $latitudex;?>,<?php //echo $longitudex;?>,19z"  target="_blank"><span class="icon-directions"></span>Get Directions</a>-->
         
          
          </div>
        </div>
</div>

 <?php 
 $rate = count($rates);
 $avg = '';
 foreach($rates as $rt){
	 
	$avg += $rt['Review']['punctuality'];

	 }

	 $avgRating = $avg/$rate;
	 
	 
	 ?>
       <div class="container">
        <div class="row text-center bck_Tst">
            <div class="col-md-12 col-sm-12 ">
          <div class="rating"> 
          	<div class="ratting_edit">
            <span> Rating <?php echo round($avgRating);  ?> </span>
 <form action="<?php echo $this->webroot; ?>restaurants/res_review/<?php echo $orders['Restaurant']['id']; ?>" class="popup-form mm" method="post" id="myRegister">
            <fieldset class="rating" >
              <input type="radio" id="star5" name="punctuality_review" value="5" checked />
              
              <?php
			 $i=round($avgRating);
                                        
                                        for($j=0;$j<$i;$j++){
                                        ?>
                                        
                                        <i class="icon_star voted"></i>
                                 
                                        <?php } for($h=0;$h<5-$i;$h++){?>  
                                         <i class="icon_star" style="  font-size: 15px;"></i>
                                        <?php } 
			  
			  
			   /*$ratestar = round($avgRating);;

switch ($ratestar) {
		case ".5":
        echo '<label class = "full" for="star1" title="Sucks big time - .5 star"></label>';
        break;
    	case "1":
        echo '<label class = "full" for="star1" title="Sucks big time - 1 star"></label>';
        break;
		case "1.5":
        echo '<label class="half" for="star1half" title="Meh - 1.5 stars"></label>';
        break;
		case "2":
        echo '<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>';
        break;
		case "2.5":
        echo '<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>';
        break;
		case "3":
        echo '<label class = "full" for="star3" title="Meh - 3 stars"></label>';
        break;
		case "3.5":
        echo ' <label class="half" for="star3half" title="Meh - 3.5 stars"></label>';
        break;
		case "4":
        echo '<label class = "full" for="star4" title="Pretty good - 4 stars"></label>';
        break;
		case "4.5":
        echo '<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>';
        break;
		case "5":
        echo '<label class = "full" for="star5" title="Awesome - 5 stars"></label>';
        break;
}*/?>
             
             
              
            
             
              
            
             
              
           
           
			   
            </fieldset>
			 
			
		
          
		  
		
       
			</form>
          </div>
          </div>
                
                <div id="carousel-example" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                    
                    <?php 
					$active = '';
 $rate = count($rates);
 $avg = '';
 foreach($rates as $rt){
	 
	$avg += $rt['Review']['punctuality'];

	 }

	 $avgRating = $avg/$rate;
$active = 1;
foreach($reviewComments as $reviewComment){
	 $reviewComment['Review']['text'];
	?>
							<div class="item  <?php if($active==1){ echo 'active'; }?>">                     
                            <div class="testimonial-section">
                            <?php echo $reviewComment['Review']['text']; ?>
                           </div>
                           </div>
	<?php
	$active++;
	}	 
	 
	 ?>
                    
                    
                    
                       <!-- <div class="item active">
                     
                            <div class="testimonial-section">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        
                            
                        </div>
                        <div class="item">
                     
                           <div class="testimonial-section">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        
                            
                        </div>
                        <div class="item">
                      
                          <div class="testimonial-section">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                       
                            
                        </div>-->
                         <!--INDICATORS-->
                    <ol class="carousel-indicators carousel-indicators-set">
                    <?php 
					$active = '';
 $rate = count($rates);
 $avg = '';
 foreach($rates as $rt){
	 
	$avg += $rt['Review']['punctuality'];

	 }

	 $avgRating = $avg/$rate;
$active = 0;
foreach($reviewComments as $reviewComment){
	 $reviewComment['Review']['text'];
	?>
							                     
                           
                        <li data-target="#carousel-example" data-slide-to="<?php echo $active; ?>" class="<?php if($active==0){ echo 'active'; }?>"></li>
	<?php
	$active++;
	}	
	 
	 ?>
                    
                    
                    
                       
                       
                    </ol>

                    </div>
                   
                </div>
                
            </div>
        </div>

        <!-- ROW END -->
    </div>
    <!-- CONATINER END -->
  
  <div class="container">
  		<div class="row top_a padding-2"> 
        	<div class="col-50 venue-details"> 
            	<h3>Description</h3>
                <p><?php echo $restaurant['Restaurant']['description']; ?></p>
            </div>
            
   
  			<div class="col-50"> 
            	<ul class="attributes">
  					<li> 
                    <!--<span class="icon icon-hours"></span> -->
                    <p class="closed"><span class="icon icon-hours" style="color:#d71f26 !important; "></span> Opening Time: <?php echo $restaurant['Restaurant']['opening_time'];?></p>
                    <p class="closed"><span class="icon icon-hours" style="color:#d71f26 !important;"></span> Closing Time: &nbsp; <?php echo $restaurant['Restaurant']['closing_time'];?></p> 
                    <p><span class="icon icon-website"></span> 
                        <a href="http://<?php echo $restaurant['Restaurant']['website']; ?>" target="_blank">Restaurant's Website</a></p>
                        <!--<p>                        <span class="icon icon-menu"></span><?php //if($discategory['DishCategory']){  foreach ($discategory['DishCategory'] as $dact) {?>
                   <a href="<?php //echo $this->webroot; ?>restaurants/detail/<?php //echo $restaurant['Restaurant']['id']; ?>/<?php //echo $dact['id']; ?>" class="active">Menu</a>
                    <?php //} }?></p>--> 
                        
                   </li>
  					
			</ul>
            
            </div> 
      
    	</div>
       </div>
  
   <?php
 //echo '<pre>';

//echo 'ssssssssssssssss';
  //print_r($gimages);
  
$countxx = count($gimages);?>
  <div style="" class="gallery autoplay items-<?php echo $countxx; ?> mygallery">
   <!-- <div id="item-1" class="control-operator"></div>
    <div id="item-2" class="control-operator"></div>
    <div id="item-3" class="control-operator"></div>
    <div id="item-4" class="control-operator"></div>
    <div id="item-5" class="control-operator"></div>-->


<?php
$slide = 1;

foreach($gimages as $gimage){
	
	?> <div id="item-<?php echo $slide; ?>" class="control-operator"></div><?php
	
		 $galleryimage = $gimage['Gallery']['image'];
		 ?>
         <figure class="item">
     <img src="<?php echo $this->webroot; ?>files/restaurants/<?php echo $galleryimage; ?>" alt="Dropin" />
    </figure>
         <?php
$slide++;		 		
}
?>
<!--
    <figure class="item">
     <img src="<?php //echo $this->webroot; ?>img/slide11.jpg" alt="11" />
    </figure>

    <figure class="item">
      <img src="<?php //echo $this->webroot; ?>img/slide12.jpeg" alt="12" />
    </figure>

    <figure class="item">
      <img src="<?php //echo $this->webroot; ?>img/slide13.jpg" alt="13" />
    </figure>
    
     <figure class="item">
      <img src="<?php //echo $this->webroot; ?>img/slide14.jpeg" alt="14" />
    </figure>

    <figure class="item">
      <img src="<?php //echo $this->webroot; ?>img/slide15.jpg" alt="15" />
    </figure>-->
<div class="controls">
<?php
$controlexx = 1;
foreach($gimages as $gimage){ ?>
    
      <a href="#item-<?php echo $controlexx; ?>" class="control-button">•</a>
      <!--<a href="#item-2" class="control-button">•</a>
      <a href="#item-3" class="control-button">•</a>
      <a href="#item-4" class="control-button">•</a>
      <a href="#item-5" class="control-button">•</a>-->
    
	<?php
	$controlexx++;
	 }?>
     </div>
  </div>
  
  
  
  
     <div class="container rec">
  <div class="row">
      	<h2 class="rech">Recommendations</h2>
        <p class="recp">Based on Your Interest in <?php echo $restaurant['Restaurant']['name']; ?></p>
        
        <?php
	  //echo '<pre>';
//print_r($fetchrec );
foreach($fetchrec as $fetchrecs):
?>
<div class="col-25-2" style="min-height:200px;">
	<a href="<?php echo $fetchrecs['Restaurant']['id']; ?>">
 	<img style="min-height:200px;" src="<?php echo $this->webroot; ?>files/restaurants/<?php echo $fetchrecs['Restaurant']['logo']; ?>" alt="pic1">
    <div class="overlay"></div>
  	<div class="text-wrap">
    	<div class="name"><?php echo $fetchrecs['Restaurant']['name']; ?></div>
    	<div class="aspects">
        	<span class="label"><?php $addressd = $fetchrecs['Restaurant']['address'];
			echo wordwrap($addressd,30,"<br>\n"); ?></span>
            <span class="label"><?php echo $fetchrecs['Restaurant']['city']; ?>,<?php echo $fetchrecs['Restaurant']['state']; ?></span>
         </div>
  	</div>
  </a>
</div> <!-- col-25 -->

<?php
endforeach;
?>
        
        
        
    


</div>
</div>
  <?php //echo '<pre>';
//print_r($restaurant);
?>
      
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
  













<script>
        $('#carousel-example').carousel({
            interval: 1000 //TIME IN MILLI SECONDS
        })
    </script>



                       