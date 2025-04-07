<?php
include_once 'includes/connect.php';

// Fetch products by category
if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $sql = "SELECT * FROM products WHERE category = '$category'";
    $result = mysqli_query($con, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
} else {
    $sql = "SELECT * FROM products";
    $result = mysqli_query($con, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="products.css" />
    <title>ECare - Products</title>
</head>

<body>
    <div class="message-fade"></div>
    <div class="container">
        <?php include "includes/header.php"; ?>
        <main class="grid-container">
            <?php
            // Check if there are any products to display
            if (count($products) > 0) {
                foreach ($products as $product) {
            ?>

                    <!-- Add to cart -->
                    <!-- <form class="add-to-cart"> -->
                    <div class="grid-product__item">
                        <div class="product__item__img">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" width="150px" alt="Product Image">
                        </div>
                        <div class="product__item__info">
                            <h3 class="item__info__title"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="item__info__description"><?php echo htmlspecialchars($product['description']); ?></p>
                            <div class="add-to-cart">
                                <p class="item__info__price">R<span><?php echo htmlspecialchars($product['price']); ?></span></p>
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['product_id']); ?>">
                                <button class="add" data-product-id="<?php echo htmlspecialchars($product['product_id']); ?>"><i class="fa-solid fa-cart-plus"></i></button>
                                <!-- Show product id -->

                            </div>
                        </div>
                    </div>
                    <!-- </form> -->

            <?php
                }
            } else {
                echo "<p>No products available.</p>";
            }
            ?>
        </main>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>
    </div>
    <script src="add-to-cart.js"></script>
</body>

</html>