  <section class="content">
    <div class="header">
        <h2>View Bar</h1>     
    </div>

        <div class="admin_outer">
        <div class="restaurant_table2 custom_boxed">
        <?php
        $x = $this->Session->flash();
        ?>
        <?php if ($x) { ?>
        <div class="alert success">
        <span class="icon"></span>
        <strong><?php echo $x; ?></strong>
        </div>
        <?php } ?>
      
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo h($restaurant['Restaurant']['name']);?></td>
                                </tr>
                                <tr>
                                    <th>Venue Category</th>
                                    <td><?php
                                    // echo "<pre>";
                                    // print_r($restauranttype);
                                    // echo "</pre>";
                                    $counter = 0;
                                        foreach ($restauranttype as $value) {
                                            if($counter==0){
                                                echo $value['RestaurantsType']['name'];
                                            }
                                            else{
                                                echo ', '.$value['RestaurantsType']['name'];
                                            }
                                            $counter++;
                                        }

                                     ?></td>
                                </tr>
                              
                                <tr>
                                    <th>Phone</th>
                                    <td><?php echo h($restaurant['Restaurant']['phone']); ?></td>
                                </tr>
                                <tr>
                                    <th>Owner Name</th>
                                    <td><?php echo h($restaurant['Restaurant']['owner_name']); ?></td>
                                </tr>
                                <tr>
                                    <th>Owner Phone</th>
                                    <td><?php echo h($restaurant['Restaurant']['owner_phone']); ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?php echo h($restaurant['Restaurant']['address']); ?></td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td><?php echo h($restaurant['Restaurant']['city']); ?></td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td><?php echo h($restaurant['Restaurant']['state']); ?></td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td><?php echo h($restaurant['Restaurant']['country']); ?></td>
                                </tr>
                              
                                <tr>
                                    <th>Description</th>
                                    <td><?php echo h($restaurant['Restaurant']['description']); ?></td>
                                </tr>
                                <tr>
                                    <th>Logo</th>
                                    <td><?php
                    $restaurantPath = '/files/restaurants/';
                    echo $this->Html->image($restaurantPath . $restaurant['Restaurant']['logo'], array('alt' => 'Bar Logo', 'width' => 100));
                    ?></td>
                                </tr>

                                <tr>
                                    <th>Banner1</th>
                                    <td><?php
                    $restaurantPath = '/files/restaurants/';
                    echo $this->Html->image($restaurantPath . $restaurant['Restaurant']['bannerone'], array('alt' => 'Bar Logo', 'width' => 100));
                    ?></td>
                                </tr>
                                <tr>
                                    <th>Banner2</th>
                                    <td><?php
                    $restaurantPath = '/files/restaurants/';
                    echo $this->Html->image($restaurantPath . $restaurant['Restaurant']['bannertwo'], array('alt' => 'Bar Logo', 'width' => 100));
                    ?></td>
                                </tr>
                                <tr>
                                    <th>Banner3</th>
                                    <td><?php
                    $restaurantPath = '/files/restaurants/';
                    echo $this->Html->image($restaurantPath . $restaurant['Restaurant']['bannerthree'], array('alt' => 'Bar Logo', 'width' => 100));
                    ?></td>
                                </tr>

                                <tr>
                                    <th>Banner4</th>
                                    <td><?php
                    $restaurantPath = '/files/restaurants/';
                    echo $this->Html->image($restaurantPath . $restaurant['Restaurant']['bannerfour'], array('alt' => 'Bar Logo', 'width' => 100));
                    ?></td>
                                </tr>



                                <tr>
                                    <th>Website</th>
                                    <td><?php echo h($restaurant['Restaurant']['website']); ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo h($restaurant['Restaurant']['email']); ?></td>
                                </tr>

                                <tr>
                                    <th>Facebook</th>
                                    <td><?php echo h($restaurant['Restaurant']['facebook']); ?></td>
                                </tr>
                                <tr>    
                                <th>Sunday
                                </th>
                                <td>
                                <?php echo h($restaurant['Restaurant']['sun_open']); ?> - <?php echo h($restaurant['Restaurant']['sun_close']); ?>
                                </td>
                                </tr> <tr>    
                                <th>Monday
                                </th>
                                <td><?php echo h($restaurant['Restaurant']['mon_open']); ?> - <?php echo h($restaurant['Restaurant']['mon_close']); ?>
                                </td>
                                </tr> <tr>    
                                <th>Tuesday
                                </th>
                                <td><?php echo h($restaurant['Restaurant']['tue_open']); ?> - <?php echo h($restaurant['Restaurant']['tue_close']); ?>
                                </td>
                                </tr> <tr>    
                                <th>Wednesday 
                                </th>
                                <td><?php echo h($restaurant['Restaurant']['wed_open']); ?> - <?php echo h($restaurant['Restaurant']['wed_close']); ?>
                                </td>
                                </tr> <tr>    
                                <th>Thursday
                                </th>
                                <td><?php echo h($restaurant['Restaurant']['thu_open']); ?> - <?php echo h($restaurant['Restaurant']['thu_close']); ?>
                                </td>
                                </tr> <tr>    
                                <th>Friday
                                </th>
                                <td><?php echo h($restaurant['Restaurant']['fri_open']); ?> - <?php echo h($restaurant['Restaurant']['fri_close']); ?>
                                </td>
                                </tr> <tr>    
                                <th>Saturday
                                </th>
                                <td><?php echo h($restaurant['Restaurant']['sat_open']); ?> - <?php echo h($restaurant['Restaurant']['sat_close']); ?>
                                </td>
                                </tr>

                              <!--   <tr>
                                    <th>Opening Time</th>
                                    <td><?php echo h($restaurant['Restaurant']['sun_open']); ?></td>
                                </tr>
                                 <tr>
                                    <th>Closing Time</th>
                                    <td><?php echo h($restaurant['Restaurant']['closing_time']); ?></td>
                                </tr> -->
                                
                                
                            </thead>
                        </table>
                    </div>
                </div>
                </div>

</section>
            <style>
                .authors-booked {
                    width: 5px;
                    height: 5px;
                    background: #ff0000;
                    float: left;
                    border-radius: 50%;
                }
                .authors-unbooked {
                    width: 5px;
                    height: 5px;
                    background: #fff;
                    float: left;
                    border-radius: 50%;
                }

            </style>
