<div class="content">
        <div class="header">
        <h1 class="page-title">Edit Admin</h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url('/admin/Restaurants/'); ?>">Restaurant Management</a> </li>
            <li class="active">Edit Admin</li>
        </ul>
    </div>
<div class="container margin_60_35">
    <div class="row">
        <div class="col-md-3">
            <p><a href="list_page.html" class="btn_side">Back to search</a></p>
            <div class="box_style_1">
                <ul id="cat_nav">
                    <?php  foreach ($discategory['DishCategory'] as $dact) {?>
                    <li><a href="<?php echo $this->webroot; ?>admin/splitpayments/cartdetail/<?php echo $restaurant['Restaurant']['id']; ?>/<?php echo $tno; ?>/<?php echo $dact['id']; ?>" class="active"><?php echo $dact['name']; ?> <span>(<?php echo $dact['cnt']; ?>)</span></a></li>
                    <?php } ?>
                </ul>
            </div><!-- End box_style_1 -->
        </div><!-- End col-md-3 -->
         <form action="<?php echo $this->webroot; ?>admin/qrcodes/add" method="post">
            <input type="hidden" name="data[Qrcode][res_id]" value="<?php echo $rno; ?>">
            <input type="hidden" name="data[Qrcode][tableno]" value="<?php echo $tno; ?>">
         <button >Generate QR Code</button>
        </form>
        <?php if($restable['Restable']['booked']==0){ ?>
<!--        <form action="<?php echo $this->webroot; ?>admin/restaurants/booked" method="post" name="unbook">
            <input type="hidden" name="data[Restable][booked]" value="1">
           <input type="hidden" name="data[Restable][res_id]" value="<?php echo $rno; ?>">
            <input type="hidden" name="data[Restable][tableno]" value="<?php echo $tno; ?>">
        <button >Booked</button>
        </form>-->
        <?php } else {?>
<!--         <form action="<?php echo $this->webroot; ?>admin/restaurants/booked" method="post" name="unbook">
            <input type="hidden" name="data[Restable][booked]" value="0">
            <input type="hidden" name="data[Restable][res_id]" value="<?php echo $rno; ?>">
            <input type="hidden" name="data[Restable][tableno]" value="<?php echo $tno; ?>">
         <button >UnBooked</button>
        </form>-->
        <?php }?>
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