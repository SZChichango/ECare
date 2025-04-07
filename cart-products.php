<?php
include "./includes/connect.php";

$products = array();
$cart_count = 0;

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $cart_count = count($cart);

    if ($cart_count > 0) {
        $product_ids = implode(",", array_keys($cart));
        $sql = "SELECT * FROM products WHERE product_id IN ($product_ids)";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $row['quantity'] = $cart[$product_id]['quantity']; // Set the correct quantity from the cart
            $products[] = $row;
        }
    }
}

header('Content-Type: application/json');
echo json_encode(['cart_count' => $cart_count, 'products' => $products]);
