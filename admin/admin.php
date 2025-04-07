<?php
include_once '../includes/connect.php';

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit;
}

// Pull recent appointments, recent registered users, and recent purchases
$recent_appointments = $con->query("SELECT * FROM appointment ORDER BY appointment_id DESC LIMIT 4");
$recent_users = $con->query("SELECT * FROM user ORDER BY user_id DESC LIMIT 4");
$recent_purchases = $con->query("SELECT * FROM checkout ORDER BY user_id DESC LIMIT 4");

// Total number of users, doctors, and ppointments
$total_users = $con->query("SELECT COUNT(*) as total_users FROM user")->fetch_assoc()['total_users'];
$total_doctors = $con->query("SELECT COUNT(*) as total_doctors FROM doctor")->fetch_assoc()['total_doctors'];
$total_appointments = $con->query("SELECT COUNT(*) as total_appointments FROM appointment")->fetch_assoc()['total_appointments'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel</title>
  <link rel="stylesheet" href="styles.css" />
  <!-- Add your CSS file here -->
</head>

<body>
  <?php include_once "header.php"; ?>

  <main>

    <section id="dashboard">
      <h2>Dashboard</h2>
      <div class="stats">
        <div class="stat-box">
          <h3>Total Users</h3>
          <p><?= $total_users ?></p>

        </div>
        <div class="stat-box">
          <h3>Total Doctors</h3>
          <p><?= $total_doctors ?></p>

        </div>
        <div class="stat-box">
          <h3>Total Appointments</h3>
          <p><?= $total_appointments ?></p>

        </div>
        <!-- Add more stat boxes as needed -->
      </div>
      <div class="recent-activity">
        <h3>Recent Activity</h3>
        <div class="activity-box">
          <ul>
            <?php
            // Display recent registered users
            if ($recent_users->num_rows > 0) {
              while ($user = $recent_users->fetch_assoc()) {
                echo '<li>User ' . $user['first_name'] . ' registered</li>';
              }
            }

            // Display recent appointments
            if ($recent_appointments->num_rows > 0) {
              while ($appointment = $recent_appointments->fetch_assoc()) {
                echo '<li>Appointment with ID ' . $appointment['appointment_id'] . ' was made</li>';
              }
            }

            // Display recent purchases
            if ($recent_purchases->num_rows > 0) {
              while ($purchase = $recent_purchases->fetch_assoc()) {
                echo '<li>Payment with ID ' . $purchase['payment_id'] . ' was completed</li>';
              }
            }
            ?>
          </ul>
        </div>
      </div>
    </section>

    <!-- Other sections for managing users, doctors, appointments, etc. -->
  </main>

  <?php include_once "footer.php"; ?>
</body>

</html>