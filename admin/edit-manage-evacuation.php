<?php
include('update-manage-evac.php');
?>
<!DOCTYPE HTML>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>A&A Mechanics |Edit Total</title>
      <link rel = "icon" href = 
         "../admin/asset/img/logo1.png" 
        type = "image/x-icon">  
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="../asset/css/adminlte.min.css">
      <link rel="stylesheet" href="../asset/css/style.css">
      <link rel="stylesheet" href="../style1.css">
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
            </style>
            
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: rgba(62,88,113);">
                   <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="../index.php">
                  <i class="fas fa-power-off"></i>
                  </a>
               </li>
            </ul>
         </nav>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgba(44,62,80);">
                        <!-- Brand Logo -->
            <a href="index.php" class="brand-link animated swing">
            <img src="../asset/img/3.png" alt="DSMS Logo" width="200" style="margin-top: -20px;margin-bottom: -60px;">
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
                  <div class="col-sm-6 animated bounceInRight">
                     <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-address-card"></span> Edit Customer</h1>
                  </div>
                  <!-- /.col -->
                  
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Customer</li>
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
                     <h3 class="card-title">Edit Customer</h3>
                  </div>
                  <div class="valid_error"></div>
                  <!-- /.card-header -->
                  <!-- form start -->


            <div class="card-body">
            <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <div class="col-md-3">
                           <div class="form-group">
                              <label>First Name</label>
                              <input type="text" class="form-control" required placeholder="First Name" name="firstname" autocomplete="off" value="<?php echo $row['firstname']; ?>">
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Last Name</label>
                              <input type="text" class="form-control" required placeholder="Last Name" name="lastname" autocomplete="off" value="<?php echo $row['lastname']; ?>">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Middle Name</label>
                              <input type="text" class="form-control" placeholder="Middle Name" name="middlename" autocomplete="off" value="<?php echo $row['middlename']; ?>">
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Contact</label>
                              <input type="number" class="form-control" placeholder="Contact" name="contact" autocomplete="off" value="<?php echo $row['contact']; ?>">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Age</label>
                              <input type="text" class="form-control" required placeholder="Age" name="age" autocomplete="off" value="<?php echo $row['age']; ?>">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Gender</label>
                              <input type="text" class="form-control" required placeholder="Gender" name="gender" autocomplete="off" value="<?php echo $row['gender']; ?>">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Barangay</label>
                              <input type="text" class="form-control" required placeholder="Barangay Name" name="brgy_name" autocomplete="off" value="<?php echo $row['brgy_name']; ?>">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Address</label>
                              <input type="text" class="form-control" required placeholder="Address" name="address" autocomplete="off" value="<?php echo $row['address']; ?>">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Head of Family</label>
                              <input type="text" class="form-control" required placeholder="Head of Family" name="head_of_family" autocomplete="off" value="<?php echo $row['head_of_family']; ?>">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Evacuation Center</label>
                              <input type="text" class="form-control" required placeholder="Evacuation Center" name="center_id" autocomplete="off" value="<?php echo $row['center_id']; ?>">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Family Members</label>
                              <input type="text" class="form-control" required placeholder="Family Members" name="labor" autocomplete="off" value="<?php echo $row['labor']; ?>">
                           </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                     <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
   <script src="asset/jquery/jquery.min.js"></script>
   <script src="asset/js/adminlte.js"></script>
   <script src="asset/js/valid.js"></script>
   <script>
  function checkTextareaLength(textarea) {
    var maxLength = parseInt(textarea.getAttribute('maxlength'));
    var currentLength = textarea.value.length;

    if (currentLength > maxLength) {
      textarea.value = textarea.value.substring(0, maxLength); // Truncate the text
      currentLength = maxLength;
    }

    document.getElementById('charCount').textContent = 'Characters: ' + currentLength + '/' + maxLength;
  }
</script>
</body>

</html>