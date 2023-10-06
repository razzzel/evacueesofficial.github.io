<?php
include('connect.php');

if(isset($_GET['id']) && isset($_GET['status'])) {
  $id = $_GET['id'];
  $status = $_GET['status'];
  $query = "UPDATE location SET status = $status WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed: " . mysqli_error($conn)); // Display the error message for debugging
  }
  
  header('Location: location.php');
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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- script -->
      <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
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
              #searchInput {
              width: 100%; /* Make it fill the entire table cell */
              box-sizing: border-box; /* Include padding and border in the width */
              margin-bottom: 5px;
            }

            /* Media query for responsiveness */
            @media screen and (max-width: 768px) {
              /* Adjust the margin-left for smaller screens */
              #searchInput {
                margin-left: 0; /* Remove the margin for smaller screens */
              }
            }
             @media (max-width: 768px) {
       #toggleTableBtn {
           margin-left: auto;
           margin-right: auto;
           display: block;
       }
   }

.toast
    {
        position: absolute; 
        top: 10px; 
        right: 10px;
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
                        <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-address-card"></span> Location of Evacuees</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Location</li>
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
                  <!-- Include jQuery library -->




<div class="toast" id="myToast" data-bs-autohide="true">
            <div class="toast-header">
                <strong class="me-auto"><i class="bi-bell-fill"></i>notification</strong>
                <small>1 sec ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <p id="error_message"></p>
            </div>  
        </div>
    
                        <?php
require_once("connect.php");
$query = "SELECT * FROM location ORDER BY id DESC";
$cnt = 1;
$result_tasks = mysqli_query($conn, $query);
?>

<div class="card">
   <div class="card-body">
       <div class="col-md-12">
           
           <button style="position: relative; margin-bottom: 10px;" id="printBtn" class="fas fa-print">Print</button>
           <div style="position: relative; margin-bottom: 5px;">
               <input type="text" id="searchInput" class="form-control form-control-sm" style="width: 10%; margin-left: 90rem;" placeholder="Search...">
               <button  id="toggleTableBtn" class="btn btn-primary">Show Done</button>
           </div>
       </div>
       <div class="table-container" id="pendingTableContainer">
           <table id="pendingTable" class="table table-bordered table-striped">
               <thead>
                   <tr>
                       <th>List</th>
                       <th>Details User</th>
                       <th>Maps</th>
                   </tr>
               </thead>
               <tbody>
                   <?php while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                       <?php if ($row['status'] == 0) { ?>
                           <tr>
                               <td></td> <!-- Add an empty cell for the "List" column -->
                               <td></td> <!-- Add an empty cell for the "Details User" column -->
                               <td rowspan="7" style="width: 750px; height: 350px;">
                                   <iframe src='https://www.google.com/maps?q=<?php echo $row["latitude"]; ?>,<?php echo $row["longitude"]; ?>&hl=es;z=14&output=embed' style="width: 100%; height: 100%;"></iframe>
                               </td>
                           </tr>
                           <tr>
                               <th>#</th>
                               <td><?php echo htmlentities($cnt); ?></td>
                           </tr>
                           <tr>
                               <th>Date</th>
                               <td class="print-section"><?php echo $row['date']; ?></td>
                           </tr>
                           <tr>
                               <th>Name</th>
                               <td id="name" class="print-section"><?php echo $row['name']; ?></td>
                           </tr>
                           <tr>
                               <th>Contact</th>
                               <td id="contact"class="print-section"><?php echo $row['contact']; ?></td>
                           </tr>
                           <tr>
                               <th>Incident</th>
                               <td class="print-section"><?php echo $row['incident']; ?></td>
                           </tr>
                           <tr>
                               <th>Status</th>
                               <td>
                                   <?php
                                   echo '<a class="btn btn-sm btn-danger" href="location.php?id=' . $row['id'] . '&status=1">Pending</a>';
                                   ?>
                               </td>
                           </tr>
                           <?php $cnt = $cnt + 1; ?>
                       <?php } ?>
                   <?php } ?>
               </tbody>
           </table>
       </div>

       <div class="table-container" id="doneTableContainer" style="display: none;">
           <table id="doneTable" class="table table-bordered table-striped">
               <thead>
                   <tr>
                       <th>List</th>
                       <th>Details User</th>
                       <th>Maps</th>
                   </tr>
               </thead>
               <tbody>
                   <?php
                   // Reset the counter
                   $cnt = 1;
                   // Rewind the result set to the beginning
                   mysqli_data_seek($result_tasks, 0);
                   while ($row = mysqli_fetch_assoc($result_tasks)) {
                       if ($row['status'] == 1) { ?>
                           <tr>
                               <td></td> <!-- Add an empty cell for the "List" column -->
                               <td></td> <!-- Add an empty cell for the "Details User" column -->
                               <td rowspan="7" style="width: 750px; height: 350px;">
                                   <iframe src='https://www.google.com/maps?q=<?php echo $row["latitude"]; ?>,<?php echo $row["longitude"]; ?>&hl=es;z=14&output=embed' style="width: 100%; height: 100%;"></iframe>
                               </td>
                           </tr>
                           <tr>
                               <th>#</th>
                               <td><?php echo htmlentities($cnt); ?></td>
                           </tr>
                           <tr>
                               <th>Date</th>
                               <td class="print-section"><?php echo $row['date']; ?></td>
                           </tr>
                           <tr>
                               <th>Name</th>
                               <td  id="name" class="print-section"><?php echo $row['name']; ?></td>
                           </tr>
                           <tr>
                               <th>Contact</th>
                               <td id="contact" class="print-section"><?php echo $row['contact']; ?></td>
                           </tr>
                           <tr>
                               <th>Incident</th>
                               <td class="print-section"><?php echo $row['incident']; ?></td>
                           </tr>
                           <tr>
                               <th>Status</th>
                               <td>
                                   <?php
                                   echo '<a class="btn btn-sm btn-success" href="location.php?id=' . $row['id'] . '&status=0">Done</a>';
                                   ?>
                               </td>
                           </tr>
                           <?php $cnt = $cnt + 1; ?>
                       <?php } ?>
                   <?php } ?>
               </tbody>
           </table>
       </div>
   </div>
