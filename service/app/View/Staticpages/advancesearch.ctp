
<div class="col-sm-8">


<h1>Advanced Search</h1>

<div class="searchpg">

<?php
if(!empty($advancesearch)):
 foreach($advancesearch as $term): ?>
<h2><?php echo $term['Staticpage']['title']; ?></h2>
<?php echo $term['Staticpage']['description']; ?>
<?php
endforeach;
endif;
?>      
</div>



</div>
