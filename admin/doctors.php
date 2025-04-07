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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <title>Admin | Doctors</title>
</head>

<body>
    <?php include_once "header.php" ?>
    <main>
        <h1>Doctors</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Specialization</th>
                <th>Actions</th>
            </tr>
            <?php
            $query = "SELECT * FROM doctor";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['doctor_id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['specialization'] . "</td>";
                echo "<td><a href='view.php?doctor_id=" . $row['doctor_id'] . "'><i class='fa-solid fa-eye'></i></a> | 
                <a href='' class='delete-doctor' data-id=" . $row['doctor_id'] . "; '><i class='fa-solid fa-trash'></i></a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </main>
    <script src="menage.js"></script>
</body>

</html>