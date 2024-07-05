<?php

session_start();

require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];

if(empty($email)){
    echo "Please enter your Email Address.";
}else if(strlen($email) > 100){
    echo "Email Address should contain less than 100 characters.";
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "Invalid Email Address.";
}else if(empty($password)){
    echo "Please enter your Password";
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo "Invalid Password";
}else{

    $resultset = Database::search("SELECT * FROM `advisors` WHERE `email`='".$email."' 
    AND `password`='".$password."'");
    $n = $resultset->num_rows;

    if($n == 1){

        echo "success";
        $d = $resultset->fetch_assoc();
        $_SESSION["au"] = $d;

    }else{
        echo "Invalid Email or Password";
    }

}

?>