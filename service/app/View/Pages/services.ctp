










<style> 
.venue-detailsnew {
    color: #d71f26;
    font-size: 22px;
    font-weight: 500;
    letter-spacing: 0.4px;
    margin: 0 0 6px;
    padding: 0;
    text-transform: uppercase;
}
.venue-detailsnew1 {
    font-size: 13px;
    line-height: 31px;
    margin: 10px 0 0;
}

 @media (max-width: 980px) {
.banner_slide {
    height: 547px !important;
    margin-bottom: 4%;
}

 }

 @media (max-width: 800px) {
.banner_slide {
    height: 452px !important;
}

 }
 @media (max-width: 768px) {
.banner_slide {
    height: 433px !important;
}

 }
  @media (max-width: 360px) {
.banner_slide {
    height: 280px !important;
}
.venue-detailsnew {
    margin: -36px 0 6px;
}
  }

 @media (max-width: 320px) {
.venue-detailsnew {
    color: #d71f26;
    font-size: 22px;
    font-weight: 500;
    letter-spacing: 0.4px;
    margin: -58px 0 6px;
    padding: 0;
    text-transform: uppercase;
}
.venue-detailsnew1 {
    font-size: 13px;
    line-height: 31px;
    margin: 10px 0 0;
}

.nomargin_top {
    color: #d71f26 !important;
    font-size: 25px !important;
    margin-top: -22px !important;
}	 
.path1 > img {
    float: left !important;
    left: 0 !important;
    position: relative!important;
    top: 0;
    width: 100% !important;
}
.newsletter-cta-text {
    font-size: 13px;
    padding: 0 8px;
    width: 95%;
}

.neigh {
    margin: 0 41%;
    width: 17%;
}
.newsletter-cta-text {
    font-size: 13px;
}
.banner_slide h2 {
    color: #fff;
    font-size: 21px;
    left: 39%;
    position: absolute;
    top: 17%;
}
.login_shw.active11 {
    box-shadow: 0 0 1px #c5c5c5 !important;
    display: block;
   
     font-size: 11px !important;
    line-height: 39px !important;
    padding: 0 24px !important;
    width: 78px !important;
}
ul.btn_log {
    float: right;
    position: absolute;
    right: 1%;
    top: 24%;
    width: 50%;
}
.newsletter-cta{
	  background-color: #d71f26;
    border: 1px solid #e9e9eb;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    float: left;
    font-size: 12px;
    margin: 5px 0 7px 23%;
    outline: medium none;
    padding: 12px 4.2rem;
}

 }
 .img-responsive1 {
    margin-top: 30px;
}

</style>

<div class="banner_slide" style="width: 100% ! important; position: relative; overflow: hidden; height: 246px !important;"> 
	<img style="width: 100% ! important; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; margin: auto;" src="<?php echo $this->webroot ?>files/restaurants/r2.jpg" class="banner_img" />
   <h2 style="  top: 42%;">Services</h2>
   <div class="abcdef"> </div>
</div>

<!-- Content ================================================== -->
<div class="container margin_60_35">
	<div class="row" style=" margin-top:50px;">
             <?php
			 //echo '<pre>';
			 // print_r($careerdetails);
			 foreach ($servicedetails as $service){ ?>
		<div class="col-md-6 venue-detailsnew1"> 
			<h3 class="venue-detailsnew"><?php echo $service['Staticpage']['title']; ?></h3>
			<p>
				<?php echo $service['Staticpage']['description']; ?>
			</p>
			
		
		</div>
		<div class="col-md-5 col-md-offset-1 text-right hidden-sm hidden-xs">
			<img src="<?php echo $this->webroot; ?>files/staticpage/<?php echo $service['Staticpage']['image']; ?>" alt="" class="img-responsive img-responsive1">
		</div>
             <?php }?>
	</div><!-- End row -->
	<hr class="more_margin">
   

</div><!-- End container -->


<div class="search_res1 rec ">  	
<div class="container">
  <div class="row">
  		<div class="col-75">
        	<img src="/cart_new/abc/img/icon-neighborhood-transparent.svg" class="neigh">
      <p class="newsletter-cta-text">Want recommendations, chef insights, local tips and more sent straight to your inbox?</p>
        </div>
        <div class="col-25n"> 
        	 <a href="http://readyto.com/pages/contact" class="newsletter-cta">Yes, Please!</a>
        </div>
  </div><!--row-->
  </div>
  </div>
  
  
  
  

















