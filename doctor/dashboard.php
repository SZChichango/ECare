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
    <!-- Google tag (gtag.js) -->

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="dashboard.css" />

    <title>Doctor's Dashboard</title>
  </head>

  <body>
    <?php include("./doctor_header.php") ?>

    <?php
    // Get appointments count
    $query = "SELECT * FROM appointment WHERE doctor_doctor_id = " . $_SESSION['doctor_id'];
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);



    // Fetch appointment data
    $sql2 = "SELECT * FROM appointment WHERE doctor_doctor_id =  '" . $_SESSION["doctor_id"] . "' ";
    $result2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

    ?>


    <main class="grid-container">

      </section>

      <section id="appointments" class="grid-item">
        <h2>Appointments</h2>
        <!-- Display upcoming appointments and schedule new appointments -->
        <p style='text-align: center;'>
          <!-- Appointments count -->
          <span class="appointment-count" style="text-weight: 200; font-size:2em"><?php echo mysqli_num_rows($result2) ?></span>
        </p>
      </section>

      <section id="patients" class="grid-item">
        <h2>Patients</h2>
        <!-- List of patients and their information -->
        <p style='text-align: center; padding-bottom: 2em;'>
          <!-- Appointments count -->
          <span class="appointment-count" style="text-weight: 200; font-size:2em"><?php echo mysqli_num_rows($result2) ?></span>
        </p>
      </section>
    </main>

    <footer>
      <p>&copy; 2024 ECare. All rights reserved.</p>
    </footer>
  </body>

  </html>
<?php } ?>