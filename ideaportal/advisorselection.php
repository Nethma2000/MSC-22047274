<?php
include('ensession.php');
require_once("db.php");
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
  <style>
    .active-filter i {
      color: red !important; 
    }
    .active-filter a {
      font-weight: bold; 
    }
  </style>
</head>
<body style="background-color: purple;" class="hold-transition skin- sidebar-mini">
<div class="wrapper">

  <header class="main-header">
  </header>

  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
          <h2 class="text-center" id="heading-title">Advisors</h2>

            <div class="input-group input-group-lg">
                <input type="text" id="searchBar" class="form-control" placeholder="Search advisors">
                <span class="input-group-btn">
                  <button id="searchBtn" type="button" class="btn btn-success btn-flat">Go!</button>
                </span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Filter the Search</h3>
                <button id="clearFilters" class="btn btn-warning">Clear Filters</button>

              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked tree" data-widget="tree">
                  <li class="treeview menu-open">
                    <a href="#"><i style="color: purple;" class="fa fa-graduation-cap"></i> Field <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="treeview-menu">
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Agriculture and Food-Tech"><i style="color: purple;" class="fa fa-circle-o"></i> Agriculture and Food-Tech</a></li>
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Consumer Goods"><i style="color: purple;" class="fa fa-circle-o"></i> Consumer Goods</a></li>
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Creative Arts and Media"><i style="color: purple;" class="fa fa-circle-o"></i> Creative Arts and Media</a></li>
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Education"><i style="color: purple;" class="fa fa-circle-o"></i> Education</a></li>
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Entertainment"><i style="color: purple;" class="fa fa-circle-o"></i> Entertainment</a></li>
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Health and Wellness"><i style="color: purple;" class="fa fa-circle-o"></i> Health and Wellness</a></li>
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Hospitality and Tourism"><i style="color: purple;" class="fa fa-circle-o"></i> Hospitality and Tourism</a></li>
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Manufacturing and Industry"><i style="color: purple;" class="fa fa-circle-o"></i> Manufacturing and Industry</a></li>
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Real Estate and Property Management"><i style="color: purple;" class="fa fa-circle-o"></i> Real Estate and Property Management</a></li>
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Retail and E-commerce"><i style="color: purple;" class="fa fa-circle-o"></i> Retail and E-commerce</a></li>
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Social Impact and Nonprofit"><i style="color: purple;" class="fa fa-circle-o"></i> Social Impact and Nonprofit</a></li>
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Technology"><i style="color: purple;" class="fa fa-circle-o"></i> Technology</a></li>
  <li><a href="#" style="color: black;" class="fieldSearch" data-target="Transportation and Logistics"><i style="color: purple;" class="fa fa-circle-o"></i> Transportation and Logistics</a></li>
</ul>

                  </li>


                  <li class="treeview menu-open">
  <a href="#"><i style="color: purple;" class="fa fa-cogs"></i> Advising Components <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
  <ul class="treeview-menu">
    <li><a href="#" style="color: black;" class="componentSearch" data-target="Business Planning"><i style="color: purple;" class="fa fa-circle-o"></i> Business Planning</a></li>
    <li><a href="#" style="color: black;" class="componentSearch" data-target="Funding and Finance"><i style="color: purple;" class="fa fa-circle-o"></i> Funding and Finance</a></li>
    <li><a href="#" style="color: black;" class="componentSearch" data-target="Legal and Compliance"><i style="color: purple;" class="fa fa-circle-o"></i> Legal and Compliance</a></li>
    <li><a href="#" style="color: black;" class="componentSearch" data-target="Marketing and Sales"><i style="color: purple;" class="fa fa-circle-o"></i> Marketing and Sales</a></li>
    <li><a href="#" style="color: black;" class="componentSearch" data-target="Product Development"><i style="color: purple;" class="fa fa-circle-o"></i> Product Development</a></li>
    <li><a href="#" style="color: black;" class="componentSearch" data-target="Operations and Management"><i style="color: purple;" class="fa fa-circle-o"></i> Operations and Management</a></li>
    <li><a href="#" style="color: black;" class="componentSearch" data-target="Technology and Innovation"><i style="color: purple;" class="fa fa-circle-o"></i> Technology and Innovation</a></li>
    <li><a href="#" style="color: black;" class="componentSearch" data-target="Networking and Partnerships"><i style="color: purple;" class="fa fa-circle-o"></i> Networking and Partnerships</a></li>
    <li><a href="#" style="color: black;" class="componentSearch" data-target="Growth and Scaling"><i style="color: purple;" class="fa fa-circle-o"></i> Growth and Scaling</a></li>
    <li><a href="#" style="color: black;" class="componentSearch" data-target="Risk Management"><i style="color: purple;" class="fa fa-circle-o"></i> Risk Management</a></li>
  </ul>
