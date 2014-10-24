
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Raphaël · Spinner</title>
        <link rel="stylesheet" href="demo.css" type="text/css" media="screen">
        <link rel="stylesheet" href="demo-print.css" type="text/css" media="print">
        <script src="raphael.js"></script>
        <script>
            window.onload = function () {
                var remove = spinner("holder", 70, 120, 12, 25, "#fff");
                var form = {
                    form: document.getElementsByTagName("form")[0],
                    r1: document.getElementById("radius1"),
                    r2: document.getElementById("radius2"),
                    count: document.getElementById("count"),
                    width: document.getElementById("width"),
                    color: document.getElementById("color")
                };
                form.form.onsubmit = function () {
                    remove();
                    remove = spinner("holder", +form.r1.value, +form.r2.value, +form.count.value, +form.width.value, form.color.value);
                    return false;
                };
            };
            
            function spinner(holderid, R1, R2, count, stroke_width, colour) {
                var sectorsCount = count || 12,
                    color = colour || "#fff",
                    width = stroke_width || 15,
                    r1 = Math.min(R1, R2) || 35,
                    r2 = Math.max(R1, R2) || 60,
                    cx = r2 + width,
                    cy = r2 + width,
                    r = Raphael(holderid, r2 * 2 + width * 2, r2 * 2 + width * 2),
                    
                    sectors = [],
                    opacity = [],
                    beta = 2 * Math.PI / sectorsCount,

                    pathParams = {stroke: color, "stroke-width": width, "stroke-linecap": "round"};
                    Raphael.getColor.reset();
                for (var i = 0; i < sectorsCount; i++) {
                    var alpha = beta * i - Math.PI / 2,
                        cos = Math.cos(alpha),
                        sin = Math.sin(alpha);
                    opacity[i] = 1 / sectorsCount * i;
                    sectors[i] = r.path([["M", cx + r1 * cos, cy + r1 * sin], ["L", cx + r2 * cos, cy + r2 * sin]]).attr(pathParams);
                    if (color == "rainbow") {
                        sectors[i].attr("stroke", Raphael.getColor());
                    }
                }
                var tick;
                (function ticker() {
                    opacity.unshift(opacity.pop());
                    for (var i = 0; i < sectorsCount; i++) {
                        sectors[i].attr("opacity", opacity[i]);
                    }
                    r.safari();
                    tick = setTimeout(ticker, 1000 / sectorsCount);
                })();
                return function () {
                    clearTimeout(tick);
                    r.remove();
                };
            }

        </script>
        <style media="screen">
            html {
                height: 100%;
            }
            body {
                color: #222;
                font: 20px/1.4 "Lucida Grande", Lucida, Verdana, Helvetica, sans-serif;
                height: 100%;
            }
            #holder {
                height: 300px;
                left: 0;
                overflow: hidden;
                position: absolute;
                top: 0;
                width: 300px;
                margin: 0;
            }
            #form {
                height: 300px;
                left: 50%;
                margin: -150px 0 0 -300px;
                overflow: hidden;
                position: absolute;
                top: 50%;
                width: 600px;
            }
            form {
                color: #fff;
                left: 300px;
                margin: 0;
                padding: 0;
                position: absolute;
                top: 0;
                width: 300px;
            }
            dt {
                clear: left;
                float: left;
                height: 2em;
                width: 150px;
            }
            dd {
                float: left;
                height: 2em;
                margin: 0;
                padding: 0;
            }
            input {
                font-size: 1em;
                width: 4em;
            }
            p {
                font: italic 20px/1.4 "Hoefler Text", Georgia, serif;
                height: 100%;
                margin: -3em;
                width: 750px;
            }
            #copy {
                bottom: auto;
                color: #fff;
                font-size: .5em;
                right: 4em;
                top: 300px;
            }
        </style>
    </head>
    <body>
        <div id="form">
            <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam malesuada, turpis at facilisis auctor, dui nulla elementum nisi, ac egestas mauris nulla ac lectus. Maecenas sit amet erat sed sem laoreet tempus. Duis fermentum elementum sapien. Sed sagittis. Fusce dapibus turpis at dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc vel sapien et odio tincidunt varius. Quisque tincidunt, est in accumsan euismod, nunc diam adipiscing ligula, id sollicitudin tortor odio consequat tellus. Etiam semper lacinia ipsum. In tincidunt porttitor velit. Nam id lacus. Aliquam erat volutpat. Maecenas egestas iaculis magna. Donec sed massa eget magna elementum congue. Donec lacus magna, fermentum eu, ultrices at, imperdiet nec, pede. Praesent tincidunt, dui ultricies molestie lobortis, lectus justo sollicitudin neque, vel pellentesque sapien odio at ligula. Maecenas congue pretium urna. Nulla rhoncus nibh a magna fringilla semper. Phasellus aliquet sollicitudin metus. Morbi adipiscing. Integer id tortor. Donec fermentum dapibus nulla. Vestibulum eleifend rhoncus justo. Aenean rhoncus. Sed interdum faucibus pede. Etiam scelerisque semper tortor. Aenean id tortor id metus convallis scelerisque. Nullam sodales accumsan risus. Curabitur dui elit, mollis sit amet, suscipit sit amet, dictum eu, nisl. Curabitur adipiscing posuere sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam et elit. Suspendisse blandit mattis erat. Nulla non nunc. Nunc est. Sed molestie, nisl eu dignissim congue, augue tellus consectetuer neque, quis adipiscing velit elit ac felis. Donec sagittis massa feugiat massa faucibus laoreet. In tellus ligula, tristique sit amet, ultrices quis, mollis eu, eros. Integer augue felis, euismod sed, sodales ac, tempor nec, ante. Sed at lorem. Nunc sapien urna, aliquam eu, scelerisque vitae, tristique in, orci. Maecenas in sapien. Ut venenatis sapien ac risus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque porttitor felis at mi. Etiam arcu. Vestibulum iaculis dui vel tellus. Suspendisse potenti. Proin quis lectus at arcu molestie venenatis. Aliquam dui tortor, blandit eu, sollicitudin non, porttitor tempus, est. Donec sit amet mauris sed sapien semper tristique. Etiam tellus. Duis risus. Morbi quis lacus eu risus sagittis fermentum. Donec elementum.
            </p>
            <div id="holder"></div>
            <form action="#">
                <dl>
                    <dt><label for="radius1">Radius 1</label></dt>
                    <dd><input type="text" value="70" id="radius1"></dd>
                    <dt><label for="radius2">Radius 2</label></dt>
                    <dd><input type="text" value="120" id="radius2"></dd>
                    <dt><label for="count">Dashes</label></dt>
                    <dd><input type="text" value="12" id="count"></dd>
                    <dt><label for="width">Stroke Width</label></dt>
                    <dd><input type="text" value="25" id="width"></dd>
                    <dt><label for="color">Colour</label></dt>
                    <dd><input type="text" value="#fff" id="color"></dd>
                    <dd><input type="submit" value="Update"></dd>
                </dl>
            </form>
            <p id="copy">Demo of <a href="http://raphaeljs.com/">Raphaël</a>—JavaScript Vector Library</p>
        </div>
    </body>
</html>
