<?php
include('../advisors/advisorsession.php');
include '../databaseconnection.php';

date_default_timezone_set('Asia/Kolkata');

$todayDate = date('Y-m-d');

// $query_today = "
//     SELECT m.request_id, mt.timeslot, m.time, m.id_user, e.name AS user_name, e.email AS user_email
//     FROM meetings m
//     JOIN meeting_time mt ON m.time = mt.time_id
//     JOIN entrepreneurs e ON m.id_user = e.id_user
//     WHERE m.date = '$todayDate' AND m.status = 1 AND m.id_advisor = '$loggedin_advisorid'
// ";

$query_today = "
    SELECT m.request_id, mt.timeslot, m.time, m.id_user, e.name AS user_name, e.email AS user_email, m.payment_status, m.link
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
               m.status AS meeting_status
        FROM meeting_requests mr
        LEFT JOIN meetings m ON mr.request_id = m.request_id AND m.id_advisor = '$loggedin_advisorid'
        JOIN meeting_time mt ON mr.time = mt.time_id
        JOIN entrepreneurs e ON mr.id_user = e.id_user
        WHERE mr.date = '$search_date' AND mr.id_advisor = '$loggedin_advisorid'
    ";
} else {
    $query_review = "
        SELECT mr.request_id, mr.date, mt.timeslot, mt.time_id, mr.id_user, mr.msg, e.name AS user_name, e.email AS user_email,
               m.status AS meeting_status
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


    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center mt-3 mb-3">
                <h4 class="fw-bold">Today's Meetings</h4>
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
                        <th></th>
                    </tr>
                    <?php
while ($row = mysqli_fetch_assoc($result_today)) {
    $paymentStatus = $row['payment_status'];
    $meetingLink = htmlspecialchars($row['link']); // Sanitize the link

    $buttonHtml = '';
    if ($paymentStatus == 1) {
        $buttonHtml = "<button class='btn btn-success' data-link='{$meetingLink}' onclick='startMeeting(this)'>Start Meeting</button>";
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
                
                    // Check if the request_id exists in the meetings table
                    $check_status_query = "
                        SELECT status
                        FROM meetings
                        WHERE request_id = '{$row['request_id']}'
                    ";
                    $check_status_result = mysqli_query($conn, $check_status_query);
                
                    if (mysqli_num_rows($check_status_result) > 0) {
                        $meeting_row = mysqli_fetch_assoc($check_status_result);
                        if ($meeting_row['status'] == 1) {
                            $statusClass = 'status-accepted';
                            $statusText = 'Accepted';
                        } elseif ($meeting_row['status'] == 0) {
                            $statusClass = 'status-rejected';
                            $statusText = 'Rejected';
                            
                        }
                        // Hide accept and reject buttons if status is accepted or rejected
                        $buttonVisibility = ($meeting_row['status'] !== null) ? 'd-none' : '';
                    } else {
                        // Default to pending if request_id is not in meetings table
                        $statusClass = 'status-pending';
                        $statusText = 'Pending';
                        $buttonVisibility = ''; // Show buttons if status is pending

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
                                    <div class='row'>
                                        <div class='col-6 d-grid {$buttonVisibility}'>
                                            <button class='btn btn-outline-success' onclick='showModal(\"{$row['request_id']}\", \"{$row['id_user']}\", \"$loggedin_advisorid\", \"{$row['user_email']}\", \"{$row['time_id']}\", \"{$row['date']}\")'>Accept</button>
                                        </div>
                                        <div class='col-6 d-grid {$buttonVisibility}'>
                                            <button class='btn btn-outline-danger' onclick='showrejectModal(\"{$row['request_id']}\", \"{$row['id_user']}\", \"$loggedin_advisorid\", \"{$row['user_email']}\", \"{$row['time_id']}\", \"{$row['date']}\")'>Decline</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                          </tr>";
                }
?>                
                 
                </table>
            </div>

            <!-- Accept Modal -->
            <div class="modal" tabindex="-1" id="requestModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="accept_request.php">
                            <div class="modal-header">
                                <h5 class="modal-title">Accept Request</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="requestId" name="request_id" value="" readonly />
                                <input type="hidden" id="userId" name="id_user" value="" />
                                <input type="hidden" id="advisorId" name="id_advisor" value="<?php echo $loggedin_advisorid; ?>" />
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold">User Email</label>
                                    <input type="email" id="userEmail" name="email" class="form-control" value="" readonly />
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="hidden" id="meetingDate" name="date" class="form-control" value="" readonly />
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="hidden" id="meetingTime" name="time_id" class="form-control" value="" readonly />
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold">Add Meeting Link</label>
                                    <textarea class="form-control" name="link"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Accept Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Accept Modal -->

            <!-- Reject Modal -->
            <div class="modal" tabindex="-1" id="rejectModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="reject_request.php">
                            <div class="modal-header">
                                <h5 class="modal-title">Reject Request</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="rejectRequestId" name="request_id" value="" readonly />
                                <input type="hidden" id="rejectUserId" name="id_user" value="" />
                                <input type="hidden" id="rejectAdvisorId" name="id_advisor" value="<?php echo $loggedin_advisorid; ?>" />
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold">User Email</label>
                                    <input type="email" id="rejectUserEmail" name="email" class="form-control" value="" readonly />
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="hidden" id="rejectMeetingDate" name="date" class="form-control" value="" readonly />
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="hidden" id="rejectMeetingTime" name="time_id" class="form-control" value="" readonly />
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold">Reason for Rejecting</label>
                                    <textarea class="form-control" name="reason"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Reject Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Reject Modal -->

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
            <!-- User Details Modal -->

        </div>
    </div>

    <script src="../admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="meetings.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var today = new Date();
        var year = today.getFullYear();
        var month = ('0' + (today.getMonth() + 1)).slice(-2);
        var day = ('0' + today.getDate()).slice(-2);
        var formattedDate = year + '-' + month + '-' + day;
        document.getElementById("todayDate").textContent = formattedDate;
    });

    function showModal(request_id, id_user, id_advisor, email, time_id, date) {
        document.getElementById("requestId").value = request_id;
        document.getElementById("userId").value = id_user;
        document.getElementById("advisorId").value = id_advisor;
        document.getElementById("userEmail").value = email;
        document.getElementById("meetingDate").value = date;
        document.getElementById("meetingTime").value = time_id;
        var myModal = new bootstrap.Modal(document.getElementById('requestModal'), {});
        myModal.show();
    }

    function showrejectModal(request_id, id_user, id_advisor, email, time_id, date) {
        document.getElementById("rejectRequestId").value = request_id;
        document.getElementById("rejectUserId").value = id_user;
        document.getElementById("rejectAdvisorId").value = id_advisor;
        document.getElementById("rejectUserEmail").value = email;
        document.getElementById("rejectMeetingDate").value = date;
        document.getElementById("rejectMeetingTime").value = time_id;
        var myModal = new bootstrap.Modal(document.getElementById('rejectModal'), {});
        myModal.show();
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

    function startMeeting(buttonElement) {
    var link = buttonElement.getAttribute('data-link');
    if (link) {
        window.open(link, '_blank'); // Open the link in a new tab
    }
}

    </script>
</body>
</html>