</div>
<script>
    // Function to fetch and update the tables
    function updateTables() {
        $.ajax({
            url: 'connect.php', // Replace with the actual URL to fetch updated data
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Update the tables with the new data
                // You may need to customize this part based on your data structure
                $('#pendingTable tbody').html(data.pendingTableHTML);
                $('#doneTable tbody').html(data.doneTableHTML);
            },
            error: function (error) {
                console.error('Error fetching data: ' + JSON.stringify(error));
            }
        });
    }

    // Periodically update the tables (e.g., every 5 seconds)
    setInterval(updateTables, 5000); // Adjust the interval as needed
</script>
<script>  
        $(document).ready(function(){  
            $('#submit').click(function(){  
                var name = $('#name').val();  
                var contact = $('#contact').val();  
                if(name == '' || contact == ''){  
                    $('#error_message').html("All Fields are required");
                    $('.toast').toast('show');
                }else{  
                    $.ajax({  
                        url:"connect.php",  
                        method:"POST",  
                        data:{name:name, contact:contact},  
                        success:function(data){
                            $('.toast').toast('show');
                            $('#error_message').html(data);  
                        }  
                    });  
                }  
            });  
        });  
    </script>  

<script>
    document.getElementById('toggleTableBtn').addEventListener('click', function() {
        const pendingTableContainer = document.getElementById('pendingTableContainer');
        const doneTableContainer = document.getElementById('doneTableContainer');
        
        if (pendingTableContainer.style.display === 'none') {
            // Show the Pending table and hide the Done table
            pendingTableContainer.style.display = 'block';
            doneTableContainer.style.display = 'none';
            this.textContent = 'Show Done';
        } else {
            // Show the Done table and hide the Pending table
            doneTableContainer.style.display = 'block';
            pendingTableContainer.style.display = 'none';
            this.textContent = 'Show Pending';
        }
    });
</script>




<script>
   // JavaScript to toggle table visibility
   const doneTable = document.getElementById("doneTable");
   const pendingTable = document.getElementById("pendingTable");
   const searchInput = document.getElementById("searchInput");

   // Initially, show both tables
   doneTable.style.display = "table";
   pendingTable.style.display = "table";

   searchInput.addEventListener("keyup", function () {
       const searchTerm = searchInput.value.toLowerCase();

       // Filter Done Table
       Array.from(doneTable.getElementsByTagName("tr")).forEach(function (row) {
           if (row.textContent.toLowerCase().includes(searchTerm) || searchTerm === "") {
               row.style.display = "table-row";
           } else {
               row.style.display = "none";
           }
       });

       // Filter Pending Table
       Array.from(pendingTable.getElementsByTagName("tr")).forEach(function (row) {
           if (row.textContent.toLowerCase().includes(searchTerm) || searchTerm === "") {
               row.style.display = "table-row";
           } else {
               row.style.display = "none";
           }
       });
   });
