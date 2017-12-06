<div class="dishSubcats view">
<h2 style="padding-left:15px;"><?php echo __('Dish Subcat'); ?></h2>
	<dl class="cats_view">
    
		<div class="view_data">
        <dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['id']); ?>
			&nbsp;
		</dd>
        </div>
        
        <div class="view_data">
		<dt><?php echo __('Dish Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dishSubcat['DishCategory']['name'], array('controller' => 'dish_categories', 'action' => 'view', $dishSubcat['DishCategory']['id'])); ?>
			&nbsp;
		</dd>
        </div>
        
		<div class="view_data">
        <dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['name']); ?>
			&nbsp;
		</dd>
        </div>
                 
         <div class="view_data">
         <dt> <?php echo __('Image'); ?></dt>
         <dd>
         <img src="<?php echo $this->webroot;?>files/subcatimage/<?php echo $dishSubcat['DishSubcat']['image']; ?>" width="100" height="100"/>
			&nbsp;
          </dd>
          </div>
		
		<div class="view_data">
        <dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['created']); ?>
			&nbsp;
		</dd>
        </div>
        
		<div class="view_data">
        <dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($dishSubcat['DishSubcat']['modified']); ?>
			&nbsp;
		</dd>
        </div>

                
	</dl>
</div>
<div class="actions">
	<h3 style="width:100%;float:left;"><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dish Subcat'), array('action' => 'edit', $dishSubcat['DishSubcat']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dish Subcat'), array('action' => 'delete', $dishSubcat['DishSubcat']['id']), array(), __('Are you sure you want to delete # %s?', $dishSubcat['DishSubcat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dish Subcats'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Subcat'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dish Categories'), array('controller' => 'dish_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Category'), array('controller' => 'dish_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>

<style>
.cats_view{
width: 96%;
float: left;
background: #fff;
padding: 10px;
margin: 0 2%;
}
.cats_view dt {
    width: 20%;
    float: left;
}
.cats_view dd {
    width: 80%;
    float: left;
}
.view_data {
    width: 100%;
    float: left;
    border-bottom: 1px solid #ccc;
    padding: 10px 0;
}
</style>