$(document).ready(function(){

	$('#area_select').on("change", function(){
		var areaID = $(this).val();
		$('#street_select').append("<option>" + areaID + "</option>");
	});

});