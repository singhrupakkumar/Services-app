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
              <h3 class="box-title">Dish Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<table class="table table-bordered table-hover dataTable">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($dishCategory['DishCategory']['id']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($dishCategory['DishCategory']['name']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td> <img src="<?php echo $this->webroot;?>files/catimage/<?php echo $dishCategory['DishCategory']['image']; ?>" width="100" height="100"/></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($dishCategory['DishCategory']['created']);  ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($dishCategory['DishCategory']['modified']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($dishCategory['DishCategory']['status']); ?></td>
        </tr>
    </table>
</div>
 </div>
</div>
 </div>

</section>
