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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h3>Edit Task</h3>
    </div>

    <form class="form" action="edit.php" method="post">
        <div class="task">
            <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
            <input type="text" name="task" value="<?php echo $task; ?>">
        </div>
        <input type="submit" name="update-task" value="Update Task">
    </form>
</body>
</html>