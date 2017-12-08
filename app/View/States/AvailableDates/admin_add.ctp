<section class="admin_main-sec">
    <div class="sec_inner">
        <div class="row">
            <div class="col-md-12">
                <div class="page-headeing">
                    <h1 class="page-title"><i class="fa fa-bars" aria-hidden="true"></i>Add Unavailable Date</h1>
                </div>
            </div>
                <div class="page_content">
                    <p>
                        <?php $x=$this->Session->flash(); ?>
                        <?php if($x){ ?>
                        <div class="alert success">
                            <span class="icon"></span>
                            <strong></strong>
                            <?php echo $x; ?>
                        </div>
                        <?php } ?>
                    </p>
                    <div class="col-sm-5">
                    <div class="restaurants index">
                       <?php echo $this->Form->create('UnavailableDate'); ?>
                            <?php
                                echo $this->Form->input('id');
                                if(isset($restaurant)){
                                    echo "Restaurant Name: ".$restaurant['Restaurant']['name'];
                                    echo $this->Form->input('restaurant_id',array('type'=>'hidden','value'=>$restaurant['Restaurant']['id']));
                                }else{
                                    echo $this->Form->input('restaurant_id',array('options'=>$restaurant_list));
                                }
                                
                                echo $this->Form->input('unavailabledate',array('type'=>'date','label'=>'Unavailable Date'));
                            ?>
                            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']); ?>
                    </div><!-- End Here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style type="text/css">
select{
        width: 100%;
    float: left;
    border: none;
    border-radius: 0px;
    background: #fff;
    border: 1px solid #ddd;
    padding: 7px 7px !important;
    color: #777 !important;
    font-size: 16px !important;
    box-shadow: none !important;
    margin: 0px;
    }
    .input.date select{
        width: auto;
    float: left;
    border: none;
    border-radius: 0px;
    background: #fff;
    border: 1px solid #ddd;
    padding: 7px 7px !important;
    color: #777 !important;
    font-size: 16px !important;
    box-shadow: none !important;
    margin: 0px;
    }
</style>