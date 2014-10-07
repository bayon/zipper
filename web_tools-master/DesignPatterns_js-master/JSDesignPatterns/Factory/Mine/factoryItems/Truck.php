<?php  // php has to be called at least once ?>
<script>
	alert("Truck!");
	// A constructor for defining new trucks
	function Truck(options) {
		this.key = options.key;
		this.vehicleType = "truck";
		this.state = options.state || "used";
		this.wheelSize = options.wheelSize || "large";
		this.color = options.color || "blue";
	}
</script>