<!-- SubHeader =============================================== -->
<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo $this->webroot; ?>files/restaurants/<?php echo $restaurant['Restaurant']['banner']; ?>" data-natural-width="1400" data-natural-height="470">
    <div id="subheader">
        <div id="sub_content">
            <div id="thumb"><img src="<?php echo $this->webroot; ?>files/restaurants/<?php echo $restaurant['Restaurant']['logo']; ?>" alt=""></div>
            <div class="rating">
                <?php
                $i = $restaurant['Restaurant']['review_avg'];

                for ($j = 0; $j < $i; $j++) {
                    ?>

                    <i class="icon_star voted"></i>

                <?php } for ($h = 0; $h < 5 - $i; $h++) { ?>  
                    <i class="icon_star"></i>
                <?php } ?>
                (<small><a href="<?php echo $this->webroot ?>restaurants/review/<?php echo $restaurant['Restaurant']['id'] ?>"><?php echo $restaurant['Restaurant']['review_count']; ?> reviews</a></small>)

            </div>
            <h1><?php echo $restaurant['Restaurant']['name']; ?></h1>
            <div><em><?php echo $restaurant['RestaurantsType']['name']; ?></em></div>
            <div><i class="icon_pin"></i><?php echo $restaurant['Restaurant']['address']; ?>
                <?php //echo $restaurant['Restaurant']['delivery_fee']; ?>
            </div>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="#0">Home</a></li>
            <li><a href="#0">Restaurant</a></li>
            <li>Review</li>
        </ul>
    </div>
</div><!-- Position -->


<div class="collapse" id="collapseMap">
    <div id="map" class="map"></div>
