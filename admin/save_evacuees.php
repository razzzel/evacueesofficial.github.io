<?php

  include('connect.php');

  if (isset($_POST['evacuues'])) {
    
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
    

    $query = "INSERT INTO evacuee_information(lastname, firstname, middlename, contact, age, gender, address, brgy_name, head_of_family, center_id,) 
    VALUES ('$lastname','$firstname','$middlename','$contact','$age','$gender','$brgy_name','$address','$head_of_family','$center_id')";
              
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Query Failed.");
    }

  }

  ?>
