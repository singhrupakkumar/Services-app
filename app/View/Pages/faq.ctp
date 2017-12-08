
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

        padding: 10px 15px;
}
.panel-title a {
    color: #696969 !important;
    display: block;
}
.panel1{
border:none !important;
}
#cat_nav a {
    font-size: 16px;
}
.panel.panel-default {
   
}
.panel-title a .indicator {
    color: #7b7b7b;
    padding: 6px 0;
}
.panel-body {
    font-size: 14px;
    padding: 12px 21px;
    text-align: justify;
    line-height: 30px !important;
    color: #5a5a5a;
}
.banner_slide h2 {
    top: 40% !important;
	}
.panel-default > .panel-heading{
background:none !important;
border:none !important;
}
.faq{
 color: #d9422c;
    font-size: 18px;
    margin: 36px 0 -9px;
    padding-bottom: 0.5%;
    text-align: left;
    text-transform: uppercase;
    width: 100%;
}	

.nomargin_top1{
        color: #d71f26;
    margin-top: 3%;
    padding-bottom: 0;
    text-align: left;
    font-size: 18px;
    margin-bottom: 0.5%;
}
.panel-title a:hover{
	color:#d71f26 !important;
}
.panel-title a:hover .indicator{
color:#d71f26 !important;
}
.panel-title a:active .indicator{
color:#d71f26 !important;
}
.account_child{
	z-index:999999;
}
.banner_slide h2 {

    z-index: 2 !important;
}
   @media (max-width: 414px) {
.panel-title a {
    color: #696969 !important;
    display: block;
    font-size: 13px;
}	
}
</style>

<div class="banner_slide banner_slide1" style="width: 100% ! important; position: relative; overflow: hidden; height: 246px !important;"> 
	<img style="width: 100% ! important; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; margin: auto;" src="<?php echo $this->webroot ?>files/restaurants/r2.jpg" class="banner_img" />
   <h2>FAQ</h2>
   <div class="abcdef"> </div>
</div>


