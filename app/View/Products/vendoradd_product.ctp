<!-----------------right-side---------------->
                <div class="col-sm-8">
                
                
               <div class="rgistr-container">
<h1>Add Product</h1>

 <?php echo $this->Session->flash();?>
<div class="login-form">
<p>Here, you can edit your profile information including your password, store name, ICQ, and PGP key. Be careful to avoid putting information that may reveal your true identity, such as real-life website, name, or any piece of information that would allow somebody to find out who you really are. We value the privacy and safety of our users. Please note that your username cannot be changed. You can leave the password fields blank if you do not wish to change it.</p>

<div class="register-data">
<?php echo $this->Form->create('Product',array('type'=>'file','class'=>'form-horizontal regitrfrm')); ?>


  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Product Name:</label>
    <div class="col-sm-9">
	 <?php echo $this->Form->input('user_id', array('type' => 'hidden','label'=>false,'value'=>$loggeduser)); ?>
      <?php echo $this->Form->input('name', array('class' => 'form-control','label'=>false,'placeholder'=>'Product Name')); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Product Category:</label>
    <div class="col-sm-9">
		<?php echo $this->Form->input('category_id', array('class' => 'form-control','label'=>false,'empty'=>'Select Category')); ?>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Product Image:</label>
    <div class="col-sm-9">
     <label class="btn btn-default btn-file">
    Browse <?php echo $this->Form->input('image', array('type' => 'file','label'=>false ,'required')); ?>
</label>
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Product Description:</label>
    <div class="col-sm-9">
	<?php echo $this->Form->input('description', array('class' => 'form-control ckeditor','label'=>false,'placeholder'=>'Product Description')); ?>
       
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Quantity :</label>
    <div class="col-sm-9">
	  <?php echo $this->Form->input('quantity', array('class' => 'form-control','label'=>false,'placeholder'=>'Quantity')); ?>
     
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Price:</label>
    <div class="col-sm-9">
	  <?php echo $this->Form->input('price', array('class' => 'form-control','label'=>false,'placeholder'=>'Price')); ?>
    
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Product Class:</label>
    <div class="col-sm-9">
	 <?php echo $this->Form->input('productclass', array('class' => 'form-control','label'=>false,'placeholder'=>'Product Class')); ?>
     
    </div>
  </div>
  
   <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Origin Country:</label>
    <div class="col-sm-9">
	<select name="data[Product][origincountry]" class="form-control" id="ProductOrigincountry">
      <option value="">Select Country</option>
	  <?php foreach($countries as $item) {?>
	   <option value="<?php echo  $item['Country']['id']; ?>"><?php echo  $item['Country']['country_name']; ?></option>
	  <?php } ?>
    </select>
 
    </div>
  </div>
  
   <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Ships To:</label>
    <div class="col-sm-9">
    <select name="data[Product][shipscountry]" class="form-control" id="ProductShipscountry">
      <option value="">Select Country</option>
	  <?php foreach($countries as $item) {?>
	   <option value="<?php echo  $item['Country']['id']; ?>"><?php echo  $item['Country']['country_name']; ?></option>
	  <?php } ?>
    </select>
    </div>
  </div>
  
   <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Refund Policy:</label>
    <div class="col-sm-9">
	<?php echo $this->Form->input('refundpolicy', array('class' => 'form-control ckeditor','label'=>false,'placeholder'=>'Refund Policy')); ?>
   
    </div>
  </div>
  
  
  
   
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	<?php echo $this->Form->button('Add Product', array('class' => 'btn defult_btn pull-right')); ?>
     
    </div>
  </div>
<?php echo $this->Form->end(); ?>
</div>
</div>
<div class="clear"></div>
</div>

   
</div>