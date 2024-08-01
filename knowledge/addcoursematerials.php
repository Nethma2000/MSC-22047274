<?php 
session_start();
include "Utils/Validation.php";

$title = "StartupCompanion | Navigate your startup journey";
include "adheader2.php";
?>

<?php  
class Util{
    static function redirect($location, $type, $em, $data=""){
        header("Location: $location?$type=$em&$data");
        exit;
    }
}
?>
<div class="container">
  
  <div class="list-table pt-5">
  <h4>Upload Courses Materials <a href="coursematerials.php" class="btn btn-primary">All Materials</a></h4>

  <form id="Chapter" 
        class="mt-5 border p-4"
        action="uploadcoursematerials.php" 
        enctype="multipart/form-data"
        method="POST"
        style="max-width: 700px;">
          <?php 
          if (isset($_GET['error'])) { ?>
            <p class="alert alert-warning"><?=Validation::clean($_GET['error'])?></p>
          <?php } ?>
          <?php 
          if (isset($_GET['success'])) { ?>
            <p class="alert alert-success"><?=Validation::clean($_GET['success'])?></p>
          <?php } ?>
        <div class="mb-3">
            <label for="chapterTitle" class="form-label">File, Image, Video, PDF, Docx, Zip</label>
            <input type="file" 
                   class="form-control" 
                   name="file" 
                   required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
  </div>
</div>
