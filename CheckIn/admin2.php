<?php
ob_start();
require_once 'config.php';

$username = $_REQUEST['username'];

//encrypt password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
//to check if the same user is already logged in
$query = "delete from users where username = '$username';";

$result = mysqli_query($conn, $query);

header("location:loggedin.php?result=delete");

?>
