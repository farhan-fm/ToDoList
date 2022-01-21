<?php

$task_id = 0;
$task = "";


if (isset($_GET['edit_id'])) {
    $task_id = $_GET['edit_id'];

    $query = "SELECT * FROM tasks WHERE task_id=$task_id";
    $select_task_result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($select_task_result)) {
        $task_id = $row['task_id'];
        $task = $row['task'];
    }
}

if (isset($_POST['update-task'])) {
    $task = $_POST['task'];
    $task_id = $_POST['task_id'];
    $task_status = $_POST['status'];
    $status = substr($task_status, 1, -1);
    $status = substr($status, 2);
    $status = substr_replace($status, "", -2);


    $query = "UPDATE tasks SET task='$task' , status='$status' WHERE task_id=$task_id";
    // var_dump($query);
    // die();
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['task_id'] = $task_id;
        $_SESSION['edit'] = "Task edited.";


    }
    header("Location: tasks.php");
}