<?php
include_once ("Season.php");
include_once ("Winter.php");
?>

<script>
	function SeasonContext() {
		//default context
		this.season = new Winter();
	}

	//protype properites:
	SeasonContext.prototype.season = '';

	//prototype methods:
	SeasonContext.prototype.changeState = function() {
		this.season.changeTheStateInContext(this);
	};

	SeasonContext.prototype.setState = function(season) {
		this.season = season;
	};

</script>

