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
<input type="submit" name = "login" value = "LOGIN" >
</form>
</body>

<?php

include 'functions.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];
  

   if (isUserExists($email, $password)) {
      
    $age = getAge($email, $password);
      // Store values in session variables
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
      $_SESSION['age'] = $age;

      // Redirect to homepage
      header('Location: homepage.php');
      exit(); // Make sure to exit after a header redirect 
   } else {
    echo '<script>alert("Invalid Credentials!");</script>';
   }
}

?>
</html>