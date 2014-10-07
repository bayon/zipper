<?php  // php has to be called at least once ?>
<script>
	alert("Car!");
	// A constructor for defining new cars
	function Car(options) {
		//  defaults
		this.key = options.key;
		this.doors = options.doors || 4;
		this.state = options.state || "brand new";
		this.color = options.color || "silver";
	}
</script>