</div><!-- End Map -->
<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">

        <div class="col-md-4">
            <p>
                <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">View on map</a>
            </p>
            <div class="box_style_2">
                <h4 class="nomargin_top">Opening time <i class="icon_clock_alt pull-right"></i></h4>
                <ul class="opening_list">
                    <li>Monday<span><?php echo $restaurant['Restaurant']['opening_time']; ?>-<?php echo $restaurant['Restaurant']['closing_time']; ?></span></li>
                    <li>Tuesday<span><?php echo $restaurant['Restaurant']['opening_time']; ?>-<?php echo $restaurant['Restaurant']['closing_time']; ?></span></li>
                    <li>Wednesday <span><?php echo $restaurant['Restaurant']['opening_time']; ?>-<?php echo $restaurant['Restaurant']['closing_time']; ?></span></li>
                    <li>Thursday<span><?php echo $restaurant['Restaurant']['opening_time']; ?>-<?php echo $restaurant['Restaurant']['closing_time']; ?></span></li>
                    <li>Friday<span><?php echo $restaurant['Restaurant']['opening_time']; ?>-<?php echo $restaurant['Restaurant']['closing_time']; ?></span></li>
                    <li>Saturday<span><?php echo $restaurant['Restaurant']['opening_time']; ?>-<?php echo $restaurant['Restaurant']['closing_time']; ?></span></li>
                    <li>Sunday <span class="label label-danger">Closed</span></li>
                </ul>
            </div>
            <div class="box_style_2 hidden-xs" id="help">
                <i class="icon_lifesaver"></i>
                <h4>Need <span>Help?</span></h4>
                <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                <small>Monday to Friday 9.00am - 7.30pm</small>
            </div>
        </div>

        <div class="col-md-8">

            <div class="box_style_2">
                <h2 class="inner">Description</h2>
                <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
                    <!-- Loading Screen -->
                    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                        <div style="position:absolute;display:block;background:url('<?php echo $this->webroot; ?>files/restaurants/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                    </div>
                    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
                        <?php foreach ($Gallery as $ga) { ?>
                            <div data-p="112.50" style="display: none;">
                                <img data-u="image" src="<?php echo $this->webroot; ?>files/restaurants/<?php echo $ga['Gallery']['image']; ?>" />
                                <img data-u="thumb" src="<?php echo $this->webroot; ?>files/restaurants/<?php echo $ga['Gallery']['image']; ?>" />
                            </div>

                        <?php } ?>



                    </div>
                    <!-- Thumbnail Navigator -->
                    <div u="thumbnavigator" class="jssort03" style="position:absolute;left:0px;bottom:0px;width:600px;height:60px;" data-autocenter="1">
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height:100%; background-color: #000; filter:alpha(opacity=30.0); opacity:0.3;"></div>
                        <!-- Thumbnail Item Skin Begin -->
                        <div u="slides" style="cursor: default;">
                            <div u="prototype" class="p">
                                <div class="w">
                                    <div u="thumbnailtemplate" class="t"></div>
                                </div>
                                <div class="c"></div>
                            </div>
                        </div>
                        <!-- Thumbnail Item Skin End -->
                    </div>
                    <!-- Arrow Navigator -->
                    <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
                    <span data-u="arrowright" class="jssora02r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
                </div>



                <h3>About us</h3>
                <p>
                    <?php echo $restaurant['Restaurant']['description'] ?>
                </p>
                <?php if (!empty($Review)) { ?>
                    <div id="summary_review">
                        <div id="general_rating">
                            <?php echo $restaurant['Restaurant']['review_count']; ?> Reviews
                            <div class="rating">
                                <?php
                                $i = $restaurant['Restaurant']['review_avg'];

                                for ($j = 0; $j < $i; $j++) {
                                    ?>

                                    <i class="icon_star voted"></i>

                                <?php } for ($h = 0; $h < 5 - $i; $h++) { ?>  
                                    <i class="icon_star"></i>
                                <?php } ?>


                            </div>
                        </div>
                        <?php
                        $x = 0;
                        foreach ($Review as $re) {
                            @$ref_q+=$re['Review']['food_quality'];
                            @$repun+=$re['Review']['punctuality'];
                            @$repr+=$re['Review']['price'];
                            @$reco+=$re['Review']['courtesy'];
                            $x++;
                        }
                        ?> 
                        <div class="row" id="rating_summary">
                            <div class="col-md-6">
                                <ul>
                                    <li>Food Quality
                                        <div class="rating">
                                            <?php
//                                    echo $ref_q;
//                                    echo $x;
                                            $i = round($ref_q / $x);

                                            for ($j = 0; $j < $i; $j++) {
                                                ?>

                                                <i class="icon_star voted"></i>

                                            <?php } for ($h = 0; $h < 5 - $i; $h++) { ?>  
                                                <i class="icon_star"></i>
    <?php } ?>

                                        </div>
                                    </li>
                                    <li>Price
                                        <div class="rating">
                                            <?php
//                                    echo $repr;
//                                    echo $x;
                                            $i = round($repr / $x);

                                            for ($j = 0; $j < $i; $j++) {
                                                ?>

                                                <i class="icon_star voted"></i>

                                            <?php } for ($h = 0; $h < 5 - $i; $h++) { ?>  
                                                <i class="icon_star"></i>
    <?php } ?>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>Punctuality
                                        <div class="rating">
                                            <?php
//                                    echo $repun;
//                                    echo $x;
                                            $i = round($repun / $x);

                                            for ($j = 0; $j < $i; $j++) {
                                                ?>

                                                <i class="icon_star voted"></i>

                                            <?php } for ($h = 0; $h < 5 - $i; $h++) { ?>  
                                                <i class="icon_star"></i>
    <?php } ?>

                                        </div>
                                    </li>
                                    <li>Courtesy
                                        <div class="rating">
                                            <?php
//                                    echo $reco;
//                                    echo $x;
                                            $i = round($reco / $x);

                                            for ($j = 0; $j < $i; $j++) {
                                                ?>

                                                <i class="icon_star voted"></i>

                                            <?php } for ($h = 0; $h < 5 - $i; $h++) { ?>  
                                                <i class="icon_star"></i>
    <?php } ?>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- End row -->
                        <hr class="styled">
    <?php if (empty($loggeduser)) { ?>
                            <a href="#" class="btn_1 add_bottom_15" data-toggle="modal" data-target="#login_2">Leave a review</a>

                        <?php } else { ?>
                            <a href="#" class="btn_1 add_bottom_15" data-toggle="modal" data-target="#myReview">Leave a review</a>
    <?php } ?>



                    </div><!-- End summary_review -->
    <?php foreach ($Review as $re) { ?> 
                        <div class="review_strip_single">
                            <img  width="70px" height="70px" src="<?php echo $this->webroot; ?>files/profile_pic/<?php if($re['User']['image']){ echo $re['User']['image'];} else { echo "images.png"; } ?>" alt="" class="img-circle">

                            <small> - <?php echo $re['Review']['created']; ?> -</small>
                            <h4><?php echo $re['User']['name']; ?></h4>
                            <p>
        <?php echo $re['Review']['text']; ?>
                            </p>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="rating">
                                        <?php
                                        $i = $re['Review']['food_quality'];

                                        for ($j = 0; $j < $i; $j++) {
                                            ?>

                                            <i class="icon_star voted"></i>

                                        <?php } for ($h = 0; $h < 5 - $i; $h++) { ?>  
                                            <i class="icon_star"></i>
        <?php } ?>


                                    </div>
                                    Food Quality
                                </div>
                                <div class="col-md-3">
                                    <div class="rating">
                                        <?php
                                        $i = $re['Review']['price'];

                                        for ($j = 0; $j < $i; $j++) {
                                            ?>

                                            <i class="icon_star voted"></i>

                                        <?php } for ($h = 0; $h < 5 - $i; $h++) { ?>  
                                            <i class="icon_star"></i>
        <?php } ?>

                                    </div>
                                    Price
                                </div>
                                <div class="col-md-3">
                                    <div class="rating">
                                        <?php
                                        $i = $re['Review']['punctuality'];

                                        for ($j = 0; $j < $i; $j++) {
                                            ?>

                                            <i class="icon_star voted"></i>

                                        <?php } for ($h = 0; $h < 5 - $i; $h++) { ?>  
                                            <i class="icon_star"></i>
        <?php } ?>


                                    </div>
                                    Punctuality
                                </div>
                                <div class="col-md-3">
                                    <div class="rating">
                                        <?php
                                        $i = $re['Review']['courtesy'];

                                        for ($j = 0; $j < $i; $j++) {
                                            ?>

                                            <i class="icon_star voted"></i>

                                        <?php } for ($h = 0; $h < 5 - $i; $h++) { ?>  
                                            <i class="icon_star"></i>
        <?php } ?>

                                    </div>
                                    Courtesy
                                </div>
                            </div><!-- End row -->
                        </div><!-- End review strip -->
                    <?php
                    }
                } else {
                    echo "no review available";
                    echo "<br/>";
                    if (empty($loggeduser)) {
                        ?>
                        <a href="#" class="btn_1 add_bottom_15" data-toggle="modal" data-target="#login_2">Leave a review</a>

    <?php } else { ?>
                        <a href="#" class="btn_1 add_bottom_15" data-toggle="modal" data-target="#myReview">Leave a review</a>
    <?php }
}
?>




            </div><!-- End box_style_1 -->
        </div>
    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->
