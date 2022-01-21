<?php
    session_start();
    $_SESSION['mssge'] = "You are now logged out.";
    // session_destroy();
    unset($_SESSION['username']);

    header("Location: login.php");

?>