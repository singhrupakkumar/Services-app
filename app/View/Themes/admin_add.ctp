<h2>Add Theme</h2>
<br />
<div class="row">
    <div class="col-sm-5">
    <div class="add_dish">
        <?php echo $this->Form->create('Theme', array('type' => 'file', 'id' => 'addpro')); ?>
        
        <?php echo $this->Form->input('title', array('class' => 'form-control')); ?>                
        <br />
        <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('image', array('type' => 'file', 'class' => 'form-control', 'label' => 'Image:')); ?>
        <br />
        <?php echo $this->Form->input('full_image', array('type' => 'file', 'class' => 'form-control', 'label' => 'Full Image:')); ?>
        <br />
        
        <div class="check_box">
            <?php echo $this->Form->input('active', array('type' => 'checkbox')); ?>
        </div>
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
        <?php echo $this->Form->end(); ?>
        <br />
        <br />
    </div>
</div>
</div>
<br />
<br />

<h3>Actions</h3>

<?php echo $this->Html->link('Lsit of Themes', array('action' => 'index'), array('class' => 'btn btn-default')); ?>

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