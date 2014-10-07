<?php // php has to be called at least once
include_once ("Factory.php");
?>
<script>
alert("DesignPattern: Factory");
	// Create an instance of our factory that makes cars
	var carFactory = new Factory();
	var car = carFactory.createVehicle({
		key : "C-43",
		vehicleType : "item",
		color : "yellow",
		doors : 6
	});
	// Test to confirm our car was created using the vehicleClass/prototype Car
	alert("YOYOYOYOY car :" + car.doors + ":" + car.state + ":" + car.color+ ":" + car.key); 
</script>