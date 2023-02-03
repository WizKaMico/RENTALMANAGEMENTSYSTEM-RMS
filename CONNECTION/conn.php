<?php
	$conn = mysqli_connect("localhost", "root", "", "rms");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>