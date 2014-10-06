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

      function drawRect(myRectangle, context) {
        context.beginPath();
        context.rect(myRectangle.x, myRectangle.y, myRectangle.width, myRectangle.height);
        context.fillStyle = '#8ED6FF';
        context.fill();
        context.lineWidth = myRectangle.borderWidth;
        context.strokeStyle = 'black';
        context.stroke();
      }
      function animate(lastTime, myRectangle, runAnimation, canvas, context) {
        if(runAnimation.value) {
          // update
          var time = (new Date()).getTime();
          var timeDiff = time - lastTime;

          // pixels / second
          var linearSpeed = 100;
          var linearDistEachFrame = linearSpeed * timeDiff / 1000;
          var currentX = myRectangle.x;

          if(currentX < canvas.width - myRectangle.width - myRectangle.borderWidth / 2) {
            var newX = currentX + linearDistEachFrame;
            myRectangle.x = newX;
          }

          // clear
          context.clearRect(0, 0, canvas.width, canvas.height);

          // draw
          drawRect(myRectangle, context);

          // request new frame
          requestAnimFrame(function() {
            animate(time, myRectangle, runAnimation, canvas, context);
          });
        }
      }
      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');

      var myRectangle = {
        x: 0,
        y: 75,
        width: 100,
        height: 50,
        borderWidth: 5
      };

      /*
       * define the runAnimation boolean as an obect
       * so that it can be modified by reference
       */
      var runAnimation = {
        value: false
      };

      // add click listener to canvas
      document.getElementById('myCanvas').addEventListener('click', function() {
        // flip flag
        runAnimation.value = !runAnimation.value;

        if(runAnimation.value) {
          var date = new Date();
          var time = date.getTime();
          animate(time, myRectangle, runAnimation, canvas, context);
        }
      });
      drawRect(myRectangle, context);

    </script>
  </body>
</html>   