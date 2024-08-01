<?php

include('entreprenursession.php');
require_once("econfig.php");

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($conn, "SELECT id_user, email, name, prof_img FROM entrepreneurs WHERE email='$user_check'");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$loggedin_session = $row['name'];
$loggedin_id = $row['email'];
$loggedin_userid = $row['id_user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $field = mysqli_real_escape_string($conn, $_POST['field']);
    $idea = mysqli_real_escape_string($conn, $_POST['idea']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);

    $uploadOk = true;
    $resumeFileName = "";
    $profileImageFileName = "";

    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == UPLOAD_ERR_OK) {
        $folder_dir = "uploads/resume/";
        $base = basename($_FILES['resume']['name']); 
        $resumeFileType = pathinfo($base, PATHINFO_EXTENSION); 
        $resumeFileName = uniqid() . "." . $resumeFileType;   
        $resumePath = $folder_dir . $resumeFileName;  

        if ($resumeFileType == "pdf") {
            if ($_FILES['resume']['size'] < 500000) { 
                move_uploaded_file($_FILES["resume"]["tmp_name"], $resumePath);
            } else {
                $_SESSION['uploadError'] = "Wrong Size. Max Size Allowed: 5MB";
                echo "size";
                exit();
            }
        } else {
            $_SESSION['uploadError'] = "Wrong Format. Only PDF Allowed";
            echo "format";
            exit();
        }
    }

    if (isset($_FILES['prof_img']) && $_FILES['prof_img']['error'] == UPLOAD_ERR_OK) {
        $profileFolderDir = "uploads/logo/";
        $base = basename($_FILES['prof_img']['name']); 
        $profileImageFileType = pathinfo($base, PATHINFO_EXTENSION); 
        $profileImageFileName = uniqid() . "." . $profileImageFileType;   
        $profileImagePath = $profileFolderDir . $profileImageFileName;  

        if (in_array($profileImageFileType, ['jpg', 'jpeg', 'png'])) {
            if ($_FILES['prof_img']['size'] < 2000000) { // File size is less than 2MB
                move_uploaded_file($_FILES["prof_img"]["tmp_name"], $profileImagePath);
            } else {
                $_SESSION['uploadError'] = "Wrong Size. Max Size Allowed: 2MB";
                echo "size";
                exit();
            }
        } else {
            $_SESSION['uploadError'] = "Wrong Format. Only JPG, JPEG, PNG Allowed";
            echo "format";
            exit();
        }
    }

    $sql = "UPDATE entrepreneurs SET name=?, email=?, field=?, idea=?, mobile=?, age=?";
    $params = [$name, $email, $field, $idea, $mobile, $age];

    if (!empty($resumeFileName)) {
        $sql .= ", resume=?";
        $params[] = $resumeFileName;
    }

    if (!empty($profileImageFileName)) {
        $sql .= ", prof_img=?";
        $params[] = $profileImageFileName;
    }

    $sql .= " WHERE id_user=?";
    $params[] = $loggedin_userid;

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);

    if ($stmt->execute()) {
        echo "success";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $conn->close();

} else {
    echo "not click";
    exit();
}
?>
