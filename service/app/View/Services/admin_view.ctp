<section class="content">
      <div class="row">
        <div class="col-xs-12">
		            <div class="box-header">
              <h3 class="box-title">Static page</h3>
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
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($staticpage['Staticpage']['position']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($staticpage['Staticpage']['title']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= htmlspecialchars($staticpage['Staticpage']['description']); ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?php  if($staticpage['Staticpage']['status']==1) { echo 'Active';}else{echo "Deactive";} ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?php 
         $created = explode(' ', $staticpage['Staticpage']['created']);
         $date1 = str_replace('-', '/', $created[0]);
         echo date('m-d-Y',strtotime($date1)); ?></td>
        </tr>
       
    </table>
   
   
</div>
 </div>
</div>
 </div>

</section>

                       