<div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="review" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form method="post" action="<?php echo $this->webroot ?>restaurants/review/<?php echo $restaurant['Restaurant']['id']; ?>" name="review" id="review" class="popup-form">  
                <div class="login_icon"><i class="icon_comment_alt"></i></div>

                <div class="row" >
                    <div class="col-md-6">
                        <input name="name_review" required="" id="name_review" type="text" placeholder="Name" class="form-control form-white">			
                    </div>
                    <div class="col-md-6">
                        <input name="email_review" required="" id="email_review" type="email" placeholder="Your email" class="form-control form-white">
                    </div>
                </div><!-- End Row --> 

                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control form-white" name="food_review" required="" id="food_review">
                            <option >Food Quality</option>
                            <option value="1">Low</option>
                            <option value="2">Sufficient</option>
                            <option value="3">Good</option>
                            <option value="4">Excellent</option>
                            <option value="5">Super</option>

                        </select>                            </div>
                    <div class="col-md-6">
                        <select class="form-control form-white" required=""  name="price_review" id="price_review">
                            <option >Price</option>
                            <option value="1">Low</option>
                            <option value="2">Sufficient</option>
                            <option value="3">Good</option>
                            <option value="4">Excellent</option>
                            <option value="5">Super</option>

                        </select>
                    </div>
                </div><!--End Row -->    

                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control form-white" required=""  name="punctuality_review" id="punctuality_review">
                            <option >Punctuality</option>
                            <option value="1">Low</option>
                            <option value="2">Sufficient</option>
                            <option value="3">Good</option>
                            <option value="4">Excellent</option>
                            <option value="5">Super</option>

                        </select>                       </div>
                    <div class="col-md-6">
                        <select class="form-control form-white" required="" name="courtesy_review" id="courtesy_review">
                            <option>Courtesy</option>
                            <option value="1">Low</option>
                            <option value="2">Sufficient</option>
                            <option value="3">Good</option>
                            <option value="4">Excellent</option>
                            <option value="5">Super</option>
                        </select>
                    </div>
                </div><!--End Row -->     
                <textarea name="review_text" required="" id="review_text" class="form-control form-white" style="height:100px" placeholder="Write your review"></textarea>

                <input type="submit" value="Submit" class="btn btn-submit" id="submit-review">
            </form>
            <div id="message-review"></div>
        </div>
    </div>
