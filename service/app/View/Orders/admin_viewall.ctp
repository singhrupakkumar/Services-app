<!--<h3>Restaurant All orders Details</h3>
<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <th>Restaurant Name</th>
        <th>Total Table Reservation</th>
        <th>Total Delivery Orders</th>
        <th>All Pickup Orders</th>
        <th>All Qrcode Orders</th>
        <th>All Orders</th>
    </tr>   
   <?php  foreach ($alldata['Order'] as $order): ?>
            <tr>
                <td><?php echo h($order['name']); ?></td>
                <td><?php echo h($order['table_reservation']); ?></td>           
                
                <td><?php echo h($order['delivery']); ?></td> 
                <td><?php echo h($order['pickup']); ?></td> 
                 <td><?php echo h($order['qrcode']); ?></td> 
                 <td><?php echo h($order['allorders']); ?></td>     
         
            </tr>
<?php endforeach; ?>
</table>-->
<!--<h3>Restaurant Commission details</h3>
<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <th>Restaurant Name</th>
       
        <th>Commission Delivery Order(%)</th>
        <th>Commission Pickup Order(%)</th>
         <th>Commission Qrcode Order(%)</th>
        <th>Commission Table Reservation Order(%)</th>
        
    </tr>
            <tr>
                <td><?php echo $rdata['Restaurant']['name']; ?></td>
                       
                <td><?php echo $rdata['Restaurant']['commission_del']; ?></td> 
                <td><?php echo $rdata['Restaurant']['commission_pick']; ?></td> 
                <td><?php echo $rdata['Restaurant']['commission_qr']; ?></td>                   
                 <td><?php echo $rdata['Restaurant']['commission_tr']; ?></td> 
                    
         
            </tr>

</table>-->
<h2><a href="<?php echo $this->webroot ?>/tests/dowloadexcelbyid/<?php echo $rdata['Restaurant']['id'] ;?>">Download</a></h2>
<h3>All Orders amount</h3>
<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <th>Restaurant Name</th>       
      
        <th>Total Pickup amount</th>
       
        <th>Total Dining amount</th>   
    </tr>
     <?php  foreach ($alldata['Order'] as $order): ?>
        <tr>
                <td><?php echo h($order['name']); ?></td>          
                <td><?php echo h($order['ptotal']); ?></td> 
                <td><?php echo h($order['trtotal']); ?></td> 
                
            </tr>  
            <?php endforeach; ?>

</table>
<h3>Commission amount</h3>
<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <th>Restaurant Name</th>       
        <th>Pickup amount</th>
        <th>Dining amount</th>   
    </tr>
     <?php  foreach ($alldata['Order'] as $order): ?>
        <tr>
                <td><?php echo h($order['name']); ?></td>      
                <td><?php echo h(($order['ptotal']*$rdata['Restaurant']['commission_pick'])/100); ?></td> 
                <td><?php echo h(($order['trtotal']*$rdata['Restaurant']['commission_tr'])/100); ?></td> 
            </tr>  
            <?php endforeach; ?>

</table>