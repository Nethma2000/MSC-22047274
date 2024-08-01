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
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);
    $timeid = mysqli_real_escape_string($conn, $_POST['time_id']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $user_email = mysqli_real_escape_string($conn, $_POST['email']); // Retrieve the user's email

     // Fetch advisor name
     $query_advisor = "SELECT advisor_name FROM advisor WHERE id_advisor = '$id_advisor'";
     $result_advisor = mysqli_query($conn, $query_advisor);
     $advisor_name = '';
     if ($result_advisor && mysqli_num_rows($result_advisor) > 0) {
         $row_advisor = mysqli_fetch_assoc($result_advisor);
         $advisor_name = $row_advisor['advisor_name'];
     }

    // Insert the data into the meetings table with status set to 0 (rejected)
    $query_insert = "
        INSERT INTO meetings (request_id, id_user, id_advisor, date, time, reason, status)
        VALUES ('$request_id', '$id_user', '$id_advisor', '$date', '$timeid', '$reason', 0)
    ";
    $result_insert = mysqli_query($conn, $query_insert);

    if ($result_insert) {
        echo "<script>alert('Meeting request rejected successfully.'); window.location.href = 'showrequests.php';</script>";

        //EMAIL CODE
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'virajlahiru9719@gmail.com'; // sender's email
        $mail->Password = 'aznqreyozvyyurrg'; // app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('virajlahiru9719@gmail.com', 'Startup Companion'); // sender's email, Sender's name
        $mail->addReplyTo('virajlahiru9719@gmail.com', 'Startup Companion'); // sender's email, Sender's name
        $mail->addAddress($user_email); // receiver's email from form data
        $mail->isHTML(true);
        $mail->Subject = 'Status of the Request you sent to the advisor: ' . htmlspecialchars($advisor_name);
        $bodyContent = '
        <div style="text-align: center;">
            <h1 style="color:red;">Your Request Has Been Rejected.</h1><br/>
            <h3 style="color:orange;">Unfortunately, your meeting request was rejected for the following reason: ' . $reason . '</h3><br/>
            <p>If you believe this was a mistake or if you need to reschedule, please click on the button below to submit a new request.</p><br/>
<a href="http://localhost/msccollaborate/mscproject/meetings/send.php" style="display: inline-block; width: 300px; height: 50px; background-color: blue; color: white; text-align: center; line-height: 50px; text-decoration: none; font-weight: bold; border-radius: 8px; font-size: 18px;">Request Again</a>
        </div>';

        $mail->Body = $bodyContent;

        if(!$mail->send()){
            echo ("Email Sending Failed.");
        }else{
            echo ("Success");
        }
    } else {
        echo "Error inserting meeting: " . mysqli_error($conn);
    }
}
?>
