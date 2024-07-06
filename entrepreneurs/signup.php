<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


<?php

// session_start();

$name=$_POST['name'];
$email=$_POST['email'];
$field=$_POST['field'];
$age=$_POST['age'];
$password=$_POST['password'];
$mobile=$_POST['mobile'];



 $con= new mysqli('localhost','root','','startupcompanion');
if($con->connect_error){
    die("Connection failed");
}

else{

    $s = "select * from entrepreneurs where email='$email'";
    $result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    if($num==1){
        echo "Already registered";
         echo ("<script LANGUAGE='JavaScript'>
    window.alert('Registration Successful');
    window.location.href='sign.html';
    </script>");
         

    }
    else{
        $stmt=$con->prepare("insert into entrepreneurs(name,email,field,age,password,enid,mobile)
        values('$name','$email','$field','$age','$password','','$mobile')");
    
        $stmt->execute();

    //  echo  '<div class="alert alert-success">
    //     <strong>Success!</strong> Registration Successful.
    // </div>';
    
        
         
echo ("<script LANGUAGE='JavaScript'>
    window.alert('Registration Successful');
    window.location.href='sign.html';
    </script>");
        $stmt->close();
        $con->close();
    }
   

}

?>

