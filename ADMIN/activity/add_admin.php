<?php 

session_start();

include '../../CONNECTION/conn.php';

if(isset($_POST['submit'])){

$username  = $_POST['username'];
$password = $_POST['password'];
$email  = $_POST['email'];
$fullname  = $_POST['fullname'];
$birthday  = $_POST['birthday'];
$gender = $_POST['gender'];
$phone= $_POST['phone'];

$sql = "INSERT INTO admin (username, password, email, fullname, birthday, gender, phone) VALUES ('$username', '$password', '$email', '$fullname', '$birthday', '$gender', '$phone')"; 


if($conn->query($sql)){

}else{

  }
} else {

}


header('Location:../home.php?category=admin');





?>