<?php
include('connect.php');

if (isset($_POST["submit"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
    $incident = mysqli_real_escape_string($conn, $_POST["incident_type"]); // Use incident_type
    $latitude = mysqli_real_escape_string($conn, $_POST["latitude"]);
    $longitude = mysqli_real_escape_string($conn, $_POST["longitude"]);

    // Set the "status" to 0 (pending)
    $status = 0;

    // Create and execute the SQL query using prepared statements
    $query = "INSERT INTO location (name, contact, incident, latitude, longitude, status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssddi", $name, $contact, $incident, $latitude, $longitude, $status);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            
            // Redirect to the login page after successful insertion
            header("Location: input-user.php"); // Change "login.php" to your login page
            exit; // Make sure to exit to prevent further execution of the script
        } else {
            // Query execution failed
            echo "Query Failed: " . mysqli_error($conn);
        }
    } else {
        // Statement preparation failed
        echo "Statement Preparation Failed: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
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
      <link rel="stylesheet" href="../assets/css/style1.css">
      <link rel="stylesheet" href="../asset/css/adminstyle.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="node_module/bootstrap/dist/css/bootstrap.min.css">
      <script src="https://maps.googleapis.com/maps/api/js?" async defer></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCREAptjTrWHQ6ou59AznPrB5P4HK2mv0&libraries=places&callback=initMap" async defer></script>

      

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
        .input-style {
          padding: 10px;
          border: 2px solid #ccc;
          border-radius: 5px;
          font-size: 16px;
          color: #555;
          outline: none;
        }

        .input-style:focus {
          border-color: #007bff;
          box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .toast
    {
        position: absolute; 
        top: 10px; 
        right: 10px;
    }
            </style>
            
   </head>
   <body class="hold-transition sidebar-mini layout-fixed" onload="getLocation();">
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
            <!-- <ul class="navbar-nav ml-auto">
               <li class="active1">
                  <a class="nav-link" href="index.php">Home</a>
               </li> -->
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
                                 <i class="nav-icon fa fa-sign-out"></i>
                                 <p>Logout</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     </li>
                  </ul>
               </nav>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>
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
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                        <h1 class="m-2" style="color: rgb(31,108,163);"> What kind of emergency?</h1>
                           
                    <!-- info user -->
                    <form class="myForm" action="" method="post" autocomplete="off">

                        <input type="text" required placeholder="Name*" name="name" class="input-style" >
                        <input type="text" required placeholder="Contact*" name="contact" class="input-style">
                        
                        <input type="hidden" name="incident_type" id="incident_type">
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        
                        <div class="button-container">
                        <button class="wave-button" name="incident" id="flood-button" type="button">
                            <i class="fas fa-water"></i>
                            <i class="font"><br>Flood</i>
                        </button>
                        <button class="fire-button" name="incident" id="fire-button" type="button">
                            <i class="fas fa-fire"></i>
                            <i class="font"><br>Fire</i>
                        </button>
                        <button class="earth-button" name="incident" id="earthquake-button" type="button">
                            <i class="fas fa-house-crack"></i>
                            <i class="font"><br>Earthquake</i>
                        </button>
                        </div>
                        <div>
                        <button class="gun-button" name="incident" id="typhoon-button" type="button">
                            <i class="fas fa-hurricane"></i>
                            <i class="font"><br>Typhoon</i>
                        </button>
                        </div>

                        <hr class="horizontal-line">
                        <i class="font2" style="color: rgb(31,108,163);"> Click Emergency button to rescue...</i>
                        <hr class="horizontal-line2">
                        <div class="button-circle">
                            <button id="panicButton" name="submit" type="submit" onclick="getLocation()" class="circle-button" disabled>Emergency Call</button>

                        </div>
                    </form>
                      <div id="message"></div>
                    
                  <!-- /.col -->
                  <!-- <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Evacuees</li>
                     </ol>
                  </div> -->

                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->
         <!-- Main content -->
         
      <!-- Card Body -->
      <div id="map"></div>
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
                        url:"insert.php",  
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

<!-- <script>
function getLocation() {
    navigator.geolocation.getCurrentPosition(showPosition);
}

function showPosition(position) {
    document.querySelector('#latitude').value = position.coords.latitude;
    document.querySelector('#longitude').value = position.coords.longitude;
}

getLocation();
</script> -->

      <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 0, lng: 0 },
                zoom: 15
            });
            getLocation();
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            }
        }

        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Fill latitude and longitude fields in the form
            document.querySelector('.myForm input[name="latitude"]').value = latitude;
            document.querySelector('.myForm input[name="longitude"]').value = longitude;

            const userLatLng = new google.maps.LatLng(latitude, longitude);

            map.setCenter(userLatLng);

            const marker = new google.maps.Marker({
                position: userLatLng,
                map: map,
                title: 'Your Location'
            });
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("You Must Allow The Request For Geolocation To Fill Out The Form");
                    break;
            }
        }
    </script>

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
<script>
    // Get references to the buttons and input fields
    const floodButton = document.getElementById('flood-button');
    const fireButton = document.getElementById('fire-button');
    const earthquakeButton = document.getElementById('earthquake-button');
    const typhoonButton = document.getElementById('typhoon-button');
    const panicButton = document.getElementById('panicButton');
    const incidentTypeInput = document.getElementById('incident_type');
    const nameInput = document.querySelector('input[name="name"]');
    const contactInput = document.querySelector('input[name="contact"]');
    const latitudeInput = document.getElementById('latitude');
    const longitudeInput = document.getElementById('longitude');

    // Variable to store the selected incident type
    let selectedIncidentType = '';

    // Function to set the incident type and update the button state
    function setIncidentType(type) {
        selectedIncidentType = type;
        incidentTypeInput.value = type;
        updatePanicButtonState();
    }

    // Add click event listeners to set the incident type when a button is clicked
    floodButton.addEventListener('click', function() {
        setIncidentType('Flood');
    });
    fireButton.addEventListener('click', function() {
        setIncidentType('Fire');
    });
    earthquakeButton.addEventListener('click', function() {
        setIncidentType('Earthquake');
    });
    typhoonButton.addEventListener('click', function() {
        setIncidentType('Typhoon');
    });

    // Function to enable or disable the panic button based on form field input and selected incident type
    function updatePanicButtonState() {
        if (
            nameInput.value.trim() !== '' &&
            contactInput.value.trim() !== '' &&
            selectedIncidentType !== '' &&
            latitudeInput.value !== '' &&
            longitudeInput.value !== ''
        ) {
            panicButton.removeAttribute('disabled'); // Enable the button
        } else {
            panicButton.setAttribute('disabled', 'disabled'); // Disable the button
        }
    }

    // Add input event listeners to the name and contact fields to track changes
    nameInput.addEventListener('input', updatePanicButtonState);
    contactInput.addEventListener('input', updatePanicButtonState);

    // You can capture latitude and longitude here (as previously shown in the code)
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const panicButton = document.getElementById("panicButton");

    panicButton.addEventListener("click", function() {
        // Ask the user for confirmation
        const isConfirmed = confirm("Are you sure you want to make an emergency call?");

        // Check the user's response
        if (isConfirmed) {
            // If the user confirms, perform the emergency call action
            alert("Emergency call initiated.");
            // You can replace this alert with code to initiate the call or any other desired action.
        } else {
            // If the user cancels, do nothing or provide a message
            alert("Emergency call canceled.");
            // You can replace this alert with any desired message or action.
        }
    });
});
</script>
</body>
</html>