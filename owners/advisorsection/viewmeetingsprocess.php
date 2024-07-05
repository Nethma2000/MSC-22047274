<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

    $adid = $_SESSION["au"]["id_advisor"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $today = $d->format("Y-m-d");

    $meeting_rs = Database::search("SELECT * FROM `meeting` WHERE `advisor`='" . $adid . "' AND 
    `start_date`='" . $today . "' AND `status`='0' ORDER BY `start_time` ASC");
    $meeting_num = $meeting_rs->num_rows;

    for ($x = 0; $x < $meeting_num; $x++) {

        $meeting_data = $meeting_rs->fetch_assoc();

        $student_name_rs = Database::search("SELECT `name` FROM `students` WHERE `email`='".$meeting_data["student"]."'");
        $student_data = $student_name_rs->fetch_assoc();

?>

        <div class="col-3 mt-4 mb-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Meeting with <?php echo $student_data["name"]; ?></h5>
                    <hr/>
                    <span class="mt-2"><i class="bi bi-calendar3"></i> <b>Date :</b> <?php echo $meeting_data["start_date"]; ?></span>
                    <br/>
                    <span><i class="bi bi-clock-history"></i> <b>Time :</b> <?php echo $meeting_data["start_time"]; ?></span>
                    <br/>
                    <a href="<?php echo $meeting_data["link"]; ?>" class="btn btn-primary mt-3">Start Meeting</a>
                </div>
            </div>
        </div>

<?php

    }
}

?>