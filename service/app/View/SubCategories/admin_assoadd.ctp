<div class="row">
<div class="col-sm-6">
<div class="dishSubcats form headng sub_dish box_register">
<?php echo $this->Form->create('DishSubcat',array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Dish Subcat'); ?></legend>
	<?php
                echo $this->Form->input('dish_catid', ['options' => $dishCategories, 'label' => 'Dish Category Name:']); 
		echo $this->Form->input('name',array('type'=>'text'));
		echo $this->Form->input('isshow',array('type'=>'hidden','value'=>'1'));
                 echo $this->Form->input('image',array('type'=>'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>

<div class="col-sm-12">
<div class="actions action_menu">
	<h3 class="headng"><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Dish Subcats'), array('action' => 'assoindex')); ?></li>
		<li><?php echo $this->Html->link(__('List Dish Categories'), array('controller' => 'dish_categories', 'action' => 'assoindex')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Category'), array('controller' => 'dish_categories', 'action' => 'assoadd')); ?> </li>
	</ul>
</div>
</div>
</div>
<style>
#DishSubcatAdminAssoaddForm .input.select label{
	width:50%;
	}
#DishSubcatDishCatid{
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
</style>