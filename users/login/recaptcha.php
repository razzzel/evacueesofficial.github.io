<?php
if (isset($_POST['g-recaptcha-response'])) {
    $secretkey = '6LfrlygoAAAAAMugweAMpqy4-xzyzHYO_XzWJ1II';
    $ip = $_SERVER['REMOTE_ADDR']; // Corrected spelling of REMOTE_ADDR
    $response = $_POST['g-recaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$ip";
    $fire = file_get_contents($url);
    $data = json_decode($fire);

    if ($data->success == true) { // Corrected syntax here
        echo "Success";
    } else {
        echo "Fill recaptcha";
    }
} else {
    echo "Recaptcha Error";
}
?>
