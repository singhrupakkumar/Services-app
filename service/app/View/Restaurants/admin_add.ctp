<style>legend{
    display:none;}
    button, html input[type="button"], input[type="reset"], input[type="submit"] {
        cursor: pointer;
        color: black;}

    </style>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Bar</h3>
          </div>
            <?php //debug($restype); exit;  
            $x = $this->Session->flash();
            if ($x) { ?>
            <div class="alert success">
                <span class="icon"></span>
                <strong></strong>
                <?php echo $x; ?>
            </div>
            <?php } ?>


            <?php echo $this->Form->create('Restaurant', array('type' => 'file')); ?>

            <div class="box-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Name :</label>
                    <input type="text" name="data[Restaurant][name]" class="form-control" id="exampleInputEmail1" required placeholder="Enter Bar Name">
                </div>

                <div class="form-group">
                    <label>Select Multiple Venue Category : </label>
                    <select multiple="" required="true" class="form-control" name="data[Restaurant][typeid][]">
                        <?php
                        foreach ($restype as $key=>$value) {
                            echo "<option value='".$key."'>".$value."</option>";
                        };
                        ?>
                    </select>
                </div>



                <?php // echo $this->Form->input('typeid', ['options' => $restype, 'label' => 'Type:']); ?>

            <!-- <div class="form-group">
              <?php echo $this->Form->input('name', array('class' => 'form-control', 'value'=>$rname,'label' => 'Name:')); ?>
          </div> -->

          <div class="form-group">
            <?php echo $this->Form->input('phone',  array('class' => 'form-control', 'label' => 'Phone :',"required")); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('owner_name', array('class' => 'form-control', 'label' => 'Owner Name:',"required")); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('owner_phone', array('class' => 'form-control', 'label' => 'Owner Phone:',"required")); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('address', array('class' => 'form-control', 'label' => 'Address:',"required")); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('city', array('class' => 'form-control', 'label' => 'City:',"required")); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('state', array('class' => 'form-control', 'label' => 'State:',"required")); ?>
        </div>

 
        <div class="form-group">
            <?php echo $this->Form->input('country', array('class' => 'form-control', 'label' => 'Country:',"required")); ?>
        </div>  
        

        <!-- <div class="form-group">
            <?php echo $this->Form->input('zip', array('class' => 'form-control', 'label' => 'Zip:',"required")); ?></div> -->

            <!-- <div class="form-group">
                <?php echo $this->Form->input('latitude', array('class' => 'form-control', 'label' => 'Latitude :',"required")); ?>   
            </div>


            <div class="form-group">
                <?php echo $this->Form->input('longitude', array('class' => 'form-control', 'label' => 'Longitude:',"required")); ?>    
            </div> -->



                   <!--  <div class="form-group">
<?php //echo $this->Form->input('details',array('class'=>'form-control','label'=>'Details:'));  ?>
</div> -->
<div class="form-group">
    <?php echo $this->Form->input('description', array('class' => 'form-control', 'label' => 'Description:',"required")); ?>
</div>
                     <div class="form-group">
<?php echo $this->Form->input('logo', array('type' => 'file', 'class' => 'form-control', 'label' => 'Logo : 1080x660 px')); ?>
</div> 

<div class="form-group">
    <?php echo $this->Form->input('bannerone', array('type' => 'file', 'class' => 'form-control', 'label' => 'Banner 1 : 1080x660 px ',"required")); ?>
</div>

<div class="form-group">
    <?php echo $this->Form->input('bannertwo', array('type' => 'file', 'class' => 'form-control', 'label' => 'Banner 2 : 1080x660 px',"required")); ?>
</div>
<div class="form-group">
    <?php echo $this->Form->input('bannerthree', array('type' => 'file', 'class' => 'form-control', 'label' => 'Banner 3 : 1080x660 px',"required")); ?>
</div> 
<div class="form-group">
    <?php echo $this->Form->input('bannerfour', array('type' => 'file', 'class' => 'form-control', 'label' => 'Banner 4 : 1080x660 px',"required")); ?>
</div>




<div class="form-group">
    <?php echo $this->Form->input('website', array('class' => 'form-control', 'label' => 'Website :')); ?>
</div>
<div class="form-group">
    <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => 'Owner Email:','required')); ?>
</div> 
    

<div class="form-group">
    <?php echo $this->Form->input('facebook', array('type'=>'text','class' => 'form-control', 'label' => 'Facebook :')); ?>
</div>


