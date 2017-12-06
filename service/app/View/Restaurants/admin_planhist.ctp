<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box form_sec">
        <div class="box-header">
          <h3 class="box-title">Plan History</h3>
        </div>
        <div class="main-content">
          <?php $x = $this->Session->flash(); ?>
          <?php if ($x) { ?>
          <div class="alert success">
            <span class="icon"></span>
            <strong></strong><?php echo $x; ?>
          </div>
          <?php }  ?>




 <table style="font-size:12px;" id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
  <thead>
    <tr>
		  <th>Sr. no.</th>
		  <th>User Name</th>
		  <th>Plan Name</th>
		  <th>Payment ID</th>
		  <th>Original Price</th>
      <th>Discount</th>
      <th>Paid Price</th>
		  <th>Created</th>
	</tr>
    </thead>
    <tbody>
		  <?php
				
				
				if($plan){
                if(isset($plan)){
                
                $counter=0;
                //print_r($plan);exit;
                foreach ($plan as $plans){ 
                    $counter++;
                    ?>
                    <tr>
                    <td><?php echo $counter; ?></td>
					<td><?php echo h($plans['User']['name']); ?>&nbsp;</td>
                    <td><?php echo h($plans['SubscriptionPlan']['name']); ?>&nbsp;</td>
                    <td><?php echo h($plans['UserPlan']['payment_id']); ?></td>
<!--                        <td>
                        <?php
                            //$ext = pathinfo($plans['SubscriptionPlan']['image'], PATHINFO_EXTENSION);
                            //if(empty($ext)){
                             //   echo  'No Image';
                            //}
                           // else
                           // {
                              //  echo $this->Html->image($plans['SubscriptionPlan']['image'],array('alt'=>'Not Image','height'=>'70px','width'=>'100px')); 
                            //}
                        ?>
                        </td>-->
            <td><?php echo h($plans['UserPlan']['original_price']); ?>&nbsp;</td>
            <td><?php echo h($plans['UserPlan']['discount']); ?>&nbsp;</td>
						<td><?php echo h($plans['UserPlan']['price']); ?>&nbsp;</td>
						<td><?php echo h($plans['UserPlan']['created']); ?>&nbsp;</td>
                            <!--<td class="actions">
                                <?php //echo $this->Html->link(__('View'), array('action' => 'planview', $plans['SubscriptionPlan']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
                                
                                <?php //echo $this->Html->link(__('Edit'), array('action' => 'planedit', $plans['SubscriptionPlan']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                                
                            </td>-->
                        </tr>
                 <?php } } } ?>
            </tbody>
 
	</tbody>
  </table>
                
    
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