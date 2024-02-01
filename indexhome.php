<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
Email: <input type="text" name="email"><br>
Password: <input type="text" name="password"><br>
Age: <input type="text" name="age"><br>
<input type="submit" name = "register" value = "REGISTER" >
</form>
</body>

<?php

include 'functions.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];
   $age = $_POST['age'];
   if (empty($email) || empty($password) || empty($age)) {
    echo '<script>alert("Invalid input Detected!");</script>';}

    else{
   if (duplicateUserCheck($email)) {
      echo '<script>alert("User Already Exists!");</script>';
   } else {
      // Register the user and store values in session variables
      registerUser($email, $password, $age);

      // Store values in session variables
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      $_SESSION['age'] = $age;

      // Redirect to homepage
      header('Location: homepage.php');
      exit(); // Make sure to exit after a header redirect
   }}

}

?>
</html>