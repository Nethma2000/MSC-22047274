<?php

   include_once ('../admins/inqconnection.php');

    $name = $_POST["uname"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $msg = $_POST["msg"];

    $q = "INSERT INTO `inquiries`(`inquiry_name`,`inquiry_subject`,`inquiry_email`,`inquiry_message`) VALUES 
    ('".$name."','".$email."','".$subject."','".$msg."')";

    if($conn->query($q)){
      echo ("OK");
    }
    else{
      $_SESSION['error'] = 'Something went wrong while adding';
   }

?> 