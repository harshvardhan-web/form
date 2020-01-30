<html>
<body>
  <?php
    session_start();
    // unset($_SESSION['logged_in']);
    echo "Log Out Successful<br>";
    if (!isset($_SESSION['logged_in'])){
      session_destroy();
      header("Location:login.html");
    }
  ?>
  <!-- <button name="log_out"><a href="login.html">Login Again to Continue</a></button> -->
</body>
</html>
