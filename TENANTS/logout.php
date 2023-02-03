<?php

$email = $_GET['email'];
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
include('../CONNECTION/conn.php');
mysqli_query($conn,"INSERT INTO logout_view (email,date) VALUES ('$email','$date')");
header('location:r_logout.php');
?>