</script>

<script>
// Check if new information is received (you may need to implement this logic)
var isNewInformationReceived = true; // Replace with your actual logic

if (isNewInformationReceived) {
    // Show a SweetAlert2 notification
    Swal.fire({
        title: 'New Information Received!',
        text: 'You have new data in the table.',
        icon: 'success', // You can change the icon to 'info' or 'warning' depending on the type of notification you want.
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
}
</script>

   <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   </div>
   <!-- ./wrapper -->
   </div>
   
   
   <!-- print -->
<script type="text/javascript">

document.getElementById('printBtn').addEventListener('click', () => {
    const printContents = document.querySelectorAll('.print-section');
    const printWindow = window.open('', '', 'width=800,height=600');

    printWindow.document.open();
    printWindow.document.write(`
        <html>
        <head>
            <title>Print</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }
                .print-section {
                    margin-bottom: 10px;
                }
                .header {
                    font-weight: bold;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    padding: 8px;
                    border: 1px solid #ddd;
                    text-align: left;
                }
            </style>
        </head>
        <body>
    `);

    // Define the headers for the columns
    printWindow.document.write(`
        <table>
            <tr>
                <th class="header">Date</th>
                <th class="header">Name</th>
                <th class="header">Contact</th>
                <th class="header">Incident</th>
            </tr>
    `);

    // Loop through the print sections and organize the data into rows
    printContents.forEach((element, index) => {
        if (index % 4 === 0) {
            // Start a new row for every 4th element (4 columns per row)
            printWindow.document.write('<tr>');
        }

        printWindow.document.write('<td>' + element.innerHTML + '</td>');

        if (index % 4 === 3) {
            // End the row after the 4th element
            printWindow.document.write('</tr>');
        }
    });

    // Close the table and body
    printWindow.document.write(`
        </table>
        </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.print();
    printWindow.close();
});


</script>
<!-- search -->
<script>
       document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("searchInput");
    const dataTable = document.getElementById("dataTable");
    const rows = dataTable.getElementsByTagName("tr");

    searchInput.addEventListener("keyup", function() {
        const searchTerm = searchInput.value.toLowerCase();

        for (let i = 1; i < rows.length; i += 7) {
            let foundInGroup = false;

            for (let j = 0; j < 7; j++) {
                const currentRow = rows[i + j];
                if (!currentRow) break;

                const cells = currentRow.getElementsByTagName("td");

                for (let k = 0; k < cells.length; k++) {
                    const cellText = cells[k].textContent.toLowerCase();

                    if (cellText.includes(searchTerm)) {
                        foundInGroup = true;
                        break;
                    }
                }

                if (foundInGroup) break;
            }

            const statusCell = rows[i].querySelector("td:last-child a");
            const statusText = statusCell ? statusCell.textContent.toLowerCase() : "";

            if (foundInGroup || statusText.includes(searchTerm)) {
                for (let j = 0; j < 7; j++) {
                    const currentRow = rows[i + j];
                    if (!currentRow) break;
                    currentRow.style.display = "";
                }
            } else {
                for (let j = 0; j < 7; j++) {
                    const currentRow = rows[i + j];
                    if (!currentRow) break;
                    currentRow.style.display = "none";
                }
            }
        }
    });
});
    </script>
    <!-- notif -->

    <!-- <script>
// Function to fetch and update data from the server
function fetchData() {
  $.ajax({
    url: '../users/input-user.php', // Replace with the URL of your PHP script
    dataType: 'json',
    success: function(data) {
      // Check if there is new data
      if (data.isNewData) {
        // Update the table with the new data
        $('#dataTable tbody').html(data.tableHTML);
        
        // Show a SweetAlert2 notification for new data
        Swal.fire({
          title: 'New Information Received!',
          text: 'You have new data in the table.',
          icon: 'success',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'OK'
        });
      }
    },
    complete: function() {
      // Schedule the next data fetch after a delay (e.g., every 5 seconds)
      setTimeout(fetchData, 5000); // 5000 milliseconds = 5 seconds
    }
  });
}

// Call fetchData for the first time to initiate the process
fetchData();
</script> -->
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
    $("#dataTable").DataTable({
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
