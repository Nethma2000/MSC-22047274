<?php

session_start();
require "connection.php";

require "SMTP.php";
require "Exception.php";
require "PHPMailer.php";

use PHPMailer\PHPMailer\PHPMailer;

$name = $_SESSION["au"]["name"];
$aid = $_SESSION["au"]["id_advisor"];

$rid = $_GET["id"];

$code = uniqid();

Database::iud("UPDATE `requests` SET `response_status`='1',`verify`='".$code."' WHERE `id`='".$rid."'");

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
            $bodyContent = '
                            <span>Dear Student,</span>
                            <br/><br/><br/>
                            <span>We are happy to say that the request you sent to 
                            <b>advisor '.$name.'</b> has been accepted by himself. If yoou like 
                            to continue you have to pay the service charges of <b>Rs.1000.00</b> first and then 
                            continue. You can do your transaction online. Hope this would be your greatest decision ever.</span>
                            <br/><br/>

                            <span><b>Use this code to verify you : </b></span>
                            <span><b>'.$code.'</b></span>
                            <br/><br/>
                            
                            <span><b>Click on the link given below to do your payment. </b></span>

                            
                            <br/>
                            <h4 style="text-decoration:none; color:green;">http://localhost/CareerNextGenWeb/advisorsection/doPayment.php?price=1000&advisor='.$name.'&desc=payment_for_'.$name.'&advisorid='.$aid.'&studentemail='.$email.'</h4>
                            <br/><br/><br/>
                            <span>Thank you.</span>
                            <br/>
                            <span>Yours Faithful,</span>
                            <br/>
                            <span>Career NextGen&trade;</span>
                            '; 
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Accept email sending failed';
            } else {
                echo 'success';
            }

// echo "success";

?>