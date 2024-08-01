<?php

include('adminsession.php');

require_once("../databaseconnection.php");


$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($conn,"select email,name from admins where email='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['name'];
$loggedin_id=$row['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
   
   

    $sql = "UPDATE admins SET name=?, email=?";
    $params = [$name, $email];

   


    $sql .= " WHERE email=?";
    $params[] = $loggedin_id;

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);

    if ($stmt->execute()) {
        echo "success";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $conn->close();

} else {
    echo "not click";
    exit();
}
?>
