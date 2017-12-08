<h2>Admin Edit RequestedRestaurant</h2>
<br />
<div class="row">
    <div class="col-sm-5">
        <div class="add_dish">
            <?php echo $this->Form->create('RequestedRestaurant', array('type' => 'file')); ?>
            <?php echo $this->Form->input('id'); ?>
            <?php // echo $this->Form->input('res_id', ['options' => $restaurants, 'label' => 'Restaurant Name:']); ?>

            <?php echo $this->Form->input('restaurant_name', array('class' => 'form-control')); ?>
            
            <?php echo $this->Form->input('user_id', array('class' => 'form-control')); ?>
            
            <?php echo $this->Form->input('theme_id', array('class' => 'form-control')); ?>
            
            <?php echo $this->Form->input('description', array('class' => 'form-control ckeditor')); ?>

            <?php
            echo $this->Html->Image('/files/restaurants/' . $RequestedRestaurant['RequestedRestaurant']['logo'], array('width' => 100, 'height' => 100, 'alt' => $RequestedRestaurant['RequestedRestaurant']['logo'], 'class' => 'image'));
            echo $this->Form->input('image', array('type' => 'file', 'class' => 'form-control'));
            ?>

            <?php echo $this->Form->input('phone', array('class' => 'form-control')); ?>

            <?php echo $this->Form->input('owner_name', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('owner_phone', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('owner_email', array('class' => 'form-control')); ?>
            
            <?php echo $this->Form->input('website', array('class' => 'form-control')); ?>

            <?php echo $this->Form->input('address', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('city', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('state', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('zip', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('latitude', array('class' => 'form-control')); ?>
            <?php echo $this->Form->input('longitude', array('class' => 'form-control')); ?>
            
            <?php echo $this->Form->input('taxes', array('class' => 'form-control')); ?>
            <div class="check_box">
                <?php echo $this->Form->input('active', array('type' => 'checkbox')); ?>
            </div>
            
            <?php //echo $this->Form->input('Created', array('class' => 'form-control')); ?>
            <?php //echo $this->Form->input('Modified', array('class' => 'form-control')); ?>
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