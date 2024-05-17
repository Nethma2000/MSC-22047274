<?php

session_start();




require_once("oconfig.php");

if(isset($_GET)) {


	$sql = "UPDATE owners SET active='1' WHERE id_advisor='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: advisors.php");
		exit();
	} else {
		echo "Error";
	}
}