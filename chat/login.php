<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header style="color:#00008B">Live Chat</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label style="color:#00008B">Email of StartupCompanion  portal</label>
          <input type="text" name="email" placeholder="Please enter your  email" required>
        </div>
        <div class="field input">
          <label style="color:#00008B">Password of StartupCompanion portal</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input style="background-color: #00008B;color:#fff" type="submit" name="submit" value="Start">
        </div>
      </form>
      <div style="color:#00008B" class="link">First time here? <a href="index.php">Join with Live Chat</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
