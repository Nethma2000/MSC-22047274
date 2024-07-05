<?php

session_start();

require_once("oconfig.php");

if(isset($_GET)) {

	//Delete Company using id and redirect
	$sql = "UPDATE owners  SET active='0' WHERE id_advisor='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: advisors.php");
		exit();
	} else {
		echo "Error";
	}
}