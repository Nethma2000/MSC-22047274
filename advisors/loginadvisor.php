<?php

session_start();
require_once("../databaseconnection.php");


if(isset($_POST)) {

	//Escape Special Characters in String

$stuemail=$_POST['email'];
$stupass=$_POST['password'];
	//sql query to check company login
	$sql = "select * from advisor where advisor_email='$stuemail' && advisor_password='$stupass'";
	$result = $conn->query($sql);
    $_SESSION["advisor_name"]=$row['advisor_name'];

	//if company table has this this login details
	if($result->num_rows > 0) {
	
        // echo "login";
					//Set some session variables for easy reference
                    $_SESSION['login_user']=$stuemail;
				header("Location: advisorhome.php");
				exit();
			}
          
    
    else{
         echo '<script type="text/javascript">';
            echo 'alert( "Invalid Username or Password!")';

            echo '</script>';
            exit();
          
      
            
    }
}


?>