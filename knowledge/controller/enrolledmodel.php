<?php 

class EnrolledStudent {
    private $table_name;
    private $conn;


    function __construct($db_conn) {
        $this->conn = $db_conn;
        $this->table_name = "enrolments";
    }

    function enroll($data) {
        try {
            $sql = 'INSERT INTO ' . $this->table_name . '(course_id, id_user) VALUES(?, ?)';
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            return 0;
        }
    }



    function check_enrolled_student($data){
        try {
           $sql = 'SELECT * FROM '. $this->table_name.' WHERE course_id=? AND id_user=?';
           $stmt = $this->conn->prepare($sql);
           $res = $stmt->execute($data);
           if($stmt->rowCount() > 0) 
             {
                 return 1;
             }
           else return 0;
        }catch(PDOException $e){
           return 0;
        }
    }

    function check_enrolled_student_progress($data) {
        try {
            $sql = 'SELECT progress FROM student_progress WHERE course_id = ? AND id_user = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
            if ($stmt->rowCount() > 0) {
                $progress = $stmt->fetch();
                return $progress['progress'];
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            return 0;
        }
    }



    function getEnrolled($stud_id){

        try {
  
            $sql = 'SELECT * FROM enrolments WHERE id_user=?';
            $stmt = $this->conn->prepare($sql);
            $res = $stmt->execute([$stud_id]);
  
           if ($res) {
  
              $enrolled_student = $stmt->fetchAll();
              $countNum = count($enrolled_student);
              $data = array(array('count'=> $countNum), $enrolled_student);
             return $data; 
           } else return 0;
         }catch(PDOException $e){
             return 0;
         }
         
      }
  
}



?>