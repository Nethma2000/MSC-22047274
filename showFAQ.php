<?php

    $conn = new PDO("mysql:host=localhost;dbname=startupcompanion", "root", "");
 
 
    $sql = "SELECT * FROM faqs";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $faqs = $statement->fetchAll();
 
?>

<!DOCTYPE html>
<html lang="en">


  <title>StartupCompanion</title>
  <link href="assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">

  <link href="assets/css/style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



 
<script src="admins/faq/faqjs/jquery-3.3.1.min.js"></script>
<script src="admins/faq/faqjs/bootstrap.js"></script>
  
        <header style="background-color: black;" id="header" class="fixed-top">

          <div class="container d-flex align-items-center justify-content-lg-between" style="margin-left: 30px;">
            <img src="assets/img/logo1.jpg" alt="Logo" style="width: 150px; height: 130px;">

            <h2 class="logo me-auto me-lg-2">
              <a href="index.html">
                &nbsp;&nbsp;StartupCompanion<span>.</span>
              </a>
            </h2>

            <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
          <li><a class="nav-link" href="showFAQ.php">FAQ</a></li>



          <li class="dropdown"><a href="#"><span>Sign In</span> <i class="bi bi-chevron-down">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
            <ul>
              <li><a href="admins/adminlogin.php">Admin</a></li>
              <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
              <li><a href="owners/login-advisor.php">Startup Owner</a></li>
              <li><a href="entrepreneurs/sign.html">Entrepreneur</a></li>


              
              <li><a href="advisors/logindvisor.html">Advisor</a></li>
            
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#cta" class="get-started-btn scrollto">Get Started</a>

    </div>
  </header><!-- End Header -->


  <main id="main">

   
 
    <div class="container" style="margin-top: 200px; margin-bottom: 50px;">
<h1 style="color: purple;" class="text-center">FAQ </h1>

    <div class="row">
        <div class="col-md-12 accordion_one">
           
            <div class="panel-group">
           
                <?php foreach ($faqs as $faq): ?>
                    <div class="panel panel-default">
 
                        
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion_oneLeft" href="#faq-<?php echo $faq['id']; ?>" aria-expanded="false" class="collapsed">
                                    <?php echo $faq['question']; ?>
                                </a>
                            </h4>
                        </div>
 
                       
                        <div id="faq-<?php echo $faq['id']; ?>" class="panel-collapse collapse" aria-expanded="false" role="tablist" style="height: 0px;">
                            <div class="panel-body">
                                <div class="text-accordion">
                                    <?php echo $faq['answer']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
   
<style>


.accordion_one .panel-group {
    border: 1px solid #f1f1f1;
    margin-top: 100px
    
}
a:link {
    text-decoration: none
}
.accordion_one .panel {
    background-color: transparent;
    box-shadow: none;
    border-bottom: 0px solid transparent;
    border-radius: 0;
    margin: 0
}
.accordion_one .panel-default {
    border: 0
}
.accordion-wrap .panel-heading {
    padding: 0px;
    border-radius: 0px
}
h4 {
    font-size: 18px;
    line-height: 24px
}
.accordion_one .panel .panel-heading a.collapsed {
    color: black;
    display: block;
    padding: 12px 30px;
    border-top: 0px
}
.accordion_one .panel .panel-heading a {
    display: block;
    padding: 12px 30px;
    background: #fff;
    color: #313131;
    border-bottom: 1px solid #f1f1f1
}
.accordion-wrap .panel .panel-heading a {
    font-size: 14px
}
.accordion_one .panel-group .panel-heading+.panel-collapse>.panel-body {
    border-top: 0;
    padding-top: 0;
    padding: 25px 30px 30px 35px;
    background: #fff;
    color: black;
}

.img-accordion {
    width: 81px;
    float: left;
    margin-right: 15px;
    display: block
}
.accordion_one .panel .panel-heading a.collapsed:after {
    content: "\2b";
    color: purple;
    font-weight: 500;;
    background: #f1f1f1
}
.accordion_one .panel .panel-heading a:after,
.accordion_one .panel .panel-heading a.collapsed:after {
    font-family: 'FontAwesome';
    font-size: 15px;
    width: 36px;
    line-height: 48px;
    text-align: center;
    background: #F1F1F1;
    float: left;
    margin-left: -31px;
    margin-top: -12px;
    margin-right: 15px
}
.accordion_one .panel .panel-heading a:after {
    content: "\2212"
}

.accordion_one .panel .panel-heading a:after,
.accordion_one .panel .panel-heading a.collapsed:after {
    font-family: 'FontAwesome';
    font-size: 15px;
    width: 36px;
    height: 48px;
    line-height: 48px;
    text-align: center;
    background: #F1F1F1;
    float: left;
    margin-left: -31px;
    margin-top: -12px;
    margin-right: 15px
}


</style>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Startup<br>Companion<span>.</span></h3>
              <p>
                No. 222, Gajaba Lane,  <br>
                Kumbukawatta, Gonapola<br><br>
                <strong>Phone:</strong> 0719312176<br>
                <strong>Email:</strong> rmndhananjani@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>StartupCompanion</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
      
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>