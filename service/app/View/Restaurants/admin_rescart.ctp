<?php echo $this->Html->css(array('bootstrap-editable.css', '/select2/select2.css'), 'stylesheet', array('inline' => false)); ?>
<?php echo $this->Html->script(array('bootstrap-editable.js', '/select2/select2.js'), array('inline' => false)); ?>
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
              $x = $this->Session->flash(); ?>
            <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php } ?>
        </p>
    <div class="row">

        <div class="col-md-3">
            <p><a href="list_page.html" class="btn_side">Back to search</a></p>
            <div class="box_style_1 rescart_cat">
                <ul id="cat_nav">
                    <?php  foreach ($discategory['DishCategory'] as $dact) {?>
                    <li><a href="<?php echo $this->webroot; ?>admin/restaurants/cartdetail/<?php echo $restaurant['Restaurant']['id']; ?>/<?php echo $_GET['table'] ?>/<?php echo $dact['id']; ?>" class="active"><?php echo $dact['name']; ?> <span>(<?php echo $dact['cnt']; ?>)</span></a></li>
                    <?php } ?>
                </ul>
            </div><!-- End box_style_1 -->

            <div class="box_style_2 box_sec hidden-xs" id="help">
                <i class="icon_lifesaver"></i>
                <h4>Need <span>Help?</span></h4>
                <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                <small>Monday to Friday 9.00am - 7.30pm</small> 
            </div>
        </div><!-- End col-md-3 -->
        
        
        <div class="col-md-9">
            
            <div class="box_style_2 box_sec" id="main_menu">
                <h2 class="inner"><?php echo $restaurant['Restaurant']['name']; ?> (<?php echo $restaurant['RestaurantsType']['name']; ?>)</h2>
                <p class="inner"><?php echo $restaurant['Restaurant']['description']; ?></p><br/>
                <p class="inner"><?php echo $restaurant['Restaurant']['address']; ?></p>
                          </div>
            
        </div>

</div>
    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->