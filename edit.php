<?php
session_start();
include "includes/db.php";
include "includes/edit_auth.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor-front/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="vendor-front/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="vendor-front/parsley/parsley.css"/>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header" style="position: relative ; margin: auto auto">
    <h3>تغییر</h3>
</div>

<form class="form" action="edit.php" method="post">
    <div class="task" >
        <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
        <input type="text" style="width: 100%" name="task" value="<?php echo $task; ?>">
    </div>
    <br/>
    <br/>
    <button type="submit" class="btn btn-primary" style="margin: 0 200px ; position: relative" name="update-task"
    >تغییر
    </button>

</form>
</body>
</html>