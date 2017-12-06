<h2>Orders</h2>
<div class="table-responsive">
     <?php if($loggedUserRole!='rest_admin'){//print_r($orders); exit;
     echo $this->Form->create('Order', array()); ?>
    <div class="col-lg-2"> 
    <?php echo $this->Form->input('restaurant_id', ['options' => $res, 'label' => false, 'class' => 'form-control', 'empty' => 'Choose Restaurant']); ?>   
</div>
    <div class="col-lg-2">
       <input type="date" name="data[Order][date]" /> 
    </div>
    <div class="col-lg-2">
         <input type="date" name="data[Order][date1]"/>
    </div>   
   <div class="col-lg-4">
        <?php echo $this->Form->button('Search', array('class' => 'btn btn-default')); ?>
        &nbsp; &nbsp;
        <?php echo $this->Html->link('View All', array('controller' => 'orders', 'action' => 'indexall', 'admin' => true), array('class' => 'btn btn-danger')); ?>
         <?php echo $this->Html->link('Download All Report', array('controller' => 'tests', 'action' => 'dowloadexcel','admin' => false), array('class' => 'btn btn-danger')); ?>
    </div><br/><br/>
    <?php } else {
      echo $this->Form->create('Order', array());   
        ?>
    <div class="col-lg-2">
       <input type="date" name="data[Order][date]" /> 
       <input type="hidden" name="data[Order][resname]"  value="restaurant"/> 
    </div>
    <div class="col-lg-2">
         <input type="date" name="data[Order][date1]"/>
    </div> 
    <?php } echo $this->Form->button('Search', array('class' => 'btn btn-default')); ?>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <tr>
            <th><?php echo $this->Paginator->sort('Store Name'); ?></th>
             
            <th><?php echo $this->Paginator->sort('Total Dining'); ?></th>
            
             
              <th><?php echo $this->Paginator->sort('All Pickup Orders'); ?></th>
                <th><?php echo $this->Paginator->sort('All Orders'); ?></th>

          <?php if($loggeduser!=427 ){   ?>
            <th>Actions</th>
            <?php } ?>
        </tr>
<?php foreach ($alldata['Order'] as $order): ?>
            <tr>
                <td><?php echo h($order['name']); ?></td>
                 
                <td><?php echo h($order['table_reservation']); ?></td>           
                
                
                <td><?php echo h($order['pickup']); ?></td> 
                 <td><?php echo h($order['allorders']); ?></td>
                
                <td class="actions">
                        <?php echo $this->Html->link('View', array('action' => 'viewall', $order['id']), array('class' => 'btn btn-default btn-xs')); ?>                                 

                </td>
                 
            </tr>
<?php endforeach; ?>
    </table>
</div>
<br />
<?php //echo $this->element('pagination-counter'); ?>

<?php //echo $this->element('pagination'); ?>
<br />
<br />
