<?php

session_start();
require_once 'config.php';
date_default_timezone_set("America/Toronto");

$username = $_SESSION['user'];
$time = date("H:i:s");
$date = date("d F Y");

$query = "insert into history(username,time,date)values('$username','$time','$date');";
$result = mysqli_query($conn, $query);

$headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

$email = "0oheato0@gmail.com";
$subject = "Check in";

if ($result == 1) {
    if (mail($email, $subject, $username)) {
        header("location:index.php?result=success");
    }
    //header("location:index.php?result=success");
} else {
    echo "fail";
}
?>
