<?php 

interface Feedable extends Workable{
    public function feed();
}

interface Workable {
    public function work();
}



class Manager {
    private $worker;
    private $robot;

    public function __construct() {
        // allocate your stuff
        //PHP doesn't support multiple constructors.
        //workaround is public static functions
        /*
         * public static function withRobot($robot){
         * $instance = new self();
         * $instance->constructWithRobot($robot);
         * return $instance;
         * }
         *
         * //usage:
         * $manager = Manager::withRobot($robot);
         */
    }

    public static function withWorker($worker) {
        $instance = new self();
        $instance -> constructWithWorker($worker);
        return $instance;
    }

    public static function withRobot($robot) {
        $instance = new self();
        $instance -> constructWithRobot($robot);
        return $instance;
    }

    public function constructWithWorker($worker) {
        $this -> worker = $worker;
    }

    public function constructWithRobot($robot) {
        $this -> robot = $robot;
    }

    public function manageWorker() {
        $this -> worker -> work();
        $this -> worker -> feed();
    }

    public function manageRobot() {
        $this -> robot -> work();
    }

}


 
 
class Robot implements Workable{
    
    public function work(){
        echo("<br>Robot working...no need to implement the 'feedable' interface for robot.");   
    }
     
}


 
class Worker implements Workable, Feedable{
    
    public function work(){
        echo("<br>Worker working...");  
    }
    
    public function feed(){
        echo("<br>Worker feeding...");  
    }
}

echo("SOLID: ISP : Interface Segregation Principle");


$worker = new Worker();
$robot = new Robot();

$manager = Manager::withWorker($worker);
$manager -> manageWorker();

$managerOfRobot = Manager::withRobot($robot);
$managerOfRobot -> manageRobot();
?>