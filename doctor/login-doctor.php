<!-- @format -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../style.css" />
  <link rel="stylesheet" href="../forms.css" />
  <title>ECare - Login</title>
</head>

<body>
  <div class="container">

    <?php include("./includes/header.php") ?>
    <div class="form__container">
      <h1>Login to your account</h1>
      <section class="form">
        <form action="auth.php" method="post">
          <div class="form-field">
            <label for="email">Email:</label>
            <input name="email" type="text" id="email" required />
          </div>
          <div class="form-field">
            <label for="password">Password:</label>
            <input name="password" type="password" id="password" required />
          </div>
          <button type="submit">Submit</button>
        </form>
        <p>Do not have an account? <a href="register-doctor.php">Register</a></p>
      </section>
    </div>

    <!-- Footer -->
    <?php include("./includes/footer.php") ?>
  </div>
</body>

</html>