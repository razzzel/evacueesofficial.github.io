<?php

require_once('login_form.php');


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
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="hold-transition login-page">
  <style>
    body {
      background-image: url('admin/login/img/hot.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in User Portal</p>

      <form action="" name="login" method="POST">
        <span class="text-danger"><?php if(!empty($emailErr)){echo $emailErr;}?></span>
        <div class="input-group mb-3">
          <input type="email" class="form-control" required placeholder="Email Address" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="text-danger"><?php if(!empty($passwordErr)){echo $passwordErr;}?></span>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="g-recaptcha" data-sitekey="6LfrlygoAAAAAFuS6c4WyUBBsoxczaZ66yzLlm5r"></div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <p class="mb-1">
        <a href="fpass.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register_form.php" class="text-center">Create a New Account </a>
      </p>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" id="submit-btn" name="submit" value="Sign In" class="btn btn-primary btn-block">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    document.getElementById('submit-btn').addEventListener('click', function (event) {
        var response = grecaptcha.getResponse();
        if (response.length === 0) {
            event.preventDefault(); // Prevent form submission
            alert('Please complete the CAPTCHA.');
        }
    });
</script>

</body>
</html>
