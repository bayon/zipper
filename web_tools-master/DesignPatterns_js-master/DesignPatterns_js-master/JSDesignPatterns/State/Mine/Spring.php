<?php /**/ 
include_once("Season.php");
include_once("Summer.php");
?>

<script>
	 
	function Spring(){
		this.context = context;
		Season.call(this);
	}
	//prototype properties
	
	//inheritence
	Spring.prototype = new Season();
	Spring.prototype.constructor = Spring;
	
	//prototype methods
	Spring.prototype.changeTheStateInContext = function(context){
		alert("set state Spring");
		this.context = context;
		this.context.setState(new Summer());
		 
	}
</script>