<?php
	session_start();
	include '../../CONNECTION/conn.php';

	if(isset($_POST['edit'])){
		
		$id = $_POST['id'];
		$house_name = $_POST['house_name'];
		$monthly_rent = $_POST['monthly_rent'];
		$status  = $_POST['status'];
		$user_id = $_POST['user_id'];
		$house_code = $_POST['house_code'];

		$sql = "UPDATE house SET house_name = '$house_name', monthly_rent = '$monthly_rent', status = '$status' WHERE id = '$id'";
		$sql1 = "UPDATE users SET status = 'ARCHIVE', assigned_to = null, previously_assigned_to = '$house_code' WHERE user_id = '$user_id'";

		//use for MySQLi OOP
		if($conn->query($sql) && $conn->query($sql1)){
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

	header('location: ../home.php?category=room');

?>