<?php

include('advisorsession.php');

require_once("../databaseconnection.php");

$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($conn,"select advisor_email,advisor_name, id_advisor from advisor where advisor_email='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['advisor_name'];
$loggedin_id=$row['advisor_email'];
$loggedin_advisorid=$row['id_advisor'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['fullName']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $designation = mysqli_real_escape_string($conn, $_POST['designation']);
    $field = mysqli_real_escape_string($conn, $_POST['field']);
    $components = mysqli_real_escape_string($conn, $_POST['components']);
    $expereience = mysqli_real_escape_string($conn, $_POST['expereience']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $linkedin = mysqli_real_escape_string($conn, $_POST['linkedin']);
    $qualifications = mysqli_real_escape_string($conn, $_POST['qualifications']);

    $uploadOk = true;
    $profileImageFileName = "";

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

    $sql = "UPDATE advisor SET advisor_name=?, advisor_company=?, advisor_designation=?, advisor_field=?, advisor_advisingcomponent	=?, advisor_noofexperience=?, advisor_email=?, advisor_mobile=?, advisor_linkedin=?, advisor_qualifications=?";
    $params = [$name, $company, $designation, $field, $components, $expereience, $email, $mobile, $linkedin, $qualifications];

   

    if (!empty($profileImageFileName)) {
        $sql .= ", prof_img=?";
        $params[] = $profileImageFileName;
    }

    $sql .= " WHERE id_advisor=?";
    $params[] = $loggedin_advisorid;

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
