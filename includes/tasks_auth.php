<?php

if(isset($_POST['submit-task'])) {
        $task = $_POST['task'];

        $query = "INSERT INTO tasks (user_id, task) VALUES (" . $_SESSION['user_id'] . ", '$task')";
        var_dump($query);
        $result = mysqli_query($conn, $query);

        if($result) {
            echo $_SESSION['task-message'] = "New task added";
            header("Location: tasks.php");
            exit(0);
        } else {
            die("Nothing to show".mysqli_error($conn));
        }
    }

    if(isset($_POST['logout'])) {
        header("Location: logout.php");
    }

    if(isset($_GET['edit_id'])) {
        header("Location: edit.php");
    }

    if(isset($_GET['delete_id'])) {
        $task_id = $_GET['delete_id'];
        
        $query = "DELETE FROM tasks WHERE task_id=$task_id";
        $delete_result = mysqli_query($conn, $query);
        
        
        if(!$delete_result) {
            die("Nothing!".mysqli_error($conn));
        } else {   
            $_SESSION['delete'] = "Task Deleted";
            header("Location: tasks.php");
            exit(0);
        }
        
    }