<?php
session_start();
include_once('inqconnection.php');

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "UPDATE inquiries SET status = 1 WHERE inquiry_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $conn->close();
}
?>
