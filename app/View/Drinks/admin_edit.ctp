 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box form_sec">
            <div class="box-header">
              <h3 class="box-title">Edit  Free Drink Category</h3>
              <br>
              <br>
              <?php echo $this->Html->link(__('List Free Drink Category'), array('action' => 'index'), array('class'=>'btn btn-info')); ?>
              <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Drink.id')),array('class'=>'btn btn-danger'), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Drink.id'))); ?>
              <br>
              <br>
            </div>
        <?php echo $this->Form->create('Drink'); ?>
        	
        	<?php
        		echo $this->Form->input('id');
        		echo $this->Form->input('name',array('required'));
        	?>

        <?php echo $this->Form->end(__('Submit')); ?>

        </div>
        </div>
        </div>
</section>
