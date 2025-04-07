<?php

// Connect to the database
include "../includes/connect.php";

// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// print form variables
// echo $_POST['first_name'];
// echo $_POST['last_name'];
// echo $_POST['dob'];
// echo $_POST['address'];
// echo $_POST['province'];
// echo $_POST['city'];
// echo $_POST['gender'];
// echo $_POST['postal_code'];
// echo $_POST['email'];
// echo $_POST['phone_number'];
// echo $_POST['password'];
// echo $_POST['repeat_password'];




// Check if all required fields are set and passwords match
if (!isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['dob'], $_POST['password'], $_POST['repeat_password'], $_POST['phone_number'], $_POST['address'], $_POST['city'], $_POST['province'], $_POST['postal_code'], $_POST['gender'])) {
    exit('Please complete the registration form correctly!');
}

if ($_POST['password'] !== $_POST['repeat_password']) {
    exit('Passwords do not match!');
}

// Validate email address
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Email is not valid!');
}

// Prepare address string
$address = $_POST['address'];

// Hash the password
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
if ($stmt = $con->prepare('SELECT user_id FROM user WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo 'Email account is already registered to this website! <a href="login-client.php">Login</a>';
    } else {
        // Insert user data into the database
        if ($stmt = $con->prepare('INSERT INTO user (first_name, last_name, email, dob, phone_number, address, city, province, postal_code, gender, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
            $stmt->bind_param('sssssssssss', $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['dob'], $_POST['phone_number'], $address, $_POST['city'], $_POST['province'], $_POST['postal_code'], $_POST['gender'], $hash);
            $stmt->execute();
            echo 'You have successfully registered! <a href="../login-client.php">Login</a>';
        } else {
            echo 'Could not prepare statement!';
            header("Location: register-client.php");
            exit;
        }
    }
    $stmt->close();
} else {
    echo 'Could not prepare statement!';
    exit;
}

// Close the database connection
$con->close();
