<?php echo(__FILE__); ?>
<html>
	<head>
		
	</head>
	<body>
		<div id='result' ></div>
	</body>
</html>
<script>
	if ( typeof (Storage) !== "undefined") {
		// Code for localStorage/sessionStorage.
		alert("ok");
		storeDataExample1();
	} else {
		// Sorry! No Web Storage support..
		alert("no storage.");
	}

	function storeDataExample1() {
		// Store
		localStorage.setItem("lastname", "Smith");
		// Retrieve
		document.getElementById("result").innerHTML = localStorage.getItem("lastname");
	}
	function removeItem(){
		localStorage.removeItem("lastname");
	}
</script>
