<?php
session_start();
include('config.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $email = $_POST['email'];
    $sql = "SELECT code FROM verify WHERE email='$email'";
    $result = mysqli_query($conn , $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $otp = $_POST['otp-code'];
        $db_otp = $row['code'];
    } else {
        // Email address not found in database
       echo 'not found';
        exit();
    }
    
    // Check if the OTP matches the one sent to the user's email
    if ($db_otp == $otp) {
        
        header('location:resetpassword.php');
  
    }else{
        echo "<script>
            Swal.fire(
              'Oops...',
              'Email not found!',
              'error'
            )
          </script>";
    }
}    

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
          <input type="email" class="form-control" placeholder="Enter Email" name="email" class="form-control" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="number" class="form-control" placeholder="Enter Code" name="otp-code" class="form-control" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <input type="submit" name="confirm" value="Send Password Reset Link" class="btn btn-primary btn-block" />
            <a href=""></a>
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
