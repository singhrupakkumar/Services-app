<?php
//echo $resid;
//print_r($DishCategory);
//print_r($DishSubcat);
//exit;
echo $this->Html->css(array('bootstrap-editable.css', '/select2/select2.css'), 'stylesheet', array('inline' => false)); ?>
<?php echo $this->Html->script(array('bootstrap-editable.js', '/select2/select2.js'), array('inline' => false)); ?>
<h2 style="padding-left:15px;">Products</h2>
<div class="row">
    <?php echo $this->Form->create('Product', array()); ?>
    <?php echo $this->Form->hidden('search', array('value' => 1)); ?>

    <div class="col-lg-1">
        <?php //echo $this->Form->input('active', array('label' => false, 'class' => 'form-control', 'empty' => 'All Status', 'options' => array(1 => 'Active', 0 => 'Not Active'), 'selected' => $all['active'])); ?>
    </div>
       <div class="col-lg-2">
        <?php  echo $this->Form->input('dish_catid', ['options' => $DishCategory, 'label' =>false,'class' => 'form-control','empty'=>'Choose category']);  ?>

    </div>
        <div class="col-lg-3"> 
 <?php  echo $this->Form->input('dish_scatid', ['options' => $DishSubcat, 'label' => false,'class' => 'form-control','empty'=>'Choose sub category']);  ?>

    </div>
    <div class="col-lg-2">
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

    <div class="col-lg-2">
        <?php echo $this->Form->button('Search', array('class' => 'btn btn-default')); ?>
        &nbsp; &nbsp;
        <?php echo $this->Html->link('View All', array('controller' => 'products', 'action' => 'assoresreset',$resid, 'admin' => true), array('class' => 'btn btn-danger')); ?>

    </div>

    <?php //echo $this->Form->end(); ?>

</div>

<br />
 <div style="margin-left: 15px;" class="button_outer">
       <?php echo $this->Html->link('Add new item for associate', array('controller' => 'restaurants','action' => 'assoaddproduct', $resid), array('class' => 'btn btn-xs btn-default')); ?>
                    <?php echo $this->Html->link('Add new item for sale', array('controller' => 'restaurants','action' => 'addproduct', $resid), array('class' => 'btn btn-xs btn-default')); ?>
    
                    <?php echo $this->Html->link('Add new category', array('controller' => 'dish_categories', 'action' => 'assoadd'), array('class' => 'btn btn-xs btn-default')); ?>
                    <?php echo $this->Html->link('Add new subcategory', array('controller' => 'dish_subcats', 'action' => 'assoadd'), array('class' => 'btn btn-xs btn-default')); ?>

                </div>
<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />

<table class="table-striped table-bordered table-condensed table-hover customs_boxed">
    <tr>
        <th><?php echo $this->Paginator->sort('image'); ?></th>
        <th><?php echo $this->Paginator->sort('dishcategory_id'); ?></th>
        <th><?php echo $this->Paginator->sort('dishsubcat_id'); ?></th>
        <th><?php echo $this->Paginator->sort('name'); ?></th>
        <th><?php echo $this->Paginator->sort('description'); ?></th>
        <th><?php echo $this->Paginator->sort('price'); ?></th>
        <th><?php echo $this->Paginator->sort('weight'); ?></th>
        <th><?php echo $this->Paginator->sort('size'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th><?php echo $this->Paginator->sort('modified'); ?></th>
        <th class="actions">Actions</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?php echo $this->Html->Image('/files/product/' . $product['Product']['image'], array('width' => 100, 'height' => 100, 'alt' => $product['Product']['image'], 'class' => 'image')); ?></td>
        <td><span class="category" data-value="<?php echo $product['DishCategory']['id']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['DishCategory']['name']; ?></span></td>
        <td><span class="brand" data-value="<?php echo $product['DishSubcat']['id']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['DishSubcat']['name']; ?></span></td>
        <td><span class="name" data-value="<?php echo $product['Product']['name']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['name']; ?></span></td>
        <td><span class="description" data-value="<?php echo $product['Product']['description']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['description']; ?></span></td>
        <td><span class="price" data-value="<?php echo $product['Product']['price']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['price']; ?></span></td>
        <td><span class="weight" data-value="<?php echo $product['Product']['weight']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['weight']; ?></span></td>
                <td><span class="sizes" data-value="<?php echo $product['Product']['sizes']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['sizes']; ?></span></td>
<!--        <td><?php //echo $this->Html->link($this->Html->image('icon_' . $product['Product']['active'] . '.png'), array('controller' => 'products', 'action' => 'switch', 'active', $product['Product']['id']), array('class' => 'status', 'escape' => false)); ?></td>-->
        <td><?php echo h($product['Product']['created']); ?></td>
        <td><?php echo h($product['Product']['modified']); ?></td>
        <td class="actions">
            <?php echo $this->Html->link('View', array('action' => 'assoresview', $product['Product']['id']), array('class' => 'btn btn-default btn-xs')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'assoresedit', $product['Product']['id']), array('class' => 'btn btn-default btn-xs')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />

<style>
.customs_boxed {
    background: #fff;
    padding: 15px;
    width: 97%;
    margin: 0 auto;
}
</style>