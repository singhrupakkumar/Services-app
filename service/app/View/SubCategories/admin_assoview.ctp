<h2 style="padding-left:15px;"><?php echo __('Dish Subcat'); ?></h2>
<div class="dishSubcats view">

	<dl>
		<div style="border-top:1px solid #ccc;"class="mainss">
        <dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['id']); ?>
			&nbsp;
		</dd>
        </div>
        
        <div class="mainss">
		<dt><?php echo __('Dish Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dishSubcat['DishCategory']['name'], array('controller' => 'dish_categories', 'action' => 'view', $dishSubcat['DishCategory']['id'])); ?>
			&nbsp;
		</dd>
        </div>
        
        <div class="mainss">
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['name']); ?>
			&nbsp;
		</dd>
        </div>
        
        <div class="mainss">
        
             <dt><?php echo __('Image'); ?></dt>
              <dd><img src="<?php echo $this->webroot;?>files/subcatimage/<?php echo $dishSubcat['DishSubcat']['image']; ?>" width="100" height="100"/>
			</dd>&nbsp;
		
        </div>
        
		<div class="mainss">
        <dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['created']); ?>
			&nbsp;
		</dd>
        </div>
        
        <div class="mainss">
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['modified']); ?>
			&nbsp;
		</dd>
		</div>
                
	</dl>
</div>
<div style="width:100%;float:left;" class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dish Subcat'), array('action' => 'assoedit', $dishSubcat['DishSubcat']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dish Subcat'), array('action' => 'assodelete', $dishSubcat['DishSubcat']['id']), array(), __('Are you sure you want to delete # %s?', $dishSubcat['DishSubcat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dish Subcats'), array('action' => 'assoindex')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Subcat'), array('action' => 'assoadd')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dish Categories'), array('controller' => 'dish_categories', 'action' => 'assoindex')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Category'), array('controller' => 'dish_categories', 'action' => 'assoadd')); ?> </li>
	</ul>
</div>

<style>

dt {
    float: left;
    width: 30%;
    padding: 15px;
}
dd {
    width: 70%;
    float: left;
	padding: 15px;
}
.dishSubcats.view {
    width: 96%;
    float: left;
    background: #fff;
    margin: 0 2%;
	padding:15px;
}
.mainss {
    width: 100%;
    float: left;
    border-bottom: 1px solid #ccc;
	border-right: 1px solid #ccc;
	border-left: 1px solid #ccc;
}
</style>