</li>


                  <li class="treeview menu-open">
                    <a href="#"><i style="color: purple;" class="fa fa-vcard"></i> Experience <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="treeview-menu">
                      <li><a href="#" style="color: black;" class="experienceSearch" data-target='1'><i style="color: purple;" class="fa fa-circle-o"></i> > 1 Years</a></li>
                      <li><a href="#" style="color: black;" class="experienceSearch" data-target='2'><i style="color: purple;" class="fa fa-circle-o"></i> > 2 Years</a></li>
                      <li><a href="#" style="color: black;" class="experienceSearch" data-target='3'><i style="color: purple;" class="fa fa-circle-o"></i> > 3 Years</a></li>
                      <li><a href="#" style="color: black;" class="experienceSearch" data-target='4'><i style="color: purple;" class="fa fa-circle-o"></i> > 4 Years</a></li>
                      <li><a href="#" style="color: black;" class="experienceSearch" data-target='5'><i style="color: purple;" class="fa fa-circle-o"></i> > 5 Years</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-9">

          <?php
          $limit = 4;
          $sql = "SELECT COUNT(id_jobpost) AS id FROM advisor_overview";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $total_records = $row['id'];
            $total_pages = ceil($total_records / $limit);
          } else {
            $total_pages = 1;
          }
          ?>

            <div id="target-content">
            </div>
            <div class="text-center">
              <ul class="pagination text-center" id="pagination"></ul>
            </div> 

          </div>
        </div>
      </div>
    </section>

  </div>
  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
    </div>
  </footer>
  <div class="control-sidebar-bg"></div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/adminlte.min.js"></script>
<script src="js/jquery.twbsPagination.min.js"></script>

<script>
 $(document).ready(function() {
  function Pagination() {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        $("#target-content").html("loading....");
        $("#target-content").load("jobpagination.php?page=" + page);
        $("#heading-title").text("Advisors");
      }
    });
  }

  Pagination();

  function Search(val, filter) {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        val = encodeURIComponent(val); 
        $("#target-content").html("loading....");
        $("#target-content").load("search.php?page=" + page + "&search=" + val + "&filter=" + filter);

        let decodedVal = decodeURIComponent(val); 
        if (filter === 'searchBar') {
          $("#heading-title").text("Advisors based on your search filter");
        } else if (filter === 'experience') {
          $("#heading-title").text("Advisors with Experience: " + decodedVal + " Years");
        } else if (filter === 'field') {
          $("#heading-title").text("Advisors in the Field: " + decodedVal);
        } else if (filter === 'component') {
          $("#heading-title").text("Advisors specialized in advising on " + decodedVal);
        }
      }
    });
  }

  function setActiveFilter(element) {
    $('.fieldSearch, .experienceSearch, .componentSearch').removeClass('active-filter');
    element.addClass('active-filter');
  }

  function resetFilters() {
    $('.fieldSearch, .experienceSearch, .componentSearch').removeClass('active-filter');
    $("#searchBar").val('');
    $("#heading-title").text("Advisors");
    $("#pagination").twbsPagination('destroy');
    Pagination();

    $('.treeview-menu').slideUp();
    $('.treeview').removeClass('menu-open');
  }

  $("#searchBtn").on("click", function(e) {
    e.preventDefault();
    var searchResult = $("#searchBar").val();
    var filter = "searchBar";
    if (searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });

  $(".experienceSearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "experience";
    setActiveFilter($(this));
    if (searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });

  $(".fieldSearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "field";
    setActiveFilter($(this));
    if (searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });

  $(".componentSearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "component";
    setActiveFilter($(this));
    if (searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });

  $("#clearFilters").on("click", function(e) {
    e.preventDefault();
    resetFilters();
  });
});
</script>

</body>
</html>