

<?php
$pdo = new PDO('mysql:host=localhost;dbname=startupcompanion', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT course_id, title FROM course";
$stmt = $pdo->query($query);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all courses as associative array

?>


<?php 
session_start();
include "Utils/Util.php";
include "Utils/Validation.php";


        include "controller/course.php";
 


    $title = "StartupCompanion | Navigate your startup journey";
    include "adheader2.php";
    
    $title = $description  ="";
    if (isset($_GET["title"])) {
        $title = Validation::clean($_GET["title"]);
    }
    if (isset($_GET["description"])) {
        $description = Validation::clean($_GET["description"]);
    }
?>

<div class="container">
<div class="container mt-5">

    <form action="createcoursecontent.php" 
          class="border p-5"
          method="POST">
        <h4>Create / Edit Course Content</h4>
          <div class="mb-3">
            <label for="courseSelectTopic" class="form-label">Select Course</label>
            <select class="form-select" id="courseSelectTopic" name="course_id" required>
               <?php if ($courses) { ?>
                    <?php foreach ($courses as $course) { ?>
                        <option value="<?=$course['course_id']?>"><?=$course['title']?></option>
                    <?php }?>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="chapterSelect" class="form-label">Select Chapter</label>
            <select class="form-select" 
                    id="chapterSelect" 
                    name="chapter_id" 
                    required>
                  
            </select>
        </div>
         
          <div class="mb-3">
            <label for="topicSelect" class="form-label">Select Topic</label>
            <select class="form-select" 
                    id="topicSelect" 
                    name="topic_id" 
                    required>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Load Content</button>

    </form>

</div>

<script type="text/javascript">
     $(document).ready(function() {
  
    $("#courseSelectTopic").change(function(){
        var courseSelectTopicVal = $("#courseSelectTopic").val();
        $.post("loadchapters.php", 
              {'course_id': courseSelectTopicVal}, 
              function(data, status){
                    if(status == "success"){
                       
                        if (data != 0) {
                        $("#chapterSelect").html(data);
                
                    }else {
                         alert("First create Capter");
                         $("#chapterSelect").html("");
                    }
                }
        });
    });

    $("#chapterSelect").change(function(){
        var chapterSelectTopicVal = $("#chapterSelect").val();
        $.post("loadtopics.php", 
              {'chapter_id': chapterSelectTopicVal}, 
              function(data, status){
                    if(status == "success"){
                       
                        if (data != 0) {
                        $("#topicSelect").html(data);
                

                    }else {
                         alert("First create Topic");
                         $("#topicSelect").html("");
                    }
                }
        });
    });

   

  });

   
</script>
 

<?php
 ?>