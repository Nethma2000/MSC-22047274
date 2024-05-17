<?php

session_start();
require "connection.php";

require "SMTP.php";
require "Exception.php";
require "PHPMailer.php";

use PHPMailer\PHPMailer\PHPMailer;

$name = $_SESSION["au"]["name"];

$rid = $_GET["id"];

Database::iud("UPDATE `requests` SET `response_status`='2' WHERE `id`='".$rid."'");

$emailrs = Database::search("SELECT * FROM `requests` WHERE `id`='".$rid."'");
$rsd = $emailrs->fetch_assoc();
$email = $rsd["student_email"];

$mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'rmndhananjani@gmail.com'; 
            $mail->Password = 'hdddtbhzdsodvgjy'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('rmndhananjani@gmail.com', 'Career NextGen'); 
            $mail->addReplyTo('rmndhananjani@gmail.com', 'Career NextGen'); 
            $mail->addAddress($email); 
            $mail->isHTML(true);
            $mail->Subject = 'About the request sent to mr. '.$name; 
            $bodyContent = '<span>Dear Student,</span>
                            <br/><br/><br/>
                            <span>We are sorry to say that the request you sent to 
                            <b>mr. '.$name.'</b> has been declined because he is not available 
                            for few days. Please be kind enough to try another advisor which suits 
                            for you.</span>
                            <br/><br/><br/>
                            <span>Thank you.</span>
                            <br/>
                            <span>Yours Faithful,</span>
                            <br/>
                            <span>Career NextGen&trade;</span>'; 
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Decline email sending failed';
            } else {
                echo 'success';
            }

// echo "success";

?>

