$(document).ready(function(){

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

  /*
      Function called when the user loads the edit street & edit address pages.
    */

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

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

	/*
    	Function called when the user loads the edit flyer page.
    */

  var type = $('#addToType').val(); //store the users' choice (ex. 'Postcode', 'Locatie' or 'Bezorger')
  var specificName = $('#specificName').val();

  if (type === "Locatie") { //if the user selects "Locatie" in the 'type' input.
    $.post( "/getArea", { _token: $('input[name=_token]').val() }) //call the /getArea route
      .done(function( data ) {
        $('#addToSpecific').prop( "disabled", false ); //enable the 'specific' input
        var jsonData = JSON.parse(data);
      for (var i = 0; i < jsonData.length; i++) { //insert option tags in the 'specific' input listing all the registered area's
        var area = jsonData[i];
        if (area.id == specificName) {
          $('#addToSpecific').append("<option value=" + area.id + " selected>" + area.name + "</option>");
        }
        else {
          $('#addToSpecific').append("<option value=" + area.id + " >" + area.name + "</option>");
        }
      }
      });
  }

  else if (type === "Bezorger") { //if the user selects "Bezorger" in the 'type' input.
    $.post( "/getDeliverer", { _token: $('input[name=_token]').val() }) //call the /getDeliverer route
      .done(function( data ) {
        $('#addToSpecific').prop( "disabled", false ); //enable the 'specific' input
        var jsonData = JSON.parse(data);
      for (var i = 0; i < jsonData.length; i++) { //insert option tags in the 'specific' input listing all the registered deliverers's
        var deliverer = jsonData[i];
        if (deliverer.id == specificName) {
          $('#addToSpecific').append("<option value=" + deliverer.id + " selected>" + deliverer.firstname + " " + deliverer.lastname + "</option>");
        }
        else {
          $('#addToSpecific').append("<option value=" + deliverer.id + " >" + deliverer.firstname + " " + deliverer.lastname + "</option>");
        }
      }
      });
  }

  else if (type === "Postcode") { //if the user selects "Postcode" in the 'type' input.
    $.post( "/getAreacode", { _token: $('input[name=_token]').val() }) //call the /getAreacode route
      .done(function( data ) {
        $('#addToSpecific').prop( "disabled", false ); //enable the 'specific' input
        var jsonData = JSON.parse(data);
      for (var i = 0; i < jsonData.length; i++) { //insert option tags in the 'specific' input listing all the registered areacodes's
          var street = jsonData[i];
          if (street.areacode == specificName) {
            $('#addToSpecific').append("<option value=" + street.areacode + " selected>" + street.areacode + "</option>");
          }
          else {
            $('#addToSpecific').append("<option value=" + street.areacode + " >" + street.areacode + "</option>");
          }   
      }
      });
  }

  else { //disable and clear the 'specific' input when the 'type' input has no value.
    $('#addToSpecific').prop( "disabled", true );
    $('#addToSpecific').empty();
  }


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

  /*
      Function called when the user uses the 'addToType' select.
    */

	$('#addToType').on("change", function(){
		var type = $(this).val(); 

		if (type === "Locatie") { //if the user selects "Locatie" in the 'type' input.
			$.post( "/getArea", { _token: $('input[name=_token]').val() }) //call the /getArea route
  			.done(function( data ) {
  				$('#addToSpecific').prop( "disabled", false ); //enable the 'specific' input
  				$('#addToSpecific').empty(); //clear the 'specific' input
  				$('#addToSpecific').append("<option></option>"); //insert empty option tag in the 'specific' input
  				var jsonData = JSON.parse(data);
				for (var i = 0; i < jsonData.length; i++) { //insert option tags in the 'specific' input listing all the registered area's
				    var area = jsonData[i];
				    $('#addToSpecific').append("<option value=" + area.id + " >" + area.name + "</option>");
				}
  			});
		}

		else if (type === "Bezorger") { //if the user selects "Bezorger" in the 'type' input.
			$.post( "/getDeliverer", { _token: $('input[name=_token]').val() }) //call the /getDeliverer route
  			.done(function( data ) {
  				$('#addToSpecific').prop( "disabled", false ); //enable the 'specific' input
  				$('#addToSpecific').empty(); //clear the 'specific' input
  				$('#addToSpecific').append("<option></option>"); //insert empty option tag in the 'specific' input
  				var jsonData = JSON.parse(data);
				for (var i = 0; i < jsonData.length; i++) { //insert option tags in the 'specific' input listing all the registered deliverers's
				    var deliverer = jsonData[i];
				    $('#addToSpecific').append("<option value=" + deliverer.id + " >" + deliverer.firstname + " " + deliverer.lastname + "</option>");
				}
  			});
		}

		else if (type === "Postcode") { //if the user selects "Postcode" in the 'type' input.
			$.post( "/getAreacode", { _token: $('input[name=_token]').val() }) //call the /getAreacode route
  			.done(function( data ) {
  				$('#addToSpecific').prop( "disabled", false ); //enable the 'specific' input
  				$('#addToSpecific').empty(); //clear the 'specific' input
  				$('#addToSpecific').append("<option></option>"); //insert empty option tag in the 'specific' input
  				var jsonData = JSON.parse(data);
				for (var i = 0; i < jsonData.length; i++) { //insert option tags in the 'specific' input listing all the registered areacodes's
				    var street = jsonData[i];
				    $('#addToSpecific').append("<option value=" + street.areacode + " >" + street.areacode + "</option>");
				}
  			});
		}

		else { //disable and clear the 'specific' input when the 'type' input has no value.
			$('#addToSpecific').prop( "disabled", true );
			$('#addToSpecific').empty();
		}
		
	});

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

	/*
    	Function called when the user presses the 'btn-ok' button to confirm the deletion of a flyer.
    */
	$('#confirm-delete').on('click', '.btn-ok', function(e) {
		$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //CSRF token needed to alter the database with Laravel applications
		  }
		});

        var $modalDiv = $(e.delegateTarget);
        var id = $(this).data('record-id'); //store flyer id.
        var token = $(this).data("token"); //store csrf token.

        $.ajax({ //Ajax call to the 'deleteFlyer' route which uses the given id to delete that flyer from the database.
        	url: '/deleteFlyer',
        	type: 'DELETE',
        	dataType: 'JSON',
        	data: {
        		"id" : id,
        		"_token": token,
        	}
        });
        
        $modalDiv.modal('hide'); // hide the modal after deleting the flyer.

        setTimeout(function() {
		    location.reload(); //reload the page after deleting the flyer.
		}, 1000);
    });

    /*
    	Function called when the user presses the 'Verwijder' button to toggle the modal.
    	This function uses the given data to store the title(name) and id of the flyer he/she is about to delete.
    */
    $('#confirm-delete').on('show.bs.modal', function(e) {
        var data = $(e.relatedTarget).data();
        $('.title', this).text(data.recordTitle);
        $('.btn-ok', this).data('recordId', data.recordId);
    });
});