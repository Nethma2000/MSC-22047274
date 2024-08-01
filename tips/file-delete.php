
<?php
extract($_REQUEST);

$conn = mysqli_connect('localhost','root','','startupcompanion');

$sql=mysqli_query($conn,"select * from fileupload where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("files/$row[name]");

mysqli_query($conn,"delete from fileupload where id='$del'");

header("Location:admin-files-upload.php");

?>