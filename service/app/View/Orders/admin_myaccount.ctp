
<?php //print_r($user); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Details</h3>
            </div>
<table class="table table-bordered table-hover dataTable">
    <tr>
        <td>Id</td>
        <td><?php echo h($user['User']['id']); ?></td>
    </tr>
    <tr>
        <td>Role</td>
        <td><?php echo h($user['User']['role']); ?></td>
    </tr>
    <tr>
        <td>Username</td>
        <td><?php echo h($user['User']['username']); ?></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><?php echo h($user['User']['name']); ?></td>
    </tr>
    <tr>
        <td>E-mail</td>
        <td><?php echo h($user['User']['email']); ?></td>
    </tr>
    <tr>
        <td>Active</td>
        <td><?php echo h($user['User']['active']); ?></td>
    </tr>
    <tr>
        <td>Created</td>
        <td><?php echo h($user['User']['created']); ?></td>
    </tr>

</table>

<br />
<br />

<h3>Actions</h3>

<br/>

<?php echo $this->Html->link('Change Password', array('action' => 'password', $user['User']['id']), array('class' => 'btn btn-default')); ?> </li>

<br />
<br />
        </div>
    </div>
</section>