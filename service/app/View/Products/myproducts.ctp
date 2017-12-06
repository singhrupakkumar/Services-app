<!-----------------right-side---------------->
<div class="col-sm-8">
 <h2 style="margin:0;"><span class="green">Product</span> Listing</h2> 
 
 <div class="boder-grey"></div>
           
  <div class="row">
  <?php
if(!empty($products)){
  foreach($products as $item){ ?>
  	<div class="col-sm-4">
        <div class="myproduct">
           <a href="<?php echo $this->webroot."products/details/".$item['Product']['id']; ?>"><div class="listing-img" style="background-image: url(<?php echo $this->webroot."files/product/".$item['Product']['image']; ?>);
    background-repeat: no-repeat;
    background-size: cover;
    height: 162px;
    position: relative;">
            <div class="listing-price">Price: <?php echo $item['Country']['country_code']; ?> <?php echo $item['Product']['price']; ?></div>
            </div></a>
            <div class="listing-heading">
            <a href="#"><?php echo $item['Product']['name']; ?> - <?php echo substr($item['Product']['description'], 0, 200); ?></a>
             </div>
            <div class="listing-id" style="cursor:pointer;"><?php echo $this->Form->postLink('Delete', array('action' => 'delete', $item['Product']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $item['Product']['id'])); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'vendoredit_product', $item['Product']['id']), array('class' => 'btn btn-success')); ?>
			</div>
        </div>
    </div>
  <?php }
}
  ?>

  </div><!--row-->  
</div><!--col-sm-8-->