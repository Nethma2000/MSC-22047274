<?php

include ('ensession.php');

$loggedin_userid = $row['id_user'];
$_SESSION["id_user"] = $loggedin_userid;


require_once ("db.php");

if (isset($_GET)) {

	$sql = "SELECT * FROM advisor_overview WHERE id_jobpost='$_GET[id]'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$id_company = $row['id_advisor'];
	}

	$sql1 = "SELECT * FROM validationrequets WHERE id_user='$_SESSION[id_user]' AND id_jobpost='$row[id_jobpost]'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows == 0) {

		$sql = "INSERT INTO validationrequets(id_jobpost, id_advisor, id_user) VALUES ('$_GET[id]', '$id_company', '$_SESSION[id_user]')";

		if ($conn->query($sql) === TRUE) {
			echo "Idea Validation Request sent succesfully";
			echo ("<script LANGUAGE='JavaScript'>
	window.alert('Idea Validation Request sent succesfully');
	window.location.href='#';
	</script>");
			header("Location: view-advisordetails.php?id=" . $row['id_jobpost']);
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

	} else {
		echo "Already Applied";
		echo ("<script LANGUAGE='JavaScript'>
            window.alert('You have already sent a idea validation request to this advisor');
            window.location.href='advisorselection.php';
            </script>");
		exit();
	}


} else {
	header("Location: jobs.php");
	exit();
}