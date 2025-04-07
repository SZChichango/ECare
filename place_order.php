<?php
include "./includes/connect.php";

function clearCart()
{
    unset($_SESSION['cart']);
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login-client.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $province = $_POST['province'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $amount = $_POST['total'];
    $user_id = $_SESSION['user_id'];

    // Save all the ids of the products in the cart into an array and then pass it to a variable as a string
    $ids = array();
    foreach ($_SESSION['cart'] as $key => $value) {
        array_push($ids, $key);
    }
    $ids = implode(',', $ids);

    // Retrieve payment data
    $amount = $_POST['total'];
    $card_name = $_POST['cname'];
    $card_number = $_POST['cnum'];
    $expiry_date = $_POST['exp'];
    $cvv = $_POST['cvv'];

    // Start transaction
    $con->begin_transaction();

    try {
        // Insert payment data into the payments table
        $payment_query = "INSERT INTO payments (user_id, type, amount, card_name, card_number, exp_date, cvv) VALUES (?, 'service', ?, ?, ?, ?, ?)";
        $payment_stmt = $con->prepare($payment_query);
        $payment_stmt->bind_param("idsssi", $user_id, $amount, $card_name, $card_number, $expiry_date, $cvv);

        if (!$payment_stmt->execute()) {
            throw new Exception("Payment insertion failed: " . $payment_stmt->error);
        }

        // Insert order data into the orders table
        $order_query = "INSERT INTO orders (user_id, name, email, phone, province, address, city, postal_code, amount, items) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $order_stmt = $con->prepare($order_query);
        $order_stmt->bind_param("isssssssss", $user_id, $name, $email, $phone, $province, $address, $city, $postal_code, $amount, $ids);

        if (!$order_stmt->execute()) {
            throw new Exception("Orders insertion failed: " . $order_stmt->error);
        }

        // Update the quantity of each item in the products table
        foreach ($_SESSION['cart'] as $product_id => $details) {
            $quantity = $details['quantity'];
            $update_query = "UPDATE products SET quantity = quantity - ? WHERE product_id = ?";
            $update_stmt = $con->prepare($update_query);
            $update_stmt->bind_param("ii", $quantity, $product_id);

            if (!$update_stmt->execute()) {
                throw new Exception("Update quantity failed for product ID $product_id: " . $update_stmt->error);
            }
        }

        // Commit transaction
        $con->commit();
        clearCart();

        // Send user to success page
        header("Location: success.php");
        exit();
    } catch (Exception $e) {
        // Rollback transaction in case of error
        $con->rollback();
        echo "Error: " . $e->getMessage();
    }

    // Close statements
    $payment_stmt->close();
    $order_stmt->close();
    if (isset($update_stmt)) {
        $update_stmt->close();
    }

    // Close connection
    $con->close();
} else {
    // Show message that the order failed and give a link back to home
    echo "Order failed! Please try again. ";
    echo "<a href='index.php'>Back to home</a>";

    exit();
}
