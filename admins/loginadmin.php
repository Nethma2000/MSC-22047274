<?php

session_start();

$con= new mysqli('localhost','root','','startupcompanion');

$email=$_POST['email'];
$password=$_POST['password'];

$s = "select * from admins where email='$email' && password='$password'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
$_SESSION["name"]=$row['name'];

if($num==1){
    $_SESSION['login_user']=$email;
    header('location: adminhome.php');
}
else{
    echo "Invalid Email or Password";
}

?>