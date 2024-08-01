<?php
session_start();
include_once('aconnection.php');

if (isset($_POST['add'])) {
    $advisor_name = $_POST['advisor_name'];
    $advisor_company = $_POST['advisor_company'];
    $advisor_designation = $_POST['advisor_designation'];
    $advisor_field = $_POST['advisor_field'];
    
    $advisor_advisingcomponent = isset($_POST['advisor_advisingcomponent']) ? $_POST['advisor_advisingcomponent'] : [];
    $advisor_advisingcomponent = implode(", ", $advisor_advisingcomponent); // Convert array to a string

    $advisor_noofexperience = $_POST['advisor_noofexperience'];
    $advisor_email = $_POST['advisor_email'];
    $advisor_mobile = $_POST['advisor_mobile'];
    $advisor_linkedin = $_POST['advisor_linkedin'];
    $advisor_qualifications = $_POST['advisor_qualifications'];
    $advisor_password = $_POST['advisor_password'];

    $sql = "INSERT INTO advisor (advisor_name, advisor_company, advisor_designation, advisor_field, advisor_advisingcomponent, advisor_noofexperience, advisor_email, advisor_mobile, advisor_linkedin, advisor_qualifications, advisor_password)
            VALUES ('$advisor_name', '$advisor_company', '$advisor_designation', '$advisor_field', '$advisor_advisingcomponent', '$advisor_noofexperience', '$advisor_email', '$advisor_mobile', '$advisor_linkedin', '$advisor_qualifications', '$advisor_password')";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Member added successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while adding';
    }
} else {
    $_SESSION['error'] = 'Fill up add form first';
}

header('location: index.php');
?>
