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

    $user="SELECT * FROM form_data WHERE username = '$username'";
    $result_user= mysqli_query($conn,$user);
    $first = "SELECT firstname FROM form_data WHERE username = '$username'";
    $last = "SELECT lastname FROM form_data WHERE username = '$username'";
    $fname= mysqli_query($conn,$first);
    $lname= mysqli_query($conn,$last);
    $row1= mysqli_fetch_array($fname);
    $row2= mysqli_fetch_array($lname);
    if(mysqli_num_rows($result_user)==1){
      //if($passcorr==$password){
        echo "Login Successful<br>";
        echo "Welcome ".$row1[0]." ".$row2[0];
        echo '<br><a href="login.html">Logout</a>';
      //}else {
        //echo "Incorrect Password<br>Please try again";
      //}
    }elseif (mysqli_num_rows($result_user)==0) {
      echo "Username doesn't exist<br>Please Signup<br>";
      echo '<a href="index.html">Proceed to Signup</a>';
    }

    ?>
  </body>
</html>
