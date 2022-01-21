<?php
session_start();
    include "includes/db.php";
    include "includes/reg_auth.php";

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
    <div class="header">
        <h3>Sign Up</h3>
    </div>
    <form class="form" action="register.php" method="post">
        <div class="form-group">
            <label for="username">Enter Username</label>
            <input class="input" type="text" name="username">
        </div>
        <div class="form-group">
            <label for="email">Enter Email</label>
            <input class="input" type="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Enter Password</label>
            <input class="input" type="password" name="password">
        </div>
        <div class="form-group">
            <label for="passwordComf">Comfirm Password</label>
            <input class="input" type="password" name="passwordComf">
        </div>
        <button type="submit" name="submit-user">Register</button>
        <div>
            <a href="login.php">Log in</a> if you are a member already.
        </div>
    </form>
</body>
</html>