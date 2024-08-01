
<?php 
include 'db_connect.php';

?>
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
     
    </div>
  </div>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="https://www.sourcecodester.com/" target="_blank"><?php echo isset($meta['blog_name']) ? $meta['blog_name'] : '' ?></a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="nav-home"><a href="index.php?page=home">Home</a></li>
          <li class="drop-down"><a href="javascript:void(0)">Category</a>
            <ul>
              <?php
              $qry = $conn->query("SELECT * from category where status = 1"); 
            while($row=$qry->fetch_assoc()){
               ?>
                <li><a href="index.php?page=category&id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></li>
              <?php } ?>
            </ul>
          </li>


        </ul>
      </nav>


    </div>
  </header>
  <script>
  	$('.nav-<?php echo !isset($_GET['page']) ? 'home': $_GET['page'] ?>').addClass('active');
  </script>