<?php

session_start();
require "connection.php";

$e = $_SESSION["su"]["email"];
$sa = $_GET["sa"];

$searchResult = Database::search("SELECT * FROM `advisors` WHERE `name` LIKE '%" . $sa . "%'");
$n = $searchResult->num_rows;

if ($n == 1) {

    for ($x = 0; $x < $n; $x++) {

        $d = $searchResult->fetch_assoc();
        $_SESSION["a"] = $d;

?>

        <tr>
            <td><?php echo $d["name"]; ?></td>
            <td><?php echo $d["company"]; ?></td>
            <td><?php echo $d["designation"]; ?></td>
            <td><?php echo $d["field"]; ?></td>
            <td><?php echo $d["qualifications"]; ?></td>
            <td>
                <div class="col-12">
                    <div class="row g-2">
                        <div class="col-6 d-grid">
                        <?php

$request_resultset = Database::search("SELECT * FROM `requests` WHERE `advisor_id`='" . $d['id_advisor'] . "' AND `student_email`='" . $e . "'");
$rd = $request_resultset->fetch_assoc();

if ($rd != null) {

    if ($rd["request_status"] == "1") {

?>

        <button class="btn btn-success" onclick="addRequest(<?php echo $d['id_advisor']; ?>);" id="rbtn<?php echo $d['id_advisor']; ?>" disabled>Request</button>

    <?php

    } else if ($rd["request_status"] == "0") {

    ?>

        <button class="btn btn-success" onclick="addRequest(<?php echo $d['id_advisor']; ?>);" id="rbtn<?php echo $d['id_advisor']; ?>">Request</button>

    <?php

    }
} else if ($rd == null) {

    ?>

    <button class="btn btn-success" onclick="addRequest(<?php echo $d['id_advisor']; ?>);" id="rbtn<?php echo $d['id_advisor']; ?>">Request</button>

<?php

}

?>

</div>
<div class="col-6 d-grid">

<?php

if ($rd != null) {

    if ($rd["favourite_status"] == "1") {

?>

        <button class="btn btn-secondary" onclick="addfavourite(<?php echo $d['id_advisor']; ?>);" id="fbtn<?php echo $d['id_advisor']; ?>" disabled>Add to Favourite</button>

    <?php

    } else if ($rd["favourite_status"] == "0") {

    ?>

        <button class="btn btn-secondary" onclick="addfavourite(<?php echo $d['id_advisor']; ?>);" id="fbtn<?php echo $d['id_advisor']; ?>">Add to Favourite</button>

    <?php

    }
} else if ($rd == null) {

    ?>

    <button class="btn btn-secondary" onclick="addfavourite(<?php echo $d['id_advisor']; ?>);" id="fbtn<?php echo $d['id_advisor']; ?>">Add to Favourite</button>

<?php

}

?>
                        </div>
                    </div>
                </div>
            </td>
        </tr>

<?php

    }
}

?>