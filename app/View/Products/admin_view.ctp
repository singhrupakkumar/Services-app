<h2>Product</h2>
<?php //debug($assoproduct);
//debug($product);
?>
<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <td>Id</td>
        <td><?php echo h($product['Product']['id']); ?></td>
    </tr>

    <tr>
        <td>Name</td>
        <td><?php echo h($product['Product']['name']); ?></td>
    </tr>

    <tr>
        <td>Description</td>
        <td><?php echo h($product['Product']['description']); ?></td>
    </tr>
    <tr>
        <td>Image</td>
        <td>
            <?php echo $this->Html->Image('/files/product/' . $product['Product']['image'], array('width' => 100, 'height' => 100, 'alt' => $product['Product']['image'], 'class' => 'image')); ?>
            </td>
    </tr>
    <tr>
        <td>Price</td>
        <td><?php echo h($product['Product']['price']); ?></td>
    </tr>
   <!-- <tr>
        <td>Weight</td>
        <td><?php //echo h($product['Product']['weight']); ?></td>
    </tr>-->

      <tr>
        <td>sizes</td>
        <td><?php echo h($product['Product']['sizes']); ?></td>
    </tr>
    <tr>
        <td>Dish Category</td>
        <td><?php echo h($product['DishCategory']['name']); ?></td>
    </tr>
    <tr>
        <td>Dish Subcat</td>
        <td><?php echo h($product['DishSubcat']['name']); ?></td>
    </tr>
<!--    <tr>
        <td>Active</td>
        <td><?php //echo $this->Html->link($this->Html->image('icon_' . $product['Product']['active'] . '.png'), array('controller' => 'products', 'action' => 'switch', 'active', $product['Product']['id']), array('class' => 'status', 'escape' => false)); ?></td>
    </tr>-->
    <tr>
        <td>Created</td>
        <td><?php echo h($product['Product']['created']); ?></td>
    </tr>
    <tr>
        <td>Modified</td>
        <td><?php echo h($product['Product']['modified']); ?></td>
    </tr>
</table>
<h3>Actions</h3>
<?php echo $this->Html->link('Edit Product', array('action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-default')); ?>
&nbsp; &nbsp;
<?php echo $this->Form->postLink('Delete Product', array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
<br/>
<br/>
<h2>Associated Product</h2>
<?php foreach ($assoproduct as $p):?>
<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <td>Name</td>
        <td><?php echo h($p['PT']['name']); ?></td>
    </tr>

    <tr>
        <td>Description</td>
        <td><?php echo h($p['PT']['description']); ?></td>
    </tr>
    <tr>
        <td>Image</td>
        <td>
            <?php echo $this->Html->Image('/files/product/' . $p['PT']['image'], array('width' => 100, 'height' => 100, 'alt' => $p['PT']['image'], 'class' => 'image')); ?>
            </td>
    </tr>
    <tr>
        <td>Price</td>
        <td><?php echo h($p['PT']['price']); ?></td>
    </tr>
    <tr>
        <td>Dish Category</td>
        <td><?php echo h($p['dish_categories']['name']); ?></td>
    </tr>
    <tr>
        <td>Dish Subcat</td>
        <td><?php echo h($p['dish_subcats']['name']); ?></td>
    </tr>
</table><br/>
<br/>

<?php endforeach;?>
<h2>Associated Alergy</h2>
 <?php foreach ($alrgitems as $p):
?>
<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <td>Name</td>
        <td><?php echo h($p['Alergy']['name']); ?></td>
    </tr>
     <tr>
        <td>About</td>
        <td><?php echo h($p['Alergy']['about']); ?></td>
    </tr>

</table><br/>
<?php endforeach; ?>