<?php

require "connection.php";

$txt = $_GET["txt"];
$id = $_GET["id"];
$email = $_GET["e"];

if(empty($email)){
    echo "Please add your email address first.";
}else{

    $resultset = Database::search("SELECT * FROM `requests` WHERE `student_email`='".$email."' 
    AND `advisor_id`='".$id."'");
    $n = $resultset->num_rows;

    if($n == 1){

        $d = $resultset->fetch_assoc();
        $a = $d["verify"];
        
        if($a == $txt){

            echo "success";

        }else{

            echo "fail";

        }

    }else{

        echo "Please enter a valid email address.";

    }

}

?>