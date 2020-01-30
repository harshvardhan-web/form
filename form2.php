<?php session_start(); ?>
<html>
  <body>
    <?php
    include('connection.php');

    if($_POST['Username']){
        $username = $_POST['Username'];
    }else{
        echo "username not received";
        exit;
    }
    if($_POST['Password']){
        $password = $_POST['Password'];
    }else{
        echo "password not received";
        exit;
    }

    if(!isset($_SESSION['logged_in'])){

      $user="SELECT * FROM form_data WHERE username = '$username'";
      $result_user= mysqli_query($conn,$user);
      $first = "SELECT firstname FROM form_data WHERE username = '$username'";
      $last = "SELECT lastname FROM form_data WHERE username = '$username'";
      $pass = "SELECT password FROM form_data WHERE username = '$username'";
      $fname= mysqli_query($conn,$first);
      $lname= mysqli_query($conn,$last);
      $passkey= mysqli_query($conn,$pass);
      $row1= mysqli_fetch_array($fname);
      $row2= mysqli_fetch_array($lname);
      $passrow= mysqli_fetch_array($passkey);
      if(mysqli_num_rows($result_user)==1){
        if($passrow[0]==$password){
          echo "Login Successful<br>";
          echo "Welcome ".$row1[0]." ".$row2[0];
          $_SESSION['logged_in']= $row1[0]." ".$row2[0];
          echo "<br>".$_SESSION['logged_in'];
          ?>
          <button><a href="logout.php">Logout</a></button>
          <?php
        }else {
          echo "Incorrect Password<br>Please try again";
        }
      }elseif (mysqli_num_rows($result_user)==0) {
        echo "Username doesn't exist<br>Please Signup<br>";
        echo '<a href="index.html">Proceed to Signup</a>';
      }

    }else{
      echo "Welcome back ".$_SESSION['logged_in']."<br>";
    ?>
      <button><a href="logout.php">Logout</a></button>
    <?php
    }
    ?>
  </body>
</html>
