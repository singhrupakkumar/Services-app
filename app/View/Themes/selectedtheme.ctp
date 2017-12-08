<!--- model 5 ---->
<div id="myModal5" class="modal fade in" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;">
<div class="modal-dialog1" role="document">
<div class="modal-content1">
<div class="modal-header">
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true"><i class="fa fa-close"></i></span>
</button>
</div>

    <div class="lst">
    
      <div class="col-sm-6 col-sm-offset-3">
         
         <div class="blk_ctnt" id="CreateUser">
             <h2 align="center">Create your store</h2>
             <p align="center">No credit card required. Change your template at any time</p>
             <?php echo $this->Form->create('User',array('action'=>'requestforarestaurant','class'=>'blk_fm'));
             ?>
             <input type="text" name="data[User][firstname]" placeholder="First Name*" value="" required="required"/>
                <input type="text" name="data[User][lastname]" placeholder="Last Name" value="" required="required"/>
                <input type="text" name="data[User][email]" placeholder="Email Address" value="" required="required"/>
                <input type="password" name="data[User][password]" placeholder="Password" value="" required="required"/>
             <input type="submit" id="submitform" class="submit_btn" value="SIGN UP & CREATE STORE"/>
             <?php echo $this->form->end(); ?>
         </div>
      </div>
    
    </div>


</div>
</div>
</div>
  

<!--- model 6 ---->
<div id="myModal6" class="modal fade in" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;">
<div class="modal-dialog1" role="document">
<div class="modal-content1">
<div class="modal-header">
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true"><i class="fa fa-close"></i></span>
</button>
</div>

    <div class="lst">
    
      <div class="col-sm-6 col-sm-offset-3">
         
         <div class="blk_ctnt" id="CreateUser">
             <h2 align="center">Create your store</h2>
             <p align="center">No credit card required. Change your template at any time</p>
             <?php echo $this->Form->create('RequestedRestaurant',array('action'=>'add','class'=>'blk_fm','type'=>'file'));
             ?>
                <input type="hidden" id="userId" name="data[RequestedRestaurant][user_id]" value="1"/>
                <input type="hidden" id="membershipId" name="data[RequestedRestaurant][membership_id]" value=""/>
                <input type="hidden" name="data[RequestedRestaurant][theme_id]" value="<?php echo $selected_theme['Theme']['id']; ?>"/>
                <input type="text" name="data[RequestedRestaurant][restaurant_name]" placeholder="Restaurant Name"/>
                <input type="text" name="data[RequestedRestaurant][phone]" placeholder="Phone"/>
                <input type="text" name="data[RequestedRestaurant][owner_name]" placeholder="Owner Name"/>
                <input type="text" name="data[RequestedRestaurant][email]" placeholder="Owner Email"/>
                <input type="text" name="data[RequestedRestaurant][owner_phone]" placeholder="Owner Phone"/>
                <input type="text" name="data[RequestedRestaurant][address]" placeholder="Address"/>
                <input type="text" name="data[RequestedRestaurant][city]" placeholder="City"/>
                <input type="text" name="data[RequestedRestaurant][state]" placeholder="State"/>
                <input type="text" name="data[RequestedRestaurant][zip]" placeholder="Zip"/>
<!--                <textarea name="data[RequestedRestaurant][description]">Write description here</textarea>
                <input type="file" id='file' name="data[RequestedRestaurant][logo]"/>-->
                <input type="text" name="data[RequestedRestaurant][website]" placeholder="Website"/>
                <input type="text" name="data[RequestedRestaurant][latitude]" placeholder="Latitude"/>
                <input type="text" name="data[RequestedRestaurant][longitude]" placeholder="Longitude"/>
               
             <!--<p>No credit card required. Change your template at any time</p>-->
             <input type="button" id="restaurant_info" class="submit_btn" value="SIGN UP & CREATE STORE"/>
             <?php echo $this->form->end(); ?>
             <!--<button><a href="#">SIGN UP & CREATE STORE</a></button>-->
             <!--<span>Or use an existing account</span>-->
             
         </div>
      </div>
    
    </div>


</div>
</div>
</div>

<!--- model 7 ---->
<div id="myModal7" class="modal fade in" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;">
<div class="modal-dialog1" role="document">
<div class="modal-content1">
<div class="modal-header">
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true"><i class="fa fa-close"></i></span>
</button>
</div>

    <div class="lst">
    
      <div class="col-sm-6 col-sm-offset-3">
         
         <div class="blk_ctnt" id="CreateUser">
             <h2 align="center">Create your store</h2>
             <p align="center">No credit card required. Change your template at any time</p>
             <?php echo $this->Form->create('RequestedRestaurant',array('action'=>'requestforarestaurant','class'=>'blk_fm','id'=>'UploadLogo','type'=>'file'));
             ?>
             <input type='hidden' name="data[RequestedRestaurant][id]" id='request_id' value="1" >
            <textarea name="data[RequestedRestaurant][description]">Write description here</textarea>
            <input type="file" id='file' name="data[RequestedRestaurant][logo]"/>
             <input type="submit" id="submitlogoform" class="submit_btn" value="SIGN UP & CREATE STORE"/>
             <?php echo $this->form->end(); ?>
         </div>
      </div>
    
    </div>


