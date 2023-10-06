<?php
   include ('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Evacuation Center Management System</title>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="../asset/css/adminstyle.css">
      <link rel="stylesheet" href="../asset/css/style.css">
         
      
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
              footer {
            background: #f4f6f9;
            padding: 86px 0;
         }
         .single-content {
            text-align: center;
            padding: 115px 0;
         }
         .single-box p {
            color: black;
            line-height: 1.9;
         }
         .single-box h3 {
            font-size: 16px;
            font-weight: 700;
            color: black;
         }
         .single-box .card-area i {
            color: black;
            font-size: 20px;
            margin-right: 10px;
         }
         .single-box ul {
            list-style: none;
            padding: 0;
         }
         .single-box ul li a {
            text-decoration: none;
            color: black;
            line-height: 2.5;
            font-weight: 100;
         }
         .single-box h2 {
            color: black;
            font-size: 20px;
            font-weight: 700;
         }
         #basic-addon2 {
            background: #fe1e4f;
            color: black;
         }
         .socials i {
            font-size: 18px;
            margin-right: 15px;
         }
         @media (max-width: 767px) {
            .single-box {
               margin-bottom: 50px;
            }
         }
         @media (min-width: 768px) and (max-width: 991px) {
            .single-box {
               margin-bottom: 50px;
            }
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
                     <div class="col-sm-6">
                        <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-tachometer-alt"></span> Dashboard</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Dashboard</li>
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
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                     <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Number of Household</span>
                <?php
                        $dash_evacuee_query = "SELECT * from evacuee_information";
                        $dash_evacuee_query_run = mysqli_query($conn,$dash_evacuee_query);

                        if($evacuee_total = mysqli_num_rows($dash_evacuee_query_run))
                        {
                           echo '<span class= "info-box-number">'.$evacuee_total.'</span>';
                        }

                        else
                        {
                           echo '<span class= "info-text"> No data </span>';
                        }

                  ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Number of Evacuees</span>
                  <?php
                   $dash_evacuee_query = "SELECT SUM(member) AS member FROM evacuee_information";
                   $dash_evacuee_query_run = mysqli_query($conn, $dash_evacuee_query);

                   if ($dash_evacuee_query_run && mysqli_num_rows($dash_evacuee_query_run) > 0) {
                       $row = mysqli_fetch_assoc($dash_evacuee_query_run);
                       $evacuee_total = $row['member'];

                       echo '<span class="info-box-number">'.$evacuee_total.'</span>';
                   } else {
                       echo '<span class="info-text">No data</span>';
                   }
               ?>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Number of Senior's</span>
                  <?php
                      $dash_evacuee_query = "SELECT SUM(senior) AS senior FROM evacuee_information";
                      $dash_evacuee_query_run = mysqli_query($conn, $dash_evacuee_query);

                        if ($dash_evacuee_query_run && mysqli_num_rows($dash_evacuee_query_run) > 0) {
                          $row = mysqli_fetch_assoc($dash_evacuee_query_run);
                          $evacuee_total = $row['senior'];

                          echo '<span class="info-box-number">'.$evacuee_total.'</span>';
                      } else {
                          echo '<span class="info-text">No data</span>';
                      }
                  ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
             <div class="info-box-content">
                <span class="info-box-text">Number of Children's</span>
             <?php
                      $dash_evacuee_query = "SELECT SUM(children) AS children FROM evacuee_information";
                      $dash_evacuee_query_run = mysqli_query($conn, $dash_evacuee_query);

                        if ($dash_evacuee_query_run && mysqli_num_rows($dash_evacuee_query_run) > 0) {
                          $row = mysqli_fetch_assoc($dash_evacuee_query_run);
                          $evacuee_total = $row['children'];

                          echo '<span class="info-box-number">'.$evacuee_total.'</span>';
                      } else {
                          echo '<span class="info-text">No data</span>';
                      }
                  ?>

              </div>
              
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <!-- <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-university"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Number of Barangay</span>
                
                <?php
                        $dash_barangay_query = "SELECT * from brgy_info";
                        $dash_barangay_query_run = mysqli_query($conn,$dash_barangay_query);

                        if($barangay_total = mysqli_num_rows($dash_barangay_query_run))
                        {
                           echo '<span class= "info-box-number">'.$barangay_total.'</span>';
                        }

                        else
                        {
                           echo '<span class= "info-text"> No data </span>';
                        }

                  ?>
              </div>
              /.info-box-content
            </div>
            /.info-box
          </div> -->
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

         <!--  <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-indigo elevation-1"><i class="fas fa-hotel"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Number of Evacuation Center</span>
                <?php
                        $dash_household_query = "SELECT * from evacuee_center_info";
                        $dash_household_query_run = mysqli_query($conn,$dash_household_query);

                        if($household_total = mysqli_num_rows($dash_household_query_run))
                        {
                           echo '<span class= "info-box-number">'.$household_total.'</span>';
                        }

                        else
                        {
                           echo '<span class= "info-text"> No data </span>';
                        }

                  ?>
              </div> -->
              <!-- /.info-box-content -->

            </div>
            <!-- /.info-box -->
          </div>
          <!-- <footer style="margin-top: 8rem;">
        <div class="container" >
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <img src="img/logo.png" alt="">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam repellendus sunt praesentium aspernatur iure molestias.</p>
                    <h3>We Accect</h3>
                    <div class="card-area">
                            <i class="fa fa-cc-visa"></i>
                            <i class="fa fa-credit-card"></i>
                            <i class="fa fa-cc-mastercard"></i>
                            <i class="fa fa-cc-paypal"></i>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <h2>Hosting</h2>
                    <ul>
                        <li><a href="#">Web Hosting</a></li>
                        <li><a href="#">Cloud Hosting</a></li>
                        <li><a href="#">CMS Hosting</a></li>
                        <li><a href="#">WordPress Hosting</a></li>
                        <li><a href="#">Email Hosting</a></li>
                        <li><a href="#">VPS Hosting</a></li>
                    </ul>
                    </div>                    
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <h2>Domain</h2>
                    <ul>
                        <li><a href="#">Web Domain</a></li>
                        <li><a href="#">Cloud Domain</a></li>
                        <li><a href="#">CMS Domain</a></li>
                        <li><a href="#">WordPress Domain</a></li>
                        <li><a href="#">Email Domain</a></li>
                        <li><a href="#">VPS Domain</a></li>
                    </ul>
                    </div>                    
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <h2>Newsletter</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur doloremque earum similique fugiat nobis. Facere?</p>
                        <div class="input-group mb-3">
                             <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Enter your Email ..." aria-describedby="basic-addon2"> -->
                            <!-- <span class="input-group-text" id="basic-addon2"><i class="fa fa-long-arrow-right"></i></span> -->
                        <!-- </div>
                        <h2>Follow us on</h2>
                        <p class="socials">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-dribbble"></i>
                            <i class="fa fa-pinterest"></i>
                            <i class="fa fa-twitter"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer> -->
        </div>
      </div>

                  
                  <!-- /.row -->
                  <!-- /.row (main row) -->
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
   </body>
</html>