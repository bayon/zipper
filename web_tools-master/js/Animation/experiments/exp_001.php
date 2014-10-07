<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<style type="text/css">

body {
 font:76% normal verdana,arial,tahoma;
}

h1, h2 {
 margin:0px;
 font-size:1.2em;
}

p {
 margin:0px 0px 1em 0px;
 padding:0px;
}

.balls img {
 position:absolute;
 width:12px;
 height:12px;
}

</style>
<script type="text/javascript">

// <![CDATA[

var balls = [];
var canvasX = 0;
var canvasY = 0;
var timer = null;
var m_lastX = 0;
var m_lastY = 0;
var M_SPACE = 24;
var B_VMIN = 5;
var B_VMAX = 5;
var B_WIDTH = 13;
var B_HEIGHT = 13;

function rnd(n) {
  return Math.random()*n;
}

function rndI(n) {
  return parseInt(rnd(n));
}

function createBall(oParent) {
  oParent.appendChild(balls[0].cloneNode(true));
  initBall(balls[balls.length-1]);
  window.status = balls.length;
}

function createBallAtMouse(e) {
  e = e?e:event;
  createBall(document.getElementById('ball-container'));
  with (balls[balls.length-1]) {
    _x = e.clientX;
    _y = e.clientY;
  }
}

function initBall(oBall) {
  oBall._x = rnd(canvasX);
  oBall._y = rnd(canvasY);
  oBall._vX = B_VMIN+rnd(B_VMAX)*(Math.random()>0.5?1:-1);
  oBall._vY = B_VMIN+rnd(B_VMAX);
}

function moveBall(oBall) {
  oBall._x += oBall._vX;
  oBall._y += oBall._vY;
  oBall.style.left = oBall._x+'px';
  oBall.style.top = oBall._y+'px';
  if ((oBall._vX>0 && oBall._x+oBall._vX+B_WIDTH>canvasX) || (oBall._vX<0 && oBall._x+oBall._vX<0)) oBall._vX *= -1;
  if ((oBall._vY>0 && oBall._y+oBall._vY+B_HEIGHT>canvasY) || (oBall._vY<0 && oBall._y+oBall._vY<0)) oBall._vY *= -1;
}

function animateStuff() {
  for (var i=balls.length; i--;) {
    moveBall(balls[i]);
  }
}

function startAnimation() {
  if (!timer) timer = setInterval(animateStuff,20);
}

function stopAnimation() {
  if (!timer) return false;
  clearInterval(timer);
  timer = null;
}

function mouseDown(e) {
  e = e?e:event;
  m_lastX = e.clientX;
  m_lastY = e.clientY;
  document.onmousemove = mouseMove;
  document.onmouseup = mouseUp;
}

function mouseMove(e) {
  e = e?e:event;
  if (Math.abs(e.clientX-m_lastX)>M_SPACE || Math.abs(e.clientY-m_lastY)>M_SPACE) {
    m_lastX = e.clientX;
    m_lastY = e.clientY;
    createBallAtMouse(e);
  }
  return false;
}

function mouseUp() {
  document.onmousemove = null;
  document.onmouseup = null;
}

function init() {
  balls = document.getElementById('ball-container').getElementsByTagName('img');
  for (var i=balls.length; i--;) {
    initBall(balls[i]);
  }
  getWindowCoords();
  startAnimation();
  document.onmousedown = mouseDown;
}

getWindowCoords = (navigator.userAgent.toLowerCase().indexOf('opera')>0||navigator.appVersion.toLowerCase().indexOf('safari')!=-1)?function() {
  canvasX = window.innerWidth;
  canvasY = window.innerHeight;
}:function() {
  canvasX = document.documentElement.clientWidth||document.body.clientWidth||document.body.scrollWidth;
  canvasY = document.documentElement.clientHeight||document.body.clientHeight||document.body.scrollHeight;
}

window.onresize = getWindowCoords;
window.onload = init;

// ]]>

</script>
</head>
<body>

<h1>Interval-based animation</h1>

<p>
 Click and drag to create more.
</p>

<p>
 <button onclick="startAnimation()">Start</button>
 <button onclick="stopAnimation()">Stop</button>
</p>


<div id="ball-container" class="balls">
 <img src="ball.gif" alt="" />
</div>

</body>

</html>