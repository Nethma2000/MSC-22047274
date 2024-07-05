<?php
	session_start();
	include_once('oconnection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id_advisor'];
		$name = $_POST['name'];
		$company = $_POST['company'];
		$designation = $_POST['designation'];
		$field = $_POST['field'];
		$mobileno = $_POST['mobileno'];
		$email = $_POST['email'];
		$medium = $_POST['medium'];
		$linkedin = $_POST['linkedin'];
		$github = $_POST['github'];
		$qualifications = $_POST['qualifications'];
		$work_experience = $_POST['work_experience'];
		$active = $_POST['active'];
		$sql = "UPDATE owners SET name = '$name', company = '$company', designation = '$designation', field = '$field', mobileno = '$mobileno', email = '$email', medium = '$medium', linkedin = '$linkedin', github = '$github', qualifications = '$qualifications', work_experience = '$work_experience', active = '$active'
		 WHERE id_advisor = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member updated successfully';
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

	header('location: index.php');

?>