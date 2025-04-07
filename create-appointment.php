<?php
// Include your database connection file
include "includes/connect.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login-client.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $notes = $_POST['notes'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $doctor_id = $_POST['doctor_id'];
    $user_id = $_POST['user_id'];


    // Retrieve payment data
    $amount = $_POST['amount'];
    $card_name = $_POST['card_name'];
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];


    // Fetch user's name
    $query = "SELECT first_name FROM user WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $full_name = $first_name . " " . $last_name;

    // Start transaction
    $con->begin_transaction();

    try {
        // Insert payment data into the payments table
        $payment_query = "INSERT INTO payments (user_id, type, amount, card_name, card_number, exp_date, cvv) VALUES (?, 'service', ? , ?, ?, ?, ?)";
        $payment_stmt = $con->prepare($payment_query);
        $payment_stmt->bind_param("idsssi", $user_id, $amount, $card_name, $card_number, $expiry_date, $cvv);

        if (!$payment_stmt->execute()) {
            throw new Exception("Payment insertion failed: " . $payment_stmt->error);
        }

        // Insert appointment data into the appointments table
        $appointment_query = "INSERT INTO appointment (patient_name, notes, address, date, time, doctor_doctor_id, user_user_id, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')";
        $appointment_stmt = $con->prepare($appointment_query);
        $appointment_stmt->bind_param("sssssii", $full_name, $notes, $address, $date, $time, $doctor_id, $user_id);

        if (!$appointment_stmt->execute()) {
            throw new Exception("Appointment insertion failed: " . $appointment_stmt->error);
        }

        // Commit transaction
        $con->commit();
        echo "Appointment created successfully! The Doctor will contact you shortly!";
        echo "<br>";
        echo "Doctor on its way for " . $date . " at " . $time . "!";
        echo "<br>";
        echo "<a href='index.php'>Back to Home</a>";
    } catch (Exception $e) {
        // Rollback transaction in case of error
        $con->rollback();
        echo "Error: " . $e->getMessage();
    }

    // Close statements
    $payment_stmt->close();
    $appointment_stmt->close();

    // Close connection
    $con->close();
} else {
    // Redirect if the form is not submitted
    header("Location: consultation.php");
    exit();
}
