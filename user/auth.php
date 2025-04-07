<?php

// Connect to the database
include "../includes/connect.php";

// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if email and password are set
if (!isset($_POST['email'], $_POST['password'])) {
    exit('Please enter both email and password!');
}

// Prepare email and password for database query
$email = $_POST['email'];
$password = $_POST['password'];

// Retrieve user data from the database based on email
if ($stmt = $con->prepare('SELECT user_id, first_name, password FROM user WHERE email = ?')) {
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $username, $hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, start a new session
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            // Take user to home page
            header("Location: ../index.php");
        } else {
            // Password is not correct
            echo 'Incorrect email or password!';
        }
    } else {
        // No user with that email exists
        echo 'Incorrect email! or password';
    }

    $stmt->close();
}

// Close the database connection
$con->close();
