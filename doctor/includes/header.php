<header>
    <a href="../index.php" class="logo">
        <img src="../assets/images/ECare-Logo.png" alt="Logo" />
    </a>
    <nav class="main__nav">
        <ul class="nav__links">
            <li class="nav__link"><a href="../index.php">Home</a></li>
            <li class="nav__link"><a href="../services.php">Services</a></li>
            <li class="nav__link"><a href="../about.php">About Us</a></li>
            <li class="nav__link"><a href="../contacts.php">Contacts</a></li>
        </ul>
    </nav>
    <a href="#" class="menu"><i class="fa-solid fa-bars"></i></a>


    <?php

    $isUserLoggedIn = isset($_SESSION['username']);

    // If the user is not logged in, display login button and register link
    if (!$isUserLoggedIn) { ?>
        <div class="user__btns">
            <div class="dropdown" id="loginDropdown">
                <button class="dropbtn">Login</button>
                <div class="dropdown-content">
                    <a href="../login-client.php">Client</a>
                    <a href="./login-doctor.php">Doctor</a>
                </div>
            </div>
            <div class="dropdown" id="registerDropdown">
                <button class="dropbtn">Register</button>
                <div class="dropdown-content">
                    <a href="../register-client.php">Client</a>
                    <a href="./register-doctor.php">Doctor</a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <!-- Display welcome message with username and logout button -->
        <p><?= 'Hello, ' . $_SESSION["username"] ?></p>
        <a href="./includes/logout.php" class="logout">Logout</a>
    <?php } ?>
</header>