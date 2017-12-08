<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box form_sec">
        <div class="box-header">
          <h3 class="box-title">Drink History</h3>
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
                <th>Bar Name</th>
                <th>Drink Name</th>
                <th>Created</th>
              </tr>
            </thead>
            <tbody>
              <?php
           
                if(isset($plan)){
                // echo "<pre>";
                // print_r($plan);
                // echo "</pre>";

                  $counter=0;
                  foreach ($plan as $plans){ 
                    $counter++;
                    ?>
                    <tr>
                      <td><?php echo $counter; ?></td>
                      <td><?php echo h($plans['User']['name']); ?></td>
                      <td><a target="_blank" href="<?php echo $this->Html->url(array('controller'=>'restaurants','action'=>'admin_view',$plans[Restaurant]['id'])) ?>"><?php echo h($plans['Restaurant']['name']); ?></a></td>
                      <td><a target="_blank" href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'admin_resview',$plans[Product]['id'])) ?>"><?php echo h($plans['Product']['name']); ?></a></td>

                      <td><?php echo h($plans['UserDrink']['created']); ?></td>

                    </tr>
                    <?php } 
                  } 
             ?>
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