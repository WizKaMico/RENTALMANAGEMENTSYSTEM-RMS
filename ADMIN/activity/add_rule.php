<?php
	session_start();
	include '../../CONNECTION/conn.php';

	if(isset($_POST['submit'])){
	
		
		$title = $_POST['title'];
		$type = $_POST['type'];
		$decription = $_POST['decription']; 
	

		
		$sql = "INSERT INTO rules (title, type, decription) VALUES ('$title', '$type', '$decription')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'USER ADDED SUCCESFULLY';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member added successfully';
		// }
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../home.php?category=guideline');
?>