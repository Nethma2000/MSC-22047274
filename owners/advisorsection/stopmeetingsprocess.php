<?php
require "connection.php";

if(isset($_GET["id"])){

    $id = $_GET["id"];

    Database::iud("UPDATE `advisor_payment` SET `status`='6' WHERE `id`='$id'");

    echo "success";

}

?>