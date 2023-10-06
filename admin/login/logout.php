<?php
session_start();
include("config.php");
$_SESSION["username"]=="";
date_default_timezone_set('Asia/Manila');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($conn,"UPDATE userlog  SET logout = '$ldate' WHERE userEmail = '".$_SESSION["username"]."' ORDER BY id DESC LIMIT 1");
session_unset();
$_SESSION['errmsg']="";
?>
<script>
document.location="login.php";
</script>
