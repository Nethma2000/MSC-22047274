<?php
	session_start();
	include_once('aconnection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM advisor WHERE id_advisor = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member deleted successfully';
		}
	
		else{
			$_SESSION['error'] = 'Something went wrong in deleting member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to delete first';
	}

	header('location: index.php');
?>