<?php
	session_start();
	include '../../CONNECTION/conn.php';

	if(isset($_POST['submit'])){
	
		
		$house_code = $_POST['house_code'];
		$house_name = $_POST['house_name'];
		$province = $_POST['province']; 
		$city = $_POST['city'];
		$monthly_rent = $_POST['monthly_rent'];
		$date_created = $_POST['date_created'];
		$status = $_POST['status'];
		$created_by = $_POST['created_by'];

		
		$sql = "INSERT INTO house (house_code, house_name, province, city, monthly_rent, date_created, status, created_by) VALUES ('$house_code', '$house_name', '$province', '$city', '$monthly_rent', '$date_created', '$status', '$created_by')";

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

	header('location: ../home.php?category=room');
?>