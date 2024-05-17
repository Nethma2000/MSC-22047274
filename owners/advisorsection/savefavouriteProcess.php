<?php

session_start();

require "connection.php";

if (isset($_SESSION["su"])) {

    $se = $_SESSION["su"]["email"];
    $aid = $_GET["id"];

    $frs = Database::search("SELECT * FROM `requests` WHERE `student_email`='" . $se . "' AND `advisor_id`='" . $aid . "'");
    $fn = $frs->num_rows;

    if ($fn == 1) {

        Database::iud("UPDATE `requests` SET `favourite_status`='1' WHERE `student_email`='" . $se . "' AND `advisor_id`='" . $aid . "'");
    } else {

        Database::iud("INSERT INTO `requests` (`student_email`,`advisor_id`,`request_status`,
`response_status`,`favourite_status`) VALUES ('" . $se . "','" . $aid . "',
'0','0','1')");
    }

    echo "success";
} else {
    echo "Please Log In to your account first.";
}

?>
