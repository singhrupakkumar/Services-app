<!-- Content Header (Page header) -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box form_sec">
                <div class="box-header">
                    <h3 class="box-title">Patients</h3>
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

        <th><?php echo $this->Paginator->sort('name');?></th>
        <th><?php echo $this->Paginator->sort('address');?></th>
        <th><?php echo $this->Paginator->sort('D O B');?></th>
        <th><?php echo $this->Paginator->sort('doctor name');?></th>
        <th><?php echo $this->Paginator->sort('created');?></th>
        <th class="actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($patients_lists as $patients_list): ?>
    <tr>
        <td><?php echo h($patients_list['Patient']['name']); ?></td>
        <td><?php echo h($patients_list['Patient']['address']); ?></td>
        <td><?php echo h($patients_list['Patient']['dob']); ?></td>
        <td><?php echo h($patients_list['Patient']['doctorname']); ?></td>
        <td><?php echo h($patients_list['Patient']['created_date']); ?></td>
        <td class="actions">
            <?php echo $this->Html->link('View', array('action' => 'view', $patients_list['Patient']['id']), array('class' => 'btn btn-info')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $patients_list['Patient']['id']), array('class' => 'btn btn-primary')); ?>

            <?php echo $this->Form->postLink('Delete Patient', array('action' => 'delete', $patients_list['Patient']['id']), array('class' => 'btn btn-danger  btn-xs'), __('Are you sure you want to delete # %s?', $patients_list['Patient']['id'])); ?>
           <?php echo $this->Html->link('Tests', array('action' => 'test', $patients_list['Patient']['id']), array('class' => 'btn btn-primary')); ?>

           
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