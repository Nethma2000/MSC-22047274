<?php 
include "../controller/enrolledmodel.php";


function check_enrolled_student($data){
	$db = new Database();
	$conn = $db->connect();
	$enrolled_student = new EnrolledStudent($conn);
	      
	$res = $enrolled_student->check_enrolled_student($data);
	return $res;
}



function getEnrolledCourses($stud_id) {
    // Database connection
    $db = new Database();
    $db_conn = $db->connect();
    
    // Instantiate EnrolledStudent to get enrolled courses
    $obj = new EnrolledStudent($db_conn);
    $data = $obj->getEnrolled($stud_id);
    
    // Retrieve course count
    $countNum = $data[0]['count'];
    
    // Instantiate Course to get course details
    $course_model = new Course($db_conn);
    $newData = array('count' => $countNum, 'courses' => array());

    // Fetch detailed information for each course
    for ($i = 0; $i < $countNum; $i++) { 
        $cou_id = $data[1][$i]['course_id'];
        $course = $course_model->getCourseDetails($cou_id);
        $newData['courses'][] = $course;
    }

    return $newData;
}

