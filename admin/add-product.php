<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../includes/connect.php";

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$response = ['status' => 'error', 'message' => 'Unknown error'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check required fields
    if (!isset($_POST['name'], $_POST['category'], $_POST['description'], $_POST['price'], $_FILES['croppedImage'], $_POST['quantity'])) {
        $response['message'] = 'Please complete the form!';
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    // Retrieve form data
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // File upload
    if (isset($_FILES['croppedImage'])) {
        $file = $_FILES['croppedImage'];
        $file_tmp = $file['tmp_name'];
        $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Define allowed file extensions
        $allowed_extensions = ['jpg', 'jpeg', 'png'];

        if (in_array($file_ext, $allowed_extensions)) {
            // Generate a unique file name to prevent overwriting
            $new_file_name = uniqid('', true) . '.' . $file_ext;
            $file_destination = '../assets/images/uploads/' . $new_file_name;
            $file_destination_url = 'assets/images/uploads/' . $new_file_name;

            // Move the uploaded file to the specified destination
            if (move_uploaded_file($file_tmp, $file_destination)) {
                // File uploaded successfully, proceed with database insertion
                $sql = "INSERT INTO products (name, image, category, description, price, quantity) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssssdi", $name, $file_destination_url, $category, $description, $price, $quantity);

                if ($stmt->execute()) {
                    // Product added successfully
                    $response = ['status' => 'success', 'message' => 'Product added successfully!'];
                } else {
                    // Error occurred while inserting into the database
                    $response['message'] = "Database error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                // Failed to move the uploaded file
                $response['message'] = "Failed to upload the product image.";
            }
        } else {
            // Invalid file extension
            $response['message'] = "Invalid file extension.";
        }
    } else {
        // No file uploaded
        $response['message'] = "No product image uploaded.";
    }
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
