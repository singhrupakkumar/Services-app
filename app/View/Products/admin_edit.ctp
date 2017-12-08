<h2>Admin Edit Product</h2>
<br />
<div class="row">
    <div class="col-sm-5">
        <div class="add_dish">
            <?php echo $this->Form->create('Product', array('type' => 'file')); ?>
            <?php echo $this->Form->input('id'); ?>

            <?php echo $this->Form->input('dishcategory_id', ['options' => $DishCategory, 'label' => 'Dish Category:', 'id' => "dishcatname", 'empty' => 'Choose Dish category']); ?> <br />
            <?php
            if (!empty($DishSubcat)) {
                echo $this->Form->input('dishsubcat_id', ['options' => $DishSubcat, 'label' => 'Dish Sub Category:', 'id' => "dishsubcatname"]);
            } else {
                echo $this->Form->input('dishsubcat_id', ['options' => $DishSubcat, 'label' => 'Dish Sub Category:', 'id' => "dishsubcatname"]);
            }
            ?> 
            <?php echo $this->Form->input('res_id', ['options' => $restaurants, 'label' => 'Restaurant Name:']); ?>

            <?php echo $this->Form->input('name', array('class' => 'form-control')); ?>

            <?php echo $this->Form->input('description', array('class' => 'form-control ckeditor')); ?>

            <?php
            echo $this->Html->Image('/files/product/' . $product['Product']['image'], array('width' => 100, 'height' => 100, 'alt' => $product['Product']['image'], 'class' => 'image'));
            echo $this->Form->input('image', array('type' => 'file', 'class' => 'form-control'));
            ?>

            <?php echo $this->Form->input('price', array('class' => 'form-control')); ?>

            <?php echo $this->Form->input('weight', array('class' => 'form-control')); ?>

            <?php echo $this->Form->input('sizes', array('class' => 'form-control')); ?>
            <div class="check_box">
                <?php //echo $this->Form->input('active', array('type' => 'checkbox')); ?>
            </div>
             <input type="hidden" name="rid" id="rid" value="<?php echo $id; ?>">
            <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.tokenize.js"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>/js/jquery.tokenize.css" />
            Associate Dish:
            <select id="tokenize" multiple="multiple" class="tokenize-sample">
            </select><br />
            <input type="hidden" name="data[Product][proassociate]"  value="" id="proassociate"/>
            <div id="sbtn">Click to Associate sub items</div><br />
            Associate Alergy:
            <select id="tokenizea" multiple="multiple" class="tokenize-sample">
            </select><br />
            <input type="hidden" name="data[Product][alergi]"  value="" id="proassociatea"/>
            <div id="sbtna">Click to Associate Alergy</div><br />
            <!--        <div class="check_box">
            <?php //echo $this->Form->input('active', array('type' => 'checkbox')); ?>
                    </div>-->
            <br />

            <script type="text/javascript">

                    $('#tokenize').tokenize().clear();
                    $('#proassociate').val('');
                     var a = $('#rid').val();
                    $.post("http://readyto.com/admin/products/getproduct", {'id': a}, function (d) {
                        var html = '';
                        var data = jQuery.parseJSON(d);
                        console.log(data);
                        for (var key in data) {
                            html += '<option value="' + key + '">' + data [key] + '</option>';
                        }
                        //console.log(html);
                        jQuery('#tokenize').html('');
                        jQuery('#tokenize').html(html);
                    });
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
                    });

              

            </script>
            <script type="text/javascript">

                jQuery(document).ready(function () {
                    $('#tokenize').tokenize();
                    $('#tokenizea').tokenize();
                    var pro_edit = {};
                    pro_edit =<?php echo json_encode($pro_product); ?>;
                    for (key in pro_edit)
                    {
                        $('#tokenize').tokenize().tokenAdd(key, pro_edit[key]);
                    }
                    $('#proassociate').val('');
                    $('#proassociate').val($('#tokenize').tokenize().toArray());
                    var pro_alrg = {};
                    pro_alrg =<?php echo json_encode($alrgi); ?>;
                    console.log(pro_alrg);
                    for (key in pro_alrg)
                    {
                        $('#tokenizea').tokenize().tokenAdd(key, pro_alrg[key]);
                    }
                    $('#proassociatea').val('');
                    $('#proassociatea').val($('#tokenizea').tokenize().toArray());
                });

            </script>
            <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
            <?php echo $this->Form->end(); ?>       
        </div>
    </div>
</div>
<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>
<script type="text/javascript">
    var basePath = "<?php echo Router::url('/'); ?>";
    CKEDITOR.replace('ProductDescription', {
        filebrowserBrowseUrl: basePath + 'js/kcfinder/browse.php?type=files',
        filebrowserImageBrowseUrl: basePath + 'js/kcfinder/browse.php?type=images',
        filebrowserFlashBrowseUrl: basePath + 'js/kcfinder/browse.php?type=flash',
        filebrowserUploadUrl: basePath + 'js/kcfinder/upload.php?type=files',
        filebrowserImageUploadUrl: basePath + 'js/kcfinder/upload.php?type=images',
        filebrowserFlashUploadUrl: basePath + 'js/kcfinder/upload.php?type=flash'
    });

</script>
<br />
<br />
<h4>Add new Product:</h4>
<?php echo $this->Html->link('Add new Product', array('controller' => 'products', 'action' => 'add', $product['Product']['id']), array('class' => 'btn btn-default')); ?>
<script type="text/javascript">
    $('#sbtn').off("click").on("click", function () {
        $('#proassociate').val('');
        $('#proassociate').val($('#tokenize').tokenize().toArray());
    });
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
</style>