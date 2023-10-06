<?php
//Include file koneksi, untuk koneksikan ke database
include "connect.php";

function input($row) {
    $row = trim($row);
    $row = stripslashes($row);
    $row = htmlspecialchars($row);
    return $row;
}


if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $sql = "SELECT * FROM evacuee_information WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

//Cek apakah ada kiriman form dari method post
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $id=htmlspecialchars($_POST["id"]);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $contact = $_POST['contact'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $brgy_name = $_POST['brgy_name'];
    $address = $_POST['address'];
    $head_of_family = $_POST['head_of_family'];
    $center_id = $_POST['center_id'];

    
    

    //Query update data pada tabel manage_tb
    $sql = "UPDATE evacuee_information SET
            firstname='$firstname',
            lastname='$lastname',
            middlename='$middlename',
            contact='$contact',
            contact='$contact',
            age='$age',
            gender='$gender',
            brgy_name='$brgy_name',
            address='$address',
            head_of_family='$head_of_family',
            center_id='$center_id'
            WHERE id=$id";

    //Mengeksekusi atau menjalankan query diatas
    $result = mysqli_query($conn, $sql);

    //Kondisi apakah query berhasil dijalankan atau tidak
    if ($result) {
       echo "<script> window.location.href='manage-evacuees.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Data Gagal dihapus.</div>";
    }
}
?>


