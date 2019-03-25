$(document).ready(function(){

	$('#area_select').on("change", function(){
		var areaID = $(this).val();		
		$.post( "/getStreets", { areaID: areaID, _token: $('input[name=_token]').val() })
  			.done(function( data ) {
  				$('#street_select').prop( "disabled", false );
  				$('#street_select').empty();
  				$('#address_select').empty();
  				$('#street_select').append("<option></option>");
  				var jsonData = JSON.parse(data);
				for (var i = 0; i < jsonData.length; i++) {
				    var street = jsonData[i];
				    $('#street_select').append("<option value=" + street.id + " >" + street.name + " " + street.areacode + "</option>");
				}
  		});
	});

	$('#street_select').on("change", function(){
		var streetID = $(this).val();		
		$.post( "/getAddresses", { streetID: streetID, _token: $('input[name=_token]').val() })
  			.done(function( data ) {
  				$('#address_select').prop( "disabled", false );
  				$('#address_select').empty();
  				$('#address_select').append("<option></option>");
  				var jsonData = JSON.parse(data);
				for (var i = 0; i < jsonData.length; i++) {
				    var address = jsonData[i];
				    $('#address_select').append("<option value=" + address.id + " >" + address.house_number + "</option>");
				}
  		});
	});

});