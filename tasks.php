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
        <h3 style="direction: rtl ; float-displace: block ; position: relative ; alignment: center">
            سلام <?php echo $_SESSION['username'] ?>خوش آمدید</h3>
        <input class="logout" type="submit" name="logout" value="خروج" style="margin: 0 20px ; position: relative">
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

    </div>


</form>


<div class="task-header" style="direction: rtl; padding-top: 16px ; padding-bottom: 16px">
    <h3>نرم افزار لیست todo با استفاده از php</h3>
</div>

<form class="task-form" action="tasks.php" method="post">
    <div class="input-group">
        <input class="task-input" type="text" name="task" style="direction: rtl" placeholder="تسک را وارد کنید">
    </div>


    <select name="status" type="text" style="float: left">
        <option value=”todo”>ToDo</option>
        <option value=”doing”>Doing</option>
        <option value=”done”>Done</option>
    </select>

    <br/>
    <input type="submit" style="margin: 0 45%; position: relative" class="btn btn-primary" name="submit-task"
           value="ذخیره">

</form>

<label for="filter" style="float: left ; direction: ltr ; margin-left: 8px"> filter : </label>
<button onclick="filter1()" type="button" value="all">همه</button>
<button onclick="filter2()" type="button" value="todo">todo</button>
<button onclick="filter3()" type="button" value="doing">doing</button>
<button onclick="filter4()" type="button" value="done">done</button>
<table>
    <thead>
    <tr>
        <th>شماره تسک</th>
        <th>نام کاربر</th>
        <th>تسک</th>
        <th>وضعیت</th>
        <th>عملیات</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $filter = 1;

    $s_query = '';
    echo "this is :" . $filter;
    if ($filter == 4) {
        $s_query = "SELECT * FROM tasks WHERE user_id=" . $_SESSION['user_id'] . " AND status =" . '"done"';
    } else {
        $s_query = "SELECT * FROM tasks WHERE user_id=" . $_SESSION['user_id'];
    }
    //else if ($filter1 == 1) {
    //    $s_query = "SELECT * FROM tasks WHERE user_id=" . $_SESSION['user_id'];
    // }


    $s_result = mysqli_query($conn, $s_query);

    $i = 0;

    while ($row = mysqli_fetch_array($s_result)) {
        $task_id = $row['task_id'];
        $user_id = $row['user_id'];
        $task = $row['task'];
        $task_status = $row['status'];

        if ($i <= $task_id) {
            $i++;
        }
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $_SESSION['username']; ?></td>
            <td><?php echo $task; ?></td>
            <td><?php echo $task_status; ?></td>
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
<script
>
    function filter1() {
        <?php
        $filter = 1;
        ?>
    }
    function filter2() {
        <?php
        $filter = 2;
        ?>
    }

    function filter3() {
        <?php
        $filter = 3;
        ?>
    }

    function filter4() {
        <?php
        $filter = 4; ?>
    }


</script>
</html>