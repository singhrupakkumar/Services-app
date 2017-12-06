<?php
echo $this->Html->css(array('bootstrap-editable.css', '/select2/select2.css'), 'stylesheet', array('inline' => false)); ?>
<?php echo $this->Html->script(array('bootstrap-editable.js', '/select2/select2.js'), array('inline' => false)); ?>
<h2>Themes</h2>
<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />

<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <th><?php echo $this->Paginator->sort('image'); ?></th>
        <th><?php echo $this->Paginator->sort('title'); ?></th>
        <th><?php echo $this->Paginator->sort('active'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th><?php echo $this->Paginator->sort('modified'); ?></th>
        <th class="actions">Actions</th>
    </tr>
    <?php foreach ($themes as $theme): ?>
    <tr>
        <td><?php echo $this->Html->Image('/files/themes/' . $theme['Theme']['image'], array('width' => 100, 'height' => 100, 'alt' => $theme['Theme']['image'], 'class' => 'image')); ?></td>
        <td><span class="brand" data-value="<?php echo $theme['Theme']['id']; ?>" data-pk="<?php echo $theme['Theme']['id']; ?>"><?php echo $theme['Theme']['title']; ?></span></td>
        <td><?php echo $this->Html->link($this->Html->image('icon_' . $theme['Theme']['active'] . '.png'), array('controller' => 'themes', 'action' => 'switch_active', $theme['Theme']['id'],$theme['Theme']['active']), array('class' => 'status', 'escape' => false)); ?></td>
        <td><?php echo h($theme['Theme']['created']); ?></td>
        <td><?php echo h($theme['Theme']['modified']); ?></td>
        <td class="actions">
            <?php echo $this->Html->link('View', array('action' => 'view', $theme['Theme']['id']), array('class' => 'btn btn-default btn-xs')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $theme['Theme']['id']), array('class' => 'btn btn-default btn-xs')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />

<h3>Actions</h3>

<?php echo $this->Html->link('New Theme', array('action' => 'add'), array('class' => 'btn btn-default')); ?>

<br />
<br />
