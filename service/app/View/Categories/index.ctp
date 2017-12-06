<div class="container">


<div class="col-sm-12">
          <div class="fancy">
           <h2>Categories</h2>
          </div>
        </div>

<div class="col-sm-12">
<div class="catagori">
<?php $this->Html->addCrumb('Categories'); ?>

<?php echo $this->Tree->generate($categories, array('element' => 'categories/tree_item', 'class' => 'categorytree', 'id' => 'categorytree')); ?>
</div>
</div>
</div>