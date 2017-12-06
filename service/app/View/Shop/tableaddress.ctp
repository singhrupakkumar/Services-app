<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_cart.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
        <div id="sub_content">
            <h1>Place your order</h1>
            <div class="bs-wizard">
                <div class="col-xs-4 bs-wizard-step active">
                    <div class="text-center bs-wizard-stepnum"><strong>1.</strong> Your details</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="#0" class="bs-wizard-dot"></a>
                </div>
                <div class="col-xs-4 bs-wizard-step disabled">
                    <div class="text-center bs-wizard-stepnum"><strong>2.</strong> Payment</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="cart_2.html" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-4 bs-wizard-step disabled">
                    <div class="text-center bs-wizard-stepnum"><strong>3.</strong> Finish!</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="cart_3.html" class="bs-wizard-dot"></a>
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
<form id="UserAddForm" method="post" action="<?php echo $this->webroot; ?>shop/tablesucess">
<div class="container margin_60_35">
    <div class="row">
        <div class="col-md-3">

            <div class="box_style_2 hidden-xs info">
                <h4 class="nomargin_top">Delivery time <i class="icon_clock_alt pull-right"></i></h4>
                <p>
                    Lorem ipsum dolor sit amet, in pri partem essent. Qui debitis meliore ex, tollit debitis conclusionemque te eos.
                </p>
                <hr>
                <h4>Secure payment <i class="icon_creditcard pull-right"></i></h4>
                <p>
                    Lorem ipsum dolor sit amet, in pri partem essent. Qui debitis meliore ex, tollit debitis conclusionemque te eos.
                </p>
            </div><!-- End box_style_1 -->

            <div class="box_style_2 hidden-xs" id="help">
                <i class="icon_lifesaver"></i>
                <h4>Need <span>Help?</span></h4>
                <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                <small>Monday to Friday 9.00am - 7.30pm</small>
            </div>

        </div><!-- End col-md-3 -->

        <div class="col-md-6">
            <div class="box_style_2" id="order_process">
                <h2 class="inner">Your order details</h2>
                <div class="form-group">

                    <?php echo $this->Form->input('TableReservation.fname', array('class' => 'form-control', 'placeholder' => 'First name','label' => 'First name')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('TableReservation.lname', array('class' => 'form-control', 'placeholder' => 'Last name','label' => 'Last name')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('TableReservation.phone', array('class' => 'form-control', 'placeholder' => 'Telephone/mobile')); ?>	
                </div>

                <div class="form-group">
                    <?php echo $this->Form->input('TableReservation.email', array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                </div>
                <div class="form-group">

                    <?php echo $this->Form->input('TableReservation.address', array('class' => 'form-control', 'placeholder' => 'Your full address')); ?>

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('TableReservation.city', array('class' => 'form-control', 'placeholder' => 'Your City')); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('TableReservation.zip', array('class' => 'form-control', 'placeholder' => 'Your postal code')); ?>	
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Delivery Day</label>
                            <select class="form-control" name="data[TableReservation][d_day]" id="delivery_schedule_day">
                                <option value="" selected>Select day</option>
                                <option value="Today">Today</option>
                                <option value="Tomorrow">Tomorrow</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Delivery time</label>
                            <select class="form-control" name="data[TableReservation][d_time]" id="delivery_schedule_time">
                                <option value="" selected>Select time</option>
                                <option value="11.30am">11.30am</option>
                                <option value="11.45am">11.45am</option>
                                <option value="12.15am">12.15am</option>
                                <option value="12.30am">12.30am</option>
                                <option value="12.45am">12.45am</option>
                                <option value="01.00pm">01.00pm</option>
                                <option value="01.15pm">01.15pm</option>
                                <option value="01.30pm">01.30pm</option>
                                <option value="01.45pm">01.45pm</option>
                                <option value="02.00pm">02.00pm</option>
                                <option value="07.00pm">07.00pm</option>
                                <option value="07.15pm">07.15pm</option>
                                <option value="07.30pm">07.30pm</option>
                                <option value="07.45pm">07.45pm</option>
                                <option value="08.00pm">08.00pm</option>
                                <option value="08.15pm">08.15pm</option>
                                <option value="08.30pm">08.30pm</option>
                                <option value="08.45pm">08.45pm</option>
                            </select>
                        </div>
                    </div>
                     <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>No of people</label>
                            <select class="form-control" name="data[TableReservation][no_of_people]" id="delivery_schedule_time">
                                <option value="" selected>Select time</option>
                                <option value="1">1 people</option>
                                <option value="2">2 people</option>
                                <option value="3">3 people</option>
                                <option value="4">4 people</option>
                                <option value="5">5 people</option>
                                <option value="6">6 people</option>
                                <option value="7">7 people</option>
                           
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
<!--                <div class="row">
                    <div class="col-md-12">

                        <input type="hidden" value="<?php echo $restaurant['Restaurant']['id']; ?>" name="data[TableReservation][res_id]">
                        <?php echo $this->Form->textarea('TableReservation.notes', array('class' => 'form-control', 'placeholder' => 'Notes for the restaurant')); ?>

                    </div>
                </div>
                <h2> Choose Table:</h2>
    <div id="holder"> 
        <ul  id="place">
        </ul>    
    </div>
    <div style="float:left;"> 
    <ul id="seatDescription">
        <li style="background:url('<?php echo $this->webroot; ?>images/available_seat_img.gif') no-repeat scroll 0 0 transparent;">Available Seat</li>
        <li style="background:url('<?php echo $this->webroot; ?>images/booked_seat_img.gif') no-repeat scroll 0 0 transparent;">Booked Seat</li>
        <li style="background:url('<?php echo $this->webroot; ?>images/selected_seat_img.gif') no-repeat scroll 0 0 transparent;">Selected Seat</li>
    </ul>
    </div>
        <div style="clear:both;width:100%">
        <input type="button" id="btnShowNew" value="Confirm Selected Seats" />
        <input type="button" id="btnShow" value="Show All" />           
        </div>
                <br/>
                <input type="hidden" name="data[TableReservation][seat_id]" value="" id="stid">-->
                <?php //print_r($restable); ?>
                <input class="btn_full" type="submit" name="submit" value="Confirm Reservation"/>
            </div><!-- End box_style_1 -->
        </div><!-- End col-md-6 -->
      

    </div><!-- End row -->
</div><!-- End container -->
<?php  $this->Form->end(); ?>
<?php $cnt=count($restable);
      //$col=$cnt/5;
?>
<script type="text/javascript" language="javascript">
    var //bookedSeats = new Array();
    <?php //foreach($booktable as $key => $val){ ?>
       // bookedSeats.push(parseInt('<?php echo $val; ?>'));
    <?php //} ?>
</script>
<!--<script>
var settings = {
               rows:'<?php //echo $cnt; ?>',
               cols: 1,
               rowCssPrefix: 'row-',
               colCssPrefix: 'col-',
               seatWidth: 35,
               seatHeight: 35,
               seatCss: 'seat',
               selectedSeatCss: 'selectedSeat',
               selectingSeatCss: 'selectingSeat'
           };
           
var init = function (reservedSeat) {
                var str = [], seatNo, className;
                for (i = 0; i < settings.rows; i++) {
                    for (j = 0; j < settings.cols; j++) {
                        seatNo = (i + j * settings.rows + 1);
                        className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();
                        if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
                            className += ' ' + settings.selectedSeatCss;
                        }
                        str.push('<li class="' + className + '"' +
                                  'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
                                  '<a title="' + seatNo + '">' + seatNo + '</a>' +
                                  '</li>');
                    }
                }
                $('#place').html(str.join(''));
            };
            //case I: Show from starting
            //init();
 
            //Case II: If already booked
            console.log(bookedSeats);
            var bookedSeats = bookedSeats;
            init(bookedSeats);
            $('.' + settings.seatCss).click(function () {
if ($(this).hasClass(settings.selectedSeatCss)){
    alert('This seat is already reserved');
}
else{
    $(this).toggleClass(settings.selectingSeatCss);
    }
});
 
$('#btnShow').click(function () {
    var str = [];
    $.each($('#place li.' + settings.selectedSeatCss + ' a, #place li.'+ settings.selectingSeatCss + ' a'), function (index, value) {
        str.push($(this).attr('title'));
    });
    alert(str.join(','));
})
 
$('#btnShowNew').click(function () {
    var str = [], item;
    $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
        item = $(this).attr('title');                   
        str.push(item);                   
    });
    alert(str);
    if(!empty(str)){
    $('#stid').val(str);
    $('.btn_full').show();
    }else {
        alert("Please select seat");
    }
})
</script>
<style>
    
#holder{    
height:200px;    
width:550px;
background-color:#F5F5F5;
border:1px solid #A4A4A4;
margin-left:10px;   
}
#place {
position:relative;
margin:7px;
}
#place a{
font-size:0.6em;
}
#place li
{
 list-style: none outside none;
 position: absolute;   
}    
#place li:hover
{
background-color:yellow;      
} 
#place .seat{
background:url("<?php echo $this->webroot; ?>images/available_seat_img.gif") no-repeat scroll 0 0 transparent;
height:33px;
width:33px;
display:block;   
}
#place .selectedSeat
{ 
background-image:url("<?php echo $this->webroot; ?>images/booked_seat_img.gif");          
}
#place .selectingSeat
{ 
background-image:url("<?php echo $this->webroot; ?>images/selected_seat_img.gif");        
}
#place .row-3, #place .row-4{
margin-top:10px;
}
#seatDescription li{
verticle-align:middle;    
list-style: none outside none;
padding-left:35px;
height:35px;
float:left;
}
</style>-->