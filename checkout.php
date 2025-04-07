<?php
include "includes/connect.php";

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $cart_count = count($cart);

    $product_ids = implode(",", array_keys($cart));
    $sql = "SELECT * FROM products WHERE product_id IN ($product_ids)";
    $result = mysqli_query($con, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $cart_count = 0;
    $products = array();
}

$total = $_GET['subtotal'];
$shipping = 0;
$tax = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .error-message {
            color: red;
            font-size: 0.9em;
        }
    </style>
    <title>ECare - Checkout</title>
</head>

<body>
    <div class="container">
        <h2>Checkout Form</h2>
        <form action="place_order.php" method="post" id="checkout-form">
            <!-- Customer Information -->
            <h3>Customer Information</h3>
            <label for="fname">Name</label>
            <input type="text" id="fname" name="name" placeholder="John" required>
            <span class="error-message" id="name-error"></span>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="john.doe@example.com" required>
            <span class="error-message" id="email-error"></span>

            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" placeholder="+27 012345678" required>
            <span class="error-message" id="phone-error"></span>

            <!-- Shipping Address -->
            <h3>Shipping Address</h3>
            <label>Province</label>
            <select name="province" id="province" required>
                <option value="">Select Province</option>
                <option value="Eastern Cape">Eastern Cape</option>
                <option value="Free State">Free State</option>
                <option value="Gauteng">Gauteng</option>
                <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                <option value="Limpopo">Limpopo</option>
                <option value="Mpumalanga">Mpumalanga</option>
                <option value="North West">North West</option>
                <option value="Northern Cape">Northern Cape</option>
                <option value="Western Cape">Western Cape</option>
            </select>
            <span class="error-message" id="province-error"></span>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="1234 Main St" required>
            <span class="error-message" id="address-error"></span>

            <label for="city">City</label>
            <input type="text" id="city" name="city" placeholder="Anytown" required>
            <span class="error-message" id="city-error"></span>

            <label for="zip">Postal Code</label>
            <input type="text" id="zip" name="postal_code" placeholder="12345" required>
            <span class="error-message" id="postal-code-error"></span>

            <!-- Payment Details -->
            <h3>Payment Details</h3>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cname" placeholder="John Doe" required>
            <span class="error-message" id="cname-error"></span>

            <label for="ccnum">Credit Card Number</label>
            <input type="text" id="ccnum" name="cnum" placeholder="1111-2222-3333-4444" required>
            <span class="error-message" id="ccnum-error"></span>

            <label for="expmonth">Exp Date</label>
            <input type="text" id="exp" name="exp" placeholder="07/27" required>
            <span class="error-message" id="exp-error"></span>

            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="123" required>
            <span class="error-message" id="cvv-error"></span>

            <!-- total -->
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <!-- Submit Button -->
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="container items">
        <h3>Items in Cart</h3>
        <!-- Display cart items -->
        <ul id="cart-items">
            <?php foreach ($products as $item) : ?>
                <div class="item">
                    <img src="<?= $item['image'] ?>" alt="Product Image" />

                    <?= $item['name'] ?> x <?= $_SESSION['cart'][$item['product_id']]['quantity'] ?>
                    <!-- item total -->
                    <span class="item-total">R<?= number_format($item['price'] * $_SESSION['cart'][$item['product_id']]['quantity'], 2) ?></span>
                </div>
            <?php endforeach; ?>
        </ul>
        <!-- Total -->
        <h3>Subtotal: R<?= number_format($total, 2) ?></h3>
        <h3>Tax (15%): R<?= number_format($total * 0.15, 2) ?></h3>
        <h3>Shipping:
            <?php if ($shipping == 0) : ?>
                Free
            <?php else : ?>
                R<?= number_format($shipping, 2) ?>
            <?php endif; ?>
        </h3>
        <h3>Total: R<?= number_format($total + $tax, 2) ?></h3>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('form').addEventListener('submit', function(event) {
                // Prevent form submission
                event.preventDefault();

                // Clear previous error messages
                const errorMessages = document.querySelectorAll('.error-message');
                errorMessages.forEach(function(msg) {
                    msg.textContent = '';
                });

                // Form fields
                var name = document.getElementById('fname').value;
                var email = document.getElementById('email').value;
                var phone = document.getElementById('phone').value;
                var province = document.getElementById('province').value;
                var address = document.getElementById('address').value;
                var city = document.getElementById('city').value;
                var postalCode = document.getElementById('zip').value;
                var cname = document.getElementById('cname').value;
                var cnum = document.getElementById('ccnum').value;
                var exp = document.getElementById('exp').value;
                var cvv = document.getElementById('cvv').value;

                var valid = true;

                // Validation patterns
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                var phonePattern = /^\d{10}$/;
                var cardNumberPattern = /^\d{16}$/;
                var expiryDatePattern = /^(0[1-9]|1[0-2])\/\d{2}$/;
                var cvvPattern = /^\d{3}$/;

                // Validation checks
                if (name.trim() === '') {
                    document.getElementById('name-error').textContent = 'Name cannot be empty';
                    valid = false;
                }

                if (!emailPattern.test(email)) {
                    document.getElementById('email-error').textContent = 'Please enter a valid email address';
                    valid = false;
                }

                if (!phonePattern.test(phone)) {
                    document.getElementById('phone-error').textContent = 'Please enter a valid phone number (10 digits)';
                    valid = false;
                }

                if (province === '') {
                    document.getElementById('province-error').textContent = 'Please select a province';
                    valid = false;
                }

                if (address.trim() === '') {
                    document.getElementById('address-error').textContent = 'Address cannot be empty';
                    valid = false;
                }

                if (city.trim() === '') {
                    document.getElementById('city-error').textContent = 'City cannot be empty';
                    valid = false;
                }

                if (postalCode.trim() === '') {
                    document.getElementById('postal-code-error').textContent = 'Postal code cannot be empty';
                    valid = false;
                }

                if (cname.trim() === '') {
                    document.getElementById('cname-error').textContent = 'Cardholder\'s name cannot be empty';
                    valid = false;
                }

                if (!cardNumberPattern.test(cnum)) {
                    document.getElementById('ccnum-error').textContent = 'Please enter a valid 16-digit card number';
                    valid = false;
                }

                if (!expiryDatePattern.test(exp)) {
                    document.getElementById('exp-error').textContent = 'Please enter a valid expiry date in MM/YY format';
                    valid = false;
                }

                var currentDate = new Date();
                var inputDate = new Date('20' + exp.split('/')[1], exp.split('/')[0] - 1);
                if (inputDate < currentDate) {
                    document.getElementById('exp-error').textContent = 'Please enter a future expiry date';
                    valid = false;
                }

                if (!cvvPattern.test(cvv)) {
                    document.getElementById('cvv-error').textContent = 'Please enter a valid 3-digit CVV';
                    valid = false;
                }

                // If all validations pass, submit the form
                if (valid) {
                    event.target.submit();
                }
            });
        });
    </script>
</body>

</html>