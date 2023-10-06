<?php
include('connect.php');
?>
<?php


if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM evacuee_information WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Evacuues Removed Successfully';
  $_SESSION['message_type'] = 'Danger';
  header('Location: manage-evacuees.php');
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
        footer {
            background: #212529;
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
                        <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-address-card"></span> Manage Evacuees</h1>
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
         
            <div class="card">
               <div class="card-body">
               <div class="col-md-12">
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Date</th>
                           <th>Name</th>
                           <th>Contact</th>
                           <th>Age</th>
                           <th>Gender</th>
                           <th>Address</th>
                           <th>Head Of Family Name</th>
                           <!-- <th>Evacuation Center Location</th> -->
                           <th>Number of Member Family</th>
                           <th>Number of Children</th>
                           <th>Number of Senior</th>
                           <th>Action</th>
                        </tr>
                     </thead>
         <tbody>

          <?php
          require_once ("connect.php");
          $query = "SELECT * FROM evacuee_information";
          $cnt=1;
          $result_tasks = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo htmlentities($cnt);?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['head_of_family']; ?></td>
            <!-- <td><?php echo $row['center_id']; ?></td> -->
            <td><?php echo $row['member']; ?></td>
            <td><?php echo $row['children']; ?></td>
            <td><?php echo $row['senior']; ?></td>
               <td class="text-right">
               <a class="btn btn-sm btn-success" href="edit-manage-evacuation.php?id=<?php echo $row['id']?>"><i class="fa fa-edit"></i> Edit</a>
              <a href="manage-evacuees.php?id=<?php echo $row['id']?>" class="btn btn-sm btn-danger">
                <i class="far fa-trash-alt"></i></i> Delete</a>
              </a>
            </td>
          </tr>
          <?php $cnt=$cnt+1; } ?>
        </tbody>
     </table>

   <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   </div>
   <!-- ./wrapper -->
   </div>

<!-- <footer>
        <div class="container">
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
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Enter your Email ..." aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-long-arrow-right"></i></span>
                        </div>
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
