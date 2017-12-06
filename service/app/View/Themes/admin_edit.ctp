<h2>Admin Edit Theme</h2>
<br />
<div class="row">
    <div class="col-sm-5">
        <div class="add_dish">
            <?php echo $this->Form->create('Theme', array('type' => 'file')); ?>
            <?php echo $this->Form->input('id'); ?>

            <?php echo $this->Form->input('title', array('class' => 'form-control')); ?>

            <?php echo $this->Form->input('description', array('class' => 'form-control ckeditor')); ?>
            <?php
            echo $this->Html->Image('/files/themes/' . $theme['Theme']['image'], array('width' => 100, 'height' => 100, 'alt' => $theme['Theme']['image'], 'class' => 'image'));
            echo $this->Form->input('image', array('type' => 'file', 'class' => 'form-control'));
            ?>
            
            <?php
            echo $this->Html->Image('/files/themes/' . $theme['Theme']['full_image'], array('width' => 100, 'height' => 100, 'alt' => $theme['Theme']['full_image'], 'class' => 'image'));
            echo $this->Form->input('full_image', array('type' => 'file', 'class' => 'form-control'));
            ?>
            
            <div class="check_box">
                <?php //echo $this->Form->input('active', array('type' => 'checkbox')); ?>
            </div>
            
            <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
            <?php echo $this->Form->end(); ?>       
        </div>
    </div>
</div>
<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>
<script type="text/javascript">
    var basePath = "<?php echo Router::url('/'); ?>";
    CKEDITOR.replace('ThemeDescription', {
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
<h4>Add new Theme:</h4>
<?php echo $this->Html->link('Add new Theme', array('controller' => 'themes', 'action' => 'add'), array('class' => 'btn btn-default')); ?>
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