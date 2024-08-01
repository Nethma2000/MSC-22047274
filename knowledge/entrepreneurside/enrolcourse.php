<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";

    if (isset($_GET['course_id']) && isset($_GET['id_user'])) {
        include "../controller/Database.php";
        include "../controller/enrolledmodel.php";
        include "../controller/coursemodel.php";
        
        $course_id = Validation::clean($_GET['course_id']);
        $loggedin_userid = Validation::clean($_GET['id_user']);
        $data = array($course_id, $loggedin_userid);
        
        $db = new Database();
        $conn = $db->connect();
        $enrolled_student = new EnrolledStudent($conn);

        if (!$enrolled_student->check_enrolled_student($data)) {
            $enrolled_student->enroll($data);
            $course_model = new Course($conn);
            $course_model->createStudentProgress($course_id, $loggedin_userid, 0);
        }

        Util::redirect("Courses-Enrolled.php", "course_id", $course_id);
    } else {
        $em = "Course ID or User ID missing";
        Util::redirect("../Courses.php", "error", $em);
    }


