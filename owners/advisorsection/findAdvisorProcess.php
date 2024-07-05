<?php

require "connection.php";

$e = $_GET["t"];

$resultset = Database::search("SELECT * FROM `requests` INNER JOIN `advisors` ON 
requests.advisor_id=advisors.id_advisor WHERE `student_email`='".$e."'");
$n = $resultset->num_rows;

if($n > 0){

    for($x = 0;$x < $n;$x++){

        $d = $resultset->fetch_assoc();

        if($d["response_status"] == "1"){

            ?>
            
            <option value="<?php echo $d["advisor_id"]; ?>"><?php echo $d["name"]; ?></option>

            <?php

        }else{

        }

    }

}else{
    echo "Please Insert a valid email address.";
}



?>