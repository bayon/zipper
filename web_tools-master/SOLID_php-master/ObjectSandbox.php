<?php
////////INTERFACE//////////////////////////////////////
interface InterfaceOne {
    function getNameOne();
    function setNameOne($nameIn);
}
class ImplementorOfInterface implements InterfaceOne {
    private $instanceNameOne;
    //@override  
    public function getNameOne() {
        return $this -> instanceNameOne;
    }
    public function setNameOne($nameIn) {
        $this -> instanceNameOne = $nameIn;
    }

}
/////////TEST INTERFACE/////////////////////////////////
echo("\n <TEST INTERFACE>");
$interfacer = new ImplementorOfInterface();
$interfacer -> setNameOne("Harold");
echo 'Name One: ' . $interfacer -> getNameOne();
////////INHERITENCE//////////////////////////////////////
class ParentClass {
    
    public $parentVar = "parent var";
    public function getColor() {
        return 'RED';
    }
}
class ChildClass extends ParentClass {
    //@override 
    public function getColor() {
     
        return 'BLUE';
    }
    //access the super
    public function getParentColor() {
        return parent::getColor();
    }

}
/////////TEST INHERITENCE//////////////////////////////
echo("\n <TEST INHERITENCE>");
$inheritor = new ChildClass();
echo ' >test 1 - show the child color' ;
echo $inheritor -> getColor();
echo ' >test 1 - show the parent color' ;
echo $inheritor -> getParentColor();
//////////////ABSTRACT/////////////////////////////
abstract class AbstractClass {
    abstract public function getName();
    abstract public function setName($nameIn);
}
class AbstractImplementor extends AbstractClass {
    private $instanceName;
    //OOPHPAbstractClass  DELEGATE METHODS
    public function getName() {
        return $this -> instanceName;
    }
    public function setName($nameIn) {
        $this -> instanceName = $nameIn;
    }
}
/////////TEST ABSTRACT//////////////////////
$abstracto = new AbstractImplementor();
$abstracto -> setName(" >Abstracted Harold");
echo("\n <TEST ABSTRACT>");
echo $abstracto -> getName();
//////////////STATIC/////////////////////////////
class StaticClass {
    //a static variable,
    static $red = 'RED';
    public function getStaticVarRed() {
        return self::$red;
    }
    public static function staticGetStaticVarRed() {
        return self::$red;
    }
}
/////////TEST STATIC//////////////////////////
$statico = new StaticClass();
echo("\n <TEST STATIC>");
echo ' >red: ' . $statico -> getStaticVarRed();
echo ' >test  - show the static var using a static function';
echo ' >red: ' . StaticClass::staticGetStaticVarRed();

?>