<?php
include '../databaseconnection.php';

$id_user = $_GET['id_user'];

// Query to fetch user details
$query = "
    SELECT name, field, prof_img, resume
    FROM entrepreneurs
    WHERE id_user = '$id_user'
";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    // Adjust paths for profile image and resume
    $row['prof_img'] = 'entrepreneurs/uploads/logo/' . $row['prof_img'];
    $row['resume'] = 'entrepreneurs/uploads/resume/' . $row['resume'];

    echo json_encode($row);
} else {
    echo json_encode(['error' => 'User not found']);
}
?>
