<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<!-- Content Header (Page header) -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
		                <div class="box-header">
                    <h3 class="box-title">Static Pages</h3>
                </div>
            <div class="box">

                <div class="box-body">
                    <table id="example2">
        <p>
       
            <?php $x = $this->Session->flash(); ?>
            <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php } ?>
        </p>
        <!--div class="btn-toolbar list-toolbar">
       
            <?php echo $this->Form->create("Staticpage", array("action" => "admin_index")); ?>
            <div class="search_username">
                <button type="submit" class="search_button1" style="float: right; line-height: 28px;"><i class="fa fa-search"></i></button>
                <input type="text" name="keyword" value="<?php if (@$keyword) {
                echo $keyword;
            } ?>" placeholder="Search Here !!!" class="form-control" style="width: 17%;float: right;"/>
            </div>
            </form>
            <div class="btn-group">
            </div>
        </div--> 
      <?php echo $this->Form->create('Staticpage', array("action" => "deleteall", 'id' => 'mbc')); ?>
        <table style="font-size:12px;" id="dataexample" class="table table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="admin_check_b"> Sr. No.<!-- <input type="checkbox" id="selectall" onClick="selectallCHBox();" / --></th>
                   <th><?php echo $this->Paginator->sort('Title'); ?></th>
				   <th><?php echo $this->Paginator->sort('Page'); ?></th>
                    <!--th><?php  echo $this->Paginator->sort('Image'); ?></th-->
                    <th><?php echo $this->Paginator->sort('Created'); ?></th>
                    <th><?php echo $this->Paginator->sort('Status'); ?></th>
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
                             <td><!-- <?php echo $this->Form->checkbox("use"+$staticpage['Staticpage']['id'],array('value' => $staticpage['Staticpage']['id'],'class'=>'chechid')); ?> --> <?php echo $counter; ?></td>
                        <td><?php echo h($staticpage['Staticpage']['title']); ?>&nbsp;</td>
						<td>
						<?php echo h($staticpage['Staticpage']['position']); ?>&nbsp;
						</td>
                        <!--td><?php
                    $ext = pathinfo($staticpage['Staticpage']['image'], PATHINFO_EXTENSION);
                        if(empty($ext)){
                           echo  'No Image';
                        }
                        else
                        {
                      echo $this->Html->image('../files/staticpage/'.$staticpage['Staticpage']['image']
                            ,array('alt'=>'Not Image','height'=>'70px','width'=>'100px')); 
                        }
                        ?>
                           
                            
                       
                            
                        </td-->
                        <td>
                        <?php 
         $created = explode(' ', $staticpage['Staticpage']['created']);
         $date1 = str_replace('-', '/', $created[0]);
         echo date('m-d-Y',strtotime($date1)); ?>
                       &nbsp;</td>
                                <td><?php if ($staticpage['Staticpage']['status'] == '0') { ?>
                                    <?php echo $this->Form->postLink('Deactive', array('action' => 'activate', $staticpage['Staticpage']['id']), array('escape' => false, 'class' => 'archive_12'));
                                    ?></span><?php } else { ?>
                                        <?php echo $this->Form->postLink('Active', array('action' => 'deactivate', $staticpage['Staticpage']['id']), array('escape' => false, 'class' => 'archive_12'));
                                        ?></span> <?php } ?>&nbsp;
                                </td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $staticpage['Staticpage']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
                                    
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $staticpage['Staticpage']['id']), array('class' => 'btn btn-success btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Delete'),array('action' => 'delete', $staticpage['Staticpage']['id']), array('confirm'=>__('Are you sure you want to delete # %s?', $staticpage['Staticpage']['id']),'class' => 'btn btn-danger btn-xs')); ?>
                                    <?php
                                    /*
                                    if ($staticpage['Staticpage']['status'] == 0) {
                                        echo $this->Form->postLink(('Activate'), array('Controller' => 'Staticpages', 'action' => 'admin_activate', $staticpage['Staticpage']['id']), array('escape' => false, 'class' => 'btn btn-info btn-xs', 'title' => 'Active'));
                                    } else {
                                        echo $this->Form->postLink(('Block'), array('controller' => 'Staticpages', 'action' => 'admin_deactivate', $staticpage['Staticpage']['id']), array('escape' => false, 'class' => 'btn btn-warning btn-xs', 'title' => 'Block'));
                                    }
                                     */
                                    ?>
                                </td>
                            </tr>
                 <?php } } } else { { ?> 
                <p class="not_found">NOT FOUND</p>
                 <?php } } ?>
            </tbody>
        </table>
            <?php echo $this->Form->end(); ?>
        <!--ul class="paginator_Admin">
            <div class="first_button1"><?php echo $this->Paginator->prev('Previous ', null, null, array('class' => 'disabled')); ?></div>
                                       <?php echo $this->Paginator->numbers(); ?>
            <div class="first_button1"><?php echo $this->Paginator->next(' Next ', null, null, array('class' => 'disabled')); ?></div>
        </ul-->
    </div>

</div>
</div>
</div>
<style type="text/css">
    .search_username{margin-top: 0%;}
	.table>thead>tr>th {
    border-bottom: 1px solid #ddd;
}
</style>
 <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#dataexample').DataTable();
    } );
</script>