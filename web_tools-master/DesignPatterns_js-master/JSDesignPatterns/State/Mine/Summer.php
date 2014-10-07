<?php /**/ 
include_once("Season.php");
include_once("Fall.php");
?>

<script>
	 
	function Summer(){
		this.context = context;
		Season.call(this);
	}
	//prototype properties
	
	//inheritence
	Summer.prototype = new Season();
	Summer.prototype.constructor = Summer;
	
	//prototype methods
	Summer.prototype.changeTheStateInContext = function(context){
		alert("set state: Summer!");
		this.context = context;
		this.context.setState(new Fall());
	}
</script>