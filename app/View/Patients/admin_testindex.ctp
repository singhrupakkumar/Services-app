<!-- Content Header (Page header) -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box form_sec">
                <div class="box-header">
                    <h3 class="box-title">Tests</h3>
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

        <th><?php echo $this->Paginator->sort('id');?></th>
        <th><?php echo $this->Paginator->sort('test');?></th>
        <th><?php echo $this->Paginator->sort('created');?></th>
        <th class="actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($alltest as $test): ?>
    <tr>
        <td><?php echo h($test['Test']['id']); ?></td>
        <td><?php echo h($test['Test']['test']); ?></td>
        <td><?php echo h($test['Test']['created_date']); ?></td>
        <td class="actions">
            <?php echo $this->Html->link('View', array('action' => 'testview', $test['Test']['id']), array('class' => 'btn btn-info')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'testedit', $test['Test']['id']), array('class' => 'btn btn-primary')); ?>

            <?php echo $this->Form->postLink('Delete Test', array('action' => 'testdelete', $test['Test']['id']), array('class' => 'btn btn-danger  btn-xs'), __('Are you sure you want to delete # %s?', $test['Test']['id'])); ?>

           
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