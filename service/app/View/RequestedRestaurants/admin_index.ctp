<?php
echo $this->Html->css(array('bootstrap-editable.css', '/select2/select2.css'), 'stylesheet', array('inline' => false)); ?>
<?php echo $this->Html->script(array('bootstrap-editable.js', '/select2/select2.js'), array('inline' => false)); ?>
<h2>Requests for Restaurant</h2>
<?php // echo "<pre>"; print_r($RequestedRestaurants); echo "</pre>"; //exit;?>
<!--div class="row">
    <?php echo $this->Form->create('Product', array()); ?>
    <?php echo $this->Form->hidden('search', array('value' => 1)); ?>

    <div class="col-lg-1">
        <?php //echo $this->Form->input('active', array('label' => false, 'class' => 'form-control', 'empty' => 'All Status', 'options' => array(1 => 'Active', 0 => 'Not Active'), 'selected' => $all['active'])); ?>
    </div>
       <div class="col-lg-2">
        <?php  echo $this->Form->input('dish_catid', ['options' => $DishCategory, 'label' =>false,'class' => 'form-control','empty'=>'Choose category']);  ?>

    </div>
        <div class="col-lg-2"> 
 <?php  echo $this->Form->input('dish_scatid', ['options' => $DishSubcat, 'label' => false,'class' => 'form-control','empty'=>'Choose sub category']);  ?>

    </div>
    <div class="col-lg-1">
        <?php echo $this->Form->input('filter', array(
            'label' => false,
            'class' => 'form-control',
            'options' => array(
                'name' => 'Name',
                'description' => 'Description',
                'price' => 'Price',
                'created' => 'Created',
            ),
            'selected' => $all['filter']
        )); ?>

    </div>

    <div class="col-lg-2">
        <?php echo $this->Form->input('name', array('label' => false, 'id' => false, 'class' => 'form-control', 'value' => $all['name'])); ?>

    </div>

    <div class="col-lg-4">
        <?php echo $this->Form->button('Search', array('class' => 'btn btn-default')); ?>
        &nbsp; &nbsp;
        <?php echo $this->Html->link('View All', array('controller' => 'products', 'action' => 'reset', 'admin' => true), array('class' => 'btn btn-danger')); ?>

    </div>

    <?php //echo $this->Form->end(); ?>

</div-->

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />

<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <th><?php echo $this->Paginator->sort('logo'); ?></th>
        <th><?php echo $this->Paginator->sort('user_id'); ?></th>
        <th><?php echo $this->Paginator->sort('theme_id'); ?></th>
        <th><?php echo $this->Paginator->sort('restaurant_name'); ?></th>
        <th><?php echo $this->Paginator->sort('description'); ?></th>
        <th><?php echo $this->Paginator->sort('city'); ?></th>
        <th><?php echo $this->Paginator->sort('state'); ?></th>
        <th><?php echo $this->Paginator->sort('active'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th><?php echo $this->Paginator->sort('modified'); ?></th>
        <th class="actions">Actions</th>
    </tr>
    <?php foreach ($RequestedRestaurants as $RequestedRestaurant): ?>
    <tr>
        <td><?php echo $this->Html->Image('/files/restaurants/' . $RequestedRestaurant['RequestedRestaurant']['logo'], array('width' => 100, 'height' => 100, 'alt' => $RequestedRestaurant['RequestedRestaurant']['logo'], 'class' => 'image')); ?></td>
        <td><span class="category" data-value="<?php echo $RequestedRestaurant['User']['id']; ?>" data-pk="<?php echo $RequestedRestaurant['User']['id']; ?>"><?php echo $RequestedRestaurant['User']['name']; ?></span></td>
        <td><span class="brand" data-value="<?php echo $RequestedRestaurant['Theme']['id']; ?>" data-pk="<?php echo $RequestedRestaurant['Theme']['id']; ?>"><?php echo $RequestedRestaurant['Theme']['title']; ?></span></td>
        <td><span class="name" data-value="<?php echo $RequestedRestaurant['RequestedRestaurant']['id']; ?>" data-pk="<?php echo $RequestedRestaurant['RequestedRestaurant']['id']; ?>"><?php echo $RequestedRestaurant['RequestedRestaurant']['restaurant_name']; ?></span></td>
        <td><span class="description" data-value="<?php echo $RequestedRestaurant['RequestedRestaurant']['description']; ?>" data-pk="<?php echo $RequestedRestaurant['RequestedRestaurant']['description']; ?>"><?php echo $RequestedRestaurant['RequestedRestaurant']['description']; ?></span></td>
        <td><span class="price" data-value="<?php echo $RequestedRestaurant['RequestedRestaurant']['city']; ?>" data-pk="<?php echo $RequestedRestaurant['RequestedRestaurant']['city']; ?>"><?php echo $RequestedRestaurant['RequestedRestaurant']['city']; ?></span></td>
        <td><span class="weight" data-value="<?php echo $RequestedRestaurant['RequestedRestaurant']['state']; ?>" data-pk="<?php echo $RequestedRestaurant['RequestedRestaurant']['state']; ?>"><?php echo $RequestedRestaurant['RequestedRestaurant']['state']; ?></span></td>
        <td><?php echo $this->Html->link($this->Html->image('icon_' . $RequestedRestaurant['RequestedRestaurant']['active'] . '.png'), array('controller' => 'requested_restaurants', 'action' => 'switch_active', $RequestedRestaurant['RequestedRestaurant']['id'],$RequestedRestaurant['RequestedRestaurant']['active']), array('class' => 'status', 'escape' => false)); ?></td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['created']); ?></td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['modified']); ?></td>
        <td class="actions">
            <?php echo $this->Html->link('View', array('action' => 'view', $RequestedRestaurant['RequestedRestaurant']['id']), array('class' => 'btn btn-default btn-xs')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $RequestedRestaurant['RequestedRestaurant']['id']), array('class' => 'btn btn-default btn-xs')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />
