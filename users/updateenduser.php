<?php
//Include file koneksi, untuk koneksikan ke database


function input($row) {
    $row = trim($row);
    $row = stripslashes($row);
    $row = htmlspecialchars($row);
    return $row;
}


if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $sql = "SELECT * FROM enduser WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

//Cek apakah ada kiriman form dari method post
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $id=htmlspecialchars($_POST["id"]);
    $username = $_POST['username'];
    $contactno = $_POST['contactno'];
    
    

    //Query update data pada tabel manage_tb
    $sql = "UPDATE evacuee_center_info SET
            username='$username',
            contactno='$contactno'
            WHERE id=$id";

    //Mengeksekusi atau menjalankan query diatas
    $result = mysqli_query($conn, $sql);

    //Kondisi apakah query berhasil dijalankan atau tidak
    if ($result) {
       echo "<script> window.location.href='evacuation-center.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Data Gagal dihapus.</div>";
    }
}
?>
