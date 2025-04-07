<!-- @format -->
<?php
include 'includes/connect.php';

//  Save the message in the data base
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sql = "INSERT INTO `contact`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Message sent successfully')</script>";
    } else {
        echo "<script>alert('Message not sent')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="forms.css" />

    <title>ECare - Contacts</title>
</head>
<style>
    .contact-form {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
        margin-bottom: 2em;
        padding: 40px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0,
                0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);

    }
</style>

<body>
    <div class="container">
        <?php include  "includes/header.php"; ?>
        <main class="grid-container">
            <!-- contact us form -->
            <div class="contact-form">
                <h1>Contact Us</h1>
                <form action="" method="post">
                    <div class="form-field">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-field">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" placeholder="Enter your Subject" required>
                    </div>
                    <div class="form-field">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-field">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message" required></textarea>
                    </div>
                    <div class="form-field">
                        <button type="submit" name="submit" class="btn">Send</button>
                    </div>
                </form>
            </div>
    </div>


    </main>

    <!-- Footer -->
    <?php include  "includes/footer.php"; ?>
    </div>
</body>

</html>