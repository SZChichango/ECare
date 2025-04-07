<!-- @format -->
<?php
require_once '../includes/connect.php';

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
// Show total number of users, ttotal number of orders and total number of products
$total_users = $con->query("SELECT COUNT(*) as total_users FROM user")->fetch_assoc()['total_users'];
$total_orders = $con->query("SELECT COUNT(*) as total_orders FROM orders")->fetch_assoc()['total_orders'];
$total_products = $con->query("SELECT COUNT(*) as total_products FROM products")->fetch_assoc()['total_products'];

// Show all the products in a table
$product_query = "SELECT * FROM products";
$product_result = $con->query($product_query);
$product_rows = $product_result->num_rows;
$product_data = array();
while ($product_row = $product_result->fetch_assoc()) {
    $product_data[] = $product_row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css" />
    <!-- Add your CSS file here -->


</head>

<body>
    <?php include_once "header.php"; ?>

    <main>
        <section>
            <h2>Products</h2>
            <div class="stats">
                <div class="stat-box">
                    <h3>Total Users</h3>
                    <p><?= $total_users ?></p>

                </div>
                <div class="stat-box">
                    <h3>Total Orders</h3>
                    <p><?= $total_orders ?></p>

                </div>
                <div class="stat-box">
                    <h3>Total Products</h3>
                    <p><?= $total_products ?></p>

                </div>
        </section>
        <section>
            <h2>Products list</h2>
            <a href="product.php" class="add-product">Add New product</a>
            <table>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Category</th>
                        <th>Product Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product_data as $product) : ?>
                        <tr>
                            <td><?php echo $product['product_id']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td><?php echo $product['category']; ?></td>
                            <td><img src="../<?php echo $product['image']; ?>" alt="Product Image" width="50px" height="50px"></td>
                            <td>
                                <a href="#" class="edit"><i class="fa-solid fa-pencil"></i></a> |
                                <a href="#" class="delete" data-id="<?php echo $product['product_id']; ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- Empty message -->
                    <?php if (empty($product_data)) : ?>
                        <tr>
                            <td colspan="7" style="text-align: center">No products found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </section>

        </div>
        </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Admin Panel. All rights reserved.</p>
    </footer>
    <script src="menage.js"></script>
</body>

</html>