</div>
</div>
</div>

<section class="lcd">
 <div class="container">
 
 <div class="col-md-12">
 <div class="row">
 
   <div class="col-xs-12 col-sm-8 col-md-8">
     <div class="last_img">
         <?php
         if($selected_theme['Theme']['full_image'] != ''){
            echo $this->Html->Image('/files/themes/' . $selected_theme['Theme']['full_image'], array('alt' => $selected_theme['Theme']['full_image']));
         }else{ ?>
         <img src="<?php echo $this->webroot; ?>/img/lst_img.jpg" />
        <?php }
          ?>
       <!--<img src="images/lst_img.jpg" />-->
     </div>
   </div>
   
   <div class="col-xs-12 col-sm-4 col-md-4">
     <div class="last_cnt">
       <h3 align="center">BRING8</h3>
       <p align="center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
       
       <button class="lst_btn" type="button" data-toggle="modal" data-target="#myModal5"><a href="#">START WITH BRING</a></button>
            
       
       <button class="lst_btn2"><a href="#">PRIVIEW BRING</a></button>
       
     </div>
   </div>
 
 </div>
 </div>
 
 
 <div class="col-md-12">
 <div class="row">
 
     <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="heading1">
         <h4>LOREM IPSUM IS SIMPLY DUMMY TEXT</h4>
         <h6>Lorem is Ipsum is simply dummy text of the printing</h6>
         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
     </div>
     
     <div class="col-xs-12 col-sm-6 col-md-6">
           <div class="heading1">
         <h4>LOREM IPSUM IS SIMPLY DUMMY TEXT</h4>
         <h6>Lorem is Ipsum is simply dummy text of the printing</h6>
         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
     </div>
 
 </div>
 </div>
   
   <div class="col-xs-12 col-sm-12 col-md-12 ssp">
     <div class="lorem2">
       <h5 style="width:100%;float:left;color:#111;"><strong>LOREM IPSUM IS SIMPLY DUMMY TEXT OF PRINTING</strong></h5>
     </div>
     </div>

   
   <div class="col-md-12">
   
    <div class="row">
       <?php if(isset($themes)){
       foreach($themes as $theme){ ?>
        <div class="col-xs-12 col-sm-4 col-md-4">
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
                    <div class="pc_bg"> <?php echo $this->Html->Image('/img/pc_1.jpg'); ?> </div>
            </div>
       </div>
       <?php }
       } ?>
      
    </div>
   
   </div>
   
 </div>
</section>
<script type="text/javascript">
    $("#submitform").click(function(event){
        event.preventDefault();
        if($('input[name = "data[RequestedRestaurant][firstname]"]').val() !='' && $('input[name = "data[RequestedRestaurant][lastname]"]').val() != ''
                && $('input[name = "data[RequestedRestaurant][email]"]').val() !='' && $('input[name = "data[RequestedRestaurant][password]"]').val() !=''
                ){
                     var form_data = $("#UserRequestforarestaurantForm").serialize();
                    $.ajax({
                        type: "POST",
                        url: "http://rajdeep.crystalbiltech.com/8bring_akshay/users/requestforarestaurant",
                        data: form_data,
                        success: function(response){
                            console.log(response)
                            response = jQuery.parseJSON(response);
                            if(response.status == true){
                                $("#userId").val(response.user_id);
                                $("#myModal5").hide();
                                $("#myModal6").show();
                            }
                        }
                    });
                }else{
                    alert("Please fill fields");
                }
       
    })
   $("#restaurant_info").click(function(event){
        event.preventDefault();      
        var form_data = $("#RequestedRestaurantAddForm").serialize();
        $.ajax({
            type: "POST",
            url: "http://rajdeep.crystalbiltech.com/8bring_akshay/requested_restaurants/add",
            data: form_data,
            success: function(response){
                console.log(response)
                response = jQuery.parseJSON(response);
                if(response.status == true){
                    $("#request_id").val(response.request_id);
                    $("#myModal6").hide();
                    $("#myModal7").show();
                }
            }
        });
    })
    $("#submitlogoform").click(function(event){
        event.preventDefault();
        var data = new FormData();
        var logo_array = $("#file")[0].files[0];
        data.append('logo',logo_array)
        data.append('description',$('textarea[name = "data[RequestedRestaurant][description]"]').val());
        data.append('request_id',$('input[name = "data[RequestedRestaurant][id]"]').val());
        $.ajax({
            type: "POST",
            url: "http://rajdeep.crystalbiltech.com/8bring_akshay/requested_restaurants/upload_logo",
            data: data,
            processData: false, contentType: false,
            success: function(response){
//                console.log(response)
                response = jQuery.parseJSON(response);
                if(response.status == true){
                    alert(response.msg);
                    $("#myModal7").hide();
                    window.location.href = "<?php echo Router::url('/', true) ?>";
                }
            }
        });
    })
    var memberhipId = localStorage.getItem("membership_id");
    $("#membershipId").val(memberhipId);
    
    $("#UserRequestforarestaurantForm").validate();
</script>
