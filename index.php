<!-- @format -->
<?php
include "includes/connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css" />
  <title>ECare</title>
</head>

<body>
  <div class="container">
    <?php include  "includes/header.php"; ?>
    <!-- hero -->
    <section class="hero">
      <div class="text__hero">
        <h2 class="hero__title">Welcome to ECare</h2>
        <p class="hero__paragrapph">
          ECare is your trusted destination for quality healthcare services. Our team of expert doctors and healthcare professionals is dedicated to providing you with personalized care and treatment options to meet your unique needs. Whether you're seeking routine check-ups, specialized treatments, or online consultations, we're here for you every step of the way.
        </p>
        <button class="btn__primary" onclick="window.location.href='services.php'">Get Started Now</button>
      </div>
      <figure class="image__hero">
        <img src="assets/images/female-doctor.jpeg" alt="A black female doctor posing for a picture" srcset="" />
      </figure>
    </section>

    <!-- Services -->
    <section class="services">
      <h3 class="services__title">Why Choose ECare?</h3>
      <p>
        At ECare, we strive to offer you the best healthcare experience possible. Here are a few reasons why you should choose us:
      </p>
      <div class="row">
        <div class="service__card">
          <div class="icon__container">
            <i class="fas fa-stethoscope"></i>
          </div>
          <h4>Expert Doctors</h4>
          <p>
            Our team consists of highly qualified and experienced doctors who are experts in their respective fields. Whether you need a general check-up or specialized treatment, you can trust our doctors to provide you with the highest level of care.
          </p>
        </div>
        <div class="service__card">
          <div class="icon__container">
            <i class="fas fa-hospital-user"></i>
          </div>
          <h4>Convenient Hours of Operation</h4>
          <p>
            We understand that your time is valuable. That's why we offer convenient hours of operation to accommodate your busy schedule. Whether you need an appointment during the day, evening, or weekend, we're here to serve you.
          </p>
        </div>
        <div class="service__card">
          <div class="icon__container">
            <i class="fas fa-user-md"></i>
          </div>
          <h4>Online Consultations (Coming Soon)</h4>
          <p>
            We're committed to making healthcare more accessible and convenient for you. Soon, you'll be able to schedule online consultations with our doctors from the comfort of your own home. Stay tuned for updates!
          </p>
        </div>
        <div class="service__card">
          <div class="icon__container">
            <i class="fas fa-phone"></i>
          </div>
          <h4>24/7 Patient Support</h4>
          <p>
            Your health is our top priority, which is why we offer 24/7 patient support services. Whether you have questions about your treatment plan, need assistance scheduling an appointment, or require urgent medical advice, our dedicated team is here to help you whenever you need it.
          </p>
        </div>
      </div>
    </section>
    <?php include  "includes/footer.php"; ?>
  </div>
</body>




</html>