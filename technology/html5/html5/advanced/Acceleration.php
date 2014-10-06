<!DOCTYPE HTML>
<html>
  <head>
    <style>
      body {
        margin: 0px;
        padding: 0px;
      }
    </style>
  </head>
  <body>
    <canvas id="myCanvas" width="578" height="200"></canvas>
    <script>
      window.requestAnimFrame = (function(callback) {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
        function(callback) {
          window.setTimeout(callback, 1000 / 60);
        };
      })();

      function drawRectangle(myRectangle, context) {
        context.beginPath();
        context.rect(myRectangle.x, myRectangle.y, myRectangle.width, myRectangle.height);
        context.fillStyle = '#8ED6FF';
        context.fill();
        context.lineWidth = myRectangle.borderWidth;
        context.strokeStyle = 'black';
        context.stroke();
      }
      function animate(myRectangle, canvas, context, startTime) {
        // update
        var time = (new Date()).getTime() - startTime;

        // pixels / second^2
        var gravity = 200;

        myRectangle.y = 0.5 * gravity * Math.pow(time / 1000, 2);

        if(myRectangle.y > canvas.height - myRectangle.height - myRectangle.borderWidth / 2) {
          myRectangle.y = canvas.height - myRectangle.height - myRectangle.borderWidth / 2;
        }
        lastTime = time;

        // clear
        context.clearRect(0, 0, canvas.width, canvas.height);

        // draw
        drawRectangle(myRectangle, context);

        // request new frame
        requestAnimFrame(function() {
          animate(myRectangle, canvas, context, startTime);
        });
      }
      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');

      var myRectangle = {
        x: 239,
        y: 0,
        width: 100,
        height: 50,
        borderWidth: 5
      };

      drawRectangle(myRectangle, context);

      // wait one second before dropping rectangle
      setTimeout(function() {
        var startTime = (new Date()).getTime();
        animate(myRectangle, canvas, context, startTime);
      }, 2000);

    </script>
  </body>
</html>  