<!-- Admin login page -->
<?php
include "../includes/connect.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $email;
        header("Location: admin.php");
    } else {
        $error = "Invalid username or password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../forms.css">
    <title>Admin - Login</title>
</head>
<style>
    input {
        background-color: grey;
    }
</style>

<body>

    <div class="container">
        <h1 style="text-align:center">Admin Login</h1>
        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>

</body>

</html>