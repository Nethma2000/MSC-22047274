<?php
include '../databaseconnection.php';
include "connection.php";

include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request_id = mysqli_real_escape_string($conn, $_POST['request_id']);
    $id_user = mysqli_real_escape_string($conn, $_POST['id_user']);
    $id_advisor = mysqli_real_escape_string($conn, $_POST['id_advisor']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);
    $timeid = mysqli_real_escape_string($conn, $_POST['time_id']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $user_email = mysqli_real_escape_string($conn, $_POST['email']); 

    $query_timeslot = "SELECT timeslot FROM meeting_time WHERE time_id = '$timeid'";
    $result_timeslot = mysqli_query($conn, $query_timeslot);
    $timeslot = '';
    if ($result_timeslot && mysqli_num_rows($result_timeslot) > 0) {
        $row_timeslot = mysqli_fetch_assoc($result_timeslot);
        $timeslot = $row_timeslot['timeslot'];
    }

    $query_advisor = "SELECT advisor_name FROM advisor WHERE id_advisor = '$id_advisor'";
    $result_advisor = mysqli_query($conn, $query_advisor);
    $advisor_name = '';
    if ($result_advisor && mysqli_num_rows($result_advisor) > 0) {
        $row_advisor = mysqli_fetch_assoc($result_advisor);
        $advisor_name = $row_advisor['advisor_name'];
    }


    $query_insert = "
        INSERT INTO meetings (request_id, id_user, id_advisor, link, date, time, status, payment_status)
        VALUES ('$request_id', '$id_user', '$id_advisor', '$link', '$date', '$timeid', 1, 0)
    ";
    $result_insert = mysqli_query($conn, $query_insert);
    $last_id = mysqli_insert_id($conn);

    if ($result_insert) {

        echo "<script>alert('Meeting request accepted successfully.'); window.location.href = 'showrequests.php';</script>";
    
        // EMAIL CODE
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = ''; // sender's email
        $mail->Password = ''; // app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('sender email', 'Startup Companion'); 
        $mail->addReplyTo('sender email', 'Startup Companion'); 
        $mail->addAddress($user_email); 
        $mail->isHTML(true);
        $mail->Subject = 'Status of the Request you sent to the advisor: ' . htmlspecialchars($advisor_name);
        $bodyContent = '
<div style="text-align: center;">
    <h1 style="color:green;">Your Request Has Been Accepted</h1><br/>
<h3 style="color:#430fa3;">We are pleased to inform you that your meeting request has been successfully approved.</h3><br/>
    
<h3 style="color:black; text-decoration: underline;">Meeting Details</h3>
    <h3 style="color:black; margin-bottom: 5px;">Date: ' . $date . '</h3>
    <h3 style="color:black; margin-top: 5px;">Time: ' . $timeslot . '</h3><br/>

<p style="margin-top: 10px; font-weight: bold; color: red;">Please note: To confirm your appointment and join the meeting, payment must be completed. Click on the button below to proceed with the payment.</p><br/>
    <a href="http://localhost/msccollaborate/mscproject/meetings/buynow.php?mid='.$last_id.'" style="width:300px;height:50px;background-color:blue;color:white;border:none;font-weight:bold;border-radius:8px;font-size:18px;">Make Payment</a>



    </div>';
        
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo ("Email Sending Failed.");
        } else {
            echo ("Success");
        }

    } else {
        echo "Error inserting meeting: " . mysqli_error($conn);
    }
}
?>
