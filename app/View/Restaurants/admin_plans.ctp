<!-- Content Header (Page header) -->

<?php 
    // echo "<pre>";
    // print_r($staticpages);
    // echo "</pre>";
?>
<section class="content-header">
    <h1>
        Subscription Plan
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
<!--                <div class="box-header">
                    <h3 class="box-title">Static Pages</h3>
                </div>-->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
        <p>
            <?php $x = $this->Session->flash(); ?>
            <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php } ?>
        </p>
        
   
        <table class="table-striped table-bordered table-condensed table-hover table">
            <thead>
                <tr>
                    <th class="admin_check_b"> Sr. No.<!-- <input type="checkbox" id="selectall" onClick="selectallCHBox();" / --></th>
                   <th><?php echo $this->Paginator->sort('Name'); ?></th>
                    <th><?php echo $this->Paginator->sort('Image'); ?></th>
                    <th><?php echo $this->Paginator->sort('Price - EUR'); ?></th>
                    <th><?php echo $this->Paginator->sort('Discount - EUR'); ?></th>
                 
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($staticpages){
                if(isset($staticpages)){
                
                $counter=0;
                
                foreach ($staticpages as $staticpage){ 
                    $counter++;
                    ?>
                    <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo h($staticpage['SubscriptionPlan']['name']); ?>&nbsp;</td>
                        <td>
                        <?php
                            $ext = pathinfo($staticpage['SubscriptionPlan']['image'], PATHINFO_EXTENSION);
                            if(empty($ext)){
                                echo  'No Image';
                            }
                            else
                            {
                                echo $this->Html->image($staticpage['SubscriptionPlan']['image'],array('alt'=>'Not Image','height'=>'70px','width'=>'100px')); 
                            }
                        ?>
                        </td>                    
                    <td><?php echo h($staticpage['SubscriptionPlan']['price']); ?>&nbsp;</td>
                    <td><?php echo h($staticpage['SubscriptionPlan']['discount']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('View'), array('action' => 'planview', $staticpage['SubscriptionPlan']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
                                
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'planedit', $staticpage['SubscriptionPlan']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                                
                            </td>
                        </tr>
                 <?php } } } else { { ?> 
                <p class="not_found">NOT FOUND</p>
                 <?php } } ?>
            </tbody>
        </table>
       
       
    </div>

</div>
</div>
</div>
<style type="text/css">
    .search_username{margin-top: 0%;}
	.table-bordered>thead>tr>th, .table-bordered>thead>tr>td {
     border-bottom-width: 1px;
}
</style>