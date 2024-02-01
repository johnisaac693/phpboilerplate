<?php
$servername = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "test";

$con = new mysqli("localhost", "root", "", "test");

if ($con -> connect_error){
    die("Connection failed: " .$con -> connect_error);
}


function searchUserReg($email){
    global $con;
    $state = $con->prepare("SELECT `email` from testable WHERE email = ?");
    $state->bind_param("s", $email);
    $result = $state->execute();

    if (!$result) {
        echo $state->error;
        return false;
    }

    $state->store_result();

    $state->bind_result($dbEmail);
    $state->fetch();

    if ($state->num_rows > 0) {
        // User exists
        $result = true;
    } else {
        // User does not exist
        $result = false;
    }

    $state->close();
    return $result;
}

function searchUser($email, $password){
    global $con;
    $state = $con->prepare("SELECT `email` , `password` from testable WHERE email = ? AND password = ?");
    $state->bind_param("ss", $email, $password);
    $result = $state->execute();

    if (!$result) {
        echo $state->error;
        return false;
    }

    $state->store_result();

    $state->bind_result($email, $password);
    $state->fetch();

    if ($state->num_rows > 0) {
        // User exists
        $result = true;
    } else {
        // User does not exist
        $result = false;
    }

    $state->close();
    return $result;
}

function getUserAge($email, $password){
    global $con;
    $state = $con->prepare("SELECT `age` FROM testable WHERE email = ? AND password = ?");
    $state->bind_param("ss", $email, $password);
    $result = $state->execute();

    if (!$result) {
        echo $state->error;
        return false;
    }
    $age = 0;
    $state->store_result();
    $state->bind_result($age);
    $state->fetch();

    if ($state->num_rows > 0) {
        // User exists
        $result = (int)$age;
    } else {
        // User does not exist
        $result = false;
    }

    $state->close();
    return $result;
}

function createUser($email, $password, $age){
    global $con;

    $state = $con -> prepare("INSERT INTO testable(`email`,`password`,`age`) values (?,?,?)");
    $state -> bind_param("ssi", $email, $password, $age);
    $result = $state -> execute();

    if (!$result){
        echo $state -> error;
    }

    $state -> close();

}



$newEmail = "newemail@email.com";
$newPassword = "newpass";
$newAge = 22;


?>