<style> 
.row.rowwww {
    margin-top: 0;
}
.table td.total_confirm {
    font-size: 17px !important;
    font-weight: bold;
    text-align: left;
}
table.nomargin td {
    text-align: left;
}
.table td.total_confirm {
    font-weight: bold;
    font-size: 18px;
    background-color: #999;
}
 @media (max-width: 1280x) {}
 @media (max-width: 980px) {}
 @media (max-width: 800px) {.container.margin_60_35 {
    margin-top: 92px !important;
    padding-top: 0 !important;
}}
 @media (max-width: 768px) {.container.margin_60_35 {
    margin-top: 84px !important;
    padding-top: 0 !important;
}}
@media (max-width: 414px){ 
.table td.total_confirm {
    font-size: 13px !important;
    padding: 13px 8px;
    width: 50%;
}
.row.row.rowwww strong {
    font-size: 11px;
}
.total_confirm{padding-left:0; padding-right:0;}
}
 @media (max-width: 360px) {.container.margin_60_35 {
    margin-top: 78px !important;
}}
 @media (max-width: 320px) {.container.margin_60_35 {
    margin-top: 78px !important;
}}
</style>

<?php
Configure::write('debug', 0);
 //$this->Html->addCrumb('Order Success'); ?>
<div class="banner_slide" style="width:100% !important; overflow:hidden;"> 
	<img style="width:100% !important; margin-top: -25%;" src="<?php echo $this->webroot ?>files/restaurants/<?php echo $res_logo; ?>" />
   <h2><?php echo $res_name; ?></h2>
    <div class="abcdef"> </div>
</div><!--banner_slide-->
    
    <div class="bg_reserv"> 
       <div class="container">
  			<div class="row top_a "> 
        		<div class="icon-wrap wrap_icon"><img src="<?php echo $this->webroot ?>img/icon-reserve-app.svg"></div>
  			 <h2>RESERVATIONS AVAILABLE WITH THE DROP IN APP</h2>
      <p><?php echo $res_name; ?> accepts requests for reservations through the Drop In mobile app.</p>
 			</div><!--row-->
       </div><!--container-->
   </div> <!--bg_reserv-->

















<div class="container margin_60_35">

	<div class="row row rowwww">
		<div class="col-md-offset-2 col-md-7">
			<div class="box_style_2" style="box-shadow: 0 0 1px #c5c5c5;">
				<h2 class="inner">Order confirmed!</h2>
				<div id="confirm">
					<i class="icon_check_alt2"></i>
					<h3>Thank You for Your Order !</h3>
					<!--<p>
						It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
					</p>-->
				</div>
				<h4>Summary</h4>
				<table class="table table-striped nomargin"> 
				<tbody>
                                    <?php foreach($shop['OrderItem'] as $key=>$value) { ?>
				<tr>
					<td>
						<strong><?php echo $shop['OrderItem'][$key]['quantity']; ?>x</strong> <?php echo $shop['OrderItem'][$key]['name']; ?>
					</td>
					<td>
						<strong class="pull-right">KD <?php $ord_price = $shop['OrderItem'][$key]['price'];
						echo number_format($ord_price,3);
						 ?></strong>
					</td>
				</tr>
                                    <?php }?>
			
            
            <?php @$delivery_schedule_day = $shop['Order']['delivery_schedule_day'];
				  @$noofperson = $shop['Order']['noofperson'];
				  //echo $perpersonrate; 
				  @$delivery_schedule_time = $shop['Order']['delivery_schedule_time'];
			if($deliverttime or $noofperson or $delivery_schedule_time){
			?> 
            
                <tr style="background:#fff !important;">
					<td>
						<h4>Schedule Time </h4>
					</td>
					<td>
	
                        </strong>
					</td>
				</tr>
                     
                
                 <tr style="background-color: #f9f9f9;">
				<td> Day:</td>
					<td colspan="2">
					<strong class="pull-right">
                        <?php echo $shop['Order']['delivery_schedule_day']?> 
                       
                        </strong>
					</td>
				</tr>
                
                 <tr style="background:#fff !important;">
					<td>Time: </td>
                    <td>
						<strong class="pull-right">
                       
                        <?php echo $shop['Order']['delivery_schedule_time']?>
                      
                        </strong>
					</td>
				</tr>
                
                
                 <!--<tr style="background-color: #f9f9f9;">
					<td>Sitting charges:</td>
                  <td>  
					<strong class="pull-right">
                       
                        <?php
						//$perpersonrate['Order']['perpersonrate']
						//echo '5'.' X '.$shop['Order']['noofperson'];
						//echo ' = ';
						// echo $settingx = $shop['Order']['noofperson']* 5;//$perpersonrate['Order']['perpersonrate']?>
                        </strong>
					</td>
				</tr>-->
                
                 <?php }?>
                           
                	<tr>
					<td class="total_confirm">
						Quantity
					</td>
					<td class="total_confirm">
						<span class="pull-right"><?php echo $shop['Order']['quantity'];
						//echo '<br/>';
						//echo $perpersonrate;?></span>
					</td>
				</tr>
                <?php /*if($shop['Order']['pickup_date'] and $shop['Order']['pickup_time']){ ?>
                
                <tr>
					<td class="total_confirm">
						PickUp Date
					</td>
					<td class="total_confirm">
						<span class="pull-right"><?php echo $shop['Order']['pickup_date'];?></span>
					</td>
				</tr>
                
                <tr>
					<td class="total_confirm">
						PickUp Time
					</td>
					<td class="total_confirm">
						<span class="pull-right"><?php echo $shop['Order']['pickup_time'];?></span>
					</td>
				</tr>
                <?php }*/?>
				
				<tr>
					<td class="total_confirm">
						 Sub TOTAL
					</td>
					<td class="total_confirm">
						<span class="pull-right">KD <?php $subtotal_var =  $shop['Order']['subtotal'];
						echo number_format($subtotal_var,3);
						?></span>
					</td>
				</tr>
                
                <tr>
					<td class="total_confirm">
						 Surcharge
					</td>
					<td class="total_confirm">
						<span class="pull-right">KD <?php $surcharge;
						echo number_format($surcharge,3);
						echo $shop['Order']['pickup_time'];
						?></span>
					</td>
				</tr>
                
                 <?php @$ordertax = $shop['Order']['tax']; 
				if($ordertax){?>
                                <tr>
					<td class="total_confirm">
						 Tax
					</td>
					<td class="total_confirm">
						<span class="pull-right">KD <?php $taxtotal_var = $shop['Order']['tax'];
						echo number_format($taxtotal_var,3);
						?></span>
					</td>
				</tr>
           		<?php }?> 
                
				<tr>
					<td class="total_confirm">
						 TOTAL
					</td>
					<td class="total_confirm">
						<span class="pull-right">KD <?php $grandtotal = $shop['Order']['total'];
						echo number_format($grandtotal,3);
						?></span>
					</td>
				</tr>
				</tbody>
				</table>
			</div>
		</div>
	</div><!-- End row -->
</div><!-- End container -->


