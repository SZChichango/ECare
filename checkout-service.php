<?php
session_start();
include "includes/connect.php";

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login-client.php');
    exit();
}

// Check if appointment data and payment details are received
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user_id']; // Assuming you store user ID in session
    $appointmentId = $_POST['appointment_id'];
    $paymentMethod = $_POST['payment_method'];
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];

    // Validate data
    if (empty($appointmentId) || empty($paymentMethod) || empty($amount) || empty($currency)) {
        echo json_encode(['error' => 'Missing required fields']);
        exit();
    }

    // Create a payment record in your database
    $stmt = $con->prepare("INSERT INTO payments (user_id, appointment_id, payment_method, amount, currency, status) VALUES (?, ?, ?, ?, ?, ?)");
    $status = 'pending';
    $stmt->bind_param("iissss", $userId, $appointmentId, $paymentMethod, $amount, $currency, $status);

    if ($stmt->execute()) {
        $paymentId = $stmt->insert_id;

        // Proceed with payment gateway integration
        // This is a simplified example using fictional API
        $paymentGatewayUrl = 'https://api.paymentgateway.com/v1/payments';
        $paymentData = [
            'payment_id' => $paymentId,
            'amount' => $amount,
            'currency' => $currency,
            'payment_method' => $paymentMethod,
            'callback_url' => 'https://yourwebsite.com/payment-callback.php'
        ];

        $ch = curl_init($paymentGatewayUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($paymentData));
        $response = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($responseCode == 200) {
            $responseBody = json_decode($response, true);

            if ($responseBody['status'] == 'success') {
                // Update payment record to success
                $stmt = $con->prepare("UPDATE payments SET status = ? WHERE id = ?");
                $status = 'success';
                $stmt->bind_param("si", $status, $paymentId);
                $stmt->execute();

                echo json_encode(['success' => 'Payment processed successfully']);
            } else {
                echo json_encode(['error' => 'Payment failed']);
            }
        } else {
            echo json_encode(['error' => 'Payment gateway error']);
        }
    } else {
        echo json_encode(['error' => 'Database error']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
