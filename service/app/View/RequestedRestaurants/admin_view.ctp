<h2>Requested Restaurant</h2>
<?php //debug($assoproduct);
//debug($product);
?>
<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <td>Id</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['id']); ?></td>
    </tr>

    <tr>
        <td>Restaurant Name</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['restaurant_name']); ?></td>
    </tr>
    <tr>
        <td>User Name</td>
        <td><?php echo h($RequestedRestaurant['User']['name']); ?></td>
    </tr>
    <tr>
        <td>Theme</td>
        <td><?php echo h($RequestedRestaurant['Theme']['title']); ?></td>
    </tr>

    <tr>
        <td>Description</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['description']); ?></td>
    </tr>
    <tr>
        <td>Image</td>
        <td>
            <?php echo $this->Html->Image('/files/restaurants/' . $RequestedRestaurant['RequestedRestaurant']['logo'], array('width' => 100, 'height' => 100, 'alt' => $product['Product']['image'], 'class' => 'image')); ?>
            </td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['address']); ?></td>
    </tr>
    <tr>
        <td>City</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['city']); ?></td>
    </tr>
    <tr>
        <td>State</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['state']); ?></td>
    </tr>
    <tr>
        <td>Zip</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['zip']); ?></td>
    </tr>
      <tr>
        <td>Phone</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['phone']); ?></td>
    </tr>
    <tr>
        <td>Owner Name</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['owner_name']); ?></td>
    </tr>
    <tr>
        <td>Owner Phone</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['owner_phone']); ?></td>
    </tr>
    <tr>
        <td>Owner Email</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['owner_email']); ?></td>
    </tr>
    <tr>
        <td>Website</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['website']); ?></td>
    </tr>
    <tr>
        <td>Latitude</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['latitude']); ?></td>
    </tr>
    <tr>
        <td>Longitude</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['longitude']); ?></td>
    </tr>
    <tr>
        <td>Tax</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['taxes']); ?></td>
    </tr>
    <tr>
        <td>Active</td>
        <td><?php echo $this->Html->link($this->Html->image('icon_' . $RequestedRestaurant['RequestedRestaurant']['active'] . '.png'), array('controller' => 'products', 'action' => 'switch', 'active', $RequestedRestaurant['RequestedRestaurant']['id']), array('class' => 'status', 'escape' => false)); ?></td>
    </tr>
    <tr>
        <td>Created</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['created']); ?></td>
    </tr>
    <tr>
        <td>Modified</td>
        <td><?php echo h($RequestedRestaurant['RequestedRestaurant']['modified']); ?></td>
    </tr>
</table>
<h3>Actions</h3>
<?php echo $this->Html->link('Edit Request', array('action' => 'edit', $RequestedRestaurant['RequestedRestaurant']['id']), array('class' => 'btn btn-default')); ?>
&nbsp; &nbsp;
<?php echo $this->Form->postLink('Delete Request', array('action' => 'delete', $RequestedRestaurant['RequestedRestaurant']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $RequestedRestaurant['RequestedRestaurant']['id'])); ?>
<br/>