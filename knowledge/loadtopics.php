<?php 
session_start();
include "/Utils/Util.php";

    include "Utils/Validation.php";
    include "controller/Database.php";
    include "controller/coursemodel.php";




   if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $chapter_id = Validation::clean($_POST["chapter_id"]);


   $db = new Database();
   $conn = $db->connect();
   $course = new Course($conn);

   $topcs = $course->getTopicsByChapterId($chapter_id);
   if ($topcs) {
       foreach($topcs as $topc){
        echo "<option value='".$topc['topic_id']."'>". $topc['title']."</option>";
       }
   }else {
    echo 0;
   }
}
