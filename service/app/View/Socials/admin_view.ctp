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
              <h3 class="box-title">Social pages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

    <table class="table table-bordered table-hover dataTable">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($social['Social']['id']); ?></td>
        </tr>
        <!--tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($social['Social']['name']); ?></td>
        </tr-->
        <tr>
            <!--th scope="row"><?= __('Icon') ?></th>
            <td> <img src="<?php //echo $this->webroot; ?>files/social/<?php //echo $social['Social']['icon']; ?>" style="width: 50px; height: 50px;"/></td>
        </tr-->
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($social['Social']['link']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($social['Social']['created']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($social['Social']['modified']); ?></td>
        </tr>
    </table>
   
   
</div>
 </div>
</div>
 </div>

</section>
