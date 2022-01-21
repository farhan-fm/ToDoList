<?php
session_start();
include "includes/db.php";
include "includes/login_auth.php";

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="flash-message">
        <h4>
            <?php
                if(isset($_SESSION['mssge'])) {
                    echo $_SESSION['mssge'];
                    unset($_SESSION['mssge']);
                }
            ?>
        </h4>
    </div>
        
    <div class="header">
        <h3>Log In</h3>
    </div>

    <form class="login-form" action="login.php" method="post">
        <div class="form-group">
            <label for="username">Enter Username</label>
            <input type="text" name="username">
        </div>
        <div class="form-group">
            <label for="password">Enter Password</label>
            <input type="password" name="password">
        </div>
        <button type="submit" name="login-user">Log in</button>
        <div>
            <a href="register.php">Register</a> if you don't have an account yet.
        </div>
    </form>
</body>
</html>