<!-- Content ================================================== -->
<div class="container margin_60_35">
	<div class="row">
    
   
        <h2 class="faq"> Frequently Asked Question </h2>
        <div class="col-md-12">
        <h3 class="nomargin_top1">Payments</h3>
       	 
         <div class="panel-group" id="payment">
         
         
         
         <?php //print_r($faq2);
		 $zero = 0;
		 
   foreach($faq0 as $faqs){
	   
	   //echo $faqs['Staticpage']['category'];
	    $titlezz = $faqs['Staticpage']['title'];
	    $descriptionzz = $faqs['Staticpage']['description'];
   
    ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#<?php echo $zero; ?>"><?php echo $titlezz; ?><i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="<?php echo $zero; ?>" class="panel-collapse collapse">
                      <div class="panel-body">
                       <?php echo $descriptionzz; ?>
                      </div>
                    </div>
                  </div>
                  
                 <?php
				  $zero++;
				  } ?>
                  
                  
                  
                  <!--<div class="panel panel-default">
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
                  <div align="right" class="panel panel-default">
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
                  </div>-->
                </div><!-- End panel-group -->
                
                <h3 class="nomargin_top1">How it works</h3>
       	 
         <div class="panel-group" id="works">
                  
                  
                  <?php //print_r($faq2);
		 $one = 1;
		 
   foreach($faq1 as $faqs){
	   
	   //echo $faqs['Staticpage']['category'];
	    $titlezz = $faqs['Staticpage']['title'];
	    $descriptionzz = $faqs['Staticpage']['description'];
   
    ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#<?php echo $one; ?>"><?php echo $titlezz; ?><i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="<?php echo $one; ?>" class="panel-collapse collapse">
                      <div class="panel-body">
                       <?php echo $descriptionzz; ?>
                      </div>
                    </div>
                  </div>
                  
                 <?php
				  $one++;
				  } ?>
                  
                  
                  
                  
                  
                  
                  
                <!--  
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
                  </div>-->
                </div><!-- End panel-group -->
                
                 <h3 class="nomargin_top1">Delivery delay</h3>
       	 
         		<div class="panel-group" id="delay">
                  
                  
                   <?php //print_r($faq2);
		 $two = 2;
		 
   foreach($faq2 as $faqs){
	   
	   //echo $faqs['Staticpage']['category'];
	    $titlezz = $faqs['Staticpage']['title'];
	    $descriptionzz = $faqs['Staticpage']['description'];
   
    ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#<?php echo $two; ?>"><?php echo $titlezz; ?><i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="<?php echo $two; ?>" class="panel-collapse collapse">
                      <div class="panel-body">
                       <?php echo $descriptionzz; ?>
                      </div>
                    </div>
                  </div>
                  
                 <?php
				  $two++;
				  } ?>
                  

                  
                  
           
                  
                  
                  <!--<div class="panel panel-default">
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
                  </div>-->
                </div><!-- End panel-group -->
                                
                <h3 class="nomargin_top1">Takeaway</h3>
       	 
         		<div class="panel-group" id="takeaway">
                  
                  <?php //print_r($faq2);
		$three = 3;		 
  		foreach($faq3 as $faqs){	   
	    $titlezz = $faqs['Staticpage']['title'];
	    $descriptionzz = $faqs['Staticpage']['description'];  
        ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#<?php echo $three; ?>"><?php echo $titlezz; ?><i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="<?php echo $three; ?>" class="panel-collapse collapse">
                      <div class="panel-body">
                       <?php echo $descriptionzz; ?>
                      </div>
                    </div>
                  </div>                  
                 <?php
				  $three++;
				  } ?>
                  
                  
                  
                  
                 <!-- <div class="panel panel-default">
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
                  </div>-->
                </div><!-- End panel-group -->
                
                <h3 class="nomargin_top1">Preorder</h3>
       	 
         		<div class="panel-group" id="preorder">
                  
                  <?php //print_r($faq2);
		$four = 4;		 
  		foreach($faq4 as $faqs){	   
	    $titlezz = $faqs['Staticpage']['title'];
	    $descriptionzz = $faqs['Staticpage']['description'];  
        ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#<?php echo $four; ?>"><?php echo $titlezz; ?><i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="<?php echo $four; ?>" class="panel-collapse collapse">
                      <div class="panel-body">
                       <?php echo $descriptionzz; ?>
                      </div>
                    </div>
                  </div>                  
                 <?php
				  $four++;
				  } ?>
                  
                  
                  
                 <!-- <div class="panel panel-default">
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
                  </div>-->
                </div><!-- End panel-group -->
                
                <h3 class="nomargin_top1">Register</h3>
       	 
         		<div class="panel-group" id="register_2">
                  
                  <?php //print_r($faq2);
		$five = 5;		 
  		foreach($faq5 as $faqs){	   
	    $titlezz = $faqs['Staticpage']['title'];
	    $descriptionzz = $faqs['Staticpage']['description'];  
        ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#<?php echo $five; ?>"><?php echo $titlezz; ?><i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="<?php echo $five; ?>" class="panel-collapse collapse">
                      <div class="panel-body">
                       <?php echo $descriptionzz; ?>
                      </div>
                    </div>
                  </div>                  
                 <?php
				  $five++;
				  } ?>
                  
                  
                  
                  <!--<div class="panel panel-default">
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
                  </div>-->
                </div><!-- End panel-group -->

                
               <h3 class="nomargin_top1">Pricing</h3>
       	 
         		<div class="panel-group" id="pricing">
                  
                  
                  
        <?php //print_r($faq2);
		$six = 6;		 
  		foreach($faq6 as $faqs){	   
	    $titlezz = $faqs['Staticpage']['title'];
	    $descriptionzz = $faqs['Staticpage']['description'];  
        ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#<?php echo $six; ?>"><?php echo $titlezz; ?><i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="<?php echo $six; ?>" class="panel-collapse collapse">
                      <div class="panel-body">
                       <?php echo $descriptionzz; ?>
                      </div>
                    </div>
                  </div>                  
                 <?php
				  $six++;
				  } ?>
                  
                  
                  
                  
               <!--   <div class="panel panel-default">
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
                  </div>-->
                </div><!-- End panel-group -->
                
                <h3 class="nomargin_top1">Privacy</h3>
       	 
         		<div class="panel-group" id="privacy">
                  
                   <?php //print_r($faq2);
		$seven = 7;		 
  		foreach($faq7 as $faqs){	   
	    $titlezz = $faqs['Staticpage']['title'];
	    $descriptionzz = $faqs['Staticpage']['description'];  
        ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#<?php echo $seven; ?>"><?php echo $titlezz; ?><i class="indicator icon_plus_alt2 pull-right"></i></a>
                      </h4>
                    </div>
                    <div id="<?php echo $seven; ?>" class="panel-collapse collapse">
                      <div class="panel-body">
                       <?php echo $descriptionzz; ?>
                      </div>
                    </div>
                  </div>                  
                 <?php
				  $seven++;
				  } ?>
                  
                  
                  
                  <!--<div class="panel panel-default">
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
                  </div>-->
                </div><!-- End panel-group -->
         
        </div><!-- End col-md-9 -->
    </div><!-- End row -->
</div><!-- End container -->