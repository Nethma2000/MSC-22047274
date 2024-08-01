<?php

include('ownersession.php');

require_once("../databaseconnection.php");


if (isset($_POST)) {

    $password = mysqli_real_escape_string($conn, $_POST['newpassword']);

    //Encrypt Password
    // $password = base64_encode(strrev(md5($password)));

    $sql = "UPDATE owners SET password='$password' WHERE id_advisor='$loggedin_ownerid'";
    if ($conn->query($sql) === true) {
        echo "success";
        exit();
    } else {
        echo $conn->error;
    }

    $conn->close();

} else {
    echo "errr";
    exit();
}