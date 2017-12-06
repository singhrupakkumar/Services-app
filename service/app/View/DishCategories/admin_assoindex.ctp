<div class="content">
    <div class="header">

        <h1 class="page-title">Associated Dish Category</h1>

    </div>
    <div class="main-content">
            <?php $x = $this->Session->flash(); ?>
            <?php if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong><?php echo $x; ?>
            </div>
        <?php } ?>
        <div class="btn-toolbar list-toolbar">
<!--            <?php //echo $this->Form->create("Restaurant", array("action" => "admin_index")); ?>
            <div class="search_username">
                <button type="submit" class="search_button1" style="float: right;"><i class="fa fa-search"></i></button>
                <input type="text" name="keyword" value="<?php
              //  if (@$keyword) {
                 //   echo $keyword;
               // }
                ?>" placeholder="Search Your Dish category" class="form-control" style="width: 17%;float: right;"/>
            </div>
            </form>-->
            <div class="btn-group">            </div>
        </div>
        <?php echo $this->Form->create('Restaurant', array("action" => "deleteall", 'id' => 'mbc')); ?>
<div class="dishCategories index">
	
        <table style="background: #fff;" class="table table-bordered table-hover dataTable">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
                        <th><?php echo $this->Paginator->sort('image'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($dishCategories as $dishCategory): ?>
	<tr>
		<td><?php echo h($dishCategory['DishCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($dishCategory['DishCategory']['name']); ?>&nbsp;</td>
                <td><img src="<?php echo $this->webroot?>files/catimage/<?php echo h($dishCategory['DishCategory']['image']); ?>" width="100px" height="100px"/>&nbsp</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'assoview', $dishCategory['DishCategory']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'assoedit', $dishCategory['DishCategory']['id']), array('class' => 'btn btn-success btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dishCategory['DishCategory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dishCategory['DishCategory']['id']),'class'=>'btn btn-danger btn-xs')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'). ' >', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(' < ' . __('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div>
</div>
