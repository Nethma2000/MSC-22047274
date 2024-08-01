<?php
include '../databaseconnection.php';

$id_advisor = $_GET['id_advisor'];

$query = "SELECT name, field, prof_img, resume FROM advisor WHERE id_advisor = '$id_advisor'";
$result = mysqli_query($conn, $query);

if ($result) {
    $data = mysqli_fetch_assoc($result);
    if ($data) {
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'No data found']);
    }
} else {
    echo json_encode(['error' => 'Query failed']);
}
?>
