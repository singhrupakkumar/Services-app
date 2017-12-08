<div class="col-sm-8">


<h1>Search</h1>

<div class="searchpg">
<?php
if(!empty($searchterm)):
 foreach($searchterm as $term): ?>
<h2><?php echo $term['Staticpage']['title']; ?></h2>
<?php echo $term['Staticpage']['description']; ?>
<?php
endforeach;
endif;
?>      
</div>

</div>
