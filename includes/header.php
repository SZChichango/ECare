<?
include "./includes/connect.php";

// clear cart
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="assets/images/ECare-Logo.png" alt="Logo" />
        </div>
        <nav class="main__nav">
            <ul class="nav__links">
                <li class="nav__link"><a href="index.php">Home</a></li>
                <li class="nav__link"><a href="services.php">Services</a></li>
                <li class="nav__link"><a href="about.php">About Us</a></li>
                <li class="nav__link"><a href="contacts.php">Contacts</a></li>
            </ul>
        </nav>

        <div class="cart">
            <div class="cart__container">
                <div class="top">
                    <div class="cart__header">
                        <h3>Cart</h3>
                        <a href="#" class="close__cart">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                    <div class="cart__body">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-left">
            <div class="cart__icon">
                <a href="#" class="cart__link"><i class="fa-solid fa-basket-shopping"></i></a>
                <span class="cart__count"></span>
            </div>
            <a href="#" class="menu"><i class="fa-solid fa-bars"></i></a>
            <?php
            $isUserLoggedIn = isset($_SESSION['user_id']);
            if (!$isUserLoggedIn) { ?>
                <div class="user__btns">
                    <div class="dropdown" id="loginDropdown">
                        <button class="dropbtn">Login</button>
                        <div class="dropdown-content">
                            <a href="login-client.php">Client</a>
                            <a href="doctor/login-doctor.php">Doctor</a>
                        </div>
                    </div>
                    <div class="dropdown" id="registerDropdown">
                        <button class="dropbtn">Register</button>
                        <div class="dropdown-content">
                            <a href="register-client.php">Client</a>
                            <a href="doctor/register-doctor.php">Doctor</a>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <p><?php echo 'Hello, ' . $_SESSION["username"]; ?></p>
                <a href="user/logout.php" class="logout">Logout</a>
            <?php } ?>
        </div>
    </header>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let cartCount = document.querySelector(".cart__count");
            let subtotal = 0;

            function addToCart(event) {
                event.preventDefault();
                let productId = event.target.closest('.add').dataset.productId;
                console.log("Adding product with ID:", productId);

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "cart-functions.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                let params = "action=add&product_id=" + productId;

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        let response = xhr.responseText;
                        if (response == 1 || response == 2) {
                            updateCartItems();
                            updateCartCount();
                        } else {
                            console.log("Failed to add the item.");
                        }
                    }
                };
                xhr.send(params);
            }

            function removeItem(event) {
                let product = event.target.closest('.cart__item__remove').dataset.productId;
                console.log("Removing product with ID:", product);

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "cart-functions.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                let params = "action=remove&product_id=" + product;

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        let response = xhr.responseText;

                        if (response == 1) {
                            event.target.closest('.cart__item').remove();
                            updateCartItems();
                            updateCartCount();
                        } else {
                            console.log("Failed to remove the item.");
                        }
                    }
                };
                xhr.send(params);
            }

            function updateCartItems() {
                console.log('Updating cart items');
                let cartItems = document.querySelector(".cart__body");
                let xhr = new XMLHttpRequest();
                xhr.open("GET", "cart-products.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        let response = JSON.parse(xhr.responseText);
                        cartItems.innerHTML = ""; // Clear existing items

                        if (response.cart_count > 0) {
                            let total = 0;

                            response.products.forEach((product) => {
                                let itemTotal = parseFloat(product.price) * parseInt(product.quantity);
                                total += itemTotal;

                                let cartItem = document.createElement("div");
                                cartItem.classList.add("cart__item");

                                cartItem.innerHTML = `
                                <div class="cart__item__img"><img src="${product.image}" alt=""></div>
                                <div class="name__quantity">
                                    <div class="cart__item__info">${product.name}</div>
                                    <div class="cart__item__price">R<span>${product.price}</span></div>
                                    <div class="cart__item__quantity">Quantity: 
                                        <input name="quantity" type="number" min="1" max="150" value="${product.quantity}" data-product-id="${product.product_id}" class="quantity__input">
                                    </div>
                                </div>
                                <div class="cart__item__remove" data-product-id="${product.product_id}"><i class="fa-regular fa-trash-can"></i></div>
                            `;

                                cartItems.appendChild(cartItem);
                            });

                            let cartFooter = document.createElement("div");
                            cartFooter.classList.add("cart__footer");
                            cartFooter.innerHTML = `
                            <div class="cart__total">Subtotal: R<span>${total.toFixed(2)}</span></div>
                            <div class="cart__btn"><a href="checkout.php?subtotal=${total.toFixed(2)}&" class="checkout">Checkout</a></div>
                        `;
                            cartItems.append(cartFooter);

                            let removeButtons = document.querySelectorAll(".cart__item__remove");
                            removeButtons.forEach(button => button.addEventListener("click", removeItem));

                            let quantityInputs = document.querySelectorAll(".quantity__input");
                            quantityInputs.forEach(input => input.addEventListener("change", updateQuantity));

                        } else {
                            cartItems.innerHTML = "<p class='empty__cart'>Your cart is empty.</p>";
                        }
                    }
                };
                xhr.send();
            }

            function updateCartCount() {
                let xhr = new XMLHttpRequest();
                xhr.open("GET", "cart-count.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        let response = xhr.responseText;
                        cartCount.innerText = response;
                    }
                };
                xhr.send();
            }

            function updateTotal() {
                let xhr = new XMLHttpRequest();
                xhr.open("GET", "cart-functions.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        let response = xhr.responseText;
                        total = parseFloat(response);
                        updateCartItems();
                    }
                };
                xhr.send();
            }

            function updateQuantity(event) {
                let input = event.target;
                let newQuantity = input.value;
                console.log(newQuantity);
                let productId = input.dataset.productId;
                console.log(productId);
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "cart-functions.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                let params = "action=update&product_id=" + productId + "&quantity=" + newQuantity;

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        let response = xhr.responseText;

                        if (response == 1) {
                            updateTotal();
                            // Update message
                            console.log("Update successful.");

                        } else {
                            console.log("Failed to update the quantity.");
                        }
                    }
                };
                xhr.send(params);
            }

            // Attach event listeners to add-to-cart buttons
            document.querySelectorAll(".add").forEach(button => {
                button.addEventListener("click", addToCart);
            });

            // Initialize cart on page load
            updateCartCount();
            updateCartItems();
        });
    </script>


</body>

</html>