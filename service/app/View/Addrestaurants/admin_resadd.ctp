<h2 class="headng">Add Restaurant User</h2>

<br />

<div class="row user_restaurant">
    <div class="col-sm-6">

        <?php echo $this->Form->create('User');?>
    
       <?php echo $this->Form->input('role', array('class' => 'form-control', 'options' => array('rest_admin'=> 'Store User'))); ?>
        <br />
        <?php echo $this->Form->input('name', array('class' => 'form-control','label'=>'Restaurant Name')); ?>
        <br />
        <?php echo $this->Form->input('username', array('class' => 'form-control','placeholder'=>'E-mail','type'=>'email')); ?>
        <br />
        <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
        <br />
        <?php echo $this->Form->input('active', array('type' => 'checkbox')); ?>
        <br />
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary btn-success')); ?>
        <?php echo $this->Form->end(); ?>

    </div>
</div>

