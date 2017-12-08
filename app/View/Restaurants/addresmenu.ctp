<!-- SubHeader =============================================== -->
<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo $this->webroot; ?>home/img/sub_header_2.jpg" data-natural-width="1400" data-natural-height="470">
    <div id="subheader">
        <div id="sub_content">
            <div id="thumb"><img src="<?php echo $this->webroot; ?>files/restaurants/<?php echo $restaurant['Restaurant']['logo']; ?>" alt=""></div>
            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> (<small><a href="detail_page_2.html">Read 98 reviews</a></small>)</div>
            <h1><?php echo $restaurant['Restaurant']['name']; ?></h1>
            <div><em><?php echo $restaurant['RestaurantsType']['name']; ?></em></div>
            <div><i class="icon_pin"></i><?php echo $restaurant['Restaurant']['address']; ?>- <strong>Delivery charge:</strong> $<?php echo $restaurant['Restaurant']['delivery_fee']; ?></div>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="#0">Home</a></li>
            <li><a href="#0">Category</a></li>
            <li>Page active</li>
        </ul>
    </div>
</div><!-- Position -->

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">

        <div class="col-md-3">
            <p><a href="list_page.html" class="btn_side">Back to search</a></p>
            <div class="box_style_1">
                <ul id="cat_nav">
                    <?php  foreach ($discategory['DishCategory'] as $dact) {?>
                    <li><a href="<?php echo $this->webroot; ?>restaurants/detail/<?php echo $restaurant['Restaurant']['id']; ?>/<?php echo $dact['id']; ?>" class="active"><?php echo $dact['name']; ?> <span>(<?php echo $dact['cnt']; ?>)</span></a></li>
                    <?php } ?>
                </ul>
            </div><!-- End box_style_1 -->

            <div class="box_style_2 hidden-xs" id="help">
                <i class="icon_lifesaver"></i>
                <h4>Need <span>Help?</span></h4>
                <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                <small>Monday to Friday 9.00am - 7.30pm</small>
            </div>
        </div><!-- End col-md-3 -->
        
        
        <div class="col-md-9">
            
            <div class="box_style_2" id="main_menu">
                <h2 class="inner"><?php echo $restaurant['Restaurant']['name']; ?> (<?php echo $restaurant['RestaurantsType']['name']; ?>)</h2>
                <p class="inner"><?php echo $restaurant['Restaurant']['description']; ?></p><br/>
                <p class="inner"><?php echo $restaurant['Restaurant']['address']; ?></p>
                          </div>
            
        </div>


    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->