<?php

  include('connect.php');
  if (isset($_POST['save'])) {
    
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $contact = $_POST['contact'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $brgy_name = $_POST['brgy_name'];
    $address = $_POST['address'];
    $head_of_family = $_POST['head_of_family'];
    $center_id = $_POST['center_id'];
    $member = $_POST['member'];
    $children = $_POST['children'];
    $senior = $_POST['senior'];
    


    $query = "INSERT INTO evacuee_information(lastname, firstname, middlename, contact, age, gender, brgy_name, address, head_of_family, center_id, member, children, senior) 
    VALUES ('$lastname','$firstname','$middlename','$contact','$age','$gender','$brgy_name','$address','$head_of_family','$center_id','$member','$children','$senior')";
              
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Query Failed.");
    }
   $_SESSION['message'] = 'Student Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: manage-evacuees.php');
  }

  ?>

<!DOCTYPE HTML>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title></title>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="../asset/css/adminlte.min.css">
      <link rel="stylesheet" href="../asset/css/style.css">
      <link rel="stylesheet" href="../style1.css">
      <link rel="stylesheet" href="../asset/css/adminstyle.css">
      <link rel="stylesheet" href="../nodu_modules/bootstrap/dist/js/bootstrap.min.js">
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            <style type="text/css">
               td a.btn{
                  font-size: 0.7rem;
               }
               td p{
                  padding-left: 0.5rem !important;
               }
               th{
                  padding: 1rem !important;
               }
               table tr td {
                  padding: 0.3rem !important;
                  font-size: 13px;
               }

               .active1 {
                  background-color: #b4c2bf;

               }
               .navbar a:hover {
                  background-color: #7ebbde;
                  color: black;
               }
               .navbar .dropdown {
               float: left;
               display: block;
        }
        .navbar .dropdown .dropbtn a:hover {
            font-size: 16px;  
            border: none;
            outline: none;
            color: rgba(0,0,0,.5);;
            background-color: inherit;
            margin: 0;
            padding: 8px 16px;
        }
        .navbar .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .navbar .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .navbar .dropdown-content a:hover {
            background-color: #ddd;
        }
        .navbar .dropdown:hover .dropdown-content {
            display: block;
        }
            </style>

   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: rgba(64,156,243);">
                   <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
               <li class="active1">
                  <a class="nav-link" href="index.php">Home</a>
               </li>
               <div class="dropdown">
                    <a class="nav-link dropbtn " role="button">Profile</a>
                    <div class="dropdown-content">
                        <a href="#edit-profile">Edit Profile</a>
                        <a href="#view-profile">View Profile</a>
                        <a href="../admin/login/fpass.php">Change Password</a>
                    </div>
                </div>
               <ul class="navbar-nav ml-auto">
               <li>
                  <a class="nav-link" href="../admin/login/logout.php">Logout</a>
               </li >
            </ul>
         </nav>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgba(44,62,80);">
                        <!-- Brand Logo -->
            <a href="index.php" class="brand-link animated swing">
            <img src="../asset/img/3.png" alt="DSMS Logo" width="200" style="margin-top: -30px; margin-top: -20px;margin-bottom: -60px;">
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar Menu -->
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <li class="nav-item">
                        <a href="index.php" class="nav-link <?= $page == 'index.php' ? 'active' :"" ?> ">
                           <i class="nav-icon fa fa-tachometer-alt"></i>
                           <p>
                           Dashboard
                           </p>
                        </a>
                     </li>
                     <!-- <li class="nav-item">
                        <a href="calamity-type.php" class="nav-link <?= $page == 'calamity-type.php' ? 'active' :"" ?> ">
                           <i class="nav-icon fa fa-globe-asia"></i>
                           <p>
                              Type of Calamity
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="barangay.php" class="nav-link <?= $page == 'barangay.php' ? 'active' :"" ?> ">
                           <i class="nav-icon fa fa-university"></i>
                           <p>
                              Barangay Information
                           </p>
                        </a>
                     </li> -->

                     <!-- <li class="nav-item">
                        <a href="evacuation-center.php" class="nav-link <?= $page == 'evacuation-center.php' ? 'active' :"" ?> ">
                           <i class="nav-icon fa fa-hotel"></i>
                           <p>
                              Evacuation Center
                           </p>
                        </a>
                     </li> -->
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-address-card"></i>
                           <p>
                              Evacuee Information
                           </p>
                              <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="add-evacuee.php" class="nav-link <?= $page == 'add-evacuee.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-plus"></i>
                                 <p>New</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="manage-evacuees.php" class="nav-link <?= $page == 'manage-evacuees.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-address-book"></i>
                                 <p>Manage</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item">
                              <a href="location.php" class="nav-link <?= $page == 'location.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-address-book"></i>
                                 <p>Location of Evacuees</p>
                              </a>
                     </li>
                     <li class="nav-item">
                              <a href="user-logs.php" class="nav-link <?= $page == 'user-logs.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-address-book"></i>
                                 <p>User Log</p>
                              </a>
                     </li>
                     <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-chart-bar"></i>
                           <p>
                              Reports
                           </p>
                              <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="evacuees-report.php" class="nav-link <?= $page == 'evacuees-report.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-users"></i>
                                 <p>Evacuees</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="barangay-report.php" class="nav-link <?= $page == 'barangay-report.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-archway"></i>
                                 <p>Evacuees by Brgy</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="age-report.php" class="nav-link <?= $page == 'age-report.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-sort-numeric-up-alt"></i>
                                 <p>Evacuees by Age</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="calamity-report.php" class="nav-link <?= $page == 'calamity-report.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-globe-asia"></i>
                                 <p>Evacuees by Calamity</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="center-report.php" class="nav-link <?= $page == 'center-report.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-hospital-alt"></i>
                                 <p>Evacuees by Center</p>
                              </a>
                           </li> -->
                        </ul>
                     </li>
                  </ul>
               </nav>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6 animated bounceInRight">
                     <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-address-card"></span> Add Evacuees</h1>
                  </div>
                  <!-- /.col -->
                  
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Evacuees</li>
                     </ol>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->
         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">
               <div class="card card-info">
                  <div class="card-header">
                     <h3 class="card-title">Evacuees Information</h3>
                  </div>
                  <div class="valid_error"></div>
                  <!-- /.card-header -->
                  <!-- form start -->
                     <div class="card-body">
                        
            <form action= "add-evacuee.php" method="POST" name="add-Evacuue">
               <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>First Name</label>
                              <input type="text" class="form-control" required placeholder="First Name" name="firstname" autocomplete="off">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Last Name</label>
                              <input type="text" class="form-control" required placeholder="Last Name" name="lastname" autocomplete="off">
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Middle Name</label>
                              <input type="text" class="form-control" required placeholder="Middle Name" name="middlename" autocomplete="off">
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Contact Number</label>
                              <input type="number" class="form-control" required placeholder="ex. 09123456789" name="contact" autocomplete="off">
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Age</label>
                              <input type="number" class="form-control" required placeholder="Age" name="age" autocomplete="off">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Gender</label>
                              <input type="text" class="form-control" required placeholder="Gender" name="gender" autocomplete="off">
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Barangay</label>
                              <input type="tet" class="form-control" required placeholder="Barangay Name" name="brgy_name" autocomplete="off">
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Address</label>
                              <input type="text" class="form-control" required placeholder="Complete Address" name="address" autocomplete="off">
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Head of Family</label>
                              <input type="text" class="form-control" required placeholder="Head of Family Name" name="head_of_family" autocomplete="off">
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Evacuation Center</label>
                              <input type="text" class="form-control" required placeholder="Evacuation Center" name="center_id" autocomplete="off">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Family Members</label>
                              <input type="number" class="form-control" required placeholder="Number of Family Members" name="member" autocomplete="off">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Number of Children</label>
                              <input type="number" class="form-control" required placeholder="Number of Children" name="children" autocomplete="off">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Number of Senior</label>
                              <input type="number" class="form-control" required placeholder="Number of Senior" name="senior" autocomplete="off">
                           </div>
                        </div>
                        

                     <div class="card-footer">
                        <input type="submit" name="save" class="btn btn-primary" value="Save Evacuues" >
                        
                     </div>

                     </div>
                  </div>
               </div>
            </div>
                     
                     <!-- /.card-body -->
               </form>
            </div>
         </div>
         <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   </div>

   <!-- ./wrapper -->
   <!-- jQuery -->
   <script src="../asset/jquery/jquery.min.js"></script>
   <script src="../asset/js/adminlte.js"></script>
   <script src="../asset/js/valid.js"></script>

</body>

</html>