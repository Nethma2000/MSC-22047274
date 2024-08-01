<?php 
session_start();
include "../Utils/Util.php";
include "studentcourse.php"; 
include "../controller/enrolledcontrol.php"; 
$student_id = $_SESSION['id_user'];

$enrolledCourses = getEnrolledCourses($student_id);
$row_count = $enrolledCourses['count'];
$courses = $enrolledCourses['courses'];

$title = "EduPulse - Students ";
include "Header.php";
?>
<div class="container">
  <?php 
  include "navbar.php"; 
  ?>

  <?php if ($row_count > 0) { ?>
    <h4 class="course-list-title">All Enrolled Courses (<?=$row_count?>)</h4>
    <div class="course-list">
      <?php 
      for ($i = 0; $i < $row_count; $i++) { ?>
        <div class="card mb-3 course">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="../Upload/thumbnail/<?=$courses[$i]["cover"]?>" 
                   class="img-fluid rounded-start" 
                   alt="course"
                   width="500">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?=$courses[$i]["title"]?></h5>
                <p class="card-text"><?=$courses[$i]["description"]?></p>
                <p class="card-text"><small class="text-body-secondary"><?=$courses[$i]["created_at"]?></small></p>
                <a href="Courses-Enrolled.php?course_id=<?=$courses[$i]["course_id"]?>" class="btn btn-primary">View Course</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php } else { ?>
    <div class="alert alert-info" role="alert">
        0 courses record found in the database
    </div>
  <?php } ?>
</div>
