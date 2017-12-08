<div class="content">
    <div class="header">
        <h1 class="page-title">Add Restaurant</h1>
        <ul class="breadcrumb">
            <li>
                <a href="
                    <?php echo $this->Html->url(array('controller' => 'Restaurants', 'action' => 'admin_index')); ?>">Restaurant Management
                </a>
            </li>
            <li class="active">Add Restaurant</li>
        </ul>
    </div>
    <div class="main-content">
        <p>
            <?php $x=$this->Session->flash(); ?>
            <?php if($x){ ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong>
                <?php echo $x; ?>
            </div>
            <?php } ?>
        </p>
        <div class="row">
            <div class="col-md-4">
<div class="dishes form">
<?php echo $this->Form->create('Dish'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Dish'); ?></legend>
	<?php
		echo $this->Form->input('cat_id');
		echo $this->Form->input('restaurant_id');
		echo $this->Form->input('name');
		echo $this->Form->input('dish_image');
		echo $this->Form->input('details');
		echo $this->Form->input('descrption');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('status');
		echo $this->Form->input('is_deleted');
                echo $this->Form->input('ingredient');
                echo $this->Form->input('price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Dishes'), array('action' => 'index')); ?></li>
	</ul>
</div>
