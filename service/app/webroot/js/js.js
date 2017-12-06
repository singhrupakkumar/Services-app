$(document).ready(function(){

	   $( "#srch" ).autocomplete({ 
		minLength: 2,
		select: function(event, ui) {
			jQuery("#srch").val(ui.item.label);
			//jQuery("#searchform").submit();
		},
       source: function (request, response) {
			jQuery.ajax({
				url: Shop.basePath+'products/searchjson', 
				data: {
					term: request.term
				},
				dataType: "json",
				success: function(data) {
					response(jQuery.map(data, function(el, index) {
						return {
							value: el.Product.name,
							name: el.Product.name,
							image: el.Product.image
						};
					}));
				}
			});
		}
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
		return jQuery("<li></li>")
			.data("item.autocomplete", item) 
			.append("<a><img width='40' src='" + Shop.basePath + "files/product/" + item.image + "' /> " + item.name + "</a>")
			.appendTo(ul)
	};
});
