<!-- @format -->
<?php
include "includes/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="categories.css" />


    <title>ECare - Login</title>
</head>

<body>
    <div class="container">
        <?php include  "includes/header.php"; ?>
        <main class="grid-container">
            <div class="category" onclick="window.open('products.php?category=otc', '_self')">
                <div class="category__content">
                    <img src="assets/images/products/categories/OTC.jpeg" alt="">
                </div>
                <div class="category__title">
                    <h3>Over-the-Counter Medication</h3>
                </div>
            </div>
            <div class="category" onclick="window.open('products.php?category=supplements', '_self')">
                <div class=" category__content">
                    <img src="assets/images/products/categories/supplements.webp" alt="">
                </div>
                <div class="category__title">
                    <h3>Vitamins and Supplements</h3>
                </div>
            </div>
            <div class="category" onclick="window.open('products.php?category=self-care', '_self')">
                <div class=" category__content">
                    <img src="assets/images/products/categories/personal-care.jpeg" alt="">
                </div>
                <div class="category__title">
                    <h3>Self-Care</h3>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <?php include  "includes/footer.php"; ?>
    </div>
</body>

</html>