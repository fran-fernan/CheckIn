<?php

ob_start();
session_start();
require_once 'config.php';

//read the values
$username = $_REQUEST['users'];
$password = $_REQUEST['password'];
$_SESSION['user'] = $username;

$query = "select * from users where username='$username';";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];
    
    if(password_verify($password,$hashed_password)){
        $_SESSION['username'] = $username;
        header("location:checked.php");
    }
    else{
        header("location:index.php?result=wrongpass");
    }
}
?>