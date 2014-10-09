 
		<style>
			body {
				background-color: #ffffff;
				margin: 0;
				overflow: hidden;
			}
			#info {
				position: absolute;
				top: 0px;
				width: 100%;
				color: #000000;
				padding: 5px;
				font-family: Monospace;
				font-size: 13px;
				text-align: center;
				z-index: 1;
			}

			a {
				color: #000000;
			}

		</style>
	 
		<script src="three.min.js"></script>
		<script src="TrackballControls.js"></script>
		<script src="CSS3DRenderer.js"></script>
		<script>
			var camera, scene, renderer;
			var scene2, renderer2;
			var controls;
			init();
			animate();
			function init() {
				camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 1000 );
				camera.position.set( 200, 200, 200 );
				controls = new THREE.TrackballControls( camera );
				scene = new THREE.Scene();
				scene2 = new THREE.Scene();
				var material = new THREE.MeshBasicMaterial( { color: 0x000000, wireframe: true, wireframeLinewidth: 1, side: THREE.DoubleSide } );

				//var numOfObjectsone or more
				var numOfObjects = 5;
				for ( var i = 0; i < numOfObjects; i ++ ) {
					var element = document.createElement( 'div' );
					element.style.width = '100px';
					element.style.height = '100px';
					element.style.opacity = 0.95;
					element.style.background = new THREE.Color(   0xaaaaaa ).getStyle();

					var objectX = new THREE.CSS3DObject( element );
					objectX.position.x = 0;
					objectX.position.y = 0;
					objectX.position.z = 0;
					//objectX.rotation.x = Math.random();
					//objectX.rotation.y = Math.random();
					//objectX.rotation.z = Math.random();
					objectX.scale.x = 1;
					objectX.scale.y = 1;
					scene2.add( objectX );

					var geometryX = new THREE.BoxGeometry( 50, 100, 100 );
					var material = new THREE.MeshBasicMaterial( {color: 0xCCCCCC} );
					var cube = new THREE.Mesh( geometryX, material );
					scene.add( cube );
				}
				//
				renderer = new THREE.CanvasRenderer();
				renderer.setClearColor( 0xf0f0f0 );
				renderer.setSize( window.innerWidth, window.innerHeight );
				document.body.appendChild( renderer.domElement );

				renderer2 = new THREE.CSS3DRenderer();
				renderer2.setSize( window.innerWidth, window.innerHeight );
				renderer2.domElement.style.position = 'absolute';
				renderer2.domElement.style.top = 0;
				document.body.appendChild( renderer2.domElement );
			}

			function animate() {
				requestAnimationFrame( animate );
				controls.update();
				renderer.render( scene, camera );
				renderer2.render( scene2, camera );
			}

		</script>
	 
