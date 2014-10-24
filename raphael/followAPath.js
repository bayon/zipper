Raphael.fn.rosetta = function(x,y,rx,ry,N) {
    if (N == 0) {
        console.log("no diving by zero, please"); return;
    }
    var angle = 360 / N; // negative values of N are fine
    var path = "M" + x + "," + y;
    
    for (var c = 0; c < N; c += 1) {
        // need angle for each leaf of rosetta in radians
        var theta = angle * c * Math.PI / 180;
        // coords of farthest point from center for this leaf
        var dx = x + 2 * rx * Math.cos(theta),
            dy = y + 2 * rx * Math.sin(theta);
        path += "A" + rx + "," + ry + " " + angle*c + " 1,1 " + dx + "," + dy;
        path += "A" + rx + "," + ry + " " + angle * c + " 1,1 " + x + "," + y;
    }
    var rosetta = paper.path(path);        
    return rosetta;
}

var paper = Raphael(0, 0, 500, 500);
var rose = paper.rosetta(120, 120, 55, 35, 6);

var circle = paper.circle(0, 0, 10).attr("fill", "red");
var point = rose.getPointAtLength(800);

circle.data("mypath", rose);

paper.customAttributes.progress = function (v) {
    var path = this.data("mypath");
    if (!path) {
        return {
            transform: "t0,0"
        };
    }    
    var len = path.getTotalLength();
    var point = path.getPointAtLength(v * len);
    
    return {
        transform: "t" + [point.x, point.y]
    };
};


circle.attr("progress", 0);
circle.animate({ progress: 1 }, 10000);