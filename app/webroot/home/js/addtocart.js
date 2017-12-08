$(document).ready(function () {

	        

			var url = window.location.href;
		var url1 = url.split('/');
		if(url1[8] == 0){
			//console.log(data['Order']['total']);
			
					
					//$('#orderR').attr('href','javascript:void(0)');
					$('#orderR').click(function(){
						var minVal = $(this).data('min');
						console.log(minVal);
						var pp = $('#total_items .pull-right').html();
						var pt = pp.split(' ');
						if(pt[1]<=minVal){
						var n = $(this).next('p').length;
						console.log('less');
						if(n < 1){
							$(this).after('<p>Price is below from KD ' + minVal + '</p>');
							}
						return false;
						}else{
							console.log('more');
							}
						});
		
		}
	
	
    $('.addtocart').off("click").on('click', function (event) {
		$('#orderR').next().remove();
        $.ajax({
            type: "POST",
            url: "https://www.readytodropin.com/shop/itemupdate",
            data: {
                id: $(this).attr("id"),
                mods: $("#modselected").attr("value"),
                quantity: 1
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
				

				
				
				
                var html = '<table class="table table_summary">';
                html += '<tbody>';
                $.each(data['OrderItem'], function (index, value) {
                    html += '<tr><td><a id=' + index + ' class="remove_item"><i class="icon_minus_alt"></i></a> <strong>' + value['quantity'] + 'x</strong>' + value['name'] + '';
                    html += '<td style="width:47px"><a href="#" class="cmins" id=' + index + '><i class="icon_minus_alt"></i></a> <a href="#" class="cplus" id=' + index + '><i class="icon_plus_alt"></i></a>';
					
                    html += '<td><strong class="pull-right">' + value['price'] + '</strong></td></tr>';
					

                });
                html += '</tbody></table>';
				
                console.log(html);
                $('#added_items').html(html);
                $('#added_items').delay(2000).fadeIn('slow');
                var totalhtml = '<table class="table table_summary">';
                totalhtml += '<tbody>';
                /*totalhtml += '<tr><td>';			
                totalhtml += 'Subtotal <span class="pull-right">KD ' + data['Order']['subtotal'] + '</span>';
                totalhtml += '</td></tr>';*/
                totalhtml += '<tr><td>';
                totalhtml += '  TOTAL <span class="pull-right">KD ' + data['Order']['total'] + '</span>';
                totalhtml += '</td></tr>';
                totalhtml += '</tbody></table>';
                $('#total_items').html(totalhtml);
               // alert(data['alergi']);
                if((data['alergi']) || (data['productasso'])){
                   $('#myModal-'+data['id']).modal('show') ;
                }
                // $('#total_items').delay(2000).fadeIn('slow');

                rmv();
            },
            error: function () {
                alert('Error!');
            }
        });
        return false;
    });




    $.getJSON("https://www.readytodropin.com/shop/getcartitem", function (data) {
        var html = '<table class="table table_summary">';
        html += '<tbody>';
        $.each(data['OrderItem'], function (index, value) {
            html += '<tr><td><a  id=' + index + ' class="remove_item"><i class="icon_minus_alt"></i></a> <strong>' + value['quantity'] + 'x</strong>' + value['name'] + '';
            html += '<td style="width:47px"><a href="#" class="cmins" id=' + index + '><i class="icon_minus_alt"></i></a> <a href="#" class="cplus" id=' + index + '><i class="icon_plus_alt"></i></a>';
            html += '<td><strong class="pull-right">' + value['price'] + '</strong></td></tr>';

        });
        html += '</tbody></table>';
        $('#added_items').html(html);

        var totalhtml = '<table class="table table_summary">';
        totalhtml += '<tbody>';
        /*totalhtml += '<tr><td>';
        totalhtml += 'Subtotal <span class="pull-right">KD ' + data['Order']['subtotal'] + '</span>';
        totalhtml += '</td></tr>';*/
        totalhtml += '<tr><td>';
        totalhtml += '  TOTAL <span class="pull-right">KD ' + data['Order']['total']  + '</span>';
        totalhtml += '</td></tr>';
        totalhtml += '</tbody></table>';
        $('#total_items').html(totalhtml);

		
        rmv();
        //$('#total_items').delay(2000).fadeIn('slow');           
    });
    $.getJSON("https://www.readytodropin.com/shop/reviewgetcartitem", function (data) {
        var html = '<table class="table table_summary">';
        html += '<tbody>';
        $.each(data['OrderItem'], function (index, value) { 
            html += '<tr><td> <strong>' + value['quantity'] + 'x</strong>' + value['name'] + '';
            html += '<td style="width:47px">';
            html += '<td><strong class="pull-right">' + value['subtotal']+'</strong></td></tr>';
        });
		
        html += '</tbody></table>';
        $('#added_items_chk').html(html);

        var totalhtml = '<table class="table table_summary">';
        totalhtml += '<tbody>';
		
		
		// MY FETCH CODE
		/*if(data['Order']['tablecalc']){
		totalhtml += '<tr><td>';
        totalhtml += ' Sitting Charges <span class="pull-right">KD ' + data['Order']['tablecalc'].toFixed(3)  + '</span>';
        totalhtml += '</td></tr>';
        totalhtml += '<tr><td>';
		}*/
		
		
		
		
		
		//data['Order']['perpersonrate']
		/*totalhtml += '<tr><td>';
        totalhtml += 'Person <span class="pull-right">$' + data['Restaurant']['noofperson'] + '</span>';
        totalhtml += '</td></tr>';
        totalhtml += '<tr><td>';*/
		
		/*var subtotalzz = data['Order']['subtotal'];
				var subtotalnew = subtotalzz ;*/
				//var n = data['Order']['subtotal'];    
				//n.round(2); // 1.78
				
				
		
        /*totalhtml += '<tr><td>';
        totalhtml += 'Subtotal <span class="pull-right">KD ' + data['Order']['subtotal'] +'</span>';
        totalhtml += '</td></tr>';
        totalhtml += '<tr><td>';
        totalhtml += '  Tax <span class="pull-right">KD ' + data['Order']['tax'] + '</span>';
        totalhtml += '</td></tr>';*/
		/*var per = data['Order']['person'];
		totalhtml += '<tr><td>';
        totalhtml += '  Sitting Charges <span class="pull-right">$'+ per + '</span>';
        totalhtml += '</td></tr>';*/
		
		/*var totalzz = data['Order']['total'];
		var totalnew = totalzz ;*/
		
		totalhtml += '<tr><td>';
        totalhtml += '  surcharge <span class="pull-right">KD ' + data['Order']['surcharge'] + '</span>';
        totalhtml += '</td></tr>';
		
        totalhtml += '<tr><td>';
        totalhtml += '  TOTAL <span class="pull-right">KD ' + data['Order']['total']  + '</span>';
        totalhtml += '</td></tr>';
        totalhtml += '</tbody></table>';
        $('#total_items_chk').html(totalhtml);
        rmv();
        //$('#total_items').delay(2000).fadeIn('slow');
    });




    $.getJSON("https://www.readytodropin.com/admin/shop/getcartitem", function (data) {
        if(data){
            adminrmv();
            var html = '<table class="table table_summary">';
            html += '<tbody>';
            $.each(data['OrderItem'], function (index, value) {
                html += '<tr><td><a data-tid = ' + value['tno'] + ' id=' + index + ' class="remove_itema"><i class="icon_minus_alt"></i></a> <strong>' + value['quantity'] + 'x</strong>' + value['name'] + '';
                html += '<td style="width:47px"><a href="#" data-tid = ' + value['tno'] + ' class="cminsa" id=' + index + '><i class="icon_minus_alt"></i></a> <a href="#" data-tid = ' + value['tno'] + ' class="cplusa" id=' + index + '><i class="icon_plus_alt"></i></a>';
                html += '<td><strong class="pull-right">' + value['price'] + '</strong></td></tr>';
            });
            html += '</tbody></table>';
            $('#added_items_admin').html(html);

            var totalhtml = '<table class="table table_summary">';
            totalhtml += '<tbody>';
            /*totalhtml += '<tr><td>';
            totalhtml += 'Subtotal <span class="pull-right">KD ' + data['Order']['subtotal'] + '</span>';
            totalhtml += '</td></tr>';
            totalhtml += '<tr><td>';
            totalhtml += '  Tax <span class="pull-right">KD ' + data['Order']['tax'] + '</span>';
            totalhtml += '</td></tr>';*/
            totalhtml += '<tr><td>';
            totalhtml += '  TOTAL <span class="pull-right">KD ' + data['Order']['total']  + '</span>';
            totalhtml += '</td></tr>';
            totalhtml += '</tbody></table>';
            $('#total_items_admin').html(totalhtml);
            adminrmv();
            //$('#total_items').delay(2000).fadeIn('slow');
        }else{
            console.log('No response');
        }
        
    });
    $('.adminaddtocart').off("click").on('click', function (event) {
        $.ajax({
            type: "POST",
            url: "https://www.readytodropin.com/admin/shop/itemupdate",
            data: {
                id: $(this).attr("id"),
                tid: $(this).data('tid'),
                mods: $("#modselected").attr("value"),
                quantity: 1
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                var html = '<table class="table table_summary">';
                html += '<tbody>';
                $.each(data['OrderItem'], function (index, value) {
                    html += '<tr><td><a id=' + index + ' data-tid = ' + value['tno'] + ' class="remove_itema"><i class="icon_minus_alt"></i></a> <strong>' + value['quantity'] + 'x</strong>' + value['name'] + '';
                    html += '<td style="width:47px"><a href="#" data-tid = ' + value['tno'] + ' class="cminsa" id=' + index + '><i class="icon_minus_alt"></i></a> <a href="#" data-tid = ' + value['tno'] + ' class="cplusa" id=' + index + '><i class="icon_plus_alt"></i></a>';
                    html += '<td><strong class="pull-right">' + value['price'] + '</strong></td></tr>';
                });
                html += '</tbody></table>';
                console.log(html);
                $('#added_items_admin').html(html);
                $('#added_items_admin').delay(2000).fadeIn('slow');
                var totalhtml = '<table class="table table_summary">';
                totalhtml += '<tbody>';
                /*totalhtml += '<tr><td>';
                totalhtml += 'Subtotal <span class="pull-right">KD ' + data['Order']['subtotal'] + '</span>';
                totalhtml += '</td></tr>';
                totalhtml += '<tr><td>';
                totalhtml += '  Tax <span class="pull-right">KD ' + data['Order']['tax'] + '</span>';
                totalhtml += '</td></tr>';*/
                totalhtml += '<tr><td>';
                totalhtml += '  TOTAL <span class="pull-right">KD ' + data['Order']['total']  + '</span>';
                totalhtml += '</td></tr>';
                totalhtml += '</tbody></table>';
                $('#total_items_admin').html(totalhtml);
                // $('#total_items').delay(2000).fadeIn('slow');
                adminrmv();
            },
            error: function () {
                alert('Error!');
            }
        });
        return false;
    });
    function adminrmv() {
        $('.remove_itema').off("click").on('click', function () {
            $.ajax({
                type: "POST",
                url: "https://www.readytodropin.com/admin/shop/crtremove",
                data: {
                    id: $(this).attr("id"),
                    tid: $(this).data('tid'),
                },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var html = '<table class="table table_summary">';
                    html += '<tbody>';
                    $.each(data['OrderItem'], function (index, value) {
                        html += '<tr><td><a id=' + index + ' data-tid = ' + value['tno'] + ', class="remove_itema"><i class="icon_minus_alt"></i></a> <strong>' + value['quantity'] + 'x</strong>' + value['name'] + '';
                        html += '<td style="width:47px"><a href="#" data-tid = ' + value['tno'] + ' class="cminsa" id=' + index + '><i class="icon_minus_alt"></i></a> <a href="#" class="cplusa" data-tid = ' + value['tno'] + ' id=' + index + '><i class="icon_plus_alt"></i></a>';
                        html += '<td><strong class="pull-right">' + value['price'] + '</strong></td></tr>';
                    });
                    html += '</tbody></table>';
                    console.log(html);
                    $('#added_items_admin').html(html);
                    //$('#added_items').delay(2000).fadeIn('slow');
                    var totalhtml = '<table class="table table_summary">';
                    totalhtml += '<tbody>';
                    /*totalhtml += '<tr><td>';
                    totalhtml += 'Subtotal <span class="pull-right">KD ' + data['Order']['subtotal'] + '</span>';
                    totalhtml += '</td></tr>';
                    totalhtml += '<tr><td>';
                    totalhtml += '  Tax <span class="pull-right">KD ' + data['Order']['tax'] + '</span>';
                    totalhtml += '</td></tr>';*/
                    totalhtml += '<tr><td>';
                    totalhtml += '  TOTAL <span class="pull-right">KD ' + data['Order']['total']  + '</span>';
                    totalhtml += '</td></tr>';
                    totalhtml += '</tbody></table>';
                    $('#total_items_admin').html(totalhtml);
                    adminrmv();
                    // $('#total_items').delay(2000).fadeIn('slow');
                },
                error: function () {
                    alert('Error!');
                }
            });
            return false;
        });
        $('.cplusa').off("click").on('click', function () {
            //  alert('hello');
            $.ajax({
                type: "POST",
                url: "https://www.readytodropin.com/admin/shop/addremovecart",
                data: {
                    id: $(this).attr("id"),
                    tid: $(this).data('tid'),
                },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var html = '<table class="table table_summary">';
                    html += '<tbody>';
                    $.each(data['OrderItem'], function (index, value) {
                        html += '<tr><td><a id=' + index + ' data-tid = ' + value['tno'] + ' class="remove_itema"><i class="icon_minus_alt"></i></a> <strong>' + value['quantity'] + 'x</strong>' + value['name'] + '';
                        html += '<td style="width:47px"><a href="#" data-tid = ' + value['tno'] + ' class="cminsa" id=' + index + '><i class="icon_minus_alt"></i></a> <a href="#" data-tid = ' + value['tno'] + ' class="cplusa" id=' + index + '><i class="icon_plus_alt"></i></a>';
                        html += '<td><strong class="pull-right">' + value['price'] + '</strong></td></tr>';
                    });
                    html += '</tbody></table>';
                    console.log(html);
                    $('#added_items_admin').html(html);
                    //$('#added_items').delay(2000).fadeIn('slow');
                    var totalhtml = '<table class="table table_summary">';
                    totalhtml += '<tbody>';
                   /* totalhtml += '<tr><td>';
                    totalhtml += 'Subtotal <span class="pull-right">KD ' + data['Order']['subtotal'] + '</span>';
                    totalhtml += '</td></tr>';
                    totalhtml += '<tr><td>';
                    totalhtml += '  Tax <span class="pull-right">KD ' + data['Order']['tax'] + '</span>';
                    totalhtml += '</td></tr>';*/
                    totalhtml += '<tr><td>';
                    totalhtml += '  TOTAL <span class="pull-right">KD ' + data['Order']['total']  + '</span>';
                    totalhtml += '</td></tr>';
                    totalhtml += '</tbody></table>';
                    $('#total_items_admin').html(totalhtml);
                    adminrmv();
                    // $('#total_items').delay(2000).fadeIn('slow');
                },
                error: function () {
                    alert('Error!');
                }
            });
            return false;
        });
        $('.cminsa').off("click").on('click', function () {
            $.ajax({
                type: "POST",
                url: "https://www.readytodropin.com/admin/shop/minusremovecart",
                data: {
                    id: $(this).attr("id"),
                    tid: $(this).data('tid'),
                },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var html = '<table class="table table_summary">';
                    html += '<tbody>';
                    $.each(data['OrderItem'], function (index, value) {
                        html += '<tr><td><a id=' + index + ' data-tid = ' + value['tno'] + ' class="remove_itema"><i class="icon_minus_alt"></i></a> <strong>' + value['quantity'] + 'x</strong>' + value['name'] + '';
                        html += '<td style="width:47px"><a href="#" data-tid = ' + value['tno'] + ' class="cminsa" id=' + index + '><i class="icon_minus_alt"></i></a> <a href="#" data-tid = ' + value['tno'] + ' class="cplusa" id=' + index + '><i class="icon_plus_alt"></i></a>';
                        html += '<td><strong class="pull-right">' + value['price'] + '</strong></td></tr>';
                    });
                    html += '</tbody></table>';
                    console.log(html);
                    $('#added_items_admin').html(html);
                    //$('#added_items').delay(2000).fadeIn('slow');
                    var totalhtml = '<table class="table table_summary">';
                    totalhtml += '<tbody>';
                    /*totalhtml += '<tr><td>';
                    totalhtml += 'Subtotal <span class="pull-right">KD ' + data['Order']['subtotal'] + '</span>';
                    totalhtml += '</td></tr>';
                    totalhtml += '<tr><td>';
                    totalhtml += '  Tax <span class="pull-right">KD ' + data['Order']['tax'] + '</span>';
                    totalhtml += '</td></tr>';*/
                    totalhtml += '<tr><td>';
                    totalhtml += '  TOTAL <span class="pull-right">KD ' + data['Order']['total']  + '</span>';
                    totalhtml += '</td></tr>';
                    totalhtml += '</tbody></table>';
                    $('#total_items_admin').html(totalhtml);
                    adminrmv();
                    // $('#total_items').delay(2000).fadeIn('slow');
                },
                error: function () {
                    alert('Error!');
                }
            });
            return false;
        });
    }
});

