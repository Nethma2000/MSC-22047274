<?php
include('advisorsession.php');

include('../../databaseconnection.php');
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($conn,"select advisor_email,advisor_name, id_advisor from advisor where advisor_email='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['advisor_name'];
$loggedin_id=$row['advisor_email'];
$loggedin_advisor_id = $row['id_advisor'];  // Fetch the id_advisor

if(!isset($loggedin_session) || $loggedin_session==NULL) {
 echo "Go back";
 header("Location: main.php");
}


//If user Not logged in then redirect them back to homepage. 



require_once("../db.php");

$sql = "SELECT * FROM validationrequets WHERE id_advisor='$loggedin_advisor_id' AND id_user='$_GET[id]' AND id_jobpost='$_GET[id_jobpost]'";
$result = $conn->query($sql);
if($result->num_rows == 0) 
{
  header("Location: job-applications.php");
  exit();
}


$sql = "UPDATE validationrequets SET status='2' WHERE id_advisor='$loggedin_advisor_id' AND id_user='$_GET[id]' AND id_jobpost='$_GET[id_jobpost]'";
if($conn->query($sql) === TRUE) {
	header("Location: job-applications.php");
	exit();
}

?>