<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
    
</body>
<?php
    // Start the session
    session_start();

    // Check if the user is logged in (session variables are set)
    if(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['age'])) {
        // Retrieve values from session variables
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        $age = $_SESSION['age'];

        // Display user information
        echo "<h1>Welcome, $email!</h1>";
        echo "<h2>Password: $password</h2>";
        echo "<h3>Age: $age!</h3>";
    } else {
        // Redirect to login page if not logged in
        header('Location: login.php');
        exit();
    }
    ?>

    <form method="post">
        <input type="submit" name="logout" value="Log Out">
    </form>

    <?php
    // Logout logic
    if (isset($_POST['logout'])) {
        // Clear all session variables
        session_unset();

        // Destroy the session
        session_destroy();

        // Redirect to the login page
        header('Location: login.php');
        exit();
    }
    ?>
</html>