function rmv() {
        $('.remove_item').off("click").on('click', function () {
			$('#orderR').next().remove();
            $.ajax({
                type: "POST",
                url: "https://www.readytodropin.com/shop/crtremove",
                data: {
                    id: $(this).attr("id"),
                },
                dataType: "json",
                success: function (data) {
                    console.log(data);
					
					

					
					
                    var html = '<table class="table table_summary">';
                    html += '<tbody>';
                    $.each(data['OrderItem'], function (index, value) {
                        html += '<tr><td><a id=' + index + ' class="remove_item"><i class="icon_minus_alt"></i></a> <strong>' + value['quantity'] + 'x</strong>' + value['name'] + '';
                        html += '<td style="width:47px"><a href="#" class="cmins" id=' + index + '><i class="icon_minus_alt"></i></a> <a href="#" class="cplus" id=' + index + '><i class="icon_plus_alt"></i></a>';
                        html += '<td><strong class="pull-right">' + value['price'] + '</strong></td></tr>';
                    });
                    html += '</tbody></table>';
                    console.log(html);
                    $('#added_items').html(html);
                    //$('#added_items').delay(2000).fadeIn('slow');
                    var totalhtml = '<table class="table table_summary">';
                    totalhtml += '<tbody>';
                   /* totalhtml += '<tr><td>';
                    totalhtml += 'Subtotal <span class="pull-right">KD ' + data['Order']['subtotal'] + '</span>';
                    totalhtml += '</td></tr>';*/
                    totalhtml += '<tr><td>';
                    totalhtml += '  TOTAL <span class="pull-right">KD ' + data['Order']['total']  + '</span>';
                    totalhtml += '</td></tr>';
                    totalhtml += '</tbody></table>';
                    $('#total_items').html(totalhtml);
                    rmv();
                    // $('#total_items').delay(2000).fadeIn('slow');
                },
                error: function () {
                    alert('Error!');
                }
            });
            return false;
        });
        $('.cplus').off("click").on('click', function () {
            
			var id = $(this).attr("id");
			 var res = id.split("_");
			// var test = $(this).attr(res[0]);
			
			var neww = res[0];
			
            $.ajax({
                type: "POST",
                url: "https://www.readytodropin.com/shop/addremovecart",
                data: {
                    id:neww,
                },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var html = '<table class="table table_summary">';
                    html += '<tbody>';
                    $.each(data['OrderItem'], function (index, value) {
                        html += '<tr><td><a id=' + index + ' class="remove_item"><i class="icon_minus_alt"></i></a> <strong>' + value['quantity'] + 'x</strong>' + value['name'] + '';
                       html += '<td style="width:47px"><a href="#" class="cmins" id=' + index + '><i class="icon_minus_alt"></i></a> <a href="#" class="cplus" id=' + index + '><i class="icon_plus_alt"></i></a>';
                        html += '<td><strong class="pull-right">' + value['subtotal'] + '</strong></td></tr>';
                    });
                    html += '</tbody></table>';
                    console.log(html);
                    $('#added_items').html(html);
                    //$('#added_items').delay(2000).fadeIn('slow');
                    var totalhtml = '<table class="table table_summary">';
                    totalhtml += '<tbody>';
                    /*totalhtml += '<tr><td>';
                    totalhtml += 'Subtotal <span class="pull-right">KD ' + data['Order']['subtotal'] + '</span>';
                    totalhtml += '</td></tr>';*/
                    totalhtml += '<tr><td>';
                    totalhtml += '  TOTAL <span class="pull-right">KD ' + data['Order']['total']  + '</span>';
                    totalhtml += '</td></tr>';
                    totalhtml += '</tbody></table>';
                    $('#total_items').html(totalhtml);
                    rmv();
                    // $('#total_items').delay(2000).fadeIn('slow');
                },
                error: function () {
                    alert('Error!');
                }
            });
            return false;
        });
        $('.cmins').off("click").on('click', function () {
            $.ajax({
                type: "POST",
                url: "https://www.readytodropin.com/shop/minusremovecart",
                data: {
                    id: $(this).attr("id"),
                },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var html = '<table class="table table_summary">';
                    html += '<tbody>';
                    $.each(data['OrderItem'], function (index, value) {
                        html += '<tr><td><a id=' + index + ' class="remove_item"><i class="icon_minus_alt"></i></a> <strong>' + value['quantity'] + 'x</strong>' + value['name'] + '';
                        html += '<td style="width:47px"><a href="#" class="cmins" id=' + index + '><i class="icon_minus_alt"></i></a> <a href="#" class="cplus" id=' + index + '><i class="icon_plus_alt"></i></a>';
                       <!-- html += '<td><strong class="pull-right">' + value['price'] + '</strong></td></tr>'-->;
						html += '<td><strong class="pull-right">' + value['subtotal'] + '</strong></td></tr>';
                    });
                    html += '</tbody></table>';
                    console.log(html);
                    $('#added_items').html(html);
                    //$('#added_items').delay(2000).fadeIn('slow');
                    var totalhtml = '<table class="table table_summary">';
                    totalhtml += '<tbody>';
                   /* totalhtml += '<tr><td>';
                    totalhtml += 'Subtotal <span class="pull-right">KD ' + data['Order']['subtotal'] + '</span>';
                    totalhtml += '</td></tr>';*/
                    totalhtml += '<tr><td>';
                    totalhtml += '  TOTAL <span class="pull-right">KD ' + data['Order']['total']  + '</span>';
                    totalhtml += '</td></tr>';
                    totalhtml += '</tbody></table>';
                    $('#total_items').html(totalhtml);
                    rmv();
                    // $('#total_items').delay(2000).fadeIn('slow');
                },
                error: function () {
                    alert('Error!');
                }
            });
            return false;
        });
        $('#pincheck').off("click").on('click', function () {
            $.ajax({
                type: "POST",
                url: "https://www.readytodropin.com/shop/checkpin",
                data: {
                    id: $('#chpin').val(),
                    rid: $('#reid').val(),
                },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if(data.status == false){
                        $('#dlchrg').html('');
                        $('#dlchrg').html('not available on this pin please try again');
                    }else{
                        var cart = data.cart;
                        var totalhtml = '<table class="table table_summary">';
                        totalhtml += '<tbody>';
                        /*totalhtml += '<tr><td>';
                        totalhtml += 'Subtotal <span class="pull-right">KD ' + cart['Order']['subtotal'] + '</span>';
                        totalhtml += '</td></tr>';
                        totalhtml += '<tr><td>';
                        totalhtml += 'Tax <span class="pull-right">KD ' + cart['Order']['tax'] + '</span>';
                        totalhtml += '</td></tr>';*/
                        totalhtml += '<tr><td>';
                        totalhtml += 'Delivery Charge <span class="pull-right">KD ' + cart['Order']['dlcharge'] + '</span>';
                        totalhtml += '</td></tr>';
                        totalhtml += '<tr><td>';
                        totalhtml += '  TOTAL <span class="pull-right">KD ' + cart['Order']['total']  + '</span>';
                        totalhtml += '</td></tr>';
                        totalhtml += '</tbody></table>';
                        $('#total_items').html(totalhtml);
                        $('#dlchrg').html('');
                        $('#dlchrg').html('Delivery charge: KD ' + cart['Order']['dlcharge']+'<span id="confirmpin" onclick="displayPin('+cart['Order']['pin']+')">&nbsp; OK</span>');
                        $('#dlchrg').show();
                        //$('#chpin').hide();
                        $('#reid').hide();
                        localStorage.setItem('dlcharge', cart['Order']['dlcharge']);
                        rmv();
                    }
                    $('#total_items').delay(2000).fadeIn('slow');
                },
                error: function () {
                    alert('Error!');
                }
            });
            return false;
        });
        
