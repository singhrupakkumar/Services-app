<h2>Membership</h2>
<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <td>Id</td>
        <td><?php echo h($membership['Membership']['id']); ?></td>
    </tr>

    <tr>
        <td>Title</td>
        <td><?php echo h($membership['Membership']['title']); ?></td>
    </tr>

    <tr>
        <td>Description</td>
        <td><?php echo h($membership['Membership']['description']); ?></td>
    </tr>
    <tr>
        <td>Cycle</td>
        <td><?php echo h($membership['Membership']['cycle']); ?> </td>
    </tr>
    <tr>
        <td>Frequency</td>
        <td><?php echo h($membership['Membership']['frequency']); ?> </td>
    </tr>
    <tr>
        <td>Price</td>
        <td><?php echo h($membership['Membership']['price']); ?></td>
    </tr>
    <tr>
        <td>Active</td>
        <td><?php echo $this->Html->link($this->Html->image('icon_' . $membership['Membership']['active'] . '.png'), array('controller' => 'memberships', 'action' => 'switch', 'active', $membership['Membership']['id']), array('class' => 'status', 'escape' => false)); ?></td>
    </tr>
    <tr>
        <td>Created</td>
        <td><?php echo h($membership['Membership']['created']); ?></td>
    </tr>
    <tr>
        <td>Modified</td>
        <td><?php echo h($membership['Membership']['modified']); ?></td>
    </tr>
</table>
<h3>Actions</h3>
<?php echo $this->Html->link('Edit Plan', array('action' => 'edit', $membership['Membership']['id']), array('class' => 'btn btn-default')); ?>
&nbsp; &nbsp;
<?php echo $this->Form->postLink('Delete Plan', array('action' => 'delete', $membership['Membership']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $membership['Membership']['id'])); ?>
<br/>