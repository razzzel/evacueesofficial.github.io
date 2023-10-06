<?php 
include('update-barangay.php');

?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title></title>
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
            <img src="../asset/img/logo1.png" alt="DSMS Logo" width="200" style="margin-top: -20px;margin-bottom: -60px;">
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
                  <a href="lgu.php" class="nav-link <?= $page == 'lgu.php' ? 'active' :"" ?>">
                     <i class="nav-icon fa fa-landmark"></i>
                     <p>
                        LGU Settings
                     </p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-user-lock"></i>
                     <p>
                        Users
                     </p>
                        <i class="right fas fa-angle-left"></i>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item">
                        <a href="add-user.php" class="nav-link <?= $page == 'add-user.php' ? 'active' :"" ?>">
                           <i class="nav-icon fa fa-plus"></i>
                           <p>New</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="manage-user.php" class="nav-link <?= $page == 'manage-user.php' ? 'active' :"" ?> ">
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
                        <a href="gender-report.php" class="nav-link <?= $page == 'gender-report.php' ? 'active' :"" ?> ">
                           <i class="nav-icon fa fa-venus-mars"></i>
                           <p>Evacuees by Gender</p>
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
                     <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-address-card"></span> Edit Evacuation</h1>
                  </div>
                  <!-- /.col -->

                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Evacuation</li>
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
                     <h3 class="card-title">Evacuation Center Edit</h3>
                  </div>
                  <!-- form start -->

   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <div class="card-body">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <input type="hidden" name="id" value="<?php echo $id; ?>">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Barangay Name</label>
                     <input type="text" class="form-control" required placeholder="Barangay Name" name="name" value="<?php echo $row['name']; ?>">
                  </div>
               </div>
              </div>
            </div>
         </div>
      </div>
   </div>
   <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
      <div class="card-footer">
       <input type="submit" name="update" class="btn btn-primary" value="Save Edit">
    </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/header.php'); ?>
<?php include('includes/footer.php'); ?>