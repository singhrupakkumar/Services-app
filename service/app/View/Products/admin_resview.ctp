<h2 style="padding-left:15px;">View Drink</h2>

<table class="table-striped table-bordered table-condensed table-hover customs_boxed">
    <tr>
        <td>Id</td>
        <td><?php echo h($product['Product']['id']); ?></td>
    </tr>

    <tr>
        <td>Name</td>
        <td><?php echo h($product['Product']['name']); ?></td>
    </tr>

     <tr>
        <td>Category</td>
        <td><?php echo h($product['Product']['category']); ?></td>
    </tr>

    <tr>
        <td>Description</td>
        <td><?php echo h($product['Product']['description']); ?></td>
    </tr>
    <tr>
        <td>Ingredients</td>
        <td><?php echo h($product['Product']['ingredients']); ?></td>
    </tr>
    <tr>
        <td>Image</td>
        <td>
            <?php echo $this->Html->Image('/files/product/' . $product['Product']['image'], array('width' => 100, 'height' => 100, 'alt' => $product['Product']['image'], 'class' => 'image')); ?>
            </td>
    </tr>
    <tr>
        <td>Price - (EUR)</td>
        <td><?php echo h($product['Product']['price']); ?></td>
    </tr> 
     <tr>
        <td>Quantity</td>
        <td><?php echo h($product['Product']['quantity']); ?></td>
    </tr>
    
   
</table>

<h3 style="padding-left:15px;">Actions</h3>
<?php echo $this->Html->link('Edit Drink', array('action' => 'resedit', $product['Product']['id']), array('class' => 'btn btn-default')); ?>
&nbsp; &nbsp;
<?php echo $this->Form->postLink('Delete Drink', array('action' => 'resdelete', $product['Product']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
<br/>
<br/>
 <style>
.btn.btn-default{
	margin-left:15px;
	}
	
.customs_boxed {
    background: #fff;
    padding: 15px;
    width: 96%;
	margin:0 auto;
}
 </style>