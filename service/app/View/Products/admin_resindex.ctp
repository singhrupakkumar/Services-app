<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>


   <!--  <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
       
    </section> -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box form_sec">
            <div class="box-header">
              <h3 class="box-title"><?php echo $Restaurant['Restaurant']['name']; ?> - Free Drinks</h3> 
            </div>


    <div class="main-content">

      <?php echo $this->Html->link('Add Drink', array('controller' => 'restaurants','action' => 'addproduct', $resid), array('class' => 'btn btn-primary')); ?>

        <?php $x = $this->Session->flash(); ?>
        <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php } ?>



<!--  -->

<br>
<br>
<div class="restaurants index">
<table id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
 <thead>
    <tr>
        <th>Sr. No.</th>
        <th><?php echo $this->Paginator->sort('name'); ?></th>
        <th><?php echo $this->Paginator->sort('category'); ?></th>
        <th><?php echo $this->Paginator->sort('image'); ?></th>
        <th><?php echo $this->Paginator->sort('price'); ?> - (EUR)</th>
        <th><?php echo $this->Paginator->sort('quantity'); ?></th>        
        <th class="actions">Actions</th>
    </tr>
     </thead>
      <tbody>
    <?php 

    $counter = 0;
    foreach ($products as $product): 
        $counter++;
        ?>
    <tr>
        <td><?= $counter ?></td>

        <td><span class="name" data-value="<?php echo $product['Product']['name']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['name']; ?></span></td>
        <td><span class="name" data-value="<?php echo $product['Product']['category']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['category']; ?></span></td>

        <td><?php echo $this->Html->Image('/files/product/' . $product['Product']['image'], array('width' => 100, 'height' => 100, 'alt' => $product['Product']['image'], 'class' => 'image')); ?></td>
       

        
        <td><span class="price" data-value="<?php echo $product['Product']['price']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['price']; ?></span></td>
        <td><span class="quantity" data-value="<?php echo $product['Product']['quantity']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['quantity']; ?></span></td>
       
        <td class="actions">
            <?php echo $this->Html->link('View', array('action' => 'resview', $product['Product']['id']), array('class' => 'btn btn-default btn-xs')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'resedit', $product['Product']['id']), array('class' => 'btn btn-default btn-xs')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
     </tbody>
</table>

</div>
</div>
</div>
</div>
</div>
</section>

<script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>