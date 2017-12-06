
<style> 
.policy1 > h2 {
              margin: 25px 0;
    font-weight: 600;
    font-size: 16px;
    color: #4e4e4e;
    text-transform: uppercase;
}
.policy1 p {
        font-size: 15px;
    line-height: 24px;
    margin-bottom: 1%;
	text-align:justify;
	color:#4c4c4c;
}
.policy1  li {
     font-size: 15px;
    line-height: 24px;
    margin-bottom: 1%;
}
.account_child{
	z-index:999999;
}
.banner_slide h2 {
top:40%;
    z-index: 2 !important;
}
.prypolicy {
    color: #d9422c;
    font-size: 18px;
    margin: 3% 0 0;
    padding-bottom: 0.5%;
    text-align: left;
    text-transform: uppercase;
    width: 100%;
}
</style>


<div class="banner_slide banner_slide1" style="width: 100% ! important; position: relative; overflow: hidden; height: 246px !important;"> 
	<img style="width: 100% ! important; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; margin: auto;" src="<?php echo $this->webroot ?>files/restaurants/r2.jpg" class="banner_img" />
   <h2>Privacy And Policy</h2>
   <div class="abcdef"> </div>
</div>

<?php

  foreach ($privacypolicydetails as $abt){ 
  $privacypolicy_title = $abt['Staticpage']['title'];
  $privacypolicy_description = $abt['Staticpage']['description']; }
?>



<div class="container margin_60_35">
	<div class="row">
  <h2 class="prypolicy"> <?php echo $privacypolicy_title; ?> </h2>
	<div class="col-md-12 policy1"> 
	
<?php echo $privacypolicy_description; ?>


	</div>
	
	 
<div class="spacer"> </div>	
	</div><!-- End row -->
</div><!-- End container -->