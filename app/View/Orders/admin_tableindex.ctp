<h2 style="margin-left:15px;">Table Reserve</h2>
<div class="table-responsive">
     <?php if($loggedUserRole!='rest_admin'){ //print_r($orders); exit;
     echo $this->Form->create('Order', array('controller'=>'orders','action'=>'tableindex')); ?>
    <div class="col-lg-2"> 
    <?php echo $this->Form->input('restaurant_id', ['options' => $res, 'label' => false, 'class' => 'form-control', 'empty' => 'Choose Restaurant']); ?>
</div>
<div class="col-lg-2">
    <?php
    echo $this->Form->input('filter', array(
        'label' => false,
        'class' => 'form-control',
        'options' => array(
            'id' => 'Order ID',
            'phone' => 'Phone',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
        ),
        'selected' => $all['filter']
    ));
    ?>
</div>
    <div class="col-lg-2">
        <?php echo $this->Form->input('name', array('label' => false, 'id' => false, 'class' => 'form-control', 'value' => $all['name'])); ?>
    </div>
   <div class="col-lg-4">
        <?php echo $this->Form->button('Search', array('class' => 'btn btn-default')); ?>
        &nbsp; &nbsp;
        <?php echo $this->Html->link('View All', array('controller' => 'orders', 'action' => 'tablereset', 'admin' => true), array('class' => 'btn btn-danger')); ?>

    </div><br/><br/>
     <?php }?>
    <table style="background:#fff;margin:0 auto;width:97%;" class="table table-striped table-bordered table-condensed table-hover">
        <tr>
            <th><?php echo $this->Paginator->sort('Order ID'); ?></th>
            <th><?php echo $this->Paginator->sort('Restaurant name'); ?></th>
            <th><?php echo $this->Paginator->sort('First Name'); ?></th>
            <th><?php echo $this->Paginator->sort('Last Name'); ?></th>
            <th><?php echo $this->Paginator->sort('E-mail'); ?></th>
            <th><?php echo $this->Paginator->sort('Phone'); ?></th>
           <!-- <th><?php //echo $this->Paginator->sort('Address'); ?></th>-->
            <th><?php echo $this->Paginator->sort('Advanced payment'); ?></th>
            <th><?php echo $this->Paginator->sort('Payment Status'); ?></th>
            <th><?php echo $this->Paginator->sort('Date'); ?></th>
            <th><?php echo $this->Paginator->sort(' Time'); ?></th>
          <!--  <th><?php //echo $this->Paginator->sort('Notes'); ?></th>-->
            <th><?php echo $this->Paginator->sort('No. of people'); ?></th>           
            <!--<th><?php //echo $this->Paginator->sort('table_no'); ?></th>-->
             <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th>Actions</th>
        </tr>
<?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo h($order['TableReservation']['id']); ?></td>
                <td><?php echo h($order['Restaurant']['name']); ?></td>
                <td><?php echo h($order['TableReservation']['fname']); ?></td>
                <td><?php echo h($order['TableReservation']['lname']); ?></td>
                <td><?php echo h($order['TableReservation']['email']); ?></td>
                <td><?php echo h($order['TableReservation']['phone']); ?></td>
                 <!--<td><?php //echo h($order['TableReservation']['address']); ?></td>-->
                <td><?php echo h($order['TableReservation']['total']); ?></td>
                <td><?php echo h($order['TableReservation']['pstatus']); ?></td>            
                <td><?php echo $order['TableReservation']['d_day']; ?></td>
                <td><?php echo h($order['TableReservation']['d_time']); ?></td>
                <!--<td><?php //echo h($order['TableReservation']['notes']); ?></td>-->
                <td><?php echo h($order['TableReservation']['no_of_people']); ?></td>
              <!--  <td><?php //echo h($order['TableReservation']['table_no']); ?></td>-->
                <td><?php echo h($order['TableReservation']['created']); ?></td>
                <td class="actions">
                        <?php echo $this->Html->link('View', array('action' => 'tableview', $order['TableReservation']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                        <?php echo $this->Html->link('Edit', array('action' => 'tableedit', $order['TableReservation']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                    <select name="dlsts" class="dlsts">
                        <?php  if ($order['TableReservation']['dl_status'] == 0) { ?>
                            <option value="<?php  echo $order['TableReservation']['uid'] . '-' . $order['TableReservation']['id']; ?>-1" selected>Pending</option>
                        <?php  } if ($order['TableReservation']['dl_status'] == 1) { ?>
                            <option value="<?php echo $order['TableReservation']['uid'] . '-' . $order['TableReservation']['id']; ?>-1" selected>Confirmed</option>
                        <?php  } else { ?>
                            <option value="<?php echo $order['TableReservation']['uid'] . '-' . $order['TableReservation']['id']; ?>-1">Confirmed</option>
                        <?php  } if ($order['TableReservation']['dl_status'] == 2) { ?>
                            <option value="<?php echo $order['TableReservation']['uid'] . '-' . $order['TableReservation']['id']; ?>-2" selected>Cancelled</option>
                        <?php  } else { ?>
                            <option value="<?php echo $order['TableReservation']['uid'] . '-' . $order['TableReservation']['id']; ?>-2">Cancelled</option>
                        <?php  } if ($order['TableReservation']['dl_status'] == 3) { ?>
                            <option value="<?php echo $order['TableReservation']['uid'] . '-' . $order['TableReservation']['id']; ?>-3" selected>Delivered</option>
                        <?php } else { ?>
                            <option value="<?php echo $order['TableReservation']['uid'] . '-' . $order['TableReservation']['id']; ?>-3">Delivered</option>
    <?php } ?>

                    </select>

                </td>
            </tr>
<?php endforeach; ?>
    </table>
</div>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />
<script type="text/javascript">
    $(".dlsts").change(function () {
        var a = $(this).val();
        $.post('http://readyto.com/admin/orders/dlstastable', {id: a}, function (d) {
            console.log(d);
        });
        //alert(a);
    });
</script>
