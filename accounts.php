<?php
class profile{
    public $email;
    public $password;
    public $age;

    public function __construct($email, $password, $age){
        $this -> email = $email;
        $this -> password = $password;
        $this -> age = $age;
    }
}

?>