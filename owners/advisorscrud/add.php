<?php
	session_start();
	include_once('oconnection.php');

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$company = $_POST['company'];
		$designation = $_POST['designation'];
		$field = $_POST['field'];
		$mobileno = $_POST['mobileno'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$medium = $_POST['medium'];
		$linkedin = $_POST['linkedin'];
		$github = $_POST['github'];
		$qualifications = $_POST['qualifications'];
		$work_experience = $_POST['work_experience'];
		$active = $_POST['active'];
		$sql = "INSERT INTO owners (name, company, designation,field,mobileno,email,password,medium,linkedin,github,qualifications,work_experience,active)
		 VALUES ('$name', '$company', '$designation','$field', '$mobileno', '$email','$password','$medium', '$linkedin', '$github','$qualifications', '$work_experience', '$active')";

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