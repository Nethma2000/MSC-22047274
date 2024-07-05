<?php
include('econfig.php');
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($conn,"select email,name from entrepreneurs where email='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['name'];
$loggedin_id=$row['email'];
if(!isset($loggedin_session) || $loggedin_session==NULL) {
 echo "Go back";
 header("Location: main.php");
}
?>
