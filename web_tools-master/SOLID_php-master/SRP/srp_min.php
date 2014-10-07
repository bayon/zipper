<?php

class User {

    private $username;
    private $password;

    public function __construct() {

    }

    public function setUsername($username) {
        $this -> username = $username;
    }

    public function getUsername() {
        return $this -> username;
    }

    public function setPassword($password) {
        $this -> password = $password;
    }

    public function getPassword() {
        echo("<br>get password!!!");
        return $this -> password;
    }

}

class EmailChanger {

    private $accessChecker;

    public function __construct($accessChecker) {
        $this -> accessChecker = $accessChecker;
    }

    // Single Responsibility Principle: one class one responsibility
    public function changeEmail($user) {
        if ($this -> accessChecker -> checkAccess($user)) {
            //grant permission
            echo("<br>success");
        } else {
            echo("<br>fail");
        }
    }

}

class AccessChecker {
    public function __construct() {
        echo("<br>AccessChecker constructed...");
    }

    // Single Responsibility Principle: one class one responsibility
    public function checkAccess($user) {

        $bool_result = false;
        // code to verify if user is valid.
        if ($user -> getPassword() == "1234") {
            $bool_result = true;
        }

        return $bool_result;
    }

}

$user = new User();
$user -> setUsername("Joe");
$user -> setPassword("1234");
echo("<br>User:" . $user -> getUsername() . ":" . $user -> getPassword() . "!");

$accessChecker = new AccessChecker();
$emailChanger = new EmailChanger($accessChecker);

$emailChanger -> changeEmail($user);
?>