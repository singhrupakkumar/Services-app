<?php echo $this->Html->css(array('bootstrap-editable.css', '/select2/select2.css'), 'stylesheet', array('inline' => false)); ?>
<?php echo $this->Html->script(array('bootstrap-editable.js', '/select2/select2.js'), array('inline' => false)); ?>
<script type="text/javascript" src="http://readyto.com/home/js/addtocart.js"></script>
<link rel="stylesheet" href="http://readyto.com/home/css/elegant_font/elegant_font.min.css" type="text/css">

<div class="content">
    <div class="header">
        <h1 class="page-title">Edit Admin</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url('/admin/Restaurants/'); ?>">Restaurant Management</a> </li>
            <li class="active">Edit Admin</li>
        </ul>
    </div>
    <div class="main-content">  
        <p>
            <?php
            // debug($restaurant);exit;
            $x = $this->Session->flash();
            ?>
            <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php } ?>
        </p>

        <!-- Content ================================================== -->

        <div class="container margin_60_35">
            <div class="row">

                <div class="col-md-3">

                    <div class="box_style_1">
                        <ul id="cat_nav">
                            <?php foreach ($DishSubcat['DishSubcat'] as $discat) { ?>
                                <li><a href="#starters-<?php echo $discat['id']; ?>" class="active"><?php echo $discat['name']; ?> <span>(<?php echo $discat['cnt']; ?>)</span></a></li>
                            <?php } ?>
                        </ul>
                    </div><!-- End box_style_1 -->


                </div><!-- End col-md-3 -->

                <div class="col-md-6">
                    <div class="box_style_2" id="main_menu">
                        <h2 class="inner">Menu</h2>
                        <?php foreach ($DishSubcat['DishSubcat'] as $discat) { ?>
                            <h3 class="nomargin_top" id="starters-<?php echo $discat['id']; ?>"><?php echo $discat['name']; ?></h3>
                            <hr>
                            <table class="table table-striped cart-list ">
                                <thead>
                                    <tr>
                                        <th>
                                            Item
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Order
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($product as $pdata) {
                                        ;
                                        if ($discat['id'] == $pdata['Product']['dishsubcat_id']) {
                                            ?>
                                            <tr>
                                                <td style="width:75%">
                                                    <h5><?php echo $pdata['Product']['name']; ?></h5>
                                                    <p>
            <?php echo $pdata['Product']['description']; ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <strong>$ <?php echo $pdata['Product']['price']; ?></strong>
                                                </td>
                                                <td class="options">
            <?php echo $this->Form->button('Add to Cart', array('class' => 'btn btn-primary adminaddtocart', 'data-tid' => $tno, 'id' => 'adminaddtocart', 'id' => $pdata['Product']['id'])); ?>
                                                    <!--<i class="icon_plus_alt2"></i>-->
                                                </td>
                                            </tr>
        <?php }
    }
    ?>
                                </tbody>
                            </table>
                            <hr>
<?php } ?>
                    </div><!-- End box_style_1 -->
                </div><!-- End col-md-6 -->

                <div class="col-md-3" id="sidebar">
                    <div class="theiaStickySidebar">
                        <div id="cart_box" >
                            <h3>Your order <i class="icon_cart_alt pull-right"></i></h3>
                            <div id="added_items_admin">

                            </div>

                            <hr>
                            <div id="total_items_admin"></div>                   
                            <hr>
                            <form action="<?php echo $this->webroot; ?>admin/splitpayments/ConfirmOrder" method="post" name="frm">
                                Enter Table ReserveID <input type="text" value="" name="data[TableReservation][id]" required/> 
                                <input type="submit" value="Confirm Order" name="submit"/>
                            </form>
                        </div><!-- End cart_box -->
                    </div><!-- End theiaStickySidebar -->
                </div><!-- End col-md-3 -->
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->