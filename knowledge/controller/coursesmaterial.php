<?php 

include "coursesmaterialsmodel.php";

include "Database.php";


function getSomeCoursesMaterials($offset, $num){

	$db = new Database();
      $db_conn = $db->connect();
	  $obj = new CoursesMaterial($db_conn);

	  $data = $obj->getSomeCoursesMaterials($offset, $num);
	
	return $data;
}

function getCount(){
	$db = new Database();
      $db_conn = $db->connect();
	$student_models = new CoursesMaterial($db_conn);
	$res = $student_models->count();
	return $res;
}

