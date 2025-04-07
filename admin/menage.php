<?php
include '../includes/connect.php'; // Adjust the path to your connect.php file

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'DELETE' && isset($data['id'])) {
    // Get the raw POST data


    if (isset($data['id'])) {
        $product_id = intval($data['id']);


        // Prepare the DELETE statement
        $stmt = $con->prepare("DELETE FROM products WHERE product_id = ?");
        $stmt->bind_param('i', $product_id);

        if ($stmt->execute()) {
            // Successfully deleted
            echo json_encode(['success' => true]);
        } else {
            // Failed to delete
            echo json_encode(['success' => false, 'error' => 'Failed to delete product']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid product ID']);
    }
}

// Delete doctors
if ($method === 'DELETE' && isset($data['doctor_id'])) {

    $doctor_id = intval($data['doctor_id']);
    $stmt = $con->prepare("DELETE FROM doctor WHERE doctor_id = ?");

    $stmt->bind_param('i', $doctor_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to delete doctor']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid doctor ID']);
}
