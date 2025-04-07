<?php
include "./includes/connect.php";


if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = array();
}

// Function to calculate subtotal
function calculateSubtotal($cart, $con)
{
    $subtotal = 0;
    foreach ($cart as $product_id => $product) {
        $quantity = $product['quantity'];

        $stmt = $con->prepare("SELECT price FROM product WHERE product_id = ?");
        if ($stmt) {
            $stmt->bind_param('i', $product_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                $price = $row['price'];
                $subtotal += $price * $quantity;
            }
            $stmt->close();
        } else {
            error_log("Failed to prepare statement for product ID: $product_id");
        }
    }
    return $subtotal;
}

// Update item quantity in the cart
if (isset($_POST['product_id'], $_POST['quantity'], $_POST['action']) && $_POST['action'] == 'update') {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    if (array_key_exists($product_id, $cart)) {
        $cart[$product_id]['quantity'] = $quantity;
        $_SESSION['cart'] = $cart;
        echo 1; // Indicate successful update
    } else {
        echo 16; // Indicate the product was not found

    }
    exit();
}


/// Add or update item in the cart
if (isset($_POST['product_id'], $_POST['action']) && $_POST['action'] == 'add') {
    $product_id = intval($_POST['product_id']);
    $quantity = 1;

    if ($product_id > 0) { // Validate product ID
        if (array_key_exists($product_id, $cart)) {
            // Update quantity if the product is already in the cart
            $cart[$product_id]['quantity'] += $quantity;
            $response = 2; // Indicate that the quantity was updated
        } else {
            // Add new product to the cart variable
            $cart[$product_id] = array('quantity' => $quantity);
            $response = 1; // Indicate that the product was added
        }

        $_SESSION['cart'] = $cart;
        echo $response;
    } else {
        echo 0; // Indicate invalid product ID
    }
    exit();
}

// Remove item from the cart
if (isset($_POST['product_id'], $_POST['action']) && $_POST['action'] == 'remove') {
    $product_id = intval($_POST['product_id']);

    if (array_key_exists($product_id, $cart)) {
        unset($cart[$product_id]);

        // Check if cart is empty after removal
        if (empty($cart)) {
            $_SESSION['cart'] = array();
        } else {
            $_SESSION['cart'] = $cart;
        }

        echo 1; // Indicate successful removal
    } else {
        echo 0; // Indicate the product was not found
    }
    exit();
}


// Function to calculate and return subtotal
if (isset($_POST['action']) && $_POST['action'] == 'subtotal') {
    echo calculateSubtotal($cart, $con);
    exit();
}

// If no valid action is specified, return an error
echo 0;

exit();
