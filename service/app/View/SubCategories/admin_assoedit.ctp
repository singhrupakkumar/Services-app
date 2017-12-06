<div class="dishSubcats form">
<?php echo $this->Form->create('DishSubcat',array('type'=>'file')); ?>
	<fieldset>
		<legend style="padding-left:15px;"><?php echo __('Admin Edit Dish Subcat'); ?></legend>
	<div class="subcats_frm">
	<?php
		echo $this->Form->input('id');
		 echo $this->Form->input('dish_catid', ['options' => $dishCategories, 'label' => 'Dish Category Name:']); 
		echo $this->Form->input('name');
		//echo $this->Form->input('status');
	?>
                <?php 
        
        echo $this->Form->input('image',array('type'=>'file'));
        ?>
         <div class="sub_cat">
         <img src="<?php echo $this->webroot;?>files/subcatimage/<?php echo $this->request->data['DishSubcat']['image']; ?>" width="100" height="100"/>
         </div>
        <input type="hidden" value="<?php echo $this->request->data['DishSubcat']['image']; ?>" name="data[DishSubcat][img]"/>
        
        </div>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'assodelete', $this->Form->value('DishSubcat.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('DishSubcat.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Dish Subcats'), array('action' => 'assoindex')); ?></li>
		<li><?php echo $this->Html->link(__('List Dish Categories'), array('controller' => 'dish_categories', 'action' => 'assoindex')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Category'), array('controller' => 'dish_categories', 'action' => 'assoadd')); ?> </li>
	</ul>
</div>

<style>
#DishSubcatAdminAssoeditForm .input{
	width:100%;
	float:left;
	padding: 10px;
	}
#DishSubcatAdminAssoeditForm .input label {
    width: 30%;
    float: left;
	margin-bottom: 15px;
}
.input.file input {
    width: 70%;
	float: left;
}
.subcats_frm{
    width: 96%;
    margin: 0 2%;
    background: #fff;
    float: left;
}
.submit input{
	margin-left:15px;
	margin-top:15px;
	color:#fff;
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
	background-color: #00a65a;
	border-color: #008d4c;
}
.sub_cat{
    float: left;
    width: 40%;
    text-align: right;
    margin-bottom: 10px;
}

</style>