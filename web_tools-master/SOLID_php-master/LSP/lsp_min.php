<?php
class Bird {
    
     private $name;

     public function __construct() {
     $this -> name = "Bird";
     }
     
    public function fly() {
        echo("fly method");
    }

    public function eat() {
        echo("eat method");
    }

}


class Crow extends Bird {

    public function __construct() {
        $this -> name = "Crow";
    }

    //@override
    public function fly() {
        echo("<br>...as the crow flies...." . $this -> name . "");
    }

}


class Ostrich extends Bird {

    public function __construct() {
        $this -> name = "Ostrich";
    }

    //@override
    public function fly() {
        echo("<br>...I'll just walk, thanks...." . $this -> name . "");
    }

}

echo("<br>LSP: Liskov Substitution Principle<br>");
$crow = new Crow();
$ostrich = new Ostrich();

$array = array($crow, $ostrich);

foreach ($array as $bird) {

    $bird -> fly();
}

?>