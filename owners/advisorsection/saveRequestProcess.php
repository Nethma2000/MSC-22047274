<?php
session_start();

require "connection.php";

if (isset($_SESSION["su"])) {

    $student_email = $_SESSION["su"]["email"];
    $advisor_id = $_GET["id"];

    $rrs = Database::search("SELECT * FROM `requests` WHERE `student_email`='".$student_email."' AND `advisor_id`='".$advisor_id."'");
    $rn = $rrs->num_rows;

    if($rn == 1){

        Database::iud("UPDATE `requests` SET `request_status`='1' WHERE `student_email`='".$student_email."' AND `advisor_id`='".$advisor_id."'");

    }else{

        Database::iud("INSERT INTO `requests` (`student_email`,`advisor_id`,`request_status`,
`response_status`,`favourite_status`) VALUES ('" . $student_email . "','" . $advisor_id . "',
'1','0','0')");

    }

    echo "success";
} else {
    echo "Please Log In to your account first.";
}

?>