//        $('#confirmpin').off("click").on("click", function () {
//            $('#chpin').replaceWith("<span>" + this.value + "</span>");
//            $('#chpin').hide();
//            $(this).hide();
//        })

        $('#deli').off("click").on("click", function () {
            if (this.checked) {
                $('#showdiv').show();
                $('#chpin').show();
                $('#chpin').val('');
                $('#pincheck').show();
                $('#selected_pin').hide();
                $('#dlchrg').hide();
            }
        });
       
        $('#tkway').off("click").on("click", function () {
            if (this.checked) {
                $('#showdiv').hide();
            }
            $.ajax({
                type: "POST",
                url: "https://www.readytodropin.com/shop/takeawaypin",
                data: {
                    id: $('#chpin').val(),
                    rid: $('#reid').val(),
                },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var totalhtml = '<table class="table table_summary">';
                    totalhtml += '<tbody>';
                    /*totalhtml += '<tr><td>';
                    totalhtml += 'Subtotal <span class="pull-right">KD ' + data['Order']['subtotal'] + '</span>';
                    totalhtml += '</td></tr>';
                    totalhtml += '<tr><td>';
                    totalhtml += 'Tax <span class="pull-right">KD ' + data['Order']['tax'] + '</span>';
                    totalhtml += '</td></tr>';*/
                    totalhtml += '<tr><td>';
                    totalhtml += '  TOTAL <span class="pull-right">KD ' + data['Order']['total']  + '</span>';
                    totalhtml += '</td></tr>';
                    totalhtml += '</tbody></table>';
                    $('#total_items_chk').html(totalhtml);
                    rmv();
                    // $('#total_items').delay(2000).fadeIn('slow');
                },
                error: function () {
                    alert('Error!');
                }
            });
           // return false;

        });
    }

