<html>
<head>
<title>Javascript animation: Demo 1</title>
<style type="text/css">

body {
 font:76% normal verdana,arial,tahoma;
}

h1, h2 {
 font-size:1em;
}

#fooObject {
 /* simple box */
 position:absolute;
 left:0px;
 top:8em;
 width:5em;
 line-height:3em;
 background:#99ccff;
 border:1px solid #003366;
 white-space:nowrap;
 padding:0.5em;
}

</style>
<script type="text/javascript">

var foo = null; // object

function doMove() {
  foo.style.left = parseInt(foo.style.left)+1+'px';
  setTimeout(doMove,20); // call doMove in 20msec
}

function init() {
  foo = document.getElementById('fooObject'); // get the "foo" object
  foo.style.left = '0px'; // set its initial position to 0px
  doMove(); // start animating
}


window.onload = init;

</script>
</head>

<body>

<h1>Javascript animation: Demo 1</h1>
<h2>Recursive setTimeout-based animation</h2>

<div id="fooObject">
 I am foo.
</div>

</body>
</html>