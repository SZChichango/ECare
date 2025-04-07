<!-- @format -->
<?php
include_once "includes/connect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="forms.css" />
  <style>
    main.grid-container {
      height: 100dvh;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 1rem;
      padding: 1rem;
    }

    section.service-tile {
      height: fit-content;
      background-color: #f0f0f0;
      padding: 1rem;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s all ease-in-out;
    }

    section.service-tile:hover {
      transform: scale(1.05);
      background-color: var(--color-primary-dark-blue);
      color: var(--color-neutral-white);
      transition: 0.3s all ease-in-out;
    }
  </style>
  <title>ECare - Login</title>
</head>

<body>
  <div class="container">
    <?php include  "includes/header.php"; ?>
    <main class="grid-container">
      <section class="service-tile" onclick="window.location.href = 'consultation.php'">
        <h2>Home Visits</h2>
        <p>Get medical assistance from the comfort of your home.</p>
      </section>

      <section onclick="window.location.href = 'categories.php'" class=" service-tile">
        <h2>Products</h2>
        <co>Purchase goods from the comfort of your home.</co>
      </section>
    </main>

    <!-- Footer -->
    <?php include  "includes/footer.php"; ?>
  </div>
</body>

</html>