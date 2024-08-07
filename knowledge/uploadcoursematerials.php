<?php  

class Util{
    static function redirect($location, $type, $em, $data=""){
        header("Location: $location?$type=$em&$data");
        exit;
    }
}

session_start();
include "Utils/Validation.php";

if (isset($_FILES['file']['name'])) {
    include "controller/Database.php";
    include "controller/coursesmaterialsmodel.php";
    
    $db = new Database();
    $conn = $db->connect();

    $courses_material = new CoursesMaterial($conn);
    $instructor_id = 1;

    $VIDEO = array('mp4', 'mkv', 'vid');
    $IMAGE = array('jpg', 'jpeg', 'png');
    $PDF = array('pdf');
    $DOCS = array('docx', 'pptx');
    $type = "";

    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_upload_error = $_FILES['file']['error'];

    if($file_upload_error === 0){
        $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_ex_to_lc = strtolower($file_ex);
        if(in_array($file_ex_to_lc, $VIDEO)){
            $type = "Video";
        }else if(in_array($file_ex_to_lc, $IMAGE)){
            $type = "Picture";
        }else if(in_array($file_ex_to_lc, $PDF)){
            $type = "PDF";
        }else if(in_array($file_ex_to_lc, $DOCS)){
            $type = "DOCS";
        }else {
            $em = "You can't upload files of this type";
            Util::redirect("Courses-Materials-add.php", "error", $em);
        }

        $new_file_name = uniqid("Material-$type", true).'.'.$file_ex_to_lc;
        $file_upload_path = 'Upload/CoursesMaterials/'.$type.'/'.$new_file_name;
        $URL = 'Upload/CoursesMaterials/'.$type.'/'.$new_file_name;
        move_uploaded_file($file_tmp_name, $file_upload_path);
        
        $res = $courses_material->insert($instructor_id, $URL, $type);

        if ($res) {
            $sm = "New Courses Material Uploaded!";
            Util::redirect("Courses-Materials-add.php", "success", $sm);
        } else {
            $em = "Unknown error occurred!";
            Util::redirect("Courses-Materials-add.php", "error", $em);
        }
    } else {
        $em = "Unknown error occurred!";
        Util::redirect("Courses-Materials-add.php", "error", $em);
    }
} else { 
    $em = "Unknown error occurred!";
    Util::redirect("Courses-Materials-add.php", "error", $em);
}
?>
