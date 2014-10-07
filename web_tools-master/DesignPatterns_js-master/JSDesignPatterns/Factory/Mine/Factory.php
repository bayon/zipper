<?php // php has to be called at least once
include_once ("factoryItems/Item.php");
include_once ("factoryItems/Car.php");
include_once ("factoryItems/Truck.php");
?>
<script>
	// Define a skeleton  factory
	function Factory() {

	}
	// Our default vehicleClass is Car
	Factory.prototype.vehicleClass = Item;

	// Our Factory method for creating new Vehicle instances
	Factory.prototype.createVehicle = function(options) {

		if (options.vehicleType === "car") {
			this.vehicleClass = Car;
		} else if (options.vehicleType === "truck") {
			this.vehicleClass = Truck;
		} else {
		// DEFAULT CLASS
		this.vehicleClass = Item;
		}
		return new this.vehicleClass(options);
	}; 
</script>

