

	 
		<script src="three.min.js"></script>
		<script src="stats.min.js"></script>
		<script>
			var container, stats;
			var camera, scene, projector, raycaster, renderer;
			var mouse = new THREE.Vector2(), INTERSECTED;
			var radius = 100, theta = 0;
			init();
			animate();
			function init() {
				container = document.createElement( 'div' );
				document.body.appendChild( container );

				var info = document.createElement( 'div' );
				info.style.position = 'absolute';
				info.style.top = '10px';
				info.style.width = '100%';
				info.style.textAlign = 'center';
				info.innerHTML = '';
				container.appendChild( info );

				camera = new THREE.PerspectiveCamera( 70, window.innerWidth / window.innerHeight, 1, 10000 );
				scene = new THREE.Scene();

				var light = new THREE.DirectionalLight( 0xffffff, 2 );
				light.position.set( 1, 1, 1 ).normalize();
				scene.add( light );

				var light = new THREE.DirectionalLight( 0xffffff );
				light.position.set( -1, -1, -1 ).normalize();
				scene.add( light );

				var geometry = new THREE.BoxGeometry( 20, 20, 20 );
				//var object = new THREE.Mesh( geometry, new THREE.MeshLambertMaterial( { color:  0xcccccc } ) );
				//var object = addMesh( geometry, 0.75, 900, 0, 0,  0,0,0, new THREE.MeshPhongMaterial( { ambient: 0x030303, color: 0x030303, specular: 0x990000, shininess: 30 } ) );
				//var object =  addMesh( geometry, 0.75, -300, 0, 0, 0,0,0, new THREE.MeshPhongMaterial( { ambient: 0x030303, color: 0x111111, specular: 0xffaa00, shininess: 10 } ) );
				var object = addMesh( geometry, 0.75, -900, 0, 0, 0,0,0, new THREE.MeshPhongMaterial( { ambient: 0x030303, color: 0x555555, specular: 0x666666, shininess: 10 } ) );
				
				object.position.x = 0;
				object.position.y = 0;
				object.position.z = 0;
				object.rotation.x = Math.random() * 2 * Math.PI;
				object.rotation.y = Math.random() * 2 * Math.PI;
				object.rotation.z = Math.random() * 2 * Math.PI;
				object.scale.x = 2;
				object.scale.y = 2;
				object.scale.z = 2;
				scene.add( object );

				projector = new THREE.Projector();
				raycaster = new THREE.Raycaster();
				renderer = new THREE.WebGLRenderer();
				renderer.setClearColor( 0xf0f0f0 );
				renderer.setSize( window.innerWidth, window.innerHeight );
				renderer.sortObjects = false;
				container.appendChild(renderer.domElement);
				stats = new Stats();
				stats.domElement.style.position = 'absolute';
				stats.domElement.style.top = '0px';
				container.appendChild( stats.domElement );
				document.addEventListener( 'mousemove', onDocumentMouseMove, false );
				document.addEventListener( 'mousedown', onDocumentMouseDown, false );
				window.addEventListener( 'resize', onWindowResize, false );
			}
/////////////////////////////////
			function addMesh( geometry, scale, x, y, z, rx, ry, rz, material ) {
				mesh = new THREE.Mesh( geometry, material );
				mesh.scale.set( scale, scale, scale );
				mesh.position.set( x, y, z );
				mesh.rotation.set( rx, ry, rz );

				//scene.add( mesh );
				return mesh;

			}
////////////////////////////////////
			function onWindowResize() {
				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();
				renderer.setSize( window.innerWidth, window.innerHeight );
			}

			function onDocumentMouseMove( event ) {
				event.preventDefault();
				mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
				mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;
				//console.log("mouse move:"+mouse.x +" x "+mouse.y);
			}
			
			function onDocumentMouseDown( event ) {
				event.preventDefault();
				mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
				mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;
				console.log("mouse down:"+mouse.x +" x "+mouse.y);
				 
			}
			
			function animate() {
				requestAnimationFrame( animate );
				render();
				stats.update();
			}

			function render() {
				theta += 0.1;
				camera.position.x = radius * Math.sin( THREE.Math.degToRad( theta ) );
				camera.position.y = radius * Math.sin( THREE.Math.degToRad( theta ) );
				camera.position.z = radius * Math.cos( THREE.Math.degToRad( theta ) );
				camera.lookAt( scene.position );
				// find intersections
				var vector = new THREE.Vector3( mouse.x, mouse.y, 1 );
				projector.unprojectVector( vector, camera );
				raycaster.set( camera.position, vector.sub( camera.position ).normalize() );
				var intersects = raycaster.intersectObjects( scene.children );
				if ( intersects.length > 0 ) {
					if ( INTERSECTED != intersects[ 0 ].object ) {
						if ( INTERSECTED ) INTERSECTED.material.emissive.setHex( INTERSECTED.currentHex );
						INTERSECTED = intersects[ 0 ].object;
						INTERSECTED.currentHex = INTERSECTED.material.emissive.getHex();
						INTERSECTED.material.emissive.setHex( 0xcccccc );
					}
				} else {
					if ( INTERSECTED ) INTERSECTED.material.emissive.setHex( INTERSECTED.currentHex );
					INTERSECTED = null;
				}
				renderer.render( scene, camera );
			}
		</script>

	 

