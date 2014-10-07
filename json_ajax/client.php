<?php echo("<br>" . __FILE__ . "</br>"); ?>
<html>
	<body>
		
<div>
	<button onclick="fireAjax()">ajax</button>
</div>
<div id="ajax_content">
	print out data
</div>
<div id="ajax_content2">
	print out data
</div>
	</body>
</html>
<script>
	function postAjaxForm(dataString, controller, receiverId) {
		console.log("js function postAjaxForm(dataString, controller, receiverId) ");
		var xmlhttp;
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//SUCCESSFUL RESPONSE
				document.getElementById(receiverId).innerHTML = xmlhttp.responseText;
				var data = xmlhttp.responseText;
				createSelectWithAjaxedJson(data);
			}
		}
		xmlhttp.open("POST", controller, true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(dataString);
	}
	function fireAjax(){
		//Usage:
		postAjaxForm('method=getData', 'server.php', 'ajax_content');
	}
	
	function createSelectWithAjaxedJson(data) {
		console.log("js function createSelectWithAjaxedJson(data)");
		console.log(data);
		var data = eval(data);
		var select = "<div><select id=\'selection\' onChange=\'foo()\'>";
		for (var key in data) {
			if (data.hasOwnProperty(key)) {
				select += "<option>" + data[key]["name"] + "</option>";
			}
		}
		select += "</select><div id=\'newContent\'></div></div>";
		document.getElementById("ajax_content2").innerHTML = select;
	}
	function foo(){
		alert(document.getElementById('selection').value);
		
	}
</script>