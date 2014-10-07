<html>
<head>
<title>Javascript Animation demo: Expand DIV to full-screen (+Sound)</title>
<style type="text/css">

.example-box {
 position:absolute;
 left:0px;
 top:0px;
 width:32px;
 height:32px;
 background:#6699cc;
 text-align:center;
 font-family:"Helvetica neue",helvetica,tahoma,verdana,arial,sans-serif;
 font-size:1px;
 line-height:100%;
 color:#fff;
 overflow:hidden;
 white-space:nowrap;
}

a,
a:visited {
 color:#fff;
}

a:hover {
 background:#336699;
 color:#fff;
}


</style>
<script type="text/javascript" src="animator.js"></script>
<script type="text/javascript" src="/common/sm2/soundmanager2.js"></script>
<script type="text/javascript" src="/common/stats.js"></script>
<script type="text/javascript">

var loadCount = 0;
function didLoad() {
	loadCount++;
	if (loadCount == 2) {
	  animationDemo();
	}
}

soundManager.flashVersion = 9;
soundManager.useHighPerformance = true;
soundManager.debugMode = false;
soundManager.url = '/common/sm2/';
soundManager.onload = function() {
  soundManager.createSound({
    id: 'noise1',
    url: 'pushtobreak_earth1.mp3',
    autoLoad: true,
    onload: didLoad
  });
  soundManager.createSound({
    id: 'noise2',
    url: 'jcambs1990_bassdrumstomp.mp3',
    autoLoad: true,
    onload: didLoad
  });
}

soundManager.onerror = function() {
	animationDemo();
}

// some demo tings

function getWindowCoords() {
  if (window.innerWidth || window.innerHeight) {
    return [window.innerWidth,window.innerHeight];
  } else {
    return [(document.documentElement.clientWidth||document.body.clientWidth||document.body.scrollWidth),(document.documentElement.clientHeight||document.body.clientHeight||document.body.scrollHeight)];
  }
}

function animationDemo() {

	// DOM/coordinate references

	var winXY = getWindowCoords();
	var oBox = document.getElementById('box');
	var oBoxWidth = parseInt(oBox.offsetWidth);

	// generic tween functions

	function tweenLeftPX(o,value) {
	  o.style.marginLeft = value+'px';
	}

	function tweenTopPX(o,value) {
	  o.style.marginTop = value+'px';
	}

	function tweenLeftPercent(o,value) {
	  o.style.left = value+'%';
	  var offset = parseInt(oBoxWidth/2);
	  o.style.marginLeft = '0px';
	}

	function tweenTopPercent(o,value) {
	  o.style.top = value+'%';
	}

	function tweenWidthPercent(o,value) {
	  o.style.width = parseInt(winXY[0]*value/100)+'px';
	}

	function tweenHeightPercent(o,value) {
	  o.style.height = parseInt(winXY[1]*value/100)+'px';
	}

	// move box to middle of the screen

	var a = new Animation({
	  from: 0,
	  to: 50,
	  tweenType: 'blast',
	  ontween: function(value){
	    tweenLeftPercent(oBox,value);
	    oBox.style.marginLeft = -parseInt(oBox.offsetWidth/2)+'px';
	  },
	  oncomplete: function() {
	    writeDebug('a.oncomplete()');
	  }
	});

	var a2 = new Animation({
	  from: 0,
	  to: 50,
	  ontween: function(value){
	    tweenTopPercent(oBox,value);
	  },
	  oncomplete: function() {
	    if (soundManager.supported()) {
	      soundManager.play('noise2');
	    }
	    fs[0].start();
	    fs[1].start();
	  }
	});

	// "full-screen" animation

	var fs = [
	  new Animation({
	    from: 50,
	    to: 0,
	    tweenType: 'blast',
	    ontween: function(value) {
	      tweenLeftPercent(oBox,value);
	      tweenTopPercent(oBox,value);
	    }
	  }),
	  new Animation({
	    from: 1,
	    to: 100,
	    tweenType: 'blast',
	    ontween: function(value) {
	      tweenWidthPercent(oBox,value);
	      tweenHeightPercent(oBox,value);
	      oBox.style.fontSize = parseInt(14*value/100)+'px';
	      // oBox.style.lineHeight = parseInt(winXY[1]*value/100)+'px';
	    },
	    oncomplete: function() {
	      oBox.style.left = '0px';
	      oBox.style.top = '0px';
	      oBox.style.width = '100%';
	      oBox.style.height = '100%';
	    }
	  })
	];

	// start ze animations

	a.start();
	if (soundManager.supported()) {
	  soundManager.play('noise1');
	}
	a2.start();

}

function redoAnimationDemo() {
	var o = document.getElementById('box');
	o.style.width = '32px';
	o.style.height = '32px';
	o.style.left = '0px';
	o.style.top = '0px';
	o.style.fontSize = '1px';
	animationDemo();
}

</script>
</head>

<body>

	<div>

	 <h1>Javascript animation demo</h1>
	 <h2>View source for details</h2>

	 <div id="box" class="example-box">
	    <p><a href="#again" onclick="redoAnimationDemo();return false">Again, dammit!</a></p>
		<div style="position:absolute;bottom:0.5em;left:0.5em">

		 <div>Sound credits: Freesound.org: <a href="http://www.freesound.org/samplesViewSingle.php?id=38151">Bass Drum Stop (jcambs)</a>, <a href="http://www.freesound.org/samplesViewSingle.php?id=16793">Earth1.aif (pushtobreak)</a></div>
		</div>
	 </div>

	</div>

</body>
</html>