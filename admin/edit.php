<?php include_once "../includes/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client's Data</title>
</head>

<body>
    <!-- See all clients data -->
    <h1>Edit Client's Data</h1>
    <form action="edit-client.php" method="post">
        <label for="id">Client ID:</label>
        <input type="number" id="id" name="id" required><br><br />
        <label for="name">Client Name:</label>
        <input type="text" id="name" name="name" required><br><br />
        <label for="email">Client Email:</label>
        <input type="email" id="email" name="email" required><br><br />
        <label for="phone">Client Phone:</label>
        <input type="tel" id="phone" name="phone" required><br><br />
        <input type="submit" value="Edit">
    </form>
    <!-- Show clients order and appointments -->
    <?php
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        // Update client data
        $sql = "UPDATE user SET name='$name', email='$email', phone='$phone'
            WHERE id=$id";
        if (mysqli_query($con, $sql)) {
            echo "Client data updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($cnn);
        }
    }
    // Close connection
    mysqli_close($con);
    ?>
    <!-- Show clients order and appointments -->
    <h2>Clients Orders and Appointments:</h2>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>Client ID</th>
            <th>Service</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
        <?php
        // Connect to database

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // Get client orders and appointments
        $id = $_GET["product_id"];
        $sql = "SELECT orders.id, orders.client_id, services.name, orders.date, orders.time FROM orders JOIN services ON orders.service_id = services.id WHERE ∂orders.client_id=$id";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["client_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["time"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        // Close connection
        mysqli_close($con);
        ?>
    </table>


</body>

</html>