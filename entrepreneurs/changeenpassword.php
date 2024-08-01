<?php

include('entreprenursession.php');
require_once("econfig.php");

if(isset($_POST)) {

	$password = mysqli_real_escape_string($conn, $_POST['newpassword']);

	//Encrypt Password
	// $password = base64_encode(strrev(md5($password)));

	$sql = "UPDATE entrepreneurs SET password='$password' WHERE id_user='$loggedin_userid'";
	if($conn->query($sql) === true) {
echo "success";
		exit();
	} else {
		echo $conn->error;
	}

 	$conn->close();

} else {
echo "errr";
	exit();
}