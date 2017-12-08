<div class="content">
    <div class="header">

        <h1 class="page-title">Dishes</h1>
        <ul class="breadcrumb">
            <li class="active">Dishes</li>
        </ul>

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
            <a href="<?php echo $this->Html->url(array('controller' => 'Dishes', 'action' => 'admin_add')); ?>"><span class="btn btn-primary"><i class="fa fa-plus"></i> Add Dish</span></a>
            <?php echo $this->Form->create("Dish", array("action" => "admin_index")); ?>
            <div class="search_username">
                <button type="submit" class="search_button1" style="float: right;"><i class="fa fa-search"></i></button>
                <input type="text" name="keyword" value="<?php
                if (@$keyword) {
                    echo $keyword;
                }
                ?>" placeholder="Search Your Dishes" class="form-control" style="width: 17%;float: right;"/>
            </div>
            </form>
            <div class="btn-group">            </div>
        </div>
<div class="dishes index">
	<h2><?php echo __('Dishes'); ?></h2>
        <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cat_id'); ?></th>
			<th><?php echo $this->Paginator->sort('restaurant_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('dish_image'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('descrption'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($dishes as $dish): ?>
	<tr>
		<td><?php echo h($dish['Dish']['id']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['cat_id']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['restaurant_id']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['name']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['dish_image']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['details']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['descrption']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dish['Dish']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dish['Dish']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dish['Dish']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dish['Dish']['id']))); ?>
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
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>