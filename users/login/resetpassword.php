<?php
session_start();
error_reporting(0);
include('config.php');

if (isset($_POST['change'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    
    $query = mysqli_query($conn, "SELECT * FROM enduser WHERE email='$email'");
    $num = mysqli_num_rows($query);

    if ($num > 0) {
        // Update the user's password with the hashed password
        mysqli_query($conn, "UPDATE enduser SET password='$hashed_password' WHERE email='$email'");

        // Redirect to the resetpassword.php page
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "resetpassword.php";
        header("Location: http://$host$uri/$extra");
        $_SESSION['errmsg'] = "Password Changed Successfully";
        exit();
    } else {
        // Redirect to the resetpassword.php page
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "resetpassword.php";
        header("Location: http://$host$uri/$extra");
        $_SESSION['errmsg'] = "Invalid email id or Contact no";
        exit();
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
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->

  <script type="text/javascript">
    function valid() {
      if (document.register.password.value != document.register.confirm_password.value) {
        alert("Password and Confirm Password Field do not match!");
        document.register.confirm_password.focus();
        return false;
      }
      return true;
    }
  </script>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Reset Password</p>
      <form action="" name="register" method="POST">

        <span style="color:red;">
          <?php
          echo htmlentities($_SESSION['errmsg']);
          ?>
          <?php
          echo htmlentities($_SESSION['errmsg'] = "");
          ?>
        </span>
        <label>Email Address <span style="color: rgb(200,0,0);">*</span></label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" required placeholder="Email Address" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
       <label>Password <span style="color: rgb(200,0,0);">*</span></label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <label>Confirm Password <span style="color: rgb(200,0,0);">*</span></label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required placeholder="Confirm Password" name="confirm_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12">
            <button type="submit" name="change" class="btn btn-primary btn-block">Change password</button>
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
