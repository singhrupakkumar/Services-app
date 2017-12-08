<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Drink</h3>
            </div>
           

        <?php echo $this->Form->create('Product', array('type' => 'file', 'id' => 'addpro')); ?>
            <div class="input text">
            <label for="ProductName">Category</label>

            <select class="form-control"  name="data[Product][category]" required>
                <?php
                     foreach ($drink as $key => $value) {
                        echo "<option value='".$value."'>$value</option>";
                     }
                 ?>
            </select></div>

        <?php echo $this->Form->input('name', array('class' => 'form-control','required')); ?>                

        <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
        
        <?php echo $this->Form->input('image', array('type' => 'file', 'class' => 'form-control', 'label' => 'Image:')); ?>

        <?php echo $this->Form->input('ingredients', array('class' => 'form-control',)); ?>

         <?php echo $this->Form->input('price', array('class' => 'form-control','type'=>'number','label'=>'Price : EUR')); ?>

          <?php echo $this->Form->input('quantity', array('class' => 'form-control','type'=>'number')); ?>
   
            <?php //echo $this->Form->input('sale', array('class' => 'form-control1','type'=>'checkbox','label'=>'Not for individual Sale')); ?>

            <br>
            <br>
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-success')); ?>
</div>
        <?= $this->Form->end() ?>
</div>
</div></div></div>
</section>

<style type="text/css">
    #sbtn,#sbtna {
        background: #fff !important;
        border: 1px solid #ddd;
        border-radius: 5px;
        height: auto !important;
        margin: 14px 0 0 !important;
        padding: 5px;
        width: 42% !important;
        white-space: nowrap;
        font-weight: 700;
        box-shadow: 0 2px 0 #ccc;
        cursor: pointer;
    }
    #sbtn:hover,#sbtna:hover{
        box-shadow: none !important;
    }



#addpro .input.select label{
float: left;
width: 50%;
}
#addpro .input.text label{
float: left;
width: 50%;
}
#addpro .input.select{
    float: left;
    width: 100%;
    margin-bottom: 2px;
}
#addpro .input.file input{
height: auto;
}
</style>