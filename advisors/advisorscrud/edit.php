<?php
	session_start();
	include_once('aconnection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id_advisor'];
		$name = $_POST['advisor_name'];
		$company = $_POST['advisor_company'];
		$designation = $_POST['advisor_designation'];
		$field = $_POST['advisor_field'];
		$comp = $_POST['advisor_advisingcomponent'];
		$work_experience = $_POST['advisor_noofexperience'];
		$email = $_POST['advisor_email'];
		$mobile = $_POST['advisor_mobile'];
		$linkedin = $_POST['advisor_linkedin'];
		$qualifications = $_POST['advisor_qualifications'];
		
		$sql = "UPDATE advisor SET advisor_name = '$name', advisor_company = '$company', advisor_designation = '$designation', advisor_field = '$field',  advisor_advisingcomponent = '$comp', advisor_noofexperience = '$work_experience', advisor_email = '$email', advisor_mobile = '$mobile',advisor_linkedin = '$linkedin', advisor_qualifications = '$qualifications' WHERE id_advisor = '$id'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Member updated successfully';
		}
	
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to edit first';
	}

	header('location: index.php');

?>