<?php

    if(isset($_POST['btn-send']))
    {
       $UserName = $_POST['UName'];
       $Email = $_POST['Email'];
    
       $Msg = $_POST['msg'];

       if(empty($UserName) || empty($Email) || empty($Msg))
       {
           header('location:sign.html');
       }
       else
       {

        $to = "rmndhananjani@gmail.com";

           if(mail($to,$Subject,$Msg,$Email))
           {
               header("location:home.html");
           }
       }
    }
    else
    {
        header("location:loginadvisor.html");
    }
// $name=$_POST['uniname'];
// $visitor_email=$_POST['uniemail'];
// $message=$_POST['message'];


// $uniemai_from = 'careernextgen@gmail.com';
// $email_subjext = "New Request";
// $email_body = "User name: $name.\n".
//                 "User email: $vistor_email.\n".
//                 "User Message: $message.\n";


// $to = "careernextgenadm1@gmail.com";

// $headers="From: $uniemail_from \r\n";

// $headers="Reply-To: $visitor_email \r\n";

// mail($to,$email_subjext,$email_body,$headers);

// header("location: universitylogin.html");
?> 