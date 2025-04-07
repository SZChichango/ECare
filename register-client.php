<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="forms.css" />
  <title>ECare - Register Client</title>
</head>

<body>
  <div class="container">
    <?php include "includes/header.php"; ?>
    <div class="form__container">
      <h1>Register your account</h1>
      <section class="form">
        <form id="registerForm" action="user/register-user.php" method="post">
          <div class="form-field">
            <label for="first_name">First Name:</label>
            <input name="first_name" type="text" id="first-name" required />
            <span class="error-message" id="firstNameError"></span>
          </div>
          <div class="form-field">
            <label for="last_name">Last Name:</label>
            <input name="last_name" type="text" id="last-name" required />
            <span class="error-message" id="lastNameError"></span>
          </div>
          <!-- date of birth -->
          <div class="form-field">
            <label for="dob">Date of Birth:</label>
            <input name="dob" type="date" id="dob" required />
            <span class="error-message" id="dobError"></span>
          </div>
          <!-- gender radio buttons -->
          <div class="form-field">
            <label for="gender">Gender:</label>
            <div class="radio-group">
              <div class="radio__btns">
                <input type="radio" id="male" name="gender" value="Male" checked />
                <label for="male">Male</label>
              </div>
              <div class="radio__btns">
                <input type="radio" id="female" name="gender" value="Female" />
                <label for="female">Female</label>
              </div>
              <div class="radio__btns">
                <input type="radio" id="other" name="gender" value="Other" />
                <label for="other">Other</label>
              </div>
            </div>
          </div>

          <div class="form-field">
            <label for="email">Email:</label>
            <input name="email" type="email" id="email" required />
            <span class="error-message" id="emailError"></span>
          </div>
          <!-- Medical Aid -->
          <div class="form-field">
            <label for="medical_aid">Medical Aid Number:</label>
            <input name="medical_aid" type="text" id="medical_aid" required />
            <span class="error-message" id="medicalAidError"></span>
          </div>
          <div class="form-field">
            <label for="phone-number">Phone Number:</label>
            <input name="phone_number" type="tel" id="phone-number" required />
            <span class="error-message" id="phoneNumberError"></span>
          </div>
          <!-- Address -->
          <div class="form-field">
            <label for="address">Address:</label>
            <textarea name="address" id="address"></textarea>
            <span class="error-message" id="addressError"></span>
          </div>
          <!-- City, Country and Zipcode -->
          <div class="city-province">
            <div class="form-field city">
              <label for="city">City:</label>
              <input type="text" name="city" id="city" />
              <span class="error-message" id="cityError"></span>
            </div>
            <div class="provinces">
              <label for="province">Province:</label>
              <select class="form-field" name="province" id="provinces" required>
                <option value="">-- Select Value --</option>
                <option value="Gauteng">Gauteng</option>
                <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                <option value="Limpopo">Limpopo</option>
                <option value="Mpumalanga">Mpumalanga</option>
                <option value="Free State">Free State</option>
                <option value="North West">North West</option>
                <option value="Northern Province">Northern Province</option>
                <option value="Eastern Cape">Eastern Cape</option>
                <option value="Western Cape">Western Cape</option>
              </select>
              <span class="error-message" id="provinceError"></span>
            </div>
          </div>
          <div class="form-field">
            <label for="postal-code">Postal Code:</label>
            <input type="text" name="postal_code" id="postal-code" />
            <span class="error-message" id="postalCodeError"></span>
          </div>

          <div class="form-field">
            <label for="password">Password:</label>
            <input name="password" type="password" id="password" required />
            <span class="error-message" id="passwordError"></span>
          </div>
          <div class="form-field">
            <label for="repeat-password">Repeat Password:</label>
            <input name="repeat_password" type="password" id="repeat-password" required />
            <span class="error-message" id="repeatPasswordError"></span>
          </div>
          <button type="submit">Submit</button>
        </form>

        <p>Do you have an account? <a href="login-client.php">Login</a></p>
      </section>
    </div>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
  </div>

  <script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
      let valid = true;

      // Password validation
      const password = document.getElementById('password').value;
      const repeatPassword = document.getElementById('repeat-password').value;
      const passwordError = document.getElementById('passwordError');
      const repeatPasswordError = document.getElementById('repeatPasswordError');

      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

      passwordError.textContent = '';
      repeatPasswordError.textContent = '';

      if (!passwordRegex.test(password)) {
        passwordError.textContent = 'Password must be at least 8 characters long, contain an uppercase letter, a lowercase letter, a number, and a special character.';
        valid = false;
      }

      if (password !== repeatPassword) {
        repeatPasswordError.textContent = 'Passwords do not match.';
        valid = false;
      }

      if (!valid) {
        e.preventDefault();
      }
    });
  </script>
</body>

</html>