<!-- @format -->
<?php include_once "../includes/connect.php";



// Check if user is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="styles.css" />
        <link rel="stylesheet" href="table.css" />

        <title>Appointments</title>
    </head>

    <body>
        <?php include("./header.php") ?>

        <?php
        // Get doctors info
        $query = "SELECT * FROM user WHERE user_id = '" . $_GET['user_id'] . "'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        ?>

        <main class="grid-container">
            <div class="grid-item">
                <h1>Profile</h1>
                <div class="profile">

                    <div class="info">
                        <p><strong>ID: </strong><?php echo $row['user_id'] ?></p>
                        <h2><strong>Name: </strong><?php echo $row['first_name']  . " " . $row['last_name'] ?></h2>
                        <p><strong>Date of Birth: </strong><?php echo $row['dob'] ?></p>
                        <p><strong>Gender: </strong><?php echo $row['gender'] ?></p>
                        <p><strong>Email: </strong><?php echo $row['email'] ?></p>
                        <p><strong>Phone Number: </strong><?php echo $row['phone_number'] ?></p>
                        <p><strong>Address: </strong><?php echo $row['address'] ?></p>
                        <p><strong>City: </strong><?php echo $row['city'] ?></p>
                        <p><strong>Postal Code: </strong><?php echo $row['postal_code'] ?></p>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <p>&copy; 2024 ECare. All rights reserved.</p>
        </footer>
    </body>

    </html>
<?php } ?>