function loadDoc(filename,receiverId) {
	var xmlhttp;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById(receiverId).innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", filename, true);
	xmlhttp.send();
}

function postAjaxForm(dataString,controller,receiverId) {
	var xmlhttp;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById(receiverId).innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST", controller, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(dataString);
	//use case: postAjaxForm('controller=Henry&method=Ford', './views/page1.php', 'menu1');
}

/* for GET add data arguments to the controller filename...?fname=Henry&lname=Ford" */

