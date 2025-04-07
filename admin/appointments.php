<!-- Appointments page -->
<?php
include_once "../includes/connect.php";

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Users</title>
</head>

<body>
    <?php include_once "header.php" ?>
    <main>
        <h1>Users</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            <?php
            $query = "SELECT * FROM appointment";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['appointment_id'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['doctor_id'] . "</td>";
                echo "<td>" . $row['notes'] . "</td>";
                echo "<td><a href='edit.php?appointment_id=" . $row['appointment_id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['appointment_id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </main>
</body>

</html>