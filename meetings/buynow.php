<?php 

$mid = $_GET["mid"];

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
</head>

<?php 

include '../databaseconnection.php';


$query = "SELECT meetings.*, entrepreneurs.name AS user_name, advisor.advisor_name AS advisor_name,  meeting_time.timeslot AS timeslot

          FROM meetings 
          JOIN entrepreneurs ON meetings.id_user = entrepreneurs.id_user
          JOIN advisor ON meetings.id_advisor = advisor.id_advisor
          JOIN meeting_time ON meetings.time = meeting_time.time_id

          WHERE meetings.meeting_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $mid);
$stmt->execute();
$result = $stmt->get_result();

$meeting = $result->fetch_assoc();
?>


<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center fw-bold mt-3 mb-3">
                <h4>Payment Details</h4>
            </div>
            <div class="col-6 mb-2">
                <label class="form-label">Meeting ID</label>
                <input type="text" class="form-control disabled" value="<?php echo ($mid); ?>"/>

            </div>
            <div class="col-6 mb-2">
                <label class="form-label">Request ID</label>
                <!-- <input type="text" value="Example ID" class="form-control disabled"/> -->
                <input type="text" value="<?php echo htmlspecialchars($meeting['request_id']); ?>" class="form-control disabled"/>

            </div>
            <div class="col-12 mb-2">
                <label class="form-label">Requested User</label>
                <input type="text" value="<?php echo htmlspecialchars($meeting['user_name']); ?>" class="form-control disabled"/>

            </div>
            <div class="col-12 mb-2">
                <label class="form-label">Advisor</label>
                <input type="text" value="<?php echo htmlspecialchars($meeting['advisor_name']); ?>" class="form-control disabled"/>

            </div>
            <div class="col-6 mb-3">
                <label class="form-label">Requested Date</label>
                <input type="text" value="<?php echo htmlspecialchars($meeting['date']); ?>" class="form-control disabled"/>

            </div>
            <div class="col-6 mb-3">
                <label class="form-label">Requested Time</label>
                <input type="text" value="<?php echo htmlspecialchars($meeting['timeslot']); ?>" class="form-control disabled"/>

            </div>
            <div class="col-12 d-grid">
                <button type="submit" id="payhere-payment" class="btn btn-warning text-black" onclick="payNow('<?php echo $mid; ?>');">Pay Now</button>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="meetings.js"></script>
</body>

</html>