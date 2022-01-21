<?php

if(isset($_POST['submit-user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordComf = $_POST['passwordComf'];

    

    if($password !== $passwordComf) {
        die("Passwords do not match");
    } else {
        $query = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
        $result = mysqli_query($conn, $query);
        
        $user_id = $conn->insert_id;

        if($result) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header("Location: tasks.php");
            exit(0);
        } else {
            die("Nothx".mysqli_error($conn));
        }
    }
            
}