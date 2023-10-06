<?php
session_start();
include('connect.php');

if(isset($_POST['update_profile']))
{
   // Handle image upload
   $targetDir = "profile_pictures/"; // Directory where you want to store uploaded images
   $profilePicture = $targetDir . basename($_FILES["profile_picture"]["name"]);
   move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profilePicture);

   $username = $_POST['username'];
   $contactno = $_POST['contactno'];
   $email = $_POST['email'];

   // Update the user's profile with the image path
   $query = mysqli_query($conn, "UPDATE enduser SET username='$username', contactno='$contactno', email='$email', profile_picture='$profilePicture' WHERE id='" . $_SESSION['id'] . "'");
   if($query)
   {
      echo "<script>alert('Your info has been updated');</script>";
      // Redirect to the profile page after updating the profile
      header("Location: profile.php"); // Change "profile.php" to the desired page
      exit; // Make sure to exit to prevent further execution of the script
   }
}

// Fetch the user's information
$query = "SELECT * FROM enduser WHERE id='" . $_SESSION['id'] . "'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Add a redirect to the login page if the user is not logged in
if (!isset($_SESSION['id'])) {
   header("Location: login.php"); // Change "login.php" to the login page URL
   exit;
}
?>




<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Evacuation Center Management System</title>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="../asset/css/adminlte.min.css">
      <link rel="stylesheet" href="../asset/css/style.css">
      <link rel="stylesheet" href="../style1.css">
      <link rel="stylesheet" href="../asset/css/adminstyle.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <!-- datatables new -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery library -->
      <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
      <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.css">
      
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
        .btn-outline-primary {
          border-color: #26B4FF;
          background  : transparent;
          color       : #26B4FF;
         }


         .ui-w-80 {
             width : 80px !important;
             height: auto;
         }

         .btn-default {
             border-color: rgba(24, 28, 33, 0.1);
             background  : rgba(0, 0, 0, 0);
             color       : #4E5155;
         }

         label.btn {
             margin-bottom: 0;
         }

         .btn-outline-primary {
             border-color: #26B4FF;
             background  : transparent;
             color       : #26B4FF;
         }

         .btn {
             cursor: pointer;
         }

         .text-light {
             color: #babbbc !important;
         }

         .btn-facebook {
             border-color: rgba(0, 0, 0, 0);
             background  : #3B5998;
             color       : #fff;
         }

         .btn-instagram {
             border-color: rgba(0, 0, 0, 0);
             background  : #000;
             color       : #fff;
         }

         .card {
             background-clip: padding-box;
             box-shadow     : 0 1px 4px rgba(24, 28, 33, 0.012);
         }

         .row-bordered {
             overflow: hidden;
         }

         .account-settings-fileinput {
             position  : absolute;
             visibility: hidden;
             width     : 1px;
             height    : 1px;
             opacity   : 0;
         }

         .account-settings-links .list-group-item.active {
             font-weight: bold !important;
         }

         html:not(.dark-style) .account-settings-links .list-group-item.active {
             background: transparent !important;
         }

         .account-settings-multiselect~.select2-container {
             width: 100% !important;
         }

         .light-style .account-settings-links .list-group-item {
             padding     : 0.85rem 1.5rem;
             border-color: rgba(24, 28, 33, 0.03) !important;
         }

         .light-style .account-settings-links .list-group-item.active {
             color: #4e5155 !important;
         }

         .material-style .account-settings-links .list-group-item {
             padding     : 0.85rem 1.5rem;
             border-color: rgba(24, 28, 33, 0.03) !important;
         }

         .material-style .account-settings-links .list-group-item.active {
             color: #4e5155 !important;
         }

         .dark-style .account-settings-links .list-group-item {
             padding     : 0.85rem 1.5rem;
             border-color: rgba(255, 255, 255, 0.03) !important;
         }

         .dark-style .account-settings-links .list-group-item.active {
             color: #fff !important;
         }

         .light-style .account-settings-links .list-group-item.active {
             color: #4E5155 !important;
         }

         .light-style .account-settings-links .list-group-item {
             padding     : 0.85rem 1.5rem;
             border-color: rgba(24, 28, 33, 0.03) !important;
         }
         .card-body.text-center img {
    max-width: 100%; /* Adjust the width as needed */
    height: auto;
}
         footer {
            background: #212529;
            margin-top: 100px;
            padding: 86px 0;
         }
         .single-content {
            text-align: center;
            padding: 115px 0;
         }
         .single-box p {
            color: #fff;
            line-height: 1.9;
         }
         .single-box h3 {
            font-size: 16px;
            font-weight: 700;
            color: #fff;
         }
         .single-box .card-area i {
            color: #ffffff;
            font-size: 20px;
            margin-right: 10px;
         }
         .single-box ul {
            list-style: none;
            padding: 0;
         }
         .single-box ul li a {
            text-decoration: none;
            color: #fff;
            line-height: 2.5;
            font-weight: 100;
         }
         .single-box h2 {
            color: #fff;
            font-size: 20px;
            font-weight: 700;
         }
         #basic-addon2 {
            background: #fe1e4f;
            color: #fff;
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
                        <a href="../admin/index.php" class="nav-link <?= $page == '../admin/index.php' ? 'active' :"" ?> ">
                           <i class="nav-icon fa fa-tachometer-alt"></i>
                           <p>
                           Dashboard
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="../users/input-user.php" class="nav-link <?= $page == '../users/input-user' ? 'active' :"" ?> ">
                           <i class="nav-icon fa fa-hotel"></i>
                           <p>
                              Emergency Call
                           </p>
                        </a>
                     </li>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-cog"></i>
                           <p>
                              Settings
                           </p>
                              <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="../admin/profile.php" class="nav-link <?= $page == '../admin/profile.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-user"></i>
                                 <p>Profile</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="./login/fpass.php" class="nav-link <?= $page == './login/fpass.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-user"></i>
                                 <p>Change Password</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="./login/logout.php" class="nav-link <?= $page == './login/logout.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-sign-out"></i>
                                 <p>Logout</p>
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
                        <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-address-card"></span> Profile settings</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Evacuees</li>
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
         

    <div class="container light-style flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-4">
        User Profile
    </h4>

    <!-- Form for uploading a new profile picture -->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-4">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body text-center">
                              

                                <!-- Display the user's current profile picture -->
                                 <?php 
                                  $sql = "SELECT image_url FROM enduser ORDER BY id DESC";
                                  $res = mysqli_query($conn,  $sql);

                                  if (mysqli_num_rows($res) > 0) {
                                    while ($enduser = mysqli_fetch_assoc($res)) {  ?>
                                <img src="uploads/<?=$enduser['image_url']?>" alt="" class="ui-w-100">
                                <?php } }?>

                                <!-- Input element for selecting a new profile picture -->
                                <label class="btn btn-outline-primary d-block mt-3">
                                    Upload new photo
                                    <input type="file" id="profile_picture" class="account-settings-fileinput" name="my_image">
                                </label>

                                <!-- Submit button for uploading the new profile picture -->
                                <button type="submit" name="upload" class="btn btn-default md-btn-flat d-block mt-2" value="Upload">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
             </form>


        </form>
        <div class="col-md-8">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="account-general">
                    <div class="card-body">
                        <form method="post" action="profile.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control mb-1" id="username" name="username" value="<?php echo $row['username']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Contact</label>
                                <input type="text" class="form-control" id="contactno" name="contactno" value="<?php echo $row['contactno']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">E-mail</label>
                                <input type="text" class="form-control mb-1" id="email" name="email" value="<?php echo $row['email']; ?>">
                            </div>
                            <div class="text-right mt-3">
                                <button type="submit" name="update" class="btn btn-primary">Save changes</button>&nbsp;
                                <button type="button" class="btn btn-default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



  
        
   <!-- ./wrapper -->
   
   <!-- jQuery -->
   <script src="../plugins/jquery/jquery.min.js"></script>
   <script src="../asset/jquery/jquery.min.js"></script>
   <script src="../asset/js/bootstrap.bundle.min.js"></script>
   <script src="../asset/js/adminlte.js"></script>
   <!-- Bootstrap 4 -->
   <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- DataTables  & Plugins -->
   <script src="asset/tables/datatables/jquery.dataTables.min.js"></script>
   <script src="asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <!-- new datatables & plugins -->
   <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
   <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script src="../plugins/jszip/jszip.min.js"></script>
   <script src="../plugins/pdfmake/pdfmake.min.js"></script>
   <script src="../plugins/pdfmake/vfs_fonts.js"></script>
   <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
   <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
   <script src="../plugins/datatables-buttons/js/buttons.colVis.js"></script>
   <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
