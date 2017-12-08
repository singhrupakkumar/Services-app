<h2 style="padding-left:15px;">Edit Drink</h2>
<br />

<div class="row">
    <div class="col-sm-8">
    <div class="add_dish customs_boxed">

        <?php echo $this->Form->create('Product',array('type'=>'file')); ?>
        <?php echo $this->Form->input('id'); ?>

         <div class="input text">
            <label for="ProductName">Category</label>


            <select class="form-control"  name="data[Product][category]" required>
                <?php
                     foreach ($drink as $key => $value) {
                        if($product[Product][category]==$value){
                            echo "<option selected value='".$value."'>$value</option>";
                        }
                        else{
                            echo "<option value='".$value."'>$value</option>";
                        }
                     }
                 ?>
            </select></div>
        <?php echo $this->Form->input('name', array('class' => 'form-control','required')); ?>
        
        <?php echo $this->Form->input('description', array('class' => 'form-control','required')); ?>
        
        <?php
        echo $this->Html->Image('/files/product/' . $product['Product']['image'], array('width' => 100, 'height' => 100, 'alt' => $product['Product']['image'], 'class' => 'image'));
        echo $this->Form->input('image', array('type' => 'file', 'class' => 'form-control'));
        ?>

         <?php echo $this->Form->input('ingredients', array('class' => 'form-control',)); ?>

        
        <?php echo $this->Form->input('price', array('class' => 'form-control','type'=>'number','label'=>'Price : EUR')); ?>
        <?php echo $this->Form->input('quantity', array('class' => 'form-control','type'=>'number')); ?>
        <br>
        <br>
       
           
         <input type="hidden" name="rid" id="rid" value="<?php echo $id; ?>">
       
           
<?php echo $this->Form->button('Submit', array('class' => 'btn btn-success')); ?>
<?php echo $this->Form->end(); ?>

       

    </div>
</div>
</div>
<style type="text/css">
    #sbtn,#sbtna {
        background: #fff !important;
        border: 1px solid #ddd;
        border-radius: 5px;
        height: auto !important;
        margin: 14px 0 0 !important;
        padding: 5px;
        width: 46% !important;
        white-space: nowrap;
        font-weight: 700;
        box-shadow: 0 2px 0 #ccc;
        cursor: pointer;
    }
    #sbtn:hover,#sbtna:hover{
        box-shadow: none !important;
    }
.input.file input{
	height:auto;
	}
.customs_boxed {
    background: #fff;
    padding: 15px;
    width: 96%;
	margin:0 auto;
}

#dishcatname,#dishsubcatname,#ProductResId {
    width: auto;
    margin-left: 15px;
    padding: 5px;
    float: right;
    border: 1px solid #ddd;
    border-radius: 4px;
    -moz-appearance: none;
    -webkit-appearance: none;
    padding-right: 20px;
}
#cke_ProductDescription {
    margin-bottom: 10px;
}
</style>