<?php  


include('register_data.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/style.css">
  
</head>
<body class="hold-transition register-page">

 

<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-body">
      <p class="login-box-msg">Register a new User</p>
         <form method="POST" action="">
        <label>Name <span style="color: rgb(200,0,0);">*</span></label>
        <span class="text-danger"><?php if(!empty($nameErr)){echo $nameErr;}?></span>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Name" id="username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <label>Contact Number <span style="color: rgb(200,0,0);">*</span></label>
        <span class="text-danger"><?php if(!empty($contactErr)){echo $contactErr;}?></span>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Contact No." id="contactno" name="contactno">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <label>Email Address <span style="color: rgb(200,0,0);">*</span></label>
        <span class="text-danger"><?php if(!empty($emailErr)){echo $emailErr;}?></span>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email Address" id="email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <label>Password <span style="color: rgb(200,0,0);">*</span></label>
        <span class="text-danger"><?php if(!empty($passwordErr)){echo $passwordErr;}?></span>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <label>Confirm Password <span style="color: rgb(200,0,0);">*</span></label>
        <span class="text-danger"><?php if(!empty($confirmPasswordErr)){echo $confirmPasswordErr;}?></span>
        <div class="input-group mb-6">
          <input type="password" class="form-control" placeholder="Retype password" name="confirm_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <label style="margin-top: 15px;">Birthday <span style="color: rgb(200,0,0);">*</span></label>
        <span class="text-danger"><?php if(!empty($birthdayErr)){echo $birthdayErr;}?></span>
        <div class="input-group mb-6">
          <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="birthday">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
        <label style="margin-top: 15px;">Sex <span style="color: rgb(200,0,0);">*</span></label>
        <span class="text-danger"><?php if(!empty($genderErr)){echo $genderErr;}?></span>
       <div class="register-box">
          <div class="input-group mb-2">
            <!-- select -->
            <div class="form-group">
              <select name="gender" class="custom-select">
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>

        <!-- <div class="input-group mb-3">
          <select name="user_type">
            <option value="User">User</option>
            <option value="Admin">Admin</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div> -->
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" name="submit" value="Register" class="btn btn-primary btn-block"></div>
            <a href="login.php"></a>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->
      <a href="login.php" class="text-center">I already have a account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
