<?php

session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

    $advisor_id = $_SESSION["au"]["id_advisor"];

    $request_rs = Database::search("SELECT * FROM `requests` WHERE `advisor_id`='" . $advisor_id . "'");
    $rn = $request_rs->num_rows;

    if ($rn > 0) {

        for ($x = 0; $x < $rn; $x++) {
            $rd = $request_rs->fetch_assoc();

            if ($rd["response_status"] == "0") {

                $student_rs = Database::search("SELECT * FROM `students` WHERE `email`='" . $rd["student_email"] . "'");
                $sd = $student_rs->fetch_assoc();

?>

                <tr>
                    <td><?php echo $rd["id"]; ?></td>
                    <td><?php echo $sd["name"]; ?></td>
                    <td><?php echo $sd["category"]; ?></td>
                    <td><?php echo $sd["institute"]; ?></td>
                    <td>
                        <div class="col-12">
                            <div class="row g-2">

                                <div class="col-6 d-grid">
                                    <button class="btn btn-success" onclick="raccept(<?php echo $rd['id']; ?>);">Accept Request</button>
                                </div>

                                <div class="col-6 d-grid">
                                    <button class="btn btn-danger" onclick="rdecline(<?php echo $rd['id']; ?>);">Decline Request</button>
                                </div>

                            </div>
                        </div>
                    </td>
                </tr>

<?php
            }
        }
    } else {

        echo "You have no requests yet.";
    }
} else {
    echo "Please Log In to your account first.";
}

?>