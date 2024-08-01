<?php


include('advisorsession.php');

include('../../databaseconnection.php');
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($conn,"select advisor_email,advisor_name, id_advisor from advisor where advisor_email='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['advisor_name'];
$loggedin_id=$row['advisor_email'];
$loggedin_advisor_id = $row['id_advisor']; 



if(isset($_POST)) {
	$to  = $_POST['to'];

	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$message = mysqli_real_escape_string($conn, $_POST['description']);

	$sql = "INSERT INTO mailbox (id_fromuser, fromuser, id_touser, subject, message) VALUES ('$loggedin_advisor_id', 'company', '$to', '$subject', '$message')";

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