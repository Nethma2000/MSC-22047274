<?php
include '../databaseconnection.php';
include ('../entrepreneurs/entreprenursession.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $advisorId = $_POST['advisor_id'];
    $userId = $_POST['user_id'];
    $meetingDate = $_POST['meeting_date'];
    $timeslotId = $_POST['timeslot_id'];
    $message = $_POST['message'];

    // already exists for the same advisor, date, and time
    $checkAdvisorStmt = $conn->prepare("SELECT COUNT(*) FROM meeting_requests WHERE id_advisor = ? AND date = ? AND time = ?");
    $checkAdvisorStmt->bind_param("iss", $advisorId, $meetingDate, $timeslotId);
    $checkAdvisorStmt->execute();
    $checkAdvisorStmt->bind_result($advisorCount);
    $checkAdvisorStmt->fetch();
    $checkAdvisorStmt->close();

    // same user has a record for the same date and time
    $checkUserStmt = $conn->prepare("SELECT COUNT(*) FROM meeting_requests WHERE id_user = ? AND date = ? AND time = ?");
    $checkUserStmt->bind_param("iss", $userId, $meetingDate, $timeslotId);
    $checkUserStmt->execute();
    $checkUserStmt->bind_result($userCount);
    $checkUserStmt->fetch();
    $checkUserStmt->close();

    if ($advisorCount > 0) {
        echo "<script>alert('A meeting request for this advisor on the same date and time already exists.'); window.location.href='send.php';</script>";
    } elseif ($userCount > 0) {
        echo "<script>alert('You already have a meeting request for this date and time.'); window.location.href='send.php';</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO meeting_requests (id_user, id_advisor, date, time, msg) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisis", $userId, $advisorId, $meetingDate, $timeslotId, $message);

        if ($stmt->execute()) {
            
            echo "<script>alert('Request submitted successfully.'); window.location.href='myrequests.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
        }

        $stmt->close();
    }

    $conn->close();
}
?>
