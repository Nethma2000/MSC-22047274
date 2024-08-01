<?php
include('../advisors/advisorsession.php');
include '../databaseconnection.php';

date_default_timezone_set('Asia/Kolkata');

$todayDate = date('Y-m-d');

// Query for today's requests
$query_today = "
    SELECT m.request_id, mt.timeslot, m.time, m.id_user, e.name AS user_name, e.email AS user_email, m.payment_status
    FROM meetings m
    JOIN meeting_time mt ON m.time = mt.time_id
    JOIN entrepreneurs e ON m.id_user = e.id_user
    WHERE m.date = '$todayDate' AND m.status = 1 AND m.id_advisor = '$loggedin_advisorid'
";

$result_today = mysqli_query($conn, $query_today);

$search_date = isset($_GET['search_date']) ? $_GET['search_date'] : '';

if ($search_date) {
    $query_review = "
        SELECT mr.request_id, mr.date, mt.timeslot, mt.time_id, mr.id_user, mr.msg, e.name AS user_name, e.email AS user_email,
               m.status AS meeting_status, m.payment_status
        FROM meeting_requests mr
        LEFT JOIN meetings m ON mr.request_id = m.request_id AND m.id_advisor = '$loggedin_advisorid'
        JOIN meeting_time mt ON mr.time = mt.time_id
        JOIN entrepreneurs e ON mr.id_user = e.id_user
        WHERE mr.date = '$search_date' AND mr.id_advisor = '$loggedin_advisorid'
    ";
} else {
    $query_review = "
        SELECT mr.request_id, mr.date, mt.timeslot, mt.time_id, mr.id_user, mr.msg, e.name AS user_name, e.email AS user_email,
               m.status AS meeting_status, m.payment_status
        FROM meeting_requests mr
        LEFT JOIN meetings m ON mr.request_id = m.request_id AND m.id_advisor = '$loggedin_advisorid'
        JOIN meeting_time mt ON mr.time = mt.time_id
        JOIN entrepreneurs e ON mr.id_user = e.id_user
        WHERE mr.id_advisor = '$loggedin_advisorid'
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
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Today's Requests Section -->
        <div class="row">
            <div class="col-12 text-center mt-3 mb-3">
                <h4 class="fw-bold">Today Requests</h4>
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
                        <th>Requested User</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_today)) {
                        $paymentStatus = $row['payment_status'];
                        $buttonHtml = '';

                        if ($paymentStatus == 1) {
                            $buttonHtml = "<button class='btn btn-success'>Start Meeting</button>";
                        } elseif ($paymentStatus == 0) {
                            $buttonHtml = "<button class='btn btn-warning'>Payment Pending</button>";
                        }

                        echo "<tr>
                                <td>{$row['request_id']}</td>
                                <td>{$row['timeslot']}</td>
                                <td><a href='#' onclick='showUserDetailsModal(\"{$row['id_user']}\")'>{$row['user_name']}</a></td>
                                <td>
                                    <div class='col-12 d-grid'>
                                        $buttonHtml
                                    </div>
                                </td>
                              </tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="col-12">
                <hr />
            </div>
        </div>

        <!-- Requests for Review Section -->
        <div class="row">
            <div class="col-12 text-center mt-3 mb-3">
                <h4 class="fw-bold">Requests for Review</h4>
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
                        <th>Requested User</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_review)) {
                        $statusClass = 'status-pending';
                        $statusText = 'Pending';
                        $buttonHtml = '';

                        // Check if the request_id exists in the meetings table
                        if ($row['meeting_status'] !== null) {
                            if ($row['meeting_status'] == 1) {
                                $statusClass = 'status-accepted';
                                $statusText = 'Accepted';

                                // Check payment status
                                if ($row['payment_status'] == 1) {
                                    $buttonHtml = "<button class='btn btn-success'>Start Meeting</button>";
                                } elseif ($row['payment_status'] == 0) {
                                    $buttonHtml = "<button class='btn btn-warning'>Payment Pending</button>";
                                }
                            } elseif ($row['meeting_status'] == 0) {
                                $statusClass = 'status-rejected';
                                $statusText = 'Rejected';
                            }
                        } else {
                            $statusClass = 'status-pending';
                            $statusText = 'Pending';
                            $buttonHtml = "<div class='row'>
                                                <div class='col-6 d-grid'>
                                                    <button class='btn btn-outline-success' onclick='showModal(\"{$row['request_id']}\", \"{$row['id_user']}\", \"$loggedin_advisorid\", \"{$row['user_email']}\", \"{$row['time_id']}\", \"{$row['date']}\")'>Accept</button>
                                                </div>
                                                <div class='col-6 d-grid'>
                                                    <button class='btn btn-outline-danger' onclick='showrejectModal(\"{$row['request_id']}\", \"{$row['id_user']}\", \"$loggedin_advisorid\", \"{$row['user_email']}\", \"{$row['time_id']}\", \"{$row['date']}\")'>Decline</button>
                                                </div>
                                              </div>";
                        }

                        echo "<tr>
                                <td>{$row['request_id']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['timeslot']}</td>
                                <td><a href='#' onclick='showUserDetailsModal(\"{$row['id_user']}\")'>{$row['user_name']}</a></td>
                                <td>{$row['msg']}</td>
                                <td class='{$statusClass}'>{$statusText}</td>
                                <td>
                                    <div class='col-12'>
                                        $buttonHtml
                                    </div>
                                </td>
                              </tr>";
                    }
                    ?>                
                </table>
            </div>
        </div>

        <!-- Accept Modal -->
        <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="acceptModalLabel">Accept Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to accept this request?</p>
                        <form method="post" action="accept_request.php">
                            <input type="hidden" name="request_id" id="acceptRequestId">
                            <input type="hidden" name="user_id" id="acceptUserId">
                            <input type="hidden" name="advisor_id" id="acceptAdvisorId">
                            <input type="hidden" name="user_email" id="acceptUserEmail">
                            <input type="hidden" name="time_id" id="acceptTimeId">
                            <input type="hidden" name="date" id="acceptDate">
                            <button type="submit" class="btn btn-success">Accept</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reject Modal -->
        <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rejectModalLabel">Reject Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to reject this request?</p>
                        <form method="post" action="reject_request.php">
                            <input type="hidden" name="request_id" id="rejectRequestId">
                            <input type="hidden" name="user_id" id="rejectUserId">
                            <input type="hidden" name="advisor_id" id="rejectAdvisorId">
                            <input type="hidden" name="user_email" id="rejectUserEmail">
                            <input type="hidden" name="time_id" id="rejectTimeId">
                            <input type="hidden" name="date" id="rejectDate">
                            <button type="submit" class="btn btn-danger">Reject</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

             <!-- User Details Modal -->
             <div class="modal" tabindex="-1" id="userDetailsModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">User Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" id="userName" class="form-control" readonly />
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Startup Field</label>
                                <input type="text" id="userField" class="form-control" readonly />
                            </div>
                            <div class="col-12 mb-3">
                                <img id="userProfImg" src="" alt="Profile Image" class="img-fluid" style="max-width: 150px; max-height: 150px; object-fit: cover;" />
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Idea File</label>
                                <a id="userResume" href="" target="_blank" class="btn btn-primary">View Startup Idea File</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
        </div>
    </div>

    <script src="../admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('todayDate').textContent = '<?php echo $todayDate; ?>';
        });

        function showModal(requestId, userId, advisorId, userEmail, timeId, date) {
            document.getElementById('acceptRequestId').value = requestId;
            document.getElementById('acceptUserId').value = userId;
            document.getElementById('acceptAdvisorId').value = advisorId;
            document.getElementById('acceptUserEmail').value = userEmail;
            document.getElementById('acceptTimeId').value = timeId;
            document.getElementById('acceptDate').value = date;
            new bootstrap.Modal(document.getElementById('acceptModal')).show();
        }

        function showrejectModal(requestId, userId, advisorId, userEmail, timeId, date) {
            document.getElementById('rejectRequestId').value = requestId;
            document.getElementById('rejectUserId').value = userId;
            document.getElementById('rejectAdvisorId').value = advisorId;
            document.getElementById('rejectUserEmail').value = userEmail;
            document.getElementById('rejectTimeId').value = timeId;
            document.getElementById('rejectDate').value = date;
            new bootstrap.Modal(document.getElementById('rejectModal')).show();
        }


        function showUserDetailsModal(id_user) {
        // Fetch user details
        fetch(`fetch_user_details.php?id_user=${id_user}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error('Error fetching user details:', data.error);
                    return;
                }
                document.getElementById("userName").value = data.name;
                document.getElementById("userField").value = data.field;
                document.getElementById("userProfImg").src = `../${data.prof_img}`;
                document.getElementById("userResume").href = `../${data.resume}`;
                var userDetailsModal = new bootstrap.Modal(document.getElementById('userDetailsModal'), {});
                userDetailsModal.show();
            })
            .catch(error => console.error('Error fetching user details:', error));
    }
    </script>
</body>
</html>
