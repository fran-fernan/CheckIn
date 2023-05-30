<?php

ob_start();
session_start();
require_once 'config.php';

//if the session doesn't exist
if (!isset($_SESSION['username'])) {
    //redirect back to the login page
    header('location:login.php');
}
require_once 'config.php';

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

//encrypt password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
//to check if the same user is already logged in
$query = "select username from users where username = '$username';";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    header("location:loggedin.php?result=userexists");
} else {
    $query = "insert into users(username,password)values('$username','$hashed_password');";
    $result = mysqli_query($conn, $query);

    if ($result == 1) {
        header("location:loggedin.php?result=success");
    } else {
        header("location:loggedin.php?result=fail");
    }
}
?>
