<?php
require 'utils/connection.php';

$eventId = isset($_GET['id']) ? $_GET['id'] : '';

$sql = "SELECT * FROM events WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $eventId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $eventTitle = htmlspecialchars($row["title"]);
    $eventDescription = htmlspecialchars($row["description"]);
    $eventDate = $row["date"]; 
    $eventLocation = htmlspecialchars($row["location"]); 
    // $eventImage = htmlspecialchars($row["image"]); 
    echo "<h4>$eventTitle</h4>";
    echo "<p><strong>Date:</strong> " . htmlspecialchars(date("F j, Y", strtotime($eventDate))) . "</p>";
    echo "<p><strong>Location:</strong> $eventLocation</p>";
    echo "<p>$eventDescription</p>";
    // echo "<img src='$eventImage' class='img-responsive'>";
} else {
    echo "<p>No details found for this event.</p>";
}

$stmt->close();
$conn->close();
?>
