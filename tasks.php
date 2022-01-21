<?php
session_start();
include "includes/db.php";
include "includes/tasks_auth.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo</title>
    <link rel="stylesheet" href="style.css">


    <!-- Bootstrap core CSS -->
    <link href="vendor-front/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="vendor-front/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="vendor-front/parsley/parsley.css"/>

</head>
<body>

<form action="tasks.php" method="post" style="width: 20% ; height: 100%">
    <div class="card-body" style="float: left">
        <h3 style="direction: rtl ; float-displace: block ; position: relative ; alignment: center">سلام <?php echo $_SESSION['username'] ?>خوش آمدید</h3>
        <input class="logout" type="submit" name="logout" value="خروج" style="margin: 0 20px ; position: relative">
    </div>


</form>

<div class="flash-message">
    <?php
    if (isset($_SESSION['success'])) {
        echo "<h4 class='flash-message'>" . $_SESSION['success'] . "</h4>";
        unset($_SESSION['success']);
    }
    ?>
    <h4>
        <?php
        if (isset($_SESSION['task-message'])) {
            echo $_SESSION['task-message'];
            unset($_SESSION['task-message']);
        }
        ?>
    </h4>
    <h4>
        <?php
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        ?>
    </h4>
    <h4>
        <?php
        if (isset($_SESSION['edit'])) {
            echo $_SESSION['edit'];
            unset($_SESSION['edit']);
        }
        ?>
    </h4>
</div>

<div class="task-header" style="direction: rtl; padding-top: 16px ; padding-bottom: 16px">
    <h3>نرم افزار لیست todo با استفاده از php</h3>
</div>

<form class="task-form" action="tasks.php" method="post">
    <div class="input-group">
        <input class="task-input" type="text" name="task" style="direction: rtl" placeholder="تسک را وارد کنید">
    </div>
    <br/>
    <input type="submit" style="margin: 0 45%; position: relative" class="btn btn-primary" name="submit-task" value="ذخیره">
</form>
<table>
    <thead>
    <tr>
        <th>شماره تسک</th>
        <th>نام کاربر</th>
        <th>تسک</th>
        <th>عملیات</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $s_query = "SELECT * FROM tasks WHERE user_id=" . $_SESSION['user_id'];
    $s_result = mysqli_query($conn, $s_query);

    $i = 0;

    while ($row = mysqli_fetch_array($s_result)) {
        $task_id = $row['task_id'];
        $user_id = $row['user_id'];
        $task = $row['task'];


        if ($i <= $task_id) {
            $i++;
        }
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $_SESSION['username']; ?></td>
            <td><?php echo $task; ?></td>
            <div>
                <td>
                    <input type="checkbox">
                    <a name="edit" href='edit.php?edit_id=<?php echo $task_id; ?>'>تغییر</a>
                    <a href='tasks.php?delete_id=<?php echo $task_id; ?>'>حذف</a>
                </td>

            </div>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>