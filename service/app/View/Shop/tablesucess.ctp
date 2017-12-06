<?php //$this->Html->addCrumb('Order Success'); ?>

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_cart.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
    	<div id="sub_content">
    	 <h1>Place your order</h1>
            <div class="bs-wizard">
                <div class="col-xs-4 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum"><strong>1.</strong> Your details</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="cart.html" class="bs-wizard-dot"></a>
                </div>
                               
                <div class="col-xs-4 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum"><strong>2.</strong> Payment</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="cart_2.html" class="bs-wizard-dot"></a>
                </div>
            
              <div class="col-xs-4 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum"><strong>3.</strong> Finish!</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#0" class="bs-wizard-dot"></a>
                </div>  
		</div><!-- End bs-wizard --> 
        </div><!-- End sub_content -->
	</div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#0">Home</a></li>
                <li><a href="#0">Category</a></li>
                <li>Page active</li>
            </ul>
        </div>
    </div><!-- Position -->
<!-- Content ================================================== -->
<div class="container margin_60_35">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="box_style_2">
				<h2 class="inner">Table Reservation confirmed!</h2>
				<div id="confirm">
					<i class="icon_check_alt2"></i>
					<h3>Thank you!</h3>
					<p>
						Thank You for Your Table Reservation !
                                                <br/>
                                                please keep close your booking ID and show to restaurant
					</p>
				</div>
				<h4>Reservation Summary</h4>
				<table class="table table-striped nomargin">
				<tbody>
                             
                                <style type="text/css">
                                    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
                                        width: 100%;
                                        float: left;
                                    }
                                </style>
                                 
				<tr>
					<td>
						<strong>First Name: <?php echo $data['TableReservation']['fname']; ?> </strong> 
					</td>
					<td>
						<strong>Last Name: <?php echo $data['TableReservation']['lname']; ?> </strong> 
					</td>
                                        <td>
						<strong>Address: <?php echo $data['TableReservation']['address']; ?> </strong> 
					</td>
                                        
                                        <td>
						<strong>City: <?php echo $data['TableReservation']['city']; ?> </strong> 
					</td>
                                        <td>
						<strong>Zip: <?php echo $data['TableReservation']['zip']; ?> </strong> 
					</td>
                                        <td>
						<strong>Delivery Day: <?php echo $data['TableReservation']['d_day']; ?> </strong> 
					</td><td>
						<strong>Delivery Time: <?php echo $data['TableReservation']['d_time']; ?> </strong> 
					</td>
                                        <td>
						<strong>No of people: <?php echo $data['TableReservation']['no_of_people']; ?> </strong> 
					</td>
                                        <td>
						<strong>Notes: <?php echo $data['TableReservation']['notes']; ?> </strong> 
					</td>
                                          <td>
						<strong>Booking Id: <?php echo $data['TableReservation']['id']; ?> </strong> 
					</td>
                                        
				</tr>
                                   
			
				
				
				</tbody>
				</table>
			</div>
		</div>
	</div><!-- End row -->
</div><!-- End container -->


