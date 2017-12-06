$(document).ready(function() {

	$("a.status").unbind("change");
	$("a.status").click(function(){
		var p = this.firstChild;
		if (p.src.match('icon_1.png')) {
			$(p).attr({ src: Shop.basePath + "img/icon_0.png", alt: "Activate" });
		} else {
			$(p).attr("src", Shop.basePath + "img/icon_1.png");
			$(p).attr("alt","Deactivate");
		};
		$.get(this.href + "?" + new Date().getTime() );
		return false;
	});
        
    $("#RestaurantCity").on('change',function(){
        console.log(this.value);
        $.get( "http://rajdeep.crystalbiltech.com/cart_new/custom_cart/admin/restaurants/areas/"+this.value, function( data ) {
            console.log(data);
            var response =  JSON.parse(data);
            if(response.status == true){
                console.log("true");
                var html ='<label>Areas</label>';
                console.log(response.data)
                $(response.data).each(function( key, value ) {
                    console.log( key );console.log( value );
                     html += '<input type="checkbox" name="data[Restaurant][areas][]" value="'+value.Area.id+'"><label>'+value.Area.name+'</label><br/>';
                });
                $("#areas").html(html);
                console.log(html);
            }else{
                console.log("trueee");
                
                console.log(response.status);
            }

        });
    })

});
