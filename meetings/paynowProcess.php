<?php 
include '../databaseconnection.php';

$mid = $_GET["mid"];

$merchant_id ="";
$order_id = $mid;
$amount = "1000";
$currency = "LKR";
$merchant_secret = "";

$hash = strtoupper(
    md5(
        $merchant_id . 
        $order_id . 
        number_format($amount, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchant_secret)) 
    ) 
);

$query = "UPDATE `meetings` SET `payment_status`='1' WHERE `meeting_id`='".$mid."'";
mysqli_query($conn, $query);

$array;

$array["merchant_id"] = $merchant_id;
$array["amount"] = $amount;
$array["currency"] = $currency;
$array["merchant_secret"] = $merchant_secret;
$array["hash"] = $hash;

echo json_encode($array);
?>