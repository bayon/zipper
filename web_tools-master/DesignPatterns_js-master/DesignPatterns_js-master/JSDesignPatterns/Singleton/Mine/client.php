<?php 
include_once("UtilitySingleton.php");
?>
<script>
	alert("Design Pattern: Singleton");
	var sharedUtility = UtilitySingleton.getInstance({
		pointX : 99
	});
	alert(sharedUtility.name); 
	alert(sharedUtility.pointX); 
</script>