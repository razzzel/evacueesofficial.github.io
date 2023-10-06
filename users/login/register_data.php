<?php

@include 'config.php';
session_start();
if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contactno = filter_var($_POST['contactno'], FILTER_SANITIZE_NUMBER_INT);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];

    $nameErr = $emailErr = $contactErr = $passwordErr = $confirmPasswordErr = $birthdayErr =$genderErr = '';

    if (empty($username)) {
    $nameErr = 'Name is required';
    } else if (!preg_match('/^[A-Za-zñÑ]+(?: [A-Za-zñÑ]+)*$/', $username)) {
    $nameErr = 'Example: Juan Cruz';
    }

    if (empty($email)) {
        $emailErr = 'Email is required';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = 'Invalid email format';
    } else {
        // Check if email already exists in the database
        $result = mysqli_query($conn, "SELECT * FROM enduser WHERE email='$email'");
        if (mysqli_num_rows($result) > 0) {
            $emailErr = 'Email already exists';
        }
    }

    if (empty($birthday)) {
    $birthdayErr = 'Birthday is required';
    } else if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthday)) {
        $birthdayErr = 'Invalid birthday format (YYYY-MM-DD)';
    }

    if (empty($gender)) {
    $genderErr = 'Gender is required';
    }

    if (empty($contactno)) {
        $contactErr = 'Contact Number is Required';
    }

    if (empty($password)) {
        $passwordErr = 'Password is required';
    } else if (strlen($password) < 6) {
        $passwordErr = 'Password must be at least 6 characters';
    }

    if (empty($confirm_password)) {
        $confirmPasswordErr = 'Confirm password is required';
    } else if ($password !== $confirm_password) {
        $confirmPasswordErr = 'Passwords do not match';
    }

    // Hash password and insert user into the database
    if (empty($nameErr) && empty($emailErr) && empty($contactErr) && empty($passwordErr) && empty($confirmPasswordErr) && empty($birthdayErr) && empty($genderErr)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Save user details to the database
        // ...
        $insert = "INSERT INTO enduser(username, contactno, email, password, birthday, gender) VALUES('$username','$contactno','$email','$hashed_password','$birthday','$gender')";
        mysqli_query($conn, $insert);
        // Set success message
        $_SESSION['success'] = 'Registration successful';
        header('Location: login.php');
        exit;
    }
}
?>
