
<style>
.active52d{
    background: #d71f26 none repeat scroll 0 0;
    color: #fff !important;
}
.slidebar121{
  margin-top: 18px !important;
}
.nomargin_top1{
    color: #666;
    font-size: 22px;
    margin-top: 1%;
    padding-bottom: 0;
}
.panel-default > .panel-heading {
    background-color: #d71f26;
    border-bottom: 1px solid #ddd;
    color: #fff !important;
    padding: 16px;
}
.panel-title a {
    color: #fff !important;
    display: block;
}
#cat_nav a {
    font-size: 16px;
}
.panel.panel-default {
    box-shadow: 0 0 1px #222;
}
.panel-title a .indicator {
    color: #fff;
    padding: 6px 0;
}
.panel-body {
    font-size: 16px;
    text-align: justify;
}
.banner_slide h2 {
 
    top: 41%;
	}
.terms_conditions p {
    font-size: 15px;
    line-height: 24px;
	    margin: 0 0 10px;
}
.uppercase {
    text-transform: uppercase;
	}
.terms_conditions strong {
    font-weight: 700;
	font-size: 14px;
}
.terms_conditions li{
font-size: 14px;
    line-height: 2;
    margin-bottom: 9px;
}
.terms_conditions li ul {
    margin-left: 4%;
    margin-top: 0.5%;
}
.terms_conditions li ul li {
    font-size: 14px;
    line-height: 2;
}
.terms_conditions p, .terms_conditions li{text-align:justify;}
.terms_hd {
    color: #d9422c;
    font-size: 18px;
    margin: 3% 0 0;
    padding-bottom: 0.5%;
    text-align: left;
    text-transform: uppercase;
    width: 100%;
}		
</style>

<!--<div style="width: 100%; text-align: center; background: rgb(215, 31, 38) none repeat scroll 0px 0px; padding: 18px; margin-top: 0%; box-shadow: 0px 0px 2px rgb(51, 51, 51);">
<h2 style="font-size: 20px; color: rgb(255, 255, 255); text-transform: uppercase;"></h2>
</div>-->
<?php

  foreach ($termsdetails as $abt){ 
  $terms_title = $abt['Staticpage']['title'];
  $terms_description = $abt['Staticpage']['description']; }
?>


<div class="banner_slide banner_slide1" style="width: 100% ! important; position: relative; overflow: hidden; height: 246px !important;"> 
	<img style="width: 100% ! important; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; margin: auto;" src="<?php echo $this->webroot ?>files/restaurants/r2.jpg" class="banner_img" />
   <h2><?php echo $terms_title; ?></h2>
   <div class="abcdef"> </div>
</div>

 
 


<!-- Content ==================================================  -->
<div class="container margin_60_35">
	<div class="row">
    

<div class="terms_conditions">
   <h2 class="terms_hd">Terms of Use</h2>



<?php echo $terms_description; ?>
</div>


</div>
</div>






















































<!-- Content ================================================== 
<div class="container margin_60_35">
	<div class="row">
    
    <div class="col-md-3 slidebar121" id="sidebar">
    <div class="theiaStickySidebar">
        <div class="box_style_1" id="faq_box">
			<ul id="cat_nav">
				<li><a href="#payment" class="active active52d">Payments</a></li>
				<li><a href="#works">How it works</a></li>
				<li><a href="#delay">Delivery delay</a></li>
				<li><a href="#takeaway">Takeaway</a></li>
				<li><a href="#preorder">Preorder</a></li>
                <li><a href="#register_2">Register</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#privacy">Privacy</a></li>
			</ul>
		</div> End box_style_1 
        </div> End theiaStickySidebar 
     </div> End col-md-3 
        
        <div class="col-md-9">
        <h3 class="nomargin_top1">Payments</h3>
       	 
         <div class="panel-group" id="payment">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseOne">Anim pariatur cliche reprehenderit?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseTwo">Parsnip lotus root celery?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseThree">Beet greens peanut salad?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div> End panel-group 
                
                <h3 class="nomargin_top1">How it works</h3>
       	 
         <div class="panel-group" id="works">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#works" href="#collapseOne_works">Anim pariatur cliche reprehenderit?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseOne_works" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#works" href="#collapseTwo_works">Parsnip lotus root celery?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseTwo_works" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#works" href="#collapseThree_works">Beet greens peanut salad?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseThree_works" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div> End panel-group 
                
                 <h3 class="nomargin_top1">Delivery delay</h3>
       	 
         		<div class="panel-group" id="delay">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#delay" href="#collapseOne_delay">Anim pariatur cliche reprehenderit?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseOne_delay" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#delay" href="#collapseTwo_delay">Parsnip lotus root celery?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseTwo_delay" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#delay" href="#collapseThree_delay">Beet greens peanut salad?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseThree_delay" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div> End panel-group 
                                
                <h3 class="nomargin_top1">Takeaway</h3>
       	 
         		<div class="panel-group" id="takeaway">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#takeaway" href="#collapseOne_takeaway">Anim pariatur cliche reprehenderit?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseOne_takeaway" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#takeaway" href="#collapseTwo_takeaway">Parsnip lotus root celery?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseTwo_takeaway" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#takeaway" href="#collapseThree_takeaway">Beet greens peanut salad?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseThree_takeaway" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div> End panel-group 
                
                <h3 class="nomargin_top1">Preorder</h3>
       	 
         		<div class="panel-group" id="preorder">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#preorder" href="#collapseOne_preorder">Anim pariatur cliche reprehenderit?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseOne_preorder" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#preorder" href="#collapseTwo_preorder">Parsnip lotus root celery?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseTwo_preorder" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#preorder" href="#collapseThree_preorder">Beet greens peanut salad?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseThree_preorder" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div> End panel-group 
                
                <h3 class="nomargin_top1">Register</h3>
       	 
         		<div class="panel-group" id="register_2">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#register_2" href="#collapseOne_register">Anim pariatur cliche reprehenderit?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseOne_register" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#register_2" href="#collapseTwo_register">Parsnip lotus root celery?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseTwo_register" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#register_2" href="#collapseThree_register">Beet greens peanut salad?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseThree_register" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div> End panel-group 

                
               <h3 class="nomargin_top1">Pricing</h3>
       	 
         		<div class="panel-group" id="pricing">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#pricing" href="#collapseOne_pricing">Anim pariatur cliche reprehenderit?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseOne_pricing" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#pricing" href="#collapseTwo_pricing">Parsnip lotus root celery?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseTwo_pricing" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#pricing" href="#collapseThree_pricing">Beet greens peanut salad?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseThree_pricing" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div> End panel-group 
                
                <h3 class="nomargin_top1">Privacy</h3>
       	 
         		<div class="panel-group" id="privacy">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#privacy" href="#collapseOne_privacy">Anim pariatur cliche reprehenderit?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseOne_privacy" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#privacy" href="#collapseTwo_privacy">Parsnip lotus root celery?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseTwo_privacy" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#privacy" href="#collapseThree_privacy">Beet greens peanut salad?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="collapseThree_privacy" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div> End panel-group 
         
        </div> End col-md-9 
    </div> End row 
</div> End container -->