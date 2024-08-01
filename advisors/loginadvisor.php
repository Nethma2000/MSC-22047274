<?php

session_start();
require_once ("../databaseconnection.php");

if (isset($_POST)) {


	$stuemail = $_POST['email'];
	$stupass = $_POST['password'];
	$sql = "select * from advisor where advisor_email='$stuemail' && advisor_password='$stupass'";
	$result = $conn->query($sql);
	// $_SESSION["id_advisor"]=$row['id_advisor'];

	if ($result->num_rows > 0) {

		// echo "login";
		$_SESSION['login_user'] = $stuemail;
		header("Location: advisorhome.php");
		exit();
	} else {
		echo '<script type="text/javascript">';
		echo 'alert( "Invalid Username or Password!")';
		// header("Location: logindvisor.html");

		echo '</script>';
		exit();



	}
}


?>