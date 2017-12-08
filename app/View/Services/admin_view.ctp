<section class="content">
      <div class="row">
        <div class="col-xs-12">
		            <div class="box-header">
              <h3 class="box-title">Service</h3>
            </div>
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
        <p>
            <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong>Success!</strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
        </p>
 <table class="table table-bordered table-hover dataTable">
 <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($service['Service']['name']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($service['Category']['name']); ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Subh Category') ?></th>
            <td><?= h($service['SubCategory']['name']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= htmlspecialchars($service['Service']['description']); ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?php  if($service['Service']['status']==1) { echo 'Active';}else{echo "Deactive";} ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?php 
         $created = explode(' ', $service['Service']['created']);
         $date1 = str_replace('-', '/', $created[0]);
         echo date('m-d-Y',strtotime($date1)); ?></td>
        </tr>
       
    </table>
   
   
</div>
 </div>
</div>
 </div>

</section>

                       
