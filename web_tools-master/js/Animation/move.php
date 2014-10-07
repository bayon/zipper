


<html>
<body style="position:relative;"> 
	<div style="width:200px;height:100px;position:absolute;top:0px;left:30px;border:solid black 10px;z-index:100;">
 <button id="foo" onmouseover="doMove()" style="width:100px;height:30px;position:absolute;top:50px;left:00px;background-color:green;color:#ffffff;"></button>
</div>

 <button id="btn_left" onclick="doMoveLeft()" style="width:100px;height:30px;position:absolute;top:150px;left: 0px;background-color:green;color:#ffffff;"><</button>
 <button id="btn_right" onclick="doMoveRight()" style="width:100px;height:30px;position:absolute;top:150px;left:140px;background-color:green;color:#ffffff;">></button>
</body>
</html>


<script>
 
function doMoveLeft() {
	 //alert('doMoveLeft');
	 $('#foo').css('left','-40px');
}

function doMoveRight() {
	// alert('doMoveRight');
	 $('#foo').css('left','40px');
}
</script>