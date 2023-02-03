<?php
include '../../CONNECTION/conn.php';
if(isset($_POST['send'])){
//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$passwd){
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		$param = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($itexmo),
			),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
}
//##########################################################################

$number = $_POST['phone'];
$message = $_POST['code'];
$email = $_POST['email'];
$date_created = date('Y-m-d');

$result = itexmo($number,$message,"TR-WESEL032537_SMZTF", "4}u[ld({2g");

if ($result == ""){
echo "iTexMo: No response from server!!!
Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
Please CONTACT US for help. ";	
}else if ($result == 0){

mysqli_query($conn,"INSERT INTO admin_verification_attemp_sms (phone, email, code, date_created) VALUES ('$number', '$email', '$message', '$date_created')");   


$newURL = '../verify.php?email='.$email.'';
  header('Location: '.$newURL);

}
else{	
echo "Error Num ". $result . " was encountered!";
}

}

?>