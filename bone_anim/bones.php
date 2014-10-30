<!DOCTYPE html>
<html lang="en">
	<head>
		<title>three.js webgl - animation - skinning</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<style>
			body {
				color: #000;
				font-family: Monospace;
				font-size: 13px;
				text-align: center;
				background-color: #ffffff;
				margin: 0px;
				overflow: hidden;
			}

			#info {
				position: absolute;
				top: 0px;
				width: 100%;
				padding: 5px;
			}
		</style>
	</head>
	<body>
		<div id="container"></div>
		<div id="info"> </div>
		 
		<script src="three.min.js"></script>
		<script src="BlendCharacter.js"></script>
		<script src="BlendCharacterGui.js"></script>
		<script src="dat.gui.min.js"></script>
		<script>
			var container, stats;
			var blendMesh, camera, scene, renderer, controls;
			var clock = new THREE.Clock();
			var gui = null;
			var isFrameStepping = false;
			var timeToStep = 0;
			init();

			function init() {
				container = document.getElementById('container');
				scene = new THREE.Scene();
				scene.add(new THREE.AmbientLight(0xffffff));
				renderer = new THREE.WebGLRenderer({
					antialias : true,
					alpha : false
				});
				renderer.setClearColor('#ffffff', 1);
				renderer.setSize(window.innerWidth, window.innerHeight);
				renderer.autoClear = true;
				container.appendChild(renderer.domElement);
				window.addEventListener('resize', onWindowResize, false);
				window.addEventListener('start-animation', onStartAnimation);
				blendMesh = new THREE.BlendCharacter();
				blendMesh.load("z_up.js", start);//bone2.js
				blendMesh.castShadow = true;
				var moonTexture2 = THREE.ImageUtils.loadTexture( 'moon.jpg' );
				blendMesh.texture = moonTexture2;
				// SKYBOX/FOG
				var skyBoxGeometry = new THREE.CubeGeometry(10000, 10000, 10000);
				var skyBoxMaterial = new THREE.MeshBasicMaterial({
					side : THREE.BackSide
				});
				var skyBox = new THREE.Mesh(skyBoxGeometry, skyBoxMaterial);
				scene.add(skyBox);
				scene.fog = new THREE.FogExp2(0xffffee, 0.00125);
				// FLOOR
				var floorMaterial = new THREE.MeshBasicMaterial({
					color : 0x222222,
					side : THREE.DoubleSide
				});
				var floorGeometry = new THREE.PlaneGeometry(2000, 2000, 1, 1);
				var floor = new THREE.Mesh(floorGeometry, floorMaterial);
				floor.position.y = 0;
				floor.position.z = 0;
				floor.position.x=0;
				floor.rotation.x  = Math.PI / 2;
				floor.receiveShadow = true;
				scene.add(floor);
				// radius, segmentsWidth, segmentsHeight
	var sphereGeom =  new THREE.SphereGeometry( 40, 32, 16 ); 
				// shaded moon -- side away from light picks up AmbientLight's color.
	var moonTexture = THREE.ImageUtils.loadTexture( 'moon.jpg' );
	var moonMaterial = new THREE.MeshLambertMaterial( { map: moonTexture } );
	var moon = new THREE.Mesh( sphereGeom.clone(), moonMaterial );
	moon.position.set(0, 50, 200);
	scene.add( moon );	
			
			}
			//////////////////////---- END INIT -----///////////////////////////
			//CAMERA
			function onWindowResize() {
				camera.aspect = (window.innerWidth) / (window.innerHeight);
				camera.updateProjectionMatrix();
				renderer.setSize(window.innerWidth, window.innerHeight);
			}
			function onStartAnimation(event) {
				var data = event.detail;
				blendMesh.stopAll();
				// the blend mesh will combine 1 or more animations
				for (var i = 0; i < data.anims.length; ++i) {
					blendMesh.play(data.anims[i], data.weights[i]);
				}
			}
			function start() {
				blendMesh.rotation.y = Math.PI * -135 / 180;
				scene.add(blendMesh);
				// CAMERA
				var SCREEN_WIDTH = window.innerWidth, SCREEN_HEIGHT = window.innerHeight;
				var VIEW_ANGLE = 45, ASPECT = SCREEN_WIDTH / SCREEN_HEIGHT, NEAR = 0.1, FAR = 20000;
				camera = new THREE.PerspectiveCamera(VIEW_ANGLE, ASPECT, NEAR, FAR);
				camera.position.set(500, 150, -100);
				camera.lookAt(scene.position);
				blendMesh.animations['ArmatureAction'].weight = 1;
				gui = new BlendCharacterGui(blendMesh.animations);
				animate();
			}

			function animate() {
				requestAnimationFrame(animate, renderer.domElement);
				var scale = gui.getTimeScale();
				var delta = clock.getDelta();
				var stepSize = (!isFrameStepping) ? delta * scale : timeToStep;
				blendMesh.update(stepSize);
				gui.update();
				THREE.AnimationHandler.update(stepSize);
				//CAMERA
				renderer.render(scene, camera);
				timeToStep = 0;
			}

		</script>

	</body>
</html>

