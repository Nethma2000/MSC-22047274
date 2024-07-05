<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

    $advisor_email = $_SESSION["au"]["email"];
    $advisor_id = $_SESSION["au"]["id_advisor"];

    $resultset = Database::search("SELECT * FROM `advisor_payment` WHERE `advisor_id`='" . $advisor_id . "' ORDER BY `pay_date` ASC");
    $num = $resultset->num_rows;

    for ($x = 0; $x < $num; $x++) {
        $data = $resultset->fetch_assoc();

        $student_email = $data["student_email"];
        $student_status = $data["status"];

        if ($student_status != 6) {
            if ($data["meeting_status"] == 0) {

            $student_rs = Database::search("SELECT * FROM `students` WHERE `email`='" . $student_email . "'");
            $student_data = $student_rs->fetch_assoc();

?>

            <tr>
                <td><?php echo $student_data["name"]; ?></td>
                <td><?php echo $student_data["category"]; ?></td>
                <td><?php echo $student_data["institute"]; ?></td>

                <?php

                if ($student_status == 1) {

                ?>

                    <td>Payment Done</td>

                <?php

                } else if ($student_status == 2) {

                ?>

                    <td>First Meeting Done</td>

                <?php

                } else if ($student_status == 3) {

                ?>

                    <td>Second Meeting Done</td>

                <?php

                } else if ($student_status == 4) {

                ?>

                    <td>Third Meeting Done</td>

                <?php

                } else if ($student_status == 5) {

                ?>

                    <td>Fourth Meeting Done</td>

                <?php

                } 

                ?>

                <td>
                    <div class="col-12">
                        <div class="row g-2">
                            <div class="col-6 d-grid">
                                <button class="btn btn-primary" onclick="Schedulemeeting('<?php echo $student_email; ?>');">Schedule Meeting</button>
                            </div>
                            <div class="col-6 d-grid">
                                <button class="btn btn-danger" onclick="endconsult('<?php echo $data['id']; ?>');">Finish Consulting</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

<?php

// echo "success";
            }
        }
    }
}

?>