<div class="form-group">
    <table style="width:100%" class="maintable" border="1px solid #fff">
        <thead>
            <th>Day</th>
            <th>Opening</th>
            <th>Closing</th>
        </thead>
        <tbody>
            <tr>
                <td>Sunday</td>
                <td>
                   <?php echo $this->Form->input('sun_open', array('type' => 'time')); ?>
                </td>

                <td>
                     <?php echo $this->Form->input('sun_close', array('type' => 'time')); ?>
                </td>
            </tr>
            <tr>
                <td>Monday</td>
                <td>
                   <?php echo $this->Form->input('mon_open', array('type' => 'time')); ?>
                </td>

                <td>
                     <?php echo $this->Form->input('mon_close', array( 'type' => 'time')); ?>
                </td>
            </tr>
            <tr>
                <td>Tuesday</td>
                <td>
                   <?php echo $this->Form->input('tue_open', array('type' => 'time')); ?>
                </td>

                <td>
                     <?php echo $this->Form->input('tue_close', array('type' => 'time')); ?>
                </td>
            </tr>
            <tr>
                <td>Wednesday</td>
                <td>
                   <?php echo $this->Form->input('wed_open', array('type' => 'time')); ?>
                </td>

                <td>
                     <?php echo $this->Form->input('wed_close', array( 'type' => 'time')); ?>
                </td>
            </tr> 
            <tr>
                <td>Thurusday</td>
                <td>
                   <?php echo $this->Form->input('thu_open', array('type' => 'time')); ?>
                </td>

                <td>
                     <?php echo $this->Form->input('thu_close', array('type' => 'time')); ?>
                </td>
            </tr>
            <tr>
                <td>Friday</td>
                <td>
                   <?php echo $this->Form->input('fri_open', array('type' => 'time')); ?>
                </td>

                <td>
                     <?php echo $this->Form->input('fri_close', array( 'type' => 'time')); ?>
                </td>
            </tr>
            <tr>
                <td>Saturday</td>
                <td>
                   <?php echo $this->Form->input('sat_open', array('type' => 'time')); ?>
                </td>

                <td>
                     <?php echo $this->Form->input('sat_close', array('type' => 'time')); ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<style>
.maintable label{ display:none; }
</style>

               <!--                       <div class="form-group">
<?php //echo $this->Form->input('delivery_distance', array('class' => 'form-control', 'label' => 'Delivery Distance in miles:')); ?>
</div>-->
                    <!-- <div class="form-group">
                        <input type="checkbox" name="data[Restaurant][delivery]" value="1" />
                        <label>delivery</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="data[Restaurant][takeaway]" value="1"/>
                        <label>Takeaway</label>
                    </div> -->
                   <!--  <div class="form-group">
                    <?php echo $this->Form->input('delivery_fee', array('class' => 'form-control', 'label' => 'Delivery Fee:')); ?>
                </div> -->

                 <!-- <div class="form-group">
                    <?php echo $this->Form->input('opening_time', array('class' => 'form-control', 'label' => 'Opening Time:', 'type' => 'time')); ?>
                </div>

                <div class="form-group">
                    <?php echo $this->Form->input('closing_time', array('class' => 'form-control', 'label' => 'Closing Time:', 'type' => 'time')); ?>
                </div>
                    <div class="form-group">
<?php echo $this->Form->input('taxes', array('class' => 'form-control', 'label' => 'Tax', 'type' => 'text')); ?>
</div> -->
                    <!-- <div class="form-group">
<?php //echo $this->Form->input('prayer_time',array('class'=>'form-control','label'=>'Prayer Time:','type'=>'time'));	 ?>
                    </div> 
                    <div class="form-group">
<?php //echo $this->Form->input('contact_person_fname',array('class'=>'form-control','label'=>'Contact:'));	 ?>
</div>-->

                    <!--                    <div class="form-group"><?php //$options = array('hh','gg','sss'); ?>
<?php //echo $this->Form->radio('Amities',$options ,array('class'=>'form-control','label'=>'Amities:'));	 ?>
</div>-->





                    <?php //$options = array(1 => 'ONE', 'TWO', 'THREE');
                    //$selected = array(1, 3); , 'selected' => $selected
                    ?>
                    <?php //echo $this->Form->input('amities_selected', array('label'=>'Amenities','class'=>'form-control','multiple' => 'checkbox', 'options' => $Restaurantx));	 ?>
                    <?php //echo $this->Form->checkbox('done', array('value' => 555,'label'=>'fggf'));  ?>




                    <input type="hidden" name="data[Restaurant][created]" value="
                    <?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="data[Restaurant][user_id]" value="2">
                    <input type="hidden" name="data[Restaurant][status]" value="1">
                     <div class="form-group">
                          <?php  echo $this->Form->input('is_featured', array('class' => 'form-control1', 'type'=>'checkbox', 'label' => 'Top Bar')); ?>
                </div>
                    <br>
                    <div class="btn btn-success"><input class="submitres" type="submit" value="Save"></div>



                    <?php //echo $this->Form->submit('Save', array('formnovalidate' => true, 'class' => "submitres", 'div' => array('class' => 'btn btn-success'))); ?>

                    <a href=" 
                    <?php echo $this->Html->url(array('controller' => 'Restaurants', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-danger">Cancel
                </a>
            </div>          
            <?= $this->Form->end() ?>
        </div>
    </div>
</section>

<style>
   .submitres {
    border: none;
    background: none;
}



</style>