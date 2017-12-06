<?php //$this->Html->addCrumb('Order Success'); ?>


<!-- Content ================================================== -->
<div class="container margin_60_35">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="box_style_2">
				<h2 class="inner">Order confirmed!</h2>
				<div id="confirm">
					<i class="icon_check_alt2"></i>
					<h3>Thank you!</h3>
					<p>
						Thank You for Your Order !
					</p>
				</div>
				<h4>Order Summary</h4>
				<table class="table table-striped nomargin">
				<tbody>
                                    <?php foreach($shop['OrderItem'] as $key=>$value) { ?>
				<tr>
					<td>
						<strong><?php echo $shop['OrderItem'][$key]['quantity']; ?>x</strong> <?php echo $shop['OrderItem'][$key]['name']; ?>
					</td>
					<td>
						<strong class="pull-right">$<?php echo$shop['OrderItem'][$key]['price']; ?></strong>
					</td>
				</tr>
                                    <?php }?>
				<tr>
					<td class="total_confirm">
						Quantity
					</td>
					<td class="total_confirm">
						<span class="pull-right"><?php echo $shop['Order']['quantity']?></span>
					</td>
				</tr>
				
				<tr>
					<td class="total_confirm">
						 Sub TOTAL
					</td>
					<td class="total_confirm">
						<span class="pull-right">$<?php echo $shop['Order']['subtotal']?></span>
					</td>
				</tr>
                                <tr>
					<td class="total_confirm">
						 Tax
					</td>
					<td class="total_confirm">
						<span class="pull-right">$<?php echo $shop['Order']['tax']?></span>
					</td>
				</tr>
				<tr>
					<td class="total_confirm">
						 TOTAL
					</td>
					<td class="total_confirm">
						<span class="pull-right">$<?php echo $shop['Order']['total']?></span>
					</td>
				</tr>
				</tbody>
				</table>
			</div>
		</div>
	</div><!-- End row -->
</div><!-- End container -->


