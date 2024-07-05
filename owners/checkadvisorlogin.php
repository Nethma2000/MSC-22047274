<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("oconfig.php");

//If user Actually clicked login button 
if(isset($_POST)) {

	//Escape Special Characters in String
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	
	//sql query to check company login
	$sql = "SELECT id_advisor, name, email, active FROM owners WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);
	$_SESSION["name"]=$row['name'];
	$_SESSION["company"]=$row['company'];

	

	//if company table has this this login details
	if($result->num_rows > 0) {
		$_SESSION['login_user']=$email;

		//output data
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
				// active 1 means admin has approved account.
				//Set some session variables for easy reference
				$_SESSION['name'] = $row['name'];
				$_SESSION['advisor'] = $row['advisor'];

				//Redirect them to company dashboard once logged in successfully
				header("Location: ownerhome.php");
				exit();
			} else if($row['active'] == '3') {
				$_SESSION['companyLoginError'] = $conn->error;
				header("Location: login-advisor.php");
				exit();
			}
		}
 	} else {
 		//if no matching record found in user table then redirect them back to login page
 		$_SESSION['loginError'] = $conn->error;
 		header("Location: login-advisor.php");
		exit();
 	}

 	//Close database connection. Not compulsory but good practice.
 	$conn->close();

} else {
	//redirect them back to login page if they didn't click login button
	header("Location: login-advisor.php");
	exit();
}