<?php /**/ ?>

<script>
	function Season(context) {
		//constructor
		this.context = context;
	}

	//PROTOTYPE PROPERTIES:
	Season.prototype.context = '';
	//PROTOTYPE METHODS:
	Season.prototype.changeTheStateInContext = function(context) {
		alert("changeTheStateInContext"+this.context);
		this.context = context;
		//alert("To"+this.context);
	};
 
	 
</script>
