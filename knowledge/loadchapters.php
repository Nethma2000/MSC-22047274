<?php 
session_start();
include "Utils/Util.php";

    include "Utils/Validation.php";
    include "controller/Database.php";
    include "controller/coursemodel.php";



   if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $course_id = Validation::clean($_POST["course_id"]);

   $db = new Database();
   $conn = $db->connect();
   $course = new Course($conn);

   $chapters = $course->getChapters($course_id);
   if ($chapters) {
       foreach($chapters as $chapter){
        echo "<option value='".$chapter['chapter_id']."'>". $chapter['title']."</option>";
       }
   }else {
    echo 0;
   }
}

