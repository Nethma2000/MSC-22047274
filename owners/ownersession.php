<?php
include('../databaseconnection.php');
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($conn,"select id_advisor, email,name from owners where email='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['name'];
$loggedin_id=$row['email'];
$loggedin_ownerid=$row['id_advisor'];


if(!isset($loggedin_session) || $loggedin_session==NULL) {
 echo "Go back";
 header("Location: main.php");
}
?>

