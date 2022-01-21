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
</head>
<body>

    <form action="tasks.php" method="post">
        <input class="logout" type="submit" name="logout" value="Log Out">
    </form>
    
    <div class="flash-message">
            <?php
                if(isset($_SESSION['success'])) {
                    echo "<h4 class='flash-message'>".$_SESSION['success']."</h4>";
                    unset($_SESSION['success']);
                }
            ?>
        <h4>
            <?php
                if(isset($_SESSION['task-message'])) {
                    echo $_SESSION['task-message'];
                    unset($_SESSION['task-message']);
                }
            ?>
        </h4>
        <h4>
            <?php
                if(isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
            ?>
        </h4>
        <h4>
            <?php
                if(isset($_SESSION['edit'])) {
                    echo $_SESSION['edit'];
                    unset($_SESSION['edit']);
                }
            ?>
        </h4>
    </div>

    <div class="task-header" style="direction: rtl">
        <h3>نرم افزار لیست todo با استفاده از php</h3>
    </div>
    
            <form class="task-form" action="tasks.php" method="post">
                <div class="input-group">
                    <input class="task-input" type="text" name="task" placeholder="Enter Task">
                </div>
                <input type="submit" name="submit-task" value="Save Task">
            </form>
    <table>
        <thead>
            <tr>
                <th>Task number</th>
                <th>User name</th>
                <th>Task</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $s_query = "SELECT * FROM tasks WHERE user_id=" . $_SESSION['user_id'];
                $s_result= mysqli_query($conn, $s_query);

                $i = 0;
                
                while($row = mysqli_fetch_array($s_result)) {
                    $task_id = $row['task_id'];
                    $user_id = $row['user_id'];
                    $task = $row['task'];

                    
                    if($i <= $task_id) {
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
                                <a name="edit" href='edit.php?edit_id=<?php echo $task_id; ?>'>Edit</a>
                                <a href='tasks.php?delete_id=<?php echo $task_id; ?>'>  Delete</a>
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