<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>	

<!-----------------right-side---------------->
<div class="col-sm-<?php if(!empty($loggeduser)){ echo "8"; }else{ echo "12"; }?>">

<div class="search-bg">
<span class="search-heading">Quick Search</span>
<div class="search-form">
<form method="get"  id="searchform">
<input type="text" name="search" class="input-sm s ui-autocomplete-input" id="srch" placeholder="Search">
<input type="submit" value="Search">
</form>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
<div class="welcome-text">
<h1>Omega <span>Market URL</span></h1>
<p class="p-txt-18">A passage of Lorem Ipsum you need here</p>
<p class="p-txt-14">OMEGA Market  is a darknet site and you can only access the AlphaBay URL via the Tor network. It offers all sorts of listings, but mostly illicit drugs, firearms, stolen personal information, etc. The payment is regulated by bitcoins.</p>
</div>

 <h2 style="margin:0;"><span class="green">Featured</span> Listing</h2> 
 
 <div class="boder-grey"></div>
           
  <div class="row">
  <?php
if(!empty($products)){
  foreach($products as $item){ ?>
  	<div class="col-sm-4">
        <div class="myproduct">
           <a href="<?php echo $this->webroot."products/view/".$item['Product']['id']; ?>"><div class="listing-img" style="background-image: url(<?php echo $this->webroot."files/product/".$item['Product']['image']; ?>);
    background-repeat: no-repeat;
    background-size: cover;
    height: 162px;
    position: relative;">
            <div class="listing-price">Price: <?php echo $item['Country']['country_code']; ?> <?php echo $item['Product']['price']; ?></div>
            </div></a>
            <div class="listing-heading">
            <a href="#"><?php echo $item['Product']['name']; ?> - <?php echo substr($item['Product']['description'], 0, 200); ?></a>
             </div>
         
        </div>
    </div>
  <?php }
}
  ?>

  </div><!--row-->  
  <div class="row">
  <?php // echo $this->element('pagination-counter'); ?>
  <?php echo $this->element('pagination'); ?>
  </div>
</div><!--col-sm-8-->

 <?php echo $this->Html->script(array('js'));
        echo $this->App->js(); ?>