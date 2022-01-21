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

    <!-- Bootstrap core CSS -->
    <link href="vendor-front/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="vendor-front/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="vendor-front/parsley/parsley.css"/>

</head>
<body>
    <div class="header" style="margin: 0 auto ; background: orangered">
        <h2>ثبت نام</h2>
    </div>
    <form class="form" action="register.php" method="post">
        <div class="form-group">
            <label for="username" style="direction: rtl ; float: right">نام کاربری : </label>
            <input class="input" type="text" name="username">
        </div>
        <div class="form-group">
            <label for="email" style="direction: rtl ; float: right">ایمیل : </label>
            <input class="input" type="email" name="email">
        </div>
        <div class="form-group">
            <label for="password" style="direction: rtl ; float: right">رمز عبور : </label>
            <input class="input" type="password" name="password">
        </div>
        <div class="form-group">
            <label for="passwordComf" style="direction: rtl ; float: right">تایید رمز عبور : </label>
            <input class="input" type="password" name="passwordComf">
        </div>
        <br/>
        <button type="submit" class="btn btn-primary" style="margin: 0 180px ; position: relative" name="submit-user">ثبت نام</button>
        <div>
            <a href="login.php" style="float: right">قبلا ثبت نام کرده اید؟</a>
        </div>
    </form>
</body>
</html>