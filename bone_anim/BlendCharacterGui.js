/**
 * @author Michael Guerrero / http://realitymeltdown.com
 */

function BlendCharacterGui(animations) {

	var controls = {

		gui: null,
		"Lock Camera": false,
		"Show Model": true,
		"Show Skeleton": false,
		"Time Scale": 1.0,
		"Step Size": 0.016,
		"Crossfade Time": 3.5,
		"idle": 0.33,
		"ArmatureAnimation": 0.33,
		"walk": 0.33,
		"run": 0.33

	};

	var animations = animations;

	this.showModel = function() {

		return controls['Show Model'];

	};

	this.showSkeleton = function() {

		return controls['Show Skeleton'];

	};

	this.getTimeScale = function() {

		return controls['Time Scale'];

	};

	this.update = function() {

		controls[ 'ArmatureAction'] = animations[ 'ArmatureAction' ].weight;
		 

	};

	var init = function() {

		controls.gui = new dat.GUI();

		var settings = controls.gui.addFolder( 'Settings' );
		var playback = controls.gui.addFolder( 'Playback' );
		var blending = controls.gui.addFolder( 'Blend Tuning' );

		settings.add( controls, "Lock Camera" ).onChange( controls.lockCameraChanged );
		settings.add( controls, "Show Model" ).onChange( controls.showModelChanged );
		settings.add( controls, "Show Skeleton" ).onChange( controls.showSkeletonChanged );
		settings.add( controls, "Time Scale", 0, 1, 0.01 );
		settings.add( controls, "Step Size", 0.01, 0.1, 0.01 );
		settings.add( controls, "Crossfade Time", 0.1, 6.0, 0.05 );

		// These controls execute functions
		playback.add( controls, "start" );
		//playback.add( controls, "pause" );
		//playback.add( controls, "step" );
		//playback.add( controls, "idle to walk" );
		//playback.add( controls, "walk to run" );
		//playback.add( controls, "warp walk to run" );

		blending.add( controls, "idle", 0, 1, 0.01).listen().onChange( controls.weight );
		blending.add( controls, "walk", 0, 1, 0.01).listen().onChange( controls.weight );
		blending.add( controls, "run", 0, 1, 0.01).listen().onChange( controls.weight );

		settings.open();
		playback.open();
		blending.open();

	};

	var getAnimationData = function() {

		return {

			detail: {

				anims: [ "ArmatureAction" ],

				weights: [ controls['ArmatureAction'] ]
			}

		};
	};

	controls.start = function() {

		var startEvent = new CustomEvent( 'start-animation', getAnimationData() );
		window.dispatchEvent(startEvent);

	};

  
	controls.weight = function() {

		// renormalize
		var sum = controls['ArmatureAnimation']  ;
		 

		var weightEvent = new CustomEvent( 'weight-animation', getAnimationData() );
		window.dispatchEvent(weightEvent);
	};

	 
 


	init.call(this);

}