<?php
include('../owners/ownersession.php');
?>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'startupcompanion');

if (isset($_POST['submit']) && $_FILES['photo']['error'] == 0) {
    $name = $_FILES['photo']['name'];
    $size = $_FILES['photo']['size'];
    $type = $_FILES['photo']['type'];
    $temp = $_FILES['photo']['tmp_name'];
    $date = date('Y-m-d H:i:s');
    $caption1 = $_POST['caption'];
    $link = $_POST['link'];

    move_uploaded_file($temp, "files/" . $name);

    $query = $conn->query("INSERT INTO fileupload (name,date) VALUES ('$name','$date')");
    if ($query) {
        header("Location: uploadfiles.php?status=success");
        exit;
    } else {
        die(mysqli_error($conn));
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>StartupCompanion | Navigate your startup journey</title>
    <link href="../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="globe.png" rel="shortcut icon">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link href="../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admins/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../admins/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../admins/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../admins/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../admins/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../admins/assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="../admins/assets/css/style.css" rel="stylesheet">
    <style>
        .table tr th {
            border: #d9a7e8 1px solid;
            position: relative;
            font-size: 12px;
            text-transform: uppercase;
        }

        table tr td {
            border: #d9a7e8 1px solid;
            color: black;
            position: relative;
            font-size: 12px;
            text-transform: uppercase;
        }

        #photo {
            font-family: Arial;
            font-size: 20px;
        }
    </style>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="../owners/ownerhome.php" class="logo d-flex align-items-center">
                <img src="../assets/img/logo.png" alt="">
                <span class="d-none d-lg-block" style="white-space: nowrap;">&nbsp&nbspStartup Owner Dashboard</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn" style="margin-left: 70px;"></i>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <?php
                        $sql = "SELECT * FROM owners WHERE id_advisor='$loggedin_ownerid'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row['prof_img'] != "") { ?>
                                    <img src="../owners/uploads/logo/<?php echo $row['prof_img']; ?>" class="img-responsive">
                                <?php } else { ?>
                                    <img src="../images/defaultimage.png" class="img-responsive">
                                <?php } ?>
                                <span class="d-none d-md-block dropdown-toggle ps-2">Welcome <?php echo $loggedin_session; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $loggedin_session; ?></h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../owners/owner_profile.php">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../owner/owner_profile.php">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                    <?php
                            }
                        }
                        ?>
                </li>
            </ul>
        </nav>
    </header>

    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="../owners/ownerhome.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../uni-company-chat/login.php">
                    <i class="bi bi-chat-dots"></i>
                    <span>Live Chat</span>
                </a>
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-chat-square-text"></i>
                    <span>Forum</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#ic-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-calendar-event"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="ic-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="../events/index.php">
                            <i class="bi bi-circle"></i><span>View Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="../events/viewevents.php">
                            <i class="bi bi-circle"></i><span>Create Events</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../blog/">
                    <i class="bi bi-journals"></i>
                    <span>Blog</span>
                </a>
            </li>
            <a class="nav-link" href="../tips/uploadfiles.php">
                <i class="bi bi-card-text"></i>
                <span>Startup Success Tips</span>
            </a>
        </ul>
    </aside>

    <form enctype="multipart/form-data" action="" id="wb_Form1" name="form" method="post" style="margin-top:80px;margin-left: 350px;">
        <input type="file" name="photo" id="photo" required="required">
        <br>
        <input style="background-color: #1F51FF	;color:white;font-size: 15px;" type="submit" class="btn btn-" value="UPLOAD" name="submit">
    <br>
	</form>
<br>
    <div class="col-md-18" style="margin-top:0px;margin-left: 50px;">
        <div class="container-fluid">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body" style="margin-top:0px;margin-left: 50px;">
                        <div class="table-responsive" style="margin-top:0px;margin-left: 200px;">
                            <form method="post">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-condensed" id="example">
                                    <thead>
                                        <tr>
                                            <th style="color:#751b8f;font-weight:bolder;font-size:15px">File ID</th>
                                            <th style="color:#751b8f;font-weight:bolder;font-size:15px">File Name</th>
                                            <th style="color:#751b8f;font-weight:bolder;font-size:15px">Uploaded Date</th>
                                            <th style="color:#751b8f;font-weight:bolder;font-size:15px">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM fileupload WHERE publish='yes'") or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $date = $row['date'];
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['date'] ?></td>
                                                <td>
                                                    <a href="file-download.php?filename=<?php echo $name; ?>" title="click to download"><span class="glyphicon glyphicon-download" style="font-size:20px; color:purple"></span></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // Check if the status query parameter is set
        if (isset($_GET['status']) && $_GET['status'] == 'success') {
            echo "<script type='text/javascript'>
                alert('File uploaded successfully! But it will be published only after admin approval.');
                // Remove the status query parameter from the URL
                window.history.replaceState(null, null, window.location.pathname);
            </script>";
        }
        ?>
    </div>
<!-- Vendor JS Files -->
<script src="../admins/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../admins/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../admins/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../admins/assets/vendor/quill/quill.min.js"></script>
  <script src="../admins/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../admins/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../admins/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../admins/assets/js/main.js"></script>
	
</body>

</html>
