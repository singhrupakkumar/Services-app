<!-- Content Header (Page header) -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<!--  <section class="content-header">
<h1>
Dashboard
<small>Control panel</small>
</h1>

</section> -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box form_sec">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                </div>
                <div class="main-content">
                    <?php $x = $this->Session->flash(); ?>
                    <?php if ($x) { ?>
                    <div class="alert success">
                        <span class="icon"></span>
                        <strong></strong><?php echo $x; ?>
                    </div>
                    <?php }  
 ?>

    <table style="font-size:12px;" id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>

        <th><?php echo $this->Paginator->sort('role');?></th>
        <th><?php echo 'Name';?></th>
        <th><?php echo $this->Paginator->sort('email');?></th>
        <!--<th><?php //echo $this->Paginator->sort('Member Status');?></th>-->
        <th><?php echo $this->Paginator->sort('created');?></th>
        <th class="actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo h($user['User']['role']); ?></td>
        <td><?php echo $user['User']['first_name'].' '.$user['User']['last_name']; ?></td>
        <td><?php echo h($user['User']['email']); ?></td>
       
        <td><?php echo h($user['User']['created']); ?></td>
        <td class="actions">
            <?php echo $this->Html->link('View', array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-primary btn-xs view1')); ?>
			<?php echo $this->Html->link('Bills', array('action' => 'userbills', $user['User']['id']), array('class' => 'btn btn-primary btn-xs view1')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
                                    <?php
                                    if ($user['User']['active'] == 0) {
                                        echo $this->Form->postLink(('Activate'), array('Controller' => 'users', 'action' => 'admin_activate', $user['User']['id']), array('escape' => false, 'class' => 'btn btn-success btn-xs', 'title' => 'Active'));
                                    } else {
                                        echo $this->Form->postLink(('Block'), array('controller' => 'users', 'action' => 'admin_deactivate', $user['User']['id']), array('escape' => false, 'class' => 'btn btn-danger btn-xs', 'title' => 'Block'));
                                    }
                                    ?>
									
            <?php echo $this->Form->postLink('Delete User', array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger  btn-xs'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>
</div></div>
</section>



<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>