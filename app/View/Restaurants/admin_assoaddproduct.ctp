<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Dishes</h3>
            </div>
        <?php echo $this->Form->create('Product', array('type' => 'file', 'id' => 'addpro')); ?>
        <?php echo $this->Form->input('dishcategory_id', ['options' => $DishCategory, 'label' => 'Dish Category:', 'class'=> "select_cus",'id' => "dishcatname", 'empty' => 'Choose Dish category','required']); ?> 
        <?php
        if (!empty($DishSubcat)) {
            echo $this->Form->input('dishsubcat_id', ['options' => $DishSubcat, 'label' => 'Dish Sub Category:', 'id' => "dishsubcatname",'required']);
        } else {
            echo $this->Form->input('dishsubcat_id', ['options' => array("Select Dish Category"), 'label' => 'Dish Sub Category:', 'class'=> "select_cus",'id' => "dishsubcatname",'required']);
        }
        ?> 
        <?php echo $this->Form->input('res_id', array('class' => 'form-control', 'type' => 'hidden')); ?>
        <?php echo $this->Form->input('name', array('class' => 'form-control','required')); ?>                

        <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>

        <?php echo $this->Form->input('image', array('type' => 'file', 'class' => 'form-control', 'label' => 'Image:')); ?>

        <?php echo $this->Form->input('price', array('class' => 'form-control')); ?>

        <?php //echo $this->Form->input('weight', array('class' => 'form-control')); ?>
         <?php //echo $this->Form->input('box', array('class' => 'form-control','label'=>'Box price')); ?>

        <?php //echo $this->Form->input('sizes', array('class' => 'form-control','label'=>'Choose weight in kg,gm,pound')); ?>
            <input type="hidden" name="rid" id="rid" value="<?php echo $id; ?>">
            <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.tokenize.js"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>/js/jquery.tokenize.css" />
<!--            Associate Dish:
            <select id="tokenize" multiple="multiple" class="tokenize-sample">
            </select><br />
            <input type="hidden" name="data[Product][proassociate]"  value="" id="proassociate"/>
            <div id="sbtn">Click to Associate sub items</div><br />-->
            <!--Associate Alergy:
            <select id="tokenizea" multiple="multiple" class="tokenize-sample">
            </select><br />
            <input type="hidden" name="data[Product][alergi]"  value="" id="proassociatea"/>
            <div id="sbtna">Click to Associate Alergy</div><br />-->
            <!--        <div class="check_box">
        <?php //echo $this->Form->input('active', array('type' => 'checkbox')); ?>
                    </div>-->
            <br />
            <script type="text/javascript">

         
                $.get("http://readyto.com/admin/products/getalergy", function (d) {
                    var html = '';
                    var data = jQuery.parseJSON(d);
                    console.log(data);
                    for (var key in data) {
                        html += '<option value="' + key + '">' + data[key] + '</option>';
                    }
                    //console.log(html);
                    jQuery('#tokenizea').html('');
                    jQuery('#tokenizea').html(html);
                     jQuery('#sbtna').css('color','red');
                });

            </script>            
            <script type="text/javascript">
               // $('#tokenize').tokenize();
                $('#tokenizea').tokenize();
            </script>
            <?php echo $this->Form->input('sale', array('class' => 'form-control1','type'=>'hidden','value'=>'1')); ?>

        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-success')); ?>
</div>
        <?= $this->Form->end() ?>
</div>
</div></div></div>
</section>
<script type="text/javascript">

    $('#sbtna').off("click").on("click", function () {
        $('#proassociatea').val('');
        $('#proassociatea').val($('#tokenizea').tokenize().toArray());
       
    });
</script>
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