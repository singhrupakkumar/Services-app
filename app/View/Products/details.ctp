<!-----------------right-side---------------->
<?php // print_r($product);?>
<div class="col-sm-8">
            
     <div class="row">
           
            <div class="col-sm-4">
            	<div class="product_pic">
                	<img src="<?php echo $this->webroot."files/product/".$product['Product']['image']; ?>" />
                 </div>
            </div><!--col-sm-4-->
            
            <div class="col-sm-8">
            	<h1 style="margin: 0;">Heading</h1>
                <p style="text-align: justify;">
                	<?php echo substr($product['Product']['description'], 0, 200); ?>
                </p>
                
<div class="sold-by">
    <div class="sold-by-text">Sold by
    <a href=""><?php echo $product['User']['username']; ?></a> - <span>3 sold since Aug 15, 2016</span>
    </div>
    <div class="sold-by-links">
    <ul>
    <li><a href="" class="defult_btn">Vendor Level 3</a></li>
    <li><a href="" class="defult_btn2">Trust Level 7</a></li>
    </ul>
    </div>
</div>
 
<div class="feature-div">
    <div class="feature-heading">Features</div>
        <div class="feature-content">
            <ul>
            <li><span>Product</span> <?php echo $product['Product']['name']; ?></li>
            <li><span>Origin country</span><?php echo $product['Country']['country_name']; ?></li>
            <li><span>Quantity left</span><?php echo $product['Product']['quantity']; ?></li>
            <li><span>Ships to</span><?php echo $shipcountry['Country']['country_name']; ?></li>
            <li><span>Ends in</span>Never</li>
            <li><span>Payment</span>Escrow</li>
            </ul>
        </div>
</div>               

            <div class="feature-form">
            <!--select>
              <option value="1">Priority Mail Domestic USA - 2 days - USD +00.00  / item</option>
            </select-->
            <div class="purcahse-price">
            <strong>Purchase price:</strong> USD <span id="unit_price"><?php echo $product['Product']['price']; ?></span></div>
            <!--div class="quantity-div">
            <div class="quantity-field">
            <label>Qty : </label><input id="qty" name="" type="text">
            <input id="btc_price" value="" type="hidden">
            <input id="prod_id" value="" type="hidden">
            <input id="new_btc_price" value="" type="hidden"> 
            </div>
            <ul>
            <li><a href="javascript:void(0);" class="defult_btn"><span class="bitcoin"><img src="http://demo.neoglobal.se/omega/assets/images/bitcoin.png" alt=""></span> Buy Now</a></li>
            </ul>
            <div class="btc-div" id="to_btc">0.00563728 BTC </div>
            </div-->
            </div>

                
        		</div><!--col-sm-8(inner)-->
                
          <div class="product-description">
			<div class="tabbed">
              <input name="tabbed" id="tabbed1" checked="" type="radio">
              <section>
                <h1>
                  <label for="tabbed1">Description</label>
                </h1>
                <div>
                  <p>
                 <?php echo $product['Product']['description']; ?>
                  </p>
                </div>
              </section>
              
              <input name="tabbed" id="tabbed2" type="radio">
        
              
              <input name="tabbed" id="tabbed3" type="radio">
              <section>
                <h1>
                  <label for="tabbed3">Feedback</label>
                </h1>
                <div>
                  Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
        
        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                </div>
              </section>
              
              <input name="tabbed" id="tabbed4" type="radio">
              <section>
                <h1>
                  <label for="tabbed4">Refund Policy</label>
                </h1>
                <div>
                  <?php echo $product['Product']['refundpolicy']; ?></div>
              </section>
      
    </div><!--tabbed-->
</div><!--description-->
                
        	</div><!--row-->
    	</div><!--col-sm-8-->