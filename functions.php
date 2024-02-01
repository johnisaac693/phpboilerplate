<?php

include_once 'sqlStuff.php';



function isUserExists($email, $password) {
    return searchUser($email, $password);
}

function registerUser($email, $password, $age){
    $result = createUser($email, $password, $age);
    return $result;
}

function getAge($email, $password){
    $result = getUserAge($email, $password);
    return $result;
}

function duplicateUserCheck($email){
    $result = searchUserReg($email);
    return $result;
}

?>