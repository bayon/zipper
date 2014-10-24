<canvas width="600px" height="200px"></canvas>
<input id="f" type="range" min="0" max="20" value="20" step="1">
<output for="f" id="output_f">20</output>

<style>
	canvas {
  border: 1px solid red;
  margin: 10px;
}
</style>
<br><a href="svg/index.php">svg index</a>

<br><a href="gear.php">gear.php</a>
<br><a href="animation.php">animation</a>
<br><a href="raph.php">raph.php</a>
<br><a href="spin.php">spin.php</a>

<script>
	var canvas = document.querySelector("canvas"),
    ctx = canvas.getContext("2d"),
		cHeight = canvas.height,
    cWidth = canvas.width,
    frequency = document.querySelector("#f").value,
		amplitude = 80,
		x = 0,
		y = cHeight/2,
    point_y = 0;

window.onload = init;
  
function init() {
	document.querySelector("#f").addEventListener("input", function() {
		frequency = this.value;
		document.querySelector("#output_f").value = frequency;
	}, false);
  
	drawSine();
}
  function drawSine() {
    ctx.clearRect(0, 0, cWidth, cHeight);
    
    ctx.beginPath();
    ctx.moveTo(0, y);
    ctx.strokeStyle = "red";
    ctx.lineTo(cWidth, y);
    ctx.stroke();
    ctx.closePath();
    
    ctx.beginPath();
    ctx.strokeStyle = "black";
    for(x = 0; x<600; x++) {
      point_y = amplitude * -Math.sin((frequency/95.33)*x) + y;
      ctx.lineTo(x, point_y);
    }
    ctx.stroke();
    ctx.closePath();
    requestAnimationFrame(drawSine);
  }
</script>