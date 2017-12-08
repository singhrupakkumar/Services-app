<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_short.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
        <div id="sub_content">
            <h1>24 results in your zone</h1>
            <div><i class="icon_pin"></i> 135 Newtownards Road, Belfast, BT4 1AB</div>
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

<div class="collapse" id="collapseMap">
    <div id="map" class="map"></div>
</div><!-- End Map -->

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">
        <div class="col-md-3">
            <p>
                <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">View on map</a>
            </p>
            <div id="filters_col">
                <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters <i class="icon-plus-1 pull-right"></i></a>
                <div class="collapse" id="collapseFilters">
                    <div class="filter_type" id="f_one">
                        <h6>Distance</h6>
                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                        <div id="slider-range-max"></div>
                        <h6>Type</h6>
                        <ul>
                            <li><label><input type="checkbox" name="location[]" class="alltype"  value="0">All <small>(<?php echo @count($resdata['Restaurant']); ?>)</small></label></li>
                            <?php foreach ($restauranttype as $d) { ?>
                                <li><label><input type="checkbox"  name="location[]" class="alltype" value="<?php echo $d['RestaurantsType']['id']; ?>"><?php echo $d['RestaurantsType']['name']; ?> <small></small></label></li>           
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="filter_type" id="f_two">
                        <h6>Rating</h6>
                        <ul>
                            <li><label><input name="ratings[]" class="rtngs"  value="5" type="checkbox" ><span class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>
                                    </span></label></li>
                            <li><label><input type="checkbox" name="ratings[]" class="rtngs"  value="4" ><span class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                    </span></label></li>
                            <li><label><input type="checkbox" name="ratings[]" class="rtngs"  value="3" ><span class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                                    </span></label></li>
                            <li><label><input type="checkbox" name="ratings[]" class="rtngs"  value="2" ><span class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>
                                    </span></label></li>
                            <li><label><input type="checkbox" name="ratings[]" class="rtngs"  value="1"><span class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>
                                    </span></label></li>
                        </ul>
                    </div>
                    <div class="filter_type" id="f_three">
                        <h6>Options</h6>
                        <ul class="nomargin">
                            <li><input type="checkbox"  id="dlchk" value="Delivery">Delivery</label></li>
                            <li><input type="checkbox"  id="tkchk" value="Takeaway">Take Away</label></li>
                        </ul>
                    </div>
                </div><!--End collapse -->
            </div><!--End filters col-->
        </div><!--End col-md -->

        <div class="col-md-9" id="filter">

            <div id="tools">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="styled-select">
                            <select name="sort_rating" id="sort_rating">
                                <option value="" selected>Sort by rating</option>
                                <option value="lower">Lowest ratings</option>
                                <option value="higher">Highest ratings</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-6 hidden-xs">
                        <a  id="grd" class="bt_filters"><i class="icon-th"></i></a>
                        <a  id='lst' class="bt_filters" style="display:none"><i class="icon-list"></i></a>
                    </div>
                </div>
            </div><!--End tools -->
            <?php if (empty($resdata)) { ?>
                <div class="col-md-9 col-sm-6 hidden-xs">
                    There is no any restaurant
                </div>
                <?php
            } else {
                $i = 1;
                foreach ($resdata['Restaurant'] as $d) {
                    ?>
                    <div class="lst">
                        <div class="strip_list wow fadeIn" data-wow-delay="0.<?php echo $i; ?>s">
                            <div class="ribbon_1">
                                Popular
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-sm-9">
                                    <div class="desc">
                                        <div class="thumb_strip">
                                            <a href="#"><img src="<?php echo $d['logo']; ?>" alt=""></a>
                                        </div>
                                        <div class="rating">
                                            <?php
                                            $i = $d['review_avg'];

                                            for ($j = 0; $j < $i; $j++) {
                                                ?>

                                                <i class="icon_star voted"></i>

                                            <?php } for ($h = 0; $h < 5 - $i; $h++) { ?>  
                                                <i class="icon_star"></i>
                                            <?php } ?>
                                            (<small><a href="<?php echo $this->webroot ?>restaurants/review/<?php echo $d['id'] ?>"><?php echo $d['review_count']; ?> reviews</a></small>)
                                        </div>
                                        <h3><?php echo $d['name']; ?></h3>
                                        <div class="type">
                                            <?php echo $d['typename']; ?>
                                        </div>
                                        <div class="location">
                                            <?php echo $d['address']; ?> <span class="opening">Opens at <?php echo $d['opening_time']; ?></span> Minimum order: $<?php echo $d['delivery_fee']; ?>
                                        </div>
                                        <ul>
                                            <?php if ($d['delivery'] == 1) { ?>                         
                                                <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                                            <?php } else { ?>
                                                <li>Delivery<i class="icon_close_alt2 no"></i></li>
                                            <?php } ?>
                                            <?php if ($d['takeaway'] == 1) { ?>                         
                                                <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                            <?php } else { ?>
                                                <li>Take away<i class="icon_close_alt2 no"></i></li>
                                            <?php } ?>


                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="go_to">
                                        <div>
                                            <a href="<?php echo $this->webroot; ?>restaurants/menu/<?php echo $d['id']; ?>" class="btn_1">View Menu</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End row-->
                        </div><!-- End strip_list-->
                    </div>

                    <?php
                    $i++;
                } $j = 1;
                foreach ($resdata['Restaurant'] as $d) {
                    ?>
                    <div class="grd" style="display:none">
                        <div class="col-md-6 col-sm-6 wow zoomIn" data-wow-delay="0.<?php echo $j; ?>s">
                            <a class="strip_list grid" href="<?php echo $this->webroot; ?>restaurants/menu/<?php echo $d['id']; ?>">
                                <div class="ribbon_1">Popular</div>
                                <div class="desc">
                                    <div class="thumb_strip">
                                        <img src="<?php echo $d['logo']; ?>" alt="">
                                    </div>
                                    <div class="rating">
                                        <?php
                                        $i = $d['review_avg'];

                                        for ($j = 0; $j < $i; $j++) {
                                            ?>

                                            <i class="icon_star voted"></i>

                                        <?php } for ($h = 0; $h < 5 - $i; $h++) { ?>  
                                            <i class="icon_star"></i>
        <?php } ?>

                                    </div>
                                    <h3><?php echo $d['name']; ?></h3>
                                    <div class="type">
        <?php echo $d['typename']; ?>
                                    </div>
                                    <div class="location">
        <?php echo $d['address']; ?> <br><span class="opening">Opens at <?php echo $d['opening_time']; ?></span> Minimum order: $<?php echo $d['delivery_fee']; ?>
                                    </div>
                                    <ul>
                                        <?php if ($d['delivery'] == 1) { ?>                         
                                            <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                                        <?php } else { ?>
                                            <li>Delivery<i class="icon_close_alt2 no"></i></li>
                                        <?php } ?>
                                        <?php if ($d['takeaway'] == 1) { ?>                         
                                            <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                            <?php } else { ?>
                                            <li>Take away<i class="icon_close_alt2 no"></i></li>
        <?php } ?>


                                    </ul>
                                </div>
                            </a><!-- End strip_list-->
                        </div><!-- End col-md-6-->
                    </div>
                    <?php
                    $i++;
                }
            }
            ?>

            <?php
            $i = 1;
            foreach ($resdata['Restaurant'] as $d) {

                $name[] = $d['name'] . ',' . $d['latitude'] . ',' . $d['longitude'] . ',' . $i;
                $i++;
            }
            //print_r($name);
            ?>
            <script type="text/javascript">
                var locations = <?php echo json_encode($name); ?>;
            //     var locations = [       
            //    for(var i in pcontent){
            //        console.log(pcontent[i]);
            //    }       
            //    ]; 
            //    console.log(locations);
            </script>

            <!--            <a href="#0" class="load_more_bt wow fadeIn" data-wow-delay="0.2s">Load more...</a>  -->
        </div><!-- End col-md-9-->

    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->