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
              <h3 class="box-title">Edit Bar</h3>
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



            <?php echo $this->Form->create('Restaurant', array('id' => 'tab', 'type' => 'file')); ?>

            <div class="box-body">


            <div class="form-group">
                <label for="exampleInputEmail1">Name :</label>
                <input type="text" name="data[Restaurant][name]" class="form-control" id="exampleInputEmail1" value="<?php echo $Restaurant['Restaurant']['name']; ?>" required placeholder="Enter Bar Name">
            </div>

            <div class="form-group">
            <label>Select Multiple Drink Category : </label>
            <select multiple="" required="true" class="form-control" name="data[Restaurant][typeid][]">
                <?php
                foreach ($restype as $key=>$value) {
                    $main= "XXX-".$key;
                    
                    if (strpos($Restaurant['Restaurant']['typeid'],$main) !== false) {
                     
                        echo "<option selected value='".$key."'>".$value."</option>";
                    }
                    else
                    {
                        echo "<option value='".$key."'>".$value."</option>";
                        
                    }
                };
            ?>
            </select>
            </div>
               
                
                <div class="form-group">
                    <?php echo $this->Form->input('phone', array('class' => 'form-control', 'label' => 'Phone:')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('owner_name', array('class' => 'form-control', 'label' => 'Owner Name:')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('owner_phone', array('class' => 'form-control', 'label' => 'Owner Phone:')); ?>
                </div>
                <!--                <div class="form-group">
                                    <label>Select Address:</label>
                                    <input id="autocomplete" placeholder="Select Address" onFocus="geolocate()" type="text" class="form-control"></input>
                                </div>-->
                
                <!-- <div class="form-group">          
                    <?php //echo $this->Form->input('street_number', array('class' => 'form-control', 'label' => 'Street Number:', 'id' => 'street_number')); ?>
                </div>
                <div class="form-group">
                    <?php //echo $this->Form->input('street', array('class' => 'form-control', 'label' => 'Street:', 'id' => 'route')); ?>
                </div> -->
                <div class="form-group">
                    <?php echo $this->Form->input('address', array('class' => 'form-control', 'label' => 'Address:')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('city', array('class' => 'form-control', 'label' => 'City:', 'id' => 'locality')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('state', array('class' => 'form-control', 'label' => 'State:', 'id' => 'administrative_area_level_1')); ?>
                </div>

                 <div class="form-group">
            <?php echo $this->Form->input('country', array('class' => 'form-control', 'label' => 'Country:',"required")); ?>
        </div>  
              <!--   <div class="form-group">
                    <?php echo $this->Form->input('zip', array('class' => 'form-control', 'label' => 'Zip:','id' => 'postal_code')); ?>
                </div>  -->
                
                
               <!--  <div class="form-group">
                <?php echo $this->Form->input('latitude', array('class' => 'form-control', 'label' => 'Latitude', 'type' => 'number')); ?>
                </div>
                <div class="form-group">
                <?php echo $this->Form->input('longitude', array('class' => 'form-control', 'label' => 'Logitude', 'type' => 'number')); ?>
                </div> 
                 -->
                
                         
                <div class="form-group">
                    <?php echo $this->Form->input('description', array('class' => 'form-control', 'label' => 'Description:')); ?>
                </div>
                <div class="form-group">
                   
                    <?php
                    $restaurantPath = '/files/restaurants/';
                    echo $this->Html->image($restaurantPath . $Restaurant['Restaurant']['logo'], array('alt' => 'Bar Logo', 'width' => 100));
                    ?>
                    <?php echo $this->Form->input('logo', array('type' => 'file', 'class' => 'form-control', 'label' => 'Logo : ')); ?>
                
                </div> 

                <div class="form-group">
                   
                    <?php
                    $restaurantPath = '/files/restaurants/';
                    echo $this->Html->image($restaurantPath . $Restaurant['Restaurant']['bannerone'], array('alt' => 'Banner1', 'width' => 100));
                    ?>
                    <?php echo $this->Form->input('bannerone', array('type' => 'file', 'class' => 'form-control', 'label' => 'Banner1 : ')); ?>
                
                </div> 

                <div class="form-group">
                   
                    <?php
                    $restaurantPath = '/files/restaurants/';
                    echo $this->Html->image($restaurantPath . $Restaurant['Restaurant']['bannertwo'], array('alt' => 'Banner2', 'width' => 100));
                    ?>
                    <?php echo $this->Form->input('bannertwo', array('type' => 'file', 'class' => 'form-control', 'label' => 'Banner2 : ')); ?>
                
                </div> 

                <div class="form-group">
                   
                    <?php
                    $restaurantPath = '/files/restaurants/';
                    echo $this->Html->image($restaurantPath . $Restaurant['Restaurant']['bannerthree'], array('alt' => 'Banner3', 'width' => 100));
                    ?>
                    <?php echo $this->Form->input('bannerthree', array('type' => 'file', 'class' => 'form-control', 'label' => 'Banner3 : ')); ?>
                
                </div> 

                <div class="form-group">
                   
                    <?php
                    $restaurantPath = '/files/restaurants/';
                    echo $this->Html->image($restaurantPath . $Restaurant['Restaurant']['bannerfour'], array('alt' => 'Banner4', 'width' => 100));
                    ?>
                    <?php echo $this->Form->input('bannerfour', array('type' => 'file', 'class' => 'form-control', 'label' => 'Banner4 : ')); ?>
                
                </div> 

              
            <div class="form-group">
    <?php echo $this->Form->input('website', array('class' => 'form-control', 'label' => 'Website :')); ?>
</div>
<div class="form-group">
    <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => 'Owner Email:','required')); ?>
</div> 
    

<div class="form-group">
    <?php echo $this->Form->input('facebook', array('class' => 'form-control', 'label' => 'Facebook :','type'=>'text')); ?>
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
             

               <div class="form-group">
                          <?php  echo $this->Form->input('is_featured', array('class' => 'form-control1', 'type'=>'checkbox', 'label' => 'Top Bar')); ?>
                </div>
                    <br>
                <input type="hidden" name="data[Restaurant][created]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                
               <!-- <input type="hidden" name="data[Restaurant][latitude]" value="" id="latitude">
                <input type="hidden" name="data[Restaurant][longitude]" value="" id="longitude">-->
                <input type="hidden" name="data[Restaurant][status]" value="1">
                <div class="btn-toolbar list-toolbar">
                    <?php echo $this->Form->submit('Update', array('formnovalidate' => true, 'class' => "btn btn-danger")); ?>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Restaurants', 'action' => 'admin_index')); ?>" data-toggle="modal" class="btn btn-primary">Cancel</a>
                </div>
                </div>
                </form>
               </div>
               </div>
               </div>
               </section>