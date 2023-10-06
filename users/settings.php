<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Evacuation Center Management System</title>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <a href="../admin/index.php" class="nav-link <?= $page == '../admin/index.php' ? 'active' :"" ?> ">
                           <i class="nav-icon fa fa-tachometer-alt"></i>
                           <p>
                           Dashboard
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="input-user.php" class="nav-link <?= $page == 'input-user.php' ? 'active' :"" ?> ">
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
                              <a href="profile.php" class="nav-link <?= $page == 'profile.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-user"></i>
                                 <p>Profile</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="./login/fpass.php" class="nav-link <?= $page == './login/fpass.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-lock"></i>
                                 <p>Change Password</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="./login/logout.php" class="nav-link <?= $page == './login/logout.php' ? 'active' :"" ?> ">
                                 <i class="fa fa-car"></i>
                                 <p>Log Out</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     </li>
                        </ul>
                     </li>
                  </ul>
               </nav>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>
      <!-- Content Wrapper. Contains page content -->
      

   <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
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
