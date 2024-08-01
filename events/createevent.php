<?php
require_once 'utils/connection.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $owner_id=$_POST['owner_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $field = $_POST['field'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $link = $_POST['link'];

    $imgPath = null;
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['img']['tmp_name'];
        $fileName = $_FILES['img']['name'];
        $fileSize = $_FILES['img']['size'];
        $fileType = $_FILES['img']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileExtension, $allowedExtensions)) {
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = '../images/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $imgPath = $dest_path;
            } else {
                $message = 'Error moving the uploaded file';
                header('Location: index.php?message=' . urlencode($message));
                exit();
            }
        } else {
            $message = 'Invalid file type';
            header('Location: index.php?message=' . urlencode($message));
            exit();
        }
    }

    $sql = 'INSERT INTO events (title, description, date, time, field, type, location, link, img, owner_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }

    $stmt->bind_param('ssssssssss', $title, $description, $date, $time, $field, $type, $location, $link, $imgPath, $owner_id);

    if ($stmt->execute()) {
        $message = 'Event created successfully!';
    } else {
        $message = 'Database error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    
    header('Location: viewevents.php?message=' . urlencode($message));
    exit();
} else {
    $message = 'Invalid request method';
    header('Location: index.php?message=' . urlencode($message));
    exit();
}
?>
