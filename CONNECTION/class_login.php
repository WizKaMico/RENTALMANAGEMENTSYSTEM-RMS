<?php
	session_start();
	
	require_once 'conn.php';
	
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		
		$query = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$rows = mysqli_num_rows($query);
		$fetch = mysqli_fetch_array($query);
		
		if($rows > 0){
			$_SESSION['user_id'] = $fetch['user_id'];
			header("location: home.php");
		}else{
			echo "<center><label class='text-danger'>Invalid username or password!</label></center>";
		}
	}
?>