<?php

session_start();

$con= new mysqli('localhost','root','','startupcompanion');

$email=$_POST['advisor_email'];
$password=$_POST['advisor_password'];

$s = "select * from advisor where advisor_email='$email' && advisor_password='$password'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
    header('location: advisorhome.php');
}
else{
    echo "Invalid Email or Password";
}

?>