<?php
include 'forum-connection.php';
include('../owners/ownersession.php');

$id = $_POST['id'];
$name = $loggedin_session;
$msg = $_POST['msg'];

if($name != "" && $msg != ""){
	$sql = $conn->query("INSERT INTO forum (comment, commenter, post)
			VALUES ('$id', '$loggedin_session', '$msg')");
	echo json_encode(array("statusCode"=>200));
}
else{
	echo json_encode(array("statusCode"=>201));
}
$conn = null;

?>

