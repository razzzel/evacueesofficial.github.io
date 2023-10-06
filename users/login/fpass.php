<?php
session_start();
require 'mail.php';
include('config.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // Check if the email is in the database
    $email = $_POST['email'];
    $sql = "SELECT * FROM enduser WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        // Generate the random number
        $reset_code = rand(100000, 999999);
       
        // Calculate the expiration time (10 minutes from now)
        $expiration_time = time() + 60;

        // Insert the random number and expiration time into the database
        $sql =  "INSERT INTO `verify`(`code`, `email`, `expiration_time`) VALUES ('$reset_code', '$email', '$expiration_time')";
        $result = mysqli_query($conn, $sql);

        // Send the email with the verification code
        $message = "Here is your confirmation code: $reset_code";
        $subject = "Password Reset";
        $recipient = $email;
        send_mail($recipient,$subject,$message);
        header('location: verify-email-otp.php');

    } else {
        // Email does not exist in database
        echo "Email does not exist.";
    }
}

// Check if any rows have expired and delete them
$current_time = time();
$sql = "DELETE FROM verify WHERE expiration_time <= '$current_time'";
mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Cofirm Your Email</p>
      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" class="form-control" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <input type="submit" id="login" name="pwdrst" value="Send Password Reset Link" class="btn btn-primary btn-block" />
            <a href="login.php"></a>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
