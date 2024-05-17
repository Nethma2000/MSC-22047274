<?php

session_start();

require "connection.php";

if(isset($_SESSION["au"])){

    $ad_mail = $_SESSION["au"]["email"];
    $advisor_id = $_SESSION["au"]["id_advisor"];
    
    $stu_mail = $_POST["e"];
    $day = $_POST["d"];
    $time = $_POST["t"];
    $link = $_POST["l"];

    Database::iud("INSERT INTO `meeting` (`student`,`advisor`,`start_date`,`start_time`,`link`,`status`) VALUES 
    ('".$stu_mail."','".$advisor_id."','".$day."','".$time."','".$link."','0')");

    Database::iud("UPDATE `advisor_payment` SET `meeting_status`='1' WHERE `student_email`='".$stu_mail."' AND `advisor_id`='".$advisor_id."'");

    echo "success";

}

?>