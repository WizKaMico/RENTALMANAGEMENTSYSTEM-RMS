


<?php
	require_once '../../CONNECTION/conn.php';
	if(ISSET($_POST['submit'])){
		$image_name = $_FILES['photo']['name'];
		$image_temp = $_FILES['photo']['tmp_name'];
		$house_code = $_POST['house_code'];
		$date_created = $_POST['date_created'];
		$payment = $_POST['payment'];
		$user_id = $_POST['user_id'];
		$pay_id = $_POST['pay_id'];
		$status = $_POST['status'];
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		if(!is_dir("./upload"))
			mkdir("upload");
		$path = "upload/".$name;
		$allowed_ext = array("gif", "jpg", "jpeg", "png");
		if(in_array($end, $allowed_ext)){
			if(move_uploaded_file($image_temp, $path)){
				mysqli_query($conn, "INSERT INTO `pay_cash` VALUES('', '$house_code','$date_created','$payment','$user_id', '$pay_id', '$status', '$path')") or die(mysqli_error());
				echo "<script>alert('User account saved!')</script>";
				header("location: ../home.php?category=myroom&house_code=".$house_code);
			}	
		}else{
			echo "<script>alert('Image only')</script>";
		}
	}
?>