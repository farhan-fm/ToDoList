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

    <!-- Bootstrap core CSS -->
    <link href="vendor-front/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="vendor-front/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="vendor-front/parsley/parsley.css"/>


</head>
<body>
<div class="flash-message">
    <h4>
        <?php
        if (isset($_SESSION['mssge'])) {
            echo $_SESSION['mssge'];
            unset($_SESSION['mssge']);
        }
        ?>
    </h4>
</div>

<div class="header" style="position: relative;margin: 0 auto;background: #ff4500">
    <h2>ورود</h2>
</div>

<form class="login-form" action="login.php" method="post">
    <div class="form-group">
        <label for="username" style="float: right ; direction: rtl ; margin-left: 8px">نام کاربری : </label>
        <input type="text" name="username" style="float: right">
    </div>
    <br/>
    <div class="form-group">
        <label for="password" style="float: right ; direction: rtl ; margin-left: 8px">رمز عبور : </label>
        <input type="password" name="password" style="float: right">
    </div>
    <br/>
    <br/>
    <button type="submit" class="btn btn-primary" name="login-user" style="margin: 0 200px ; position: relative">ورود
    </button>
    <br/>
    <div>
        <a href="register.php" style="float: right">هنوز ثبت نام نکرده اید؟</a>
    </div>
</form>
</body>
</html>