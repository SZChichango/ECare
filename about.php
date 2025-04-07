<!-- @format -->
<?php include_once "includes/connect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="forms.css" />
  <style>
    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      display: inline;
      margin-right: 1rem;
    }

    nav ul li a {
      text-decoration: none;
    }

    main {
      padding: 2rem;
    }

    section {
      margin-bottom: 2rem;
    }

    ul {
      list-style: none;
    }

    main {
      display: flex;
      gap: 2em;
    }

    main img {
      max-width: 500px;
      width: 100%;
    }
  </style>
  <title>ECare - Login</title>
</head>

<body>
  <div class="container">
    <?php include  "includes/header.php"; ?>

    <main>
      <div class="text">
        <section id="mission">
          <h2>Our Mission</h2>
          <p>
            We are dedicated to providing high-quality healthcare services to
            our patients with compassion and excellence.
          </p>
        </section>

        <section id="vision">
          <h2>Our Vision</h2>
          <p>
            To be the leading healthcare provider in our community, recognized
            for our commitment to patient care, innovation, and clinical
            excellence.
          </p>
        </section>

        <section id="team">
          <h2>Our Team</h2>
          <p>
            We have a team of highly skilled and experienced healthcare
            professionals including doctors, nurses, and support staff who are
            dedicated to providing the best possible care for our patients.
          </p>
        </section>

        <section id="values">
          <h2>Our Values</h2>
          <ul>
            <li>Compassion</li>
            <li>Integrity</li>
            <li>Excellence</li>
            <li>Teamwork</li>
            <li>Innovation</li>
          </ul>
        </section>
      </div>
      <img src="assets/images/team-young-specialist-doctors-standing-corridor-hospital.jpeg" alt="">
    </main>

    <!-- Footer -->
    <?php include  "includes/footer.php"; ?>
  </div>
</body>

</html>