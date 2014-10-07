<?php /**/ 
include_once("Season.php");
include_once("Winter.php");
?>

<script>
	 
	function Fall(){
		this.context = context;
		Season.call(this);
	}
	//prototype properties
	
	//inheritence
	Fall.prototype = new Season();
	Fall.prototype.constructor = Fall;
	
	//prototype methods
	Fall.prototype.changeTheStateInContext = function(context){
		alert("set state: Fall!");
		this.context = context;
		this.context.setState(new Winter());
	}
</script>