<?php
include('ensession.php');
require_once("db.php");

$loggedin_userid = $row['id_user'];
$_SESSION["id_user"] = $loggedin_userid;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>StartupCompanion | Navigate your startup journey</title>
  <link href="../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body style="background-color: #ECF0F5;" class="hold-transition skin- sidebar-mini">
    <header class="main-header">
      </a>
      <nav class="navbar navbar-static-top"></nav>
    </header>

    <div class="content-wrapper" style="margin-left: 0px;">
      <?php
      $sql = "SELECT advisor_overview.*, advisor.prof_img FROM advisor_overview INNER JOIN advisor ON advisor_overview.id_advisor=advisor.id_advisor WHERE id_jobpost='$_GET[id]'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <section id="candidates" class="content-header">
            <div class="container">
              <div class="row">
                <div class="col-md-9 bg-white padding-2">
                  <div class="pull-left">
                    <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
                  </div>
                  <div class="pull-right">
                    <a href="advisorselection.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
                  </div>
                  <div class="clearfix"></div>
                  <hr>
                  <div>
                    <p><span class="margin-right-10"></i><strong>Advising Components: </strong><?php echo $row['components']; ?></span></p>
                  </div>
                  <div>
                    <?php echo stripcslashes($row['description']); ?>
                  </div>
                  <?php
                  if (isset($_SESSION["id_user"]) && empty($_SESSION['companyLogged'])) { ?>
                    <div>
                      <a href="apply.php?id=<?php echo $row['id_jobpost']; ?>" class="btn btn-success btn-flat margin-top-50">Apply</a>
                    </div>
                  <?php } ?>
                </div>
                <div class="col-md-3">
                  <div class="thumbnail">
                    <?php
                    $profileImage = $row['prof_img'] ? '../advisors/uploads/logo/' . $row['prof_img'] : '../images/defaultimage.png';
                    ?>
                    <img src="<?php echo $profileImage; ?>" alt="Profile Image">
                    <div class="caption text-center">
                      <h5>Go to my Linkedin Profile: <br>
                      <br>
                      <a href="<?php echo 'https://' . str_replace('http://localhost/msccollaborate/mscproject/ideaportal/', '', $row['linkedin']); ?>" target="_blank" rel="noopener noreferrer"><?php echo $row['linkedin']; ?></a></h5>
                      <script>
                        function myFunction() {
                          alert("If you can't see the Apply button, it means you are not logged in! Please log in to your job profile to apply for jobs");
                        }
                      </script>
                      <hr>
                      <div class="row">
                        Need to talk? <br><button class="btn btn-primary btn-flat">Join a meeting</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
      <?php
        }
      }
      ?>
    </div>
    <div class="control-sidebar-bg"></div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/adminlte.min.js"></script>
</body>
</html>
