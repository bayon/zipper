<?php /**/ ?>

<script>
	///////////////////// Interface Segregation Principle ////////////////////////////
	alert("SOLID: js : ISP");

	///////////////////// Interfaces ////////////////////////////
	/////////-----Workable
	function Workable() {
		//constructor
	}

	Workable.prototype.work = function() {
		alert('working');
	};

	Workable.prototype.can = function(methodName) {
		return (( typeof this[methodName]) == "function");
	};

	/////////-----Feedable
	function Feedable() {
		//constructor
	}


	Feedable.prototype.feed = function() {
		alert('eating');
	};

	Feedable.prototype.can = function(methodName) {
		return (( typeof this[methodName]) == "function");
	};

	///////////////////// Objects ////////////////////////////
	/////////-----Manager
    function Manager(worker,robot){
        this.worker = worker;
        this.robot = robot;
    }
	Manager.prototype.worker = "";
	Manager.prototype.robot = "";
	
	Manager.prototype.manageWorker = function(){
	    alert("manager has ...");
	    this.worker.work();
	    this.worker.feed();
	}
	Manager.prototype.manageRobot = function(){
        alert("manager has ...");
        this.robot.work();
    }

	/////////-----Robot
	 function Robot(workable){
        this.workable = workable;
       
    }
    //properties:
    Robot.prototype.workable = "";
    Robot.prototype.work = function(){
        alert("robot ...");
        this.workable.work();
    }
     
	/////////-----Worker
    function Worker(workable,feedable){
        this.workable = workable;
        this.feedable = feedable;
    }
    //properties:
    Worker.prototype.workable = "";
    Worker.prototype.feedable = "";
    
    Worker.prototype.work = function(){
        alert("worker ...");
        this.workable.work();
    }
     Worker.prototype.feed = function(){
          alert("worker...");
        this.feedable.feed();
    }
	///////////////////// Implementation ////////////////////////////
	
	workerWorkable = new Workable();
	workerFeedable = new Feedable();
	
	worker = new Worker(workerWorkable,workerFeedable);
	worker.work();
	worker.feed();
	
	robotWorkable = new Workable();
	robot = new Robot(robotWorkable);
	robot.work();
	
	manager = new Manager(worker,robot);
	manager.manageWorker();
	manager.manageRobot();
	
</script>