<?php
	session_start();
	include '../../CONNECTION/conn.php';

	if(isset($_POST['submit'])){
		
		$user_id = $_POST['user_id'];
		$status = $_POST['status'];
		

		$sql = "UPDATE users SET status = '$status' WHERE user_id = '$user_id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'USER UPDATED SUCESSFULLY';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member updated successfully';
		// }
		///////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to edit first';
	}

	header('location: ../home.php?category=archive');

?>