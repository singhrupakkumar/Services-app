<?php
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=restaurant-' . date('YmdHis') . '.csv');
header('Pragma: no-cache');
?>
<?php foreach ($restaurant[0]['Restaurant'] as $key => $value): ?>"<?php echo $key; ?>",<?php endforeach; ?>
<?php echo "\n"; ?>
<?php foreach ($restaurant as $restaurant): ?>
<?php foreach ($restaurant['Restaurant'] as $key => $value): ?>"<?php echo h($value); ?>",<?php endforeach; ?>
<?php echo "\n"; ?>
<?php endforeach; ?>