<?php

include('../ensession.php');

include('../db.php');
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($conn,"select id_user,email,name from entrepreneurs where email='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['name'];
$loggedin_id=$row['email'];
$loggedin_userid=$row['id_user'];



if(isset($_POST)) {
	$to  = $_POST['to'];

	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$message = mysqli_real_escape_string($conn, $_POST['description']);

	$sql = "INSERT INTO mailbox (id_fromuser, fromuser, id_touser, subject, message) VALUES ('$_SESSION[id_user]', 'user', '$to', '$subject', '$message')";

	if($conn->query($sql) == TRUE) {
		header("Location: mailbox.php");
		exit();
	} else {
		echo $conn->error;
	}
} else {
	header("Location: mailbox.php");
	exit();
}