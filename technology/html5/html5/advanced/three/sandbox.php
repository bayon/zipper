<html>
	<head>
		<title>My first Three.js app</title>
		<style>
			canvas {
				width: 100%;
				height: 100%
			}
		</style>
	</head>
	<body>
		<script src="js/three.min.js"></script>
		<script>
			// Our Javascript will go here.
			var scene = new THREE.Scene();
			var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
			camera.position.z = 5;
			
			
			
			var renderer = new THREE.WebGLRenderer();
			renderer.setSize(window.innerWidth, window.innerHeight);
			document.body.appendChild(renderer.domElement);
			
			var geometry = new THREE.BoxGeometry(1, 1, 1);
			var material = new THREE.MeshBasicMaterial({
				color : 0x003300
			});
			
			
			var cube = new THREE.Mesh(geometry, material);
			scene.add(cube);
			
			function render() {
				requestAnimationFrame(render);
				cube.rotation.x += 0.01;
				cube.rotation.y += 0.01;
				renderer.render(scene, camera);
			}

			render();
		</script>
	</body>
</html>