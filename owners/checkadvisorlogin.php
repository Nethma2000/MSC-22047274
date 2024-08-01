<?php

session_start();

require_once("oconfig.php");

if(isset($_POST)) {

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

		$sql = "SELECT id_advisor, name, email, active FROM owners WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);
	$_SESSION["name"]=$row['name'];
	$_SESSION["company"]=$row['company'];

	

	if($result->num_rows > 0) {
		$_SESSION['login_user']=$email;

		while($row = $result->fetch_assoc()) {

			if($row['active'] == '2') {

		
				$_SESSION['companyLoginError2'] =  $conn->error;
				header("Location: login-advisor.php");
				exit();
			} else if($row['active'] == '0') {

				$_SESSION['companyLoginError'] = $conn->error;
				
				// $_SESSION['companyLoginError'] = "Your Account Is Rejected. Please Contact Admin For More Info.";
				header("Location: login-advisor.php");
				exit();
			} else if($row['active'] == '1') {

				$_SESSION['name'] = $row['name'];
				$_SESSION['advisor'] = $row['advisor'];

				header("Location: ownerhome.php");
				exit();
			} else if($row['active'] == '3') {
				$_SESSION['companyLoginError'] = $conn->error;
				header("Location: login-advisor.php");
				exit();
			}
		}
 	} else {
 		$_SESSION['loginError'] = $conn->error;
 		header("Location: login-advisor.php");
		exit();
 	}

 	$conn->close();

} else {
	header("Location: login-advisor.php");
	exit();
}