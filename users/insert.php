<?php 

    //Database Connectivity
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inet_evacuation_db";
    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
      die ('connection faild:'.$conn->connect_error);
    }

    //Insert Datails in Database
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $sql = "INSERT INTO users (username,contactno)VALUES('$username','$contactno')"; 

    if ($conn->query($sql)===TRUE) {
        echo "message sent successfully";     
    }else{
        echo "Error: ".$sql."<br>".$conn->error;
    }
    
    $conn->close();
?>