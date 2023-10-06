<?php
include('connect.php');
?>
<?php

   session_start();
  if (isset($_POST['save'])) {
    
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    
    
    $query = "INSERT INTO evacuee_center_info(name, address, contact)
    VALUES ('$name','$address','$contact')";
              
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Query Failed.");
    }
    $_SESSION['message'] = 'Student Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: evacuation-center.php');
  }
    ?>


<?php

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM evacuee_center_info WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Evacuues Removed Successfully';
  $_SESSION['message_type'] = 'Danger';
  header('Location: evacuation-center.php');
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
                     <li class="nav-item">
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
                     </li>

                     <li class="nav-item">
                        <a href="evacuation-center.php" class="nav-link <?= $page == 'evacuation-center.php' ? 'active' :"" ?> ">
                           <i class="nav-icon fa fa-hotel"></i>
                           <p>
                              Evacuation Center
                           </p>
                        </a>
                     </li>
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
                              <a href="user-logs.php" class="nav-link <?= $page == 'user-logs.php' ? 'active' :"" ?> ">
                                 <i class="nav-icon fa fa-address-book"></i>
                                 <p>User Log</p>
                              </a>
                           </li>
                     <li class="nav-item">
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
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                        <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-hotel"></span> Evacuation Center</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Evacuation <Center></Center></li>
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
                  <!-- form start -->

                  <form action= "evacuation-center.php" method="POST">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="card-header">
                                 <span class="fa fa-hotel"> Evacuation Center Info</span>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Center Name</label>
                                       <input type="text" class="form-control" required placeholder="Center Name" name="name">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Address</label>
                                       <textarea class="form-control" width="100" required placeholder="Address" name="address"></textarea>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Contact Info</label>
                                       <input type="number" class="form-control" required placeholder="Contact Number" name="contact">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <button type="submit" name="save" class="btn btn-primary">Save</button>
                              </div>
                  </form>
               </div>

               <div class="col-md-9" style="border-left: 1px solid #ddd;">
                  <table id="example1" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Center Name</th>
                           <th>Address</th>
                           <th>Conctact</th>
                           <th class="text-right">Action</th>
                        </tr>
                     </thead>
      <tbody>

         <?php
          $query = "SELECT * FROM evacuee_center_info";
          $cnt=1;
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo htmlentities($cnt);?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['contact']; ?></td>
               <td class="text-right">
               <a class="btn btn-sm btn-success" href="edit-evacuation_center.php?id=<?php echo $row['id']?>"><i class="fa fa-edit"></i> Edit</a>
              <a href="evacuation-center.php?id=<?php echo $row['id']?>" class="btn btn-sm btn-danger">
                <i class="far fa-trash-alt"></i></i> Delete</a>
              </a>
            </td>
            </td>
          </tr>
         <?php $cnt=$cnt+1; } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

   </div>
   <!-- /.card-body -->
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
   <script src="../asset/js/bootstrap.bundle.min.js"></script>
   <script src="../asset/js/adminlte.js"></script>
   <!-- DataTables  & Plugins -->
   <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
   <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script>
      $(function () {
         $("#example1").DataTable();
      });
   </script>
</body>
</html>