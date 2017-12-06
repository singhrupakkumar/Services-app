<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box form_sec">
        <div class="box-header">
          <h3 class="box-title">Earned History</h3>
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
      <th>Total Invited</th>
		  <th>Total Freedrink</th>
		 
		</tr>
    </thead>
    <tbody>
		  <?php
				
				
				//if($plan){
                if(isset($plan)){
                  // echo "<pre>";
                  // print_r($plan);
                  // echo "</pre>";
                
                $counter=0;
                //print_r($plan);exit;
                foreach ($plan as $plans){ 
                    $counter++;
                    ?>
                    <tr>
                    <td><?php echo $counter; ?></td>
				          	<td><?php echo h($plans['User']['name']); ?>&nbsp;</td>
                    <td><?php echo h($plans['0']['counter']); ?>&nbsp;</td>
                    <td><?php echo $plans['User']['total_freedrink']+$plans['User']['redeem_freedrink']; ?>&nbsp;</td>

                          
                        </tr>
                 <?php } } //} ?>
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