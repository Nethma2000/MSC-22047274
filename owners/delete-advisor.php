<?php

require_once("oconfig.php");

if(isset($_GET)) {

	$sql = "DELETE FROM owners  WHERE id_advisor='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: advisors.php");
		exit();
	} else {
		echo "Error";
	}
}