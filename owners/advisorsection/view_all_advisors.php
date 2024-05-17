<?php

session_start();

require "connection.php";

$myemail = $_SESSION["su"]["email"];

?>

<!DOCTYPE html>

<html>

<head>
    <title>View all advisors</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color: #e0c1e8;" class="bg-" onload="viewAllAdvisors();">

    <div class="container-fluid">
        <div class="row">

            <div class="offset-0 offset-lg-11 col-12 col-lg-1 d-grid mt-5">
                <button class="btn btn-primary" onclick="viewnotifications();"><i class="bi bi-bell-fill"></i></button>
            </div>

            <div class="col-12 text-center mt-3">
                <h1 class="text-dark fw-bold text-decoration-underline">Choose your Advisor</h1>
            </div>

            <div class="col-12 mt-3">
                <div class="row g-2">

                    <div class="col-8">
                        <input type="text" class="form-control" id="searchAdvisor" />
                    </div>

                    <div class="col-4 d-grid">
                        <button class="btn btn-primary" onclick="searchAdvisor();">Search Advisor By Name</button>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">

                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Designation</th>
                            <th>qualifications</th>
                            <th>Field</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tb">



                    </tbody>
                </table>

            </div>

            <!-- modal -->

            <div class="modal" tabindex="-1" id="viewnotificationmodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold">My Meetings</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="col-12">
                                <div class="row g-2">

                                    <?php

                                    $mymeetingsrs = Database::search("SELECT * FROM `meeting` WHERE `student`='" . $myemail . "' AND `status`='0'");
                                    $mymeetingsnum = $mymeetingsrs->num_rows;

                                    for ($x = 0; $x < $mymeetingsnum; $x++) {
                                        $d = $mymeetingsrs->fetch_assoc();

                                        $advisor_name_rs = Database::search("SELECT `name` FROM `advisors` WHERE `id_advisor`='".$d["advisor"]."'");
                                        $ad_data = $advisor_name_rs->fetch_assoc();

                                    ?>

                                        <div class="col-6 mt-4 mb-2">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Meeting with Advisor <?php echo $ad_data["name"]; ?></h5>
                                                    <hr />
                                                    <span class="mt-2"><i class="bi bi-calendar3"></i> <b>Date :</b> <?php echo $d["start_date"]; ?></span>
                                                    <br />
                                                    <span><i class="bi bi-clock-history"></i> <b>Time :</b> <?php echo $d["start_time"]; ?></span>
                                                    <br />
                                                    <a href="<?php echo $d["link"]; ?>" class="btn btn-primary mt-3" onclick="updatestatus('<?php echo $d['id']; ?>');">Start Meeting</a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php

                                    }

                                    ?>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>