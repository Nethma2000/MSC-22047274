<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header style="color:#00008B">Live Chat</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label style="color:#00008B"> Name</label>
            <input type="text" name="name" placeholder="Name" required>
          </div>
        </div>
        <div class="field input">
          <label style="color:#00008B">Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label style="color:#00008B">Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label style="color:#00008B">Profile Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input style="background-color: #00008B;color:white" type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div style="color:#00008B" class="link">Already joined with Live Chat? <a href="login.php">Start Chatting Now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
