<?php

include('adminsession.php');

require_once("../databaseconnection.php");


if (isset($_POST)) {

    $password = mysqli_real_escape_string($conn, $_POST['newpassword']);

    //Encrypt Password
    // $password = base64_encode(strrev(md5($password)));

    $sql = "UPDATE admins SET password='$password' WHERE email='$loggedin_id'";
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