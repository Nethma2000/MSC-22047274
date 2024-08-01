<?php
include ('../entrepreneurs/entreprenursession.php');
include '../databaseconnection.php';

date_default_timezone_set('Asia/Kolkata');

$todayDate = date('Y-m-d');

// Today's requests with timeslots and advisor's name
$query_today = "
    SELECT m.meeting_id, m.request_id, mt.timeslot, m.time, m.id_advisor, a.advisor_name AS advisor_name, m.status, m.payment_status, m.link
    FROM meetings m
    JOIN meeting_time mt ON m.time = mt.time_id
    JOIN advisor a ON m.id_advisor = a.id_advisor
    WHERE m.date = '$todayDate' AND m.status = 1 AND m.id_user = '$loggedin_userid'
";
$result_today = mysqli_query($conn, $query_today);

// Check if a date has been provided for the search
$search_date = isset($_GET['search_date']) ? $_GET['search_date'] : '';

// Modify the query based on the provided date
if ($search_date) {
    $query_review = "
        SELECT mr.request_id, mr.date, mt.timeslot, mt.time_id, mr.id_advisor, mr.msg, a.advisor_name AS advisor_name,
               m.status AS meeting_status, m.payment_status, m.link
        FROM meeting_requests mr
        LEFT JOIN meetings m ON mr.request_id = m.request_id AND m.id_user = '$loggedin_userid'
        JOIN meeting_time mt ON mr.time = mt.time_id
        JOIN advisor a ON mr.id_advisor = a.id_advisor
        WHERE mr.date = '$search_date' AND mr.id_user = '$loggedin_userid'
    ";
} else {
    $query_review = "
        SELECT mr.request_id, mr.date, mt.timeslot, mt.time_id, mr.id_advisor, mr.msg, a.advisor_name AS advisor_name,
               m.status AS meeting_status, m.payment_status, m.link
        FROM meeting_requests mr
        LEFT JOIN meetings m ON mr.request_id = m.request_id AND m.id_user = '$loggedin_userid'
        JOIN meeting_time mt ON mr.time = mt.time_id
        JOIN advisor a ON mr.id_advisor = a.id_advisor
        WHERE mr.id_user = '$loggedin_userid'
    ";
}
$result_review = mysqli_query($conn, $query_review);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StartupCompanion | Navigate your startup journey</title>
    <link rel="icon" href="../assets/img/logo1.jpg" type="image/jpg" sizes="150x130">
    <link href="../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admins/assets/css/style.css" rel="stylesheet">
    <style>
    .status-accepted {
        color: green !important;
    }
    .status-rejected {
        color: red !important;
    }
    .status-pending {
        color: orange !important;
    }
    .see-why-link {
        font-size: 0.85rem;
        color: blue;
        text-decoration: underline;
        cursor: pointer;
    }
    .see-why-link:hover {
        color: darkblue;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-3 mb-3">
                <h4 class="fw-bold">Today's Meetings Which Were Approved by Advisors</h4>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-1">
                        <span class="fw-bold">Date : </span>
                    </div>
                    <div class="col-8 col-lg-7">
                        <span class="fw-bold" id="todayDate"></span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <hr />
            </div>
            <div class="col-12 mt-3 mb-3">
                <table class="table">
                    <tr>
                        <th>Request ID</th>
                        <th>Timeslot</th>
                        <th>Advisor</th>
                        <th>Action</th> 
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_today)) {
                        $actionButtons = ''; 
                        // Add condition to check status and payment_status
                        if ($row['status'] == 1) { // Assuming status is 1 for accepted
                            if ($row['payment_status'] == 0) {
                                $actionButtons = "
                                    <div class='d-grid'>
                                        <a href='buynow.php?mid=".$row['meeting_id']."' class='btn btn-primary'>Pay</a>
                                    </div>
                                ";
                            } elseif ($row['payment_status'] == 1) {
                                $actionButtons = "
                                    <div class='d-grid'>
                                        <a href='{$row['link']}' target='_blank' class='btn btn-success'>Join Meeting</a>
                                    </div>
                                ";
                            }
                        }
                        echo "<tr>
                                <td>{$row['request_id']}</td>
                                <td>{$row['timeslot']}</td>                                
                                <td>{$row['advisor_name']}</td>
                                <td>{$actionButtons}</td> <!-- New column data -->
                              </tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="col-12">
                <hr />
            </div>
            <div class="col-12 text-center mt-3 mb-3">
                <h4 class="fw-bold">All Sent Requests</h4>
            </div>
            <div class="col-12">
                <form method="get" action="">
                    <div class="row">
                        <div class="col-12 col-lg-1">
                            <span class="fw-bold">Date : </span>
                        </div>
                        <div class="col-8 col-lg-7">
                            <input type="date" name="search_date" class="form-control" value="<?php echo htmlspecialchars($search_date); ?>" />
                        </div>
                        <div class="col-4 col-lg-2 d-grid">
                            <button type="submit" class="btn btn-primary">Search by Date</button>
                        </div>
                        <div class="col-4 col-lg-2 d-grid">
                            <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn btn-secondary">Remove Date Filter</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 mt-3 mb-3">
                <table class="table">
                    <tr>
                        <th>Request ID</th>
                        <th>Date</th>
                        <th>Timeslot</th>
                        <th>Advisor</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th> <!-- New column for actions -->
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_review)) {
                        $statusClass = 'status-pending'; 
                        $statusText = 'Pending';
                        $statusMessage = '';
                        $actionButtons = ''; 
                        $check_status_query = "
                            SELECT meeting_id, status, payment_status, reason, link
                            FROM meetings
                            WHERE request_id = '{$row['request_id']}'
                        ";
                        $check_status_result = mysqli_query($conn, $check_status_query);

                        if (mysqli_num_rows($check_status_result) > 0) {
                            $meeting_row = mysqli_fetch_assoc($check_status_result);
                            if ($meeting_row['status'] == 1) {
                                $statusClass = 'status-accepted';
                                $statusText = 'Accepted';
                                if ($meeting_row['payment_status'] == 0) {
                                    // $mmid = $meeting_row['meeting_id'];
                                    $actionButtons = "
                                        <div class='d-grid'>
                                            <a href='buynow.php?mid=".$meeting_row['meeting_id']."' class='btn btn-primary'>Pay</a>
                                        </div>
                                    ";
                                } elseif ($meeting_row['payment_status'] == 1) {
                                    $actionButtons = "
                                        <div class='d-grid'>
                                            <a href='{$meeting_row['link']}' target='_blank' class='btn btn-success'>Join Meeting</a>
                                        </div>
                                    ";
                                }
                            } elseif ($meeting_row['status'] == 0) {
                                $statusClass = 'status-rejected';
                                $statusText = 'Rejected';
                                $statusMessage = htmlspecialchars($meeting_row['reason']);
                            }
                            $buttonVisibility = ($meeting_row['status'] !== null) ? 'd-none' : '';
                        } else {
                            $statusClass = 'status-pending';
                            $statusText = 'Pending';
                        }

                        $seeWhyLink = $statusClass === 'status-rejected' ? "<span class='see-why-link' data-bs-toggle='modal' data-bs-target='#rejectedModal' data-message='{$statusMessage}'>See why</span>" : "";

                        echo "<tr>
                                <td>{$row['request_id']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['timeslot']}</td>
                                <td>{$row['advisor_name']}</td>
                                <td>{$row['msg']}</td>
                                <td class='{$statusClass}'>{$statusText} {$seeWhyLink}</td>
                                <td>{$actionButtons}</td> <!-- New column data -->
                              </tr>";
                    }
                    ?>                
                </table>
            </div>
        </div>
    </div>

    <!-- Rejected Status Modal -->
    <div class="modal fade" id="rejectedModal" tabindex="-1" aria-labelledby="rejectedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectedModalLabel">Reason for Rejection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="rejectedMessage">The request has been rejected.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var today = new Date();
        var year = today.getFullYear();
        var month = ('0' + (today.getMonth() + 1)).slice(-2);
        var day = ('0' + today.getDate()).slice(-2);
        var formattedDate = year + '-' + month + '-' + day;
        document.getElementById("todayDate").textContent = formattedDate;

        document.querySelectorAll('.see-why-link').forEach(function(link) {
            link.addEventListener('click', function() {
                var message = this.getAttribute('data-message');
                document.getElementById('rejectedMessage').textContent = message;
            });
        });
    });
    </script>
</body>
</html>
