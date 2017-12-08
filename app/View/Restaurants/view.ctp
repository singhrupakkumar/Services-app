<div class="restaurants view">
   
<h2><?php echo __('Restaurant'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($restaurant['User']['id'], array('controller' => 'users', 'action' => 'view', $restaurant['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner Name'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['owner_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner Phone'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['owner_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['status']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('open'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['open']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('close'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['close']); ?>
			&nbsp;
		</dd>
                
                 <dt><?php echo __('prayer_time'); ?></dt>
		<dd>
			<?php echo h($restaurant['Restaurant']['prayer_time']); ?>
			&nbsp;
		</dd>
        
        
        
        
        
        
        
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Restaurant'), array('action' => 'edit', $restaurant['Restaurant']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Restaurant'), array('action' => 'delete', $restaurant['Restaurant']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $restaurant['Restaurant']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurant'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmark Dishes'), array('controller' => 'bookmark_dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark Dish'), array('controller' => 'bookmark_dishes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('controller' => 'dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish'), array('controller' => 'dishes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurats Reviews'), array('controller' => 'restaurats_reviews', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurats Review'), array('controller' => 'restaurats_reviews', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Checkins'), array('controller' => 'user_checkins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Checkin'), array('controller' => 'user_checkins', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bookmark Dishes'); ?></h3>
	<?php if (!empty($restaurant['BookmarkDish'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Restaurant Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($restaurant['BookmarkDish'] as $bookmarkDish): ?>
		<tr>
			<td><?php echo $bookmarkDish['id']; ?></td>
			<td><?php echo $bookmarkDish['user_id']; ?></td>
			<td><?php echo $bookmarkDish['restaurant_id']; ?></td>
			<td><?php echo $bookmarkDish['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bookmark_dishes', 'action' => 'view', $bookmarkDish['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bookmark_dishes', 'action' => 'edit', $bookmarkDish['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bookmark_dishes', 'action' => 'delete', $bookmarkDish['id']), array('confirm' => __('Are you sure you want to delete # %s?', $bookmarkDish['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bookmark Dish'), array('controller' => 'bookmark_dishes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Dishes'); ?></h3>
	<?php if (!empty($restaurant['Dish'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cat Id'); ?></th>
		<th><?php echo __('Restaurant Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Dish Image'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Descrption'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Is Deleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($restaurant['Dish'] as $dish): ?>
		<tr>
			<td><?php echo $dish['id']; ?></td>
			<td><?php echo $dish['cat_id']; ?></td>
			<td><?php echo $dish['restaurant_id']; ?></td>
			<td><?php echo $dish['name']; ?></td>
			<td><?php echo $dish['dish_image']; ?></td>
			<td><?php echo $dish['details']; ?></td>
			<td><?php echo $dish['descrption']; ?></td>
			<td><?php echo $dish['created']; ?></td>
			<td><?php echo $dish['modified']; ?></td>
			<td><?php echo $dish['modified_by']; ?></td>
			<td><?php echo $dish['status']; ?></td>
			<td><?php echo $dish['is_deleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'dishes', 'action' => 'view', $dish['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'dishes', 'action' => 'edit', $dish['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'dishes', 'action' => 'delete', $dish['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dish['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Dish'), array('controller' => 'dishes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Restaurats Reviews'); ?></h3>
	<?php if (!empty($restaurant['RestauratsReview'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Restaurant Id'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Review'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Twitter Post'); ?></th>
		<th><?php echo __('Facebook Post'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Is Deleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($restaurant['RestauratsReview'] as $restauratsReview): ?>
		<tr>
			<td><?php echo $restauratsReview['id']; ?></td>
			<td><?php echo $restauratsReview['user_id']; ?></td>
			<td><?php echo $restauratsReview['restaurant_id']; ?></td>
			<td><?php echo $restauratsReview['rating']; ?></td>
			<td><?php echo $restauratsReview['review']; ?></td>
			<td><?php echo $restauratsReview['image']; ?></td>
			<td><?php echo $restauratsReview['twitter_post']; ?></td>
			<td><?php echo $restauratsReview['facebook_post']; ?></td>
			<td><?php echo $restauratsReview['created']; ?></td>
			<td><?php echo $restauratsReview['modified']; ?></td>
			<td><?php echo $restauratsReview['status']; ?></td>
			<td><?php echo $restauratsReview['is_deleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'restaurats_reviews', 'action' => 'view', $restauratsReview['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'restaurats_reviews', 'action' => 'edit', $restauratsReview['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'restaurats_reviews', 'action' => 'delete', $restauratsReview['id']), array('confirm' => __('Are you sure you want to delete # %s?', $restauratsReview['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Restaurats Review'), array('controller' => 'restaurats_reviews', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related User Checkins'); ?></h3>
	<?php if (!empty($restaurant['UserCheckin'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Restaurant Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($restaurant['UserCheckin'] as $userCheckin): ?>
		<tr>
			<td><?php echo $userCheckin['id']; ?></td>
			<td><?php echo $userCheckin['user_id']; ?></td>
			<td><?php echo $userCheckin['restaurant_id']; ?></td>
			<td><?php echo $userCheckin['comment']; ?></td>
			<td><?php echo $userCheckin['image']; ?></td>
			<td><?php echo $userCheckin['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_checkins', 'action' => 'view', $userCheckin['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_checkins', 'action' => 'edit', $userCheckin['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_checkins', 'action' => 'delete', $userCheckin['id']), array('confirm' => __('Are you sure you want to delete # %s?', $userCheckin['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Checkin'), array('controller' => 'user_checkins', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
