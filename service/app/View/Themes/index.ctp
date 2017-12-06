<section class="black-menu">
  <div class="container">
  <div class="col-sm-6 col-lg-6">
  <div class="three_box">
  <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs"> 
   <ul id="myTabs" class="nav nav-tabs" role="tablist">
       <?php if(isset($plans)){
            foreach($plans as $plan){ 
                $slug = "#".str_replace(' ', '_', $plan['Membership']['title']);
                $tab = str_replace(' ', '_', $plan['Membership']['title'])."-tab";
                ?>
                <li class="" id="<?php echo $plan['Membership']['id']; ?>" role="presentation"><a data-theme="<?php echo 'theme-'.str_replace(' ', '_', $plan['Membership']['title']);?>" id="<?php echo $tab; ?>" href="<?php echo $slug; ?>" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><?php echo strtoupper($plan['Membership']['title']); ?></a></li>
        <?php    }
       
       } ?>
    </ul>
   </div>
   
   
<div id="myTabContent" class="tab-content">
     <?php if(isset($plans)){
            foreach($plans as $plan){ 
                $slug = str_replace(' ', '_', $plan['Membership']['title']);
                $tab = str_replace(' ', '_', $plan['Membership']['title'])."-tab";
                if($plan['Membership']['price'] == '0.00'){ ?>
                    <div id="<?php echo $slug; ?>" class="tab-pane fade" role="tabpanel" aria-labelledby="profile-tab">
                        <p><?php echo $plan['Membership']['description'] ?></p>
                    </div>
                <?php 
                }else{ ?>
                <div id="<?php echo $slug; ?>" class="tab-pane fade" role="tabpanel" aria-labelledby="profile-tab1">
                    <div class="col-sm-12 col-md-12">
    <div class="hdng1">
       <h1><strong><?php echo $plan['Membership']['title']; ?></strong></h1>
    </div>
    </div>
                <div class="col-sm-12 col-md-12">
  			<div class="strt">
                 <span>Starting at <sup>$</sup><span><?php echo $plan['Membership']['price']; ?></span> <sub><?php echo $plan['Membership']['frequency']; ?></sub></span>
           </div>
           
            <div class="set_up">
            <?php echo $plan['Membership']['description']; ?>
           </div>
           
                </div></div>
                <?php } 
                } //end foreach
                } // end if
                ?>

</div>
</div>
   
   
   
   

  <!--</div>location-->
  </div><!--col-md-->
  </div><!--container-->
</section>

<section class="lcd">
 <div class="container">
   
   <div class="col-xs-12 col-sm-12 col-md-12 sss">
     <div class="lorem">
       <h5>LOREM IPSUM IS SIMPLY DUMMY TEXT OF PRINTING</h5>
       <span>lorem ipsum is simply dummy text of printing</span>
     </div>
   
     <div class="lorem1">
       <a href="#">SHOW OTHERS</a>   
     </div>
   </div>
   
   
   <div class="col-md-12">
   
    <div class="row" id="themes">
        
        <?php if(isset($plans)){
            foreach($plans as $plan){ 
                $slug = "theme-".str_replace(' ', '_', $plan['Membership']['title']); ?>
                <div id="<?php echo $slug; ?>" style="display: none" class="hidden_themes">
                <?php foreach($plan['Themes'] as $theme){
                ?>
               <div class="col-xs-12 col-sm-4 col-md-4">
                   <a href="<?php echo $this->Html->url(array(
    'controller' => 'themes',
    'action' => 'selectedtheme',
    $theme['Theme']['id']
));?>">
                <div class="pc_main">
                        <div class="pc_cnt"> <div class="box_bg"><?php echo $this->Html->Image('/files/themes/' . $theme['Theme']['image'], array('alt' => $theme['Theme']['image'])); ?>
                    <div class="pc_ctnt">
                    <ul>
                    <li class="one1"><?php echo $theme['Theme']['title']; ?></li>
                    <li class="one2"><?php echo $theme['Theme']['description']; ?></li>
                    </ul>

                    </div>
                     </div>
                      </div>
                        <div class="pc_bg"><?php echo $this->Html->Image('/img/pc_1.jpg'); ?> </div>
                </div>
                   </a>
            </div>
                <?php  }?> </div> <?php }
       
       } ?>
       
    </div>
   
   </div>
   
 </div>
</section>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#myTabs li:first').addClass('active');
        var membership_id = $('#myTabs li:first').attr('id');
        localStorage.setItem("membership_id", membership_id);
        $('#myTabContent div:first').addClass('active in');
        $('#themes div:first').css('display','block');
        $("#myTabs li").each(function(){
            $(this).click(function(){
                localStorage.setItem("membership_id", $(this).attr('id'));
                var themediv = $(this).find("a").attr('data-theme')
                $(".hidden_themes").css('display','none');
                $('#'+themediv).css('display','block');
            })
        })
    })
</script>