<?php
    session_start();
?>

<html>
  <body>
    <?php
    include('connection.php');

    function ifusernameexists($x, $first){
      $sql_user = "SELECT * FROM form_data WHERE firstname = '$first'";
      $result_user = mysqli_query($x,$sql_user);
      if(mysqli_num_rows($result_user)>0){
        return true;
      }
    }

    function greetingmessage($first, $last){
      if (($_SESSION['firstName']!='') && ($_SESSION['lastName']!='')){
          echo "Welcome Back ".$_SESSION['firstName']." ".$_SESSION['lastName'];
      }else{
        $_SESSION['firstName'] = $first;
        $_SESSION['lastName'] = $last;

                echo "Welcome ".$_SESSION['firstName']." ".$_SESSION['lastName'];

      }
    }

          if($_POST['firstName']){
              $firstname = $_POST['firstName'];
          }else{
              echo "first name not received";
              exit;
          }
          if($_POST['lastName']){
              $lastname = $_POST['lastName'];
          }else{
              echo "last name not received";
              exit;
          }
          if($_POST['email']){
              $email = $_POST['email'];
          }else{
              echo "email not received";
              exit;
          }
          if($_POST['contact']){
              $phoneno = $_POST['contact'];
          }else{
              echo "Phone number not received";
              exit;
          }
          if ($_POST['address']){
              $address = $_POST['address'];
          }else {
              echo "Address not received";
              exit;
          }

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
          if($_POST['Confirm_Password']){
              $cnfrm_password = $_POST['Confirm_Password'];
          }else{
              echo "password not received";
              exit;
          }


          if (ifusernameexists($conn, $firstname)) {
            echo "Username already exists<br>";
            echo "Please use another Username";
          }else{
            if ($password==$cnfrm_password) {
              if(mysqli_query($conn,"INSERT INTO form_data (firstname, lastname, mobileno, email, address, username, password)
              VALUES ('$firstname', '$lastname', '$phoneno', '$email', '$address','$username','$password')")){
                echo "<br>New record created successfully";
                greetingmessage($firstname, $lastname);
              }else{
                echo "<br>Error<br>".$conn->error;
              }
            }else {
              echo "Passwords do not match<br>Please try again";
            }
          }
     ?>
  </body>
</html>
<?php
  session_unset();
  session_destroy();
?>
