<?php

session_start();
require "connection.php";

if(isset($_GET["id"])){

    $id = $_GET["id"];
    $smail = $_SESSION["su"]["email"];

    Database::iud("UPDATE `meeting` SET `status`='1' WHERE `id`='".$id."'");

    $resultset = Database::search("SELECT * FROM `meeting` WHERE `id`='".$id."'");
    $data = $resultset->fetch_assoc();

    $payment_rs = Database::search("SELECT * FROM `advisor_payment` WHERE `student_email`='".$smail."' AND `advisor_id`='".$data["advisor"]."'"); 
    $payment_num = $payment_rs->num_rows;
    

    if($payment_num == 1){
        $payment_data = $payment_rs->fetch_assoc();

        $st = $payment_data["status"];

        if($st == "1"){

            Database::iud("UPDATE `advisor_payment` SET `status`='2',`meeting_status`='0' WHERE `student_email`='".$smail."' AND `advisor_id`='".$data["advisor"]."'");

        }else if($st == "2"){

            Database::iud("UPDATE `advisor_payment` SET `status`='3',`meeting_status`='0' WHERE `student_email`='".$smail."' AND `advisor_id`='".$data["advisor"]."'");

        }else if($st == "3"){

            Database::iud("UPDATE `advisor_payment` SET `status`='4',`meeting_status`='0' WHERE `student_email`='".$smail."' AND `advisor_id`='".$data["advisor"]."'");

        }else if($st == "4"){

            Database::iud("UPDATE `advisor_payment` SET `status`='5',`meeting_status`='0' WHERE `student_email`='".$smail."' AND `advisor_id`='".$data["advisor"]."'");

        }else if($st == "5"){

            Database::iud("UPDATE `advisor_payment` SET `status`='6',`meeting_status`='0' WHERE `student_email`='".$smail."' AND `advisor_id`='".$data["advisor"]."'");

        }

    }

    

}

?>