<?php // php has to be called at least once
include_once ("Factory.php");
?>
<script>
alert("DesignPattern: Factory");
	//extend Factory
	function TruckFactory() {

	}

	TruckFactory.prototype = new Factory();
	TruckFactory.prototype.vehicleClass = Truck;

	var truckFactory = new TruckFactory();
	var myBigTruck = truckFactory.createVehicle({
		key : "t-150",
		vehicleType : "truck",
		state : "hunk of junk",
		color : "pink",
		wheelSize : "4ft diameter 2ft wide"
	});
	//  verify
	alert(myBigTruck.vehicleType + ":" + myBigTruck.state + ":" + myBigTruck.color + ":" + myBigTruck.wheelSize+ ":" + myBigTruck.key); 
</script>