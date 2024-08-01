<?php
include('../databaseconnection.php');
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($conn,"select advisor_email,advisor_name, id_advisor from advisor where advisor_email='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['advisor_name'];
$loggedin_id=$row['advisor_email'];
$loggedin_advisor_id = $row['id_advisor'];  
if(!isset($loggedin_session) || $loggedin_session==NULL) {
 echo "Go back";
 header("Location: main.php");
}
?>