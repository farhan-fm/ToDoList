<?php

$conn = mysqli_connect("localhost", "root", "", "todolist");

if(!$conn) {
    die("CONNECTION FAILED".mysqli_error($conn));
}