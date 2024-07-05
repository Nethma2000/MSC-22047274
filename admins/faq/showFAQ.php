<?php

    $conn = new PDO("mysql:host=localhost;dbname=startupcompanion", "root", "");
 
 
    $sql = "SELECT * FROM faqs";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $faqs = $statement->fetchAll();
 
?>

<link rel="stylesheet" type="text/css" href="faqcss/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="faqfont-awesome/css/font-awesome.css" />
 <title>FAQ Section</title>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Career NextGen</title>

    <link rel="stylesheet" href="home.css" />

<script src="faqjs/jquery-3.3.1.min.js"></script>
<script src="faqjs/bootstrap.js"></script>
<nav class="navbar navbar-expand-lg py-2 sticky-top navbar-light bg-light">
        <div class="container">

            <a class="navbar-brand" href="home.php" style="color: #520670; font-weight: bold; font-size: x-large;">Career
                NextGen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" style="font-size: medium;color: #520670;" aria-current="page"
                            href="home.php">Home</a>
                    </li>
                  
                   
                   
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: medium;color: #520670;" href="showFAQ.php">FAQ</a>
                    </li>



                </ul>
                <div class="dropdown">
                    <button class="btn btn-primary ms-lg-3"
                        style="background:linear-gradient(to right,#a506e4, #520670); font-weight: bold;">Login
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="studentroleselection.php">Student</a>
                        <a href="universitylogin.html">University</a>
                        <a href="jobPortal/login-company.php">Company</a>
                        <a href="login-advisor.php">Advisor</a>
                        <a href="adminlogin.html">Admin</a>
                    </div>

                </div>
            </div>
        </div>
    </nav>
    

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
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