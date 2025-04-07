<?php

include_once "./includes/connect.php";

// Check if the required POST variables are set
if (isset($_POST['product_id'])) {
    // Extract the product_id from the POST data
    $product_id = $_POST['product_id'];

    // Check if a cart session variable exists
    if (isset($_SESSION['cart'])) {
        // If it exists, assign its value to the $cart variable
        $cart = $_SESSION['cart'];

        // Check if the product with the same product ID is already in the cart
        if (array_key_exists($product_id, $cart)) {
            // If it is, increment its quantity by 1
            $cart[$product_id]['quantity']++;
            // Echo 2 to indicate product already exists in the cart and was updated
            echo 2;
        } else {
            // If it's not, add it to the cart with a quantity of 1
            $cart[$product_id] = array('quantity' => 1);
            // Echo 1 to indicate successful addition to the cart
            echo 1;
        }
    } else {
        // If the cart session variable doesn't exist, create it and add the product to it
        $cart = array($product_id => array('quantity' => 1));
        // Echo 1 to indicate successful addition to the cart
        echo 1;
    }

    // Update the cart session variable with the modified cart array
    $_SESSION['cart'] = $cart;

    // Exit the script
    exit();
} else {
    // If the required POST variables are not set, echo 0
    echo 0;
    // Exit the script
    exit();
}
