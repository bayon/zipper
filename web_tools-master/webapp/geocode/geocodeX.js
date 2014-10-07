
function codeAddress(addressElementId) {
	alert('something from geocodeX js');
	var sAddress = document.getElementById(addressElementId).value;
	geocoder.geocode({
		'address' : sAddress
	}, function(results, status) {

		if (status == google.maps.GeocoderStatus.OK) {
			alert(results[0].geometry.location);

			map2.setCenter(results[0].geometry.location);
			var marker = new google.maps.Marker({
				map : map2,
				position : results[0].geometry.location
			});

		} else {
			alert("Geocode was not successful for the following reason: " + status);
		}
	});
}
