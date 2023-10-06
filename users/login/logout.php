<?php
session_start();
include("config.php");

date_default_timezone_set('Asia/Manila');
$ldate=date( 'd-m-Y h:i:s A', time () );

session_unset();
$_SESSION['errmsg']="";
?>
<script>
document.location="login.php";
</script>