function displayPin(pin){
    $('#chpin').after("<span id='selected_pin'>: " + pin + "</span>");
    $('#chpin').hide();
    $('#pincheck').hide();
    $('#confirmpin').hide();
    
    $.ajax({
        type: "GET",
        url: "https://www.readytodropin.com/shop/updateTotal",
        dataType: "json",
        success: function (data) {
            console.log(data);
            var cart = data.cart;
            var totalhtml = '<table class="table table_summary">';
            totalhtml += '<tbody>';
           /* totalhtml += '<tr><td>';
            totalhtml += 'Subtotal <span class="pull-right">KD ' + cart['Order']['subtotal'] + '</span>';
            totalhtml += '</td></tr>';
            totalhtml += '<tr><td>';
            totalhtml += 'Tax <span class="pull-right">KD ' + cart['Order']['tax'] + '</span>';
            totalhtml += '</td></tr>';*/
            totalhtml += '<tr><td>';
            totalhtml += 'Delivery Charge <span class="pull-right">KD ' + cart['Order']['dlcharge'] + '</span>';
            totalhtml += '</td></tr>';
            totalhtml += '<tr><td>';
            totalhtml += '  TOTAL <span class="pull-right">KD ' + cart['Order']['total']  + '</span>';
            totalhtml += '</td></tr>';
            totalhtml += '</tbody></table>';
            $('#total_items_chk').html(totalhtml);
            rmv();
            // $('#total_items').delay(2000).fadeIn('slow');
        },
        error: function () {
            alert('Error!');
        }
    });
} 