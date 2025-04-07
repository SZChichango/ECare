<!-- @format -->
<?php include_once "../includes/connect.php";



// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login-doctor.php");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="dashboard.css" />
        <link rel="stylesheet" href="table.css" />

        <title>Appointments</title>
    </head>

    <body>
        <?php include("./doctor_header.php") ?>

        <?php
        // Get appointments
        $query = "SELECT * FROM appointment WHERE doctor_doctor_id = " . $_SESSION['doctor_id'] . " ORDER BY date ASC";
        $result = mysqli_query($con, $query);
        $appointments = mysqli_fetch_all($result, MYSQLI_ASSOC);

        ?>


        <main class="grid-container">
            <table>
                <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Appointment Patient</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Appointment Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment) : ?>
                        <tr>
                            <td><?php echo $appointment['appointment_id'] ?></td>
                            <td><?php echo $appointment['patient_name'] ?></td>
                            <td><?php echo $appointment['date'] ?></td>
                            <td><?php echo $appointment['time'] ?></td>
                            <td><?php echo $appointment['address'] ?></td>
                            <td>
                                <a href="appointment.php?appointment_id=<?php echo $appointment['appointment_id'] ?>"></a>
                            </td>


                        <?php endforeach; ?>
                        <!-- Empty message -->
                        <?php if (empty($product_data)) : ?>
                        <tr>
                            <td colspan="7" style="text-align: center">No products found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </main>

        <footer>
            <p>&copy; 2024 ECare. All rights reserved.</p>
        </footer>
    </body>

    </html>
<?php } ?>