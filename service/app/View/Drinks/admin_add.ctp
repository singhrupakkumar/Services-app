 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box form_sec">
            <div class="box-header">
              <h3 class="box-title">Add Free Drink Category</h3>
              <br>
              <br>
              <?php echo $this->Html->link(__('List Venues Category'), array('action' => 'index'), array('class'=>'btn btn-info')); ?>
              <br>
              <br>
            </div>
<div class="row">
<div class="col-sm-5">
<div class="restaurantsTypes form">
<?php echo $this->Form->create('Drink'); ?>
	
	<?php
		echo $this->Form->input('name',array('required' =>'true'));
	?>
	
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>


</div>
</div>
</div>
</div>
</section>

