 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Review</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
 <table class="table table-bordered table-hover dataTable">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?=h($time['Review']['id']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Restaurant') ?></th>
            <td><?= $time['Restaurant']['name']; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Review') ?></th>
            <td><?= h($time['Review']['name']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($time['Review']['email']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Text') ?></th>
            <td><?= h($time['Review']['text']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Food Quality') ?></th>
            <td><?= h($time['Review']['food_quality']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Punctuality') ?></th>
            <td><?= h($time['Review']['punctuality']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($time['Review']['price']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Courtesy') ?></th>
            <td><?= h($time['Review']['courtesy']); ?></td>
        </tr>
 <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($time['User']['name']); ?></td>
        </tr>
 <tr>
            <th scope="row"><?= __('created') ?></th>
            <td><?= h($time['Review']['created']); ?></td>
        </tr>
 <tr>
            <th scope="row"><?= __('modified') ?></th>
            <td><?= h($time['Review']['modified']); ?></td>
        </tr>
    </table>
   
   
</div>
 </div>
</div>
 </div>

</section>
