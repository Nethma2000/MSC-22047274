<?php

$name=$_POST['name'];
$company=$_POST['company'];
$designation=$_POST['designation'];
$field=$_POST['field'];
$mobileno=$_POST['mobileno'];
$email=$_POST['email'];
$password=$_POST['password'];
$medium=$_POST['medium'];
$linkedin=$_POST['linkedin'];
$github=$_POST['github'];
$qualifications=$_POST['qualifications'];
$work_experience=$_POST['work_experience'];

 $con= new mysqli('localhost','root','','startupcompanion');
if($con->connect_error){
    die("Connection failed");
}

else{

    $s = "select * from owners where email='$email'";
    $result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    if($num==1){
        echo "Already registered";

    }
    else{
        $stmt=$con->prepare("insert into owners(name,company,designation,field,mobileno,email,password,medium,linkedin,github,qualifications,work_experience)
        values('$name','$company','$designation','$field','$mobileno','$email','$password','$medium','$linkedin','$github','$qualifications','$work_experience')");
    
        $stmt->execute();
         echo "Registration Successful";
    //    header('location: home.html');


        $stmt->close();
        $con->close();
    }
   

}








?>