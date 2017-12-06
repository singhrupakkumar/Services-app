
    <!-- Content Header (Page header) -->
   <!--  <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
    </section> --> 
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Plan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php
                // echo "<pre>";
                // print_r($staticpages);
                // echo "</pre>";
            ?>
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
            <td><?= h($staticpage['SubscriptionPlan']['name']); ?></td>
        
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $this->Html->image($staticpage['SubscriptionPlan']['image'],
                           array('alt'=>'SubscriptionPlan Image','style'=>'height:150px;')); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= htmlspecialchars($staticpage['SubscriptionPlan']['description']); ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Price - EUR') ?></th>
            <td><?= htmlspecialchars($staticpage['SubscriptionPlan']['price']); ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Discount - EUR') ?></th>
            <td><?= htmlspecialchars($staticpage['SubscriptionPlan']['discount']); ?></td>
        </tr>
    </table>
</div>
 </div>
</div>
 </div>

</section>

                       
