<?php
include_once ('View.php');
$view_object = new View();
$view_object ->setTitle('Map');
$view_object -> setHtml(" <p>map</p>
<!-- <geocode> -->
<div id='map-canvas2' ></div>
<div  onload='codeAddress('addressElementId')'>
");
$view_object -> setJs("<script>

document.getElementById('map-canvas2').style.display = 'block';
	initialize();
	codeAddress('addressElementId');
	function codeAddress(addressElementId) {
		var sAddress = document.getElementById(addressElementId).value;
		geocoder.geocode({
			'address' : sAddress
		}, function(results, status) {

			if (status == google.maps.GeocoderStatus.OK) {
				//alert(results[0].geometry.location);

				map2.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map : map2,
					position : results[0].geometry.location
				});

			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}
		});
	}
</script>
<script>
	// <geocode>  
	var geocoder;
	var map2;
	function initialize() {
		geocoder = new google.maps.Geocoder();
		var mapOptions2 = {
			zoom : 14,
			center : new google.maps.LatLng(38.2555539, -85.750606),
			mapTypeId : google.maps.MapTypeId.SATELLITE
		};
		map2 = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions2);
	}
	google.maps.event.addDomListener(window, 'load', initialize); 
</script>

");
$view = $view_object -> makeView();
?>