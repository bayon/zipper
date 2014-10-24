<html>
    <head>
        <title>Raphael Play</title>
        <script type="text/javascript" src="raphael.js"></script>
        <script type="text/javascript" src="path/to/our_script.js"></script>
        <style type="text/css">
            #canvas_container {
                width: 500px;
                border: 1px solid #aaa;
            }
        </style>
    </head>
    <body>
        <div id="canvas_container"></div>
    </body>
</html>

<script>
	window.onload = function() {
    var paper = new Raphael(document.getElementById('canvas_container'), 500, 500);
    var tetronimo = paper.path("M 250 250 l 0 -50 l -50 0 l 0 -50 l -50 0 l 0 50 l -50 0 l 0 50 z");
    tetronimo.attr(
        {
            gradient: '90-#526c7a-#64a0c1',
            stroke: '#3b4449',
            'stroke-width': 10,
            'stroke-linejoin': 'round',
            rotation: -90
        }
    );
 
    tetronimo.animate({rotation: 360}, 2000, 'bounce');
    tetronimo.animate({
    path: "M 250 250 l 0 -50 l -50 0 l 0 -50 l -100 0 l 0 50 l 50 0 l 0 50 z"
}, 5000, 'elastic');
    tetronimo.animate({rotation: 360, 'stroke-width': 1}, 2000, 'bounce', function() {
    /* callback after original animation finishes */
    this.animate({
        rotation: -90,
        stroke: '#3b4449',
        'stroke-width': 10
    }, 1000);
});

}
</script>