</div><!-- End review modal -->
<script src="<?php echo $this->webroot; ?>js/jssor.slider-21.1.6.min.js" type="text/javascript"></script>
<script type="text/javascript">
    jssor_1_slider_init = function () {

        var jssor_1_options = {
            $AutoPlay: true,
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 9,
                $SpacingX: 3,
                $SpacingY: 3,
                $Align: 260
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizing
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 600);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        //responsive code end
    };

</script>
<style>
    /* jssor slider arrow navigator skin 02 css */
    /*
    .jssora02l                  (normal)
    .jssora02r                  (normal)
    .jssora02l:hover            (normal mouseover)
    .jssora02r:hover            (normal mouseover)
    .jssora02l.jssora02ldn      (mousedown)
    .jssora02r.jssora02rdn      (mousedown)
    */
    .jssora02l, .jssora02r {
        display: block;
        position: absolute;
        /* size of arrow element */
        width: 55px;
        height: 55px;
        cursor: pointer;
        background: url('<?php echo $this->webroot;?>files/restaurants/a02.png') no-repeat;
        overflow: hidden;
    }
    .jssora02l { background-position: -3px -33px; }
    .jssora02r { background-position: -63px -33px; }
    .jssora02l:hover { background-position: -123px -33px; }
    .jssora02r:hover { background-position: -183px -33px; }
    .jssora02l.jssora02ldn { background-position: -3px -33px; }
    .jssora02r.jssora02rdn { background-position: -63px -33px; }

    /* jssor slider thumbnail navigator skin 03 css */
    /*
    .jssort03 .p            (normal)
    .jssort03 .p:hover      (normal mouseover)
    .jssort03 .pav          (active)
    .jssort03 .pdn          (mousedown)
    */

    .jssort03 .p {
        position: absolute;
        top: 0;
        left: 0;
        width: 62px;
        height: 32px;
    }

    .jssort03 .t {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }

    .jssort03 .w, .jssort03 .pav:hover .w {
        position: absolute;
        width: 60px;
        height: 30px;
        border: white 1px dashed;
        box-sizing: content-box;
    }

    .jssort03 .pdn .w, .jssort03 .pav .w {
        border-style: solid;
    }

    .jssort03 .c {
        position: absolute;
        top: 0;
        left: 0;
        width: 62px;
        height: 32px;
        background-color: #000;

        filter: alpha(opacity=45);
        opacity: .45;
        transition: opacity .6s;
        -moz-transition: opacity .6s;
        -webkit-transition: opacity .6s;
        -o-transition: opacity .6s;
    }

    .jssort03 .p:hover .c, .jssort03 .pav .c {
        filter: alpha(opacity=0);
        opacity: 0;
    }

    .jssort03 .p:hover .c {
        transition: none;
        -moz-transition: none;
        -webkit-transition: none;
        -o-transition: none;
    }

    * html .jssort03 .w {
        width /**/: 62px;
        height /**/: 32px;
    }

</style>
<script type="text/javascript">jssor_1_slider_init();</script>