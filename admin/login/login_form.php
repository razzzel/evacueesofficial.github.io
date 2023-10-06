<?php
session_start();
include 'config.php';

// Redirect to dashboard if user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

// Initialize variables
$email = $password = '';
$emailErr = $passwordErr = '';

// Form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle login form submission
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];
        
        // Validate email and password
        if (empty($email)) {
            $emailErr = 'Email is required';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'Invalid email format';
        }
        if (empty($password)) {
            $passwordErr = 'Password is required';
        }
        
        // Check if email and password are valid
        if (empty($emailErr) && empty($passwordErr)) {
            $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['password'])) 
                {
                  if($row>0)
                     {
                     $extra="../index.php";
                     $_SESSION['user_id']=$_POST['email'];
                     $_SESSION['id']=$row['id'];
                     $_SESSION['username']=$row['username'];
                     $status=1;
                     $log=mysqli_query($conn,"insert into userlog(userEmail,status) values('".$_SESSION['username']."','$status')");
                     $host=$_SERVER['HTTP_HOST'];
                     $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
                     header("location:http://$host$uri/$extra");
                     exit();
                     }
                     
               
            //         // Login successful, set session variables and redirect to dashboard
            //         $_SESSION['user_id'] = $row['id'];
            //         header('Location: ../index.php');
            //         exit;
                } else {
                    $passwordErr = 'Incorrect password';
                }
            } else {
                $emailErr = 'Email not found';
            }
        }
    }
 }
?>