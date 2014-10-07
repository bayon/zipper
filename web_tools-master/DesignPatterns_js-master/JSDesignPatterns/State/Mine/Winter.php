<?php /**/
include_once ("Season.php");
include_once ("Spring.php");
?>

<script>
	function Winter() {
		this.context = context;
		Season.call(this);
	}

	//prototype properties

	//inheritence
	Winter.prototype = new Season();
	Winter.prototype.constructor = Winter;

	//prototype methods
	Winter.prototype.changeTheStateInContext = function(context) {
		alert("set state Winter");
		this.context = context;
		this.context.setState(new Spring());
		
	}
</script>
