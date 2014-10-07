var screenwidth = screen.availWidth;
var screenheight = screen.availHeight;
//alert("screen" + screenwidth + "x" + screenheight);

// NAVIGATION
function hideAllMenus() {
	document.getElementById("menu1").style.display = "none";
	document.getElementById("menu2").style.display = "none";
	document.getElementById("menu3").style.display = "none";
	document.getElementById("tableXContainer").style.display = "none";
	document.getElementById("map-canvas2").style.display = "none";
}

function menu1() {
	hideAllMenus();
	document.getElementById("menu1").style.display = "block";
	postAjaxForm('controller=Henry&method=Ford', './views/page1.php', 'menu1');
}

function menu2() {
	hideAllMenus();
	document.getElementById("menu2").style.display = "block";
	postAjaxForm('controller=menu2Controller&method=returnSomeData', './views/page2.php', 'menu2');
	document.getElementById("tableXContainer").style.display = "block";
}

function menu3() {
	hideAllMenus();
	document.getElementById("menu3").style.display = "block";
	document.getElementById("map-canvas2").style.display = "block";
	codeAddress('addressElementId');
	postAjaxForm('controller=menu3Controller&method=returnSomeData', './views/page3.php', 'menu3');
}

