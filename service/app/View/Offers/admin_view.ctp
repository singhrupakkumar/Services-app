<div class="offers view">
<h2><?php echo __('Offer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($offer['Offer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Res Id'); ?></dt>
		<dd>
			<?php echo h($offer['Offer']['res_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($offer['Offer']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($offer['Offer']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($offer['Offer']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($offer['Offer']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($offer['Offer']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Offer'), array('action' => 'edit', $offer['Offer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Offer'), array('action' => 'delete', $offer['Offer']['id']), array(), __('Are you sure you want to delete # %s?', $offer['Offer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Offers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Offer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('controller' => 'restaurants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Restaurants'); ?></h3>
	<?php if (!empty($offer['Restaurant'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Barcodeno'); ?></th>
		<th><?php echo __('Typeid'); ?></th>
		<th><?php echo __('Area Code'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Owner Name'); ?></th>
		<th><?php echo __('Owner Phone'); ?></th>
		<th><?php echo __('Contact Person Position'); ?></th>
		<th><?php echo __('Contact Person Fname'); ?></th>
		<th><?php echo __('Contact Person Lname'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Zip'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Logo'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Latitude'); ?></th>
		<th><?php echo __('Longitude'); ?></th>
		<th><?php echo __('Review Avg'); ?></th>
		<th><?php echo __('Review Count'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Delivery Distance'); ?></th>
		<th><?php echo __('Delivery'); ?></th>
		<th><?php echo __('Takeaway'); ?></th>
		<th><?php echo __('Delivery Fee'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Opening Time'); ?></th>
		<th><?php echo __('Closing Time'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($offer['Restaurant'] as $restaurant): ?>
		<tr>
			<td><?php echo $restaurant['id']; ?></td>
			<td><?php echo $restaurant['user_id']; ?></td>
			<td><?php echo $restaurant['barcodeno']; ?></td>
			<td><?php echo $restaurant['typeid']; ?></td>
			<td><?php echo $restaurant['area_code']; ?></td>
			<td><?php echo $restaurant['name']; ?></td>
			<td><?php echo $restaurant['phone']; ?></td>
			<td><?php echo $restaurant['owner_name']; ?></td>
			<td><?php echo $restaurant['owner_phone']; ?></td>
			<td><?php echo $restaurant['contact_person_position']; ?></td>
			<td><?php echo $restaurant['contact_person_fname']; ?></td>
			<td><?php echo $restaurant['contact_person_lname']; ?></td>
			<td><?php echo $restaurant['address']; ?></td>
			<td><?php echo $restaurant['city']; ?></td>
			<td><?php echo $restaurant['state']; ?></td>
			<td><?php echo $restaurant['zip']; ?></td>
			<td><?php echo $restaurant['details']; ?></td>
			<td><?php echo $restaurant['description']; ?></td>
			<td><?php echo $restaurant['logo']; ?></td>
			<td><?php echo $restaurant['website']; ?></td>
			<td><?php echo $restaurant['email']; ?></td>
			<td><?php echo $restaurant['latitude']; ?></td>
			<td><?php echo $restaurant['longitude']; ?></td>
			<td><?php echo $restaurant['review_avg']; ?></td>
			<td><?php echo $restaurant['review_count']; ?></td>
			<td><?php echo $restaurant['created']; ?></td>
			<td><?php echo $restaurant['modified']; ?></td>
			<td><?php echo $restaurant['modified_by']; ?></td>
			<td><?php echo $restaurant['delivery_distance']; ?></td>
			<td><?php echo $restaurant['delivery']; ?></td>
			<td><?php echo $restaurant['takeaway']; ?></td>
			<td><?php echo $restaurant['delivery_fee']; ?></td>
			<td><?php echo $restaurant['status']; ?></td>
			<td><?php echo $restaurant['opening_time']; ?></td>
			<td><?php echo $restaurant['closing_time']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'restaurants', 'action' => 'view', $restaurant['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'restaurants', 'action' => 'edit', $restaurant['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'restaurants', 'action' => 'delete', $restaurant['id']), array(), __('Are you sure you want to delete # %s?', $restaurant['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
