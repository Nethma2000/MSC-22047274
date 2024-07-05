<?php
	session_start();
	include_once('aconnection.php');

	if(isset($_POST['add'])){
		$advisor_name = $_POST['advisor_name'];
		$advisor_company = $_POST['advisor_company'];
		$advisor_designation = $_POST['advisor_designation'];
		$advisor_field = $_POST['advisor_field'];
		$advisor_advisingcomponent = $_POST['advisor_advisingcomponent'];
		$advisor_workingtasks = $_POST['advisor_workingtasks'];
		$advisor_noofexperience = $_POST['advisor_noofexperience'];
		$advisor_email = $_POST['advisor_email'];
		$advisor_mobile = $_POST['advisor_mobile'];
		$advisor_linkedin = $_POST['advisor_linkedin'];
		$advisor_qualifications = $_POST['advisor_qualifications'];
		$advisor_nic = $_POST['advisor_nic'];
		$advisor_password = $_POST['advisor_password'];
		
		$sql = "INSERT INTO advisor (advisor_name, advisor_company, advisor_designation,advisor_field,advisor_advisingcomponent,advisor_workingtasks,advisor_noofexperience,advisor_email,advisor_mobile,advisor_linkedin,advisor_qualifications,advisor_nic,advisor_password)
		 VALUES ('$advisor_name', '$advisor_company', '$advisor_designation','$advisor_field', '$advisor_advisingcomponent', '$advisor_workingtasks','$advisor_noofexperience','$advisor_email','$advisor_mobile','$advisor_linkedin','$advisor_qualifications','$advisor_nic','$advisor_password')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member added successfully';
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

	header('location: index.php');
?>