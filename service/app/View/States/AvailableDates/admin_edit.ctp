<section class="admin_main-sec">
    <div class="sec_inner">
        <div class="row">
            <div class="col-md-12">
                <div class="page-headeing">
                    <h1 class="page-title"><i class="fa fa-bars" aria-hidden="true"></i>Edit Unavailable Date</h1>
                </div>
                <div class="page_content">
                    <p>
                        <?php $x = $this->Session->flash(); ?>
                        <?php if ($x) { ?>
                        <div class="alert success">
                            <span class="icon"></span>
                            <strong></strong><?php echo $x; ?>
                        </div>
                        <?php } ?>
                    </p>
                    <div class="restaurants index">
                        <?php echo $this->Form->create('UnavailableDate', array('id' => 'tab', 'type' => 'file')); 
                        ?>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="input text"><label for="UnavailableDateRestaurantId">Restaurant Name:</label>
                                    <?php echo $this->request->data['Restaurants'][name]; ?>
                                </div>
                                <?php echo $this->Form->input('restaurant_id', array('class' => 'form-control','required' => true,'type'=>'hidden')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('unavailabledate', array('class' => 'form-control', 'label' => 'Unavailable Date:','required' => true)); ?>
                            </div>
                    
                <div class="btn-toolbar list-toolbar">
                    <?php echo $this->Form->submit('Save', array('formnovalidate' => true, 'class' => "submitres btn btn-primary")); ?>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Restaurants', 'action' => 'admin_unavailabledates')); ?>" data-toggle="modal" style="float: left;" class="btn btn-primary">Cancel</a>
                </div>
                        </div>
                        <?php //echo $this->Form->end(); ?>
                    </div><!-- End Here -->
                </div>
            </div>
        </div>
    </div>
</section>