<?php
// Your PHP logic here, if any
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./../style.css" />
  <link rel="stylesheet" href="./../forms.css" />
  <link href="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.css" rel="stylesheet">
  <style>
    .form-field {
      display: flex;
      flex-direction: column;
      gap: 1em;
    }

    .error-message {
      color: red;
      font-size: 0.875em;
    }
  </style>
  <title>ECare - Doctor Registration</title>
</head>

<body>
  <div id="backdrop"></div>
  <div class="container">
    <!-- Header -->
    <?php include("./includes/header.php") ?>
    <div class="form__container">
      <h1>Register as a Doctor</h1>
      <section class="form">
        <form id="doctor-registration-form" method="post" enctype="multipart/form-data">
          <div class="form-field">
            <label for="first_name">First Name:</label>
            <input name="first_name" type="text" id="first-name" required />
            <div class="error-message" id="error-first-name"></div>
          </div>
          <div class="form-field">
            <label for="last_name">Last Name:</label>
            <input name="last_name" type="text" id="last-name" required />
            <div class="error-message" id="error-last-name"></div>
          </div>

          <div class="form-field">
            <label for="dob">Date of Birth:</label>
            <input name="dob" type="date" id="dob" required />
            <div class="error-message" id="error-dob"></div>
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
            </div>
            <div class="error-message" id="error-gender"></div>
          </div>

          <div class="form-field">
            <label for="email">Email:</label>
            <input name="email" type="email" id="email" required />
            <div class="error-message" id="error-email"></div>
          </div>
          <div class="form-field">
            <label for="phone_number">Phone Number:</label>
            <input name="phone_number" type="tel" id="phone-number" required />
            <div class="error-message" id="error-phone-number"></div>
          </div>
          <!-- Address -->
          <div class="form-field">
            <label for="address">Address:</label>
            <textarea name="address" id="address" required></textarea>
            <div class="error-message" id="error-address"></div>
          </div>
          <!-- City, Province, and Postal Code -->
          <div class="city-province">
            <div class="form-field city">
              <label for="city">City:</label>
              <input type="text" name="city" id="city" required />
              <div class="error-message" id="error-city"></div>
            </div>
            <div class="form-field">
              <label for="province">Province:</label>
              <select name="province" id="provinces" required>
                <option value="">-- Select Province --</option>
                <option value="Gauteng">Gauteng</option>
                <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                <option value="Limpopo">Limpopo</option>
                <option value="Mpumalanga">Mpumalanga</option>
                <option value="Free State">Free State</option>
                <option value="North West">North West</option>
                <option value="Eastern Cape">Eastern Cape</option>
                <option value="Western Cape">Western Cape</option>
              </select>
              <div class="error-message" id="error-province"></div>
            </div>
          </div>
          <div class="form-field">
            <label for="postal_code">Postal Code:</label>
            <input type="text" name="postal_code" id="postal-code" required />
            <div class="error-message" id="error-postal-code"></div>
          </div>
          <!-- Professional Information -->
          <div class="form-field">
            <label for="license_number">Medical License Number:</label>
            <input name="license_number" type="text" id="license-number" required />
            <div class="error-message" id="error-license-number"></div>
          </div>
          <div class="form-field">
            <label for="specialization">Specialization:</label>
            <input name="specialization" type="text" id="specialization" required />
            <div class="error-message" id="error-specialization"></div>
          </div>
          <div class="form-field">
            <label for="education">Educational Background:</label>
            <input name="education" type="text" id="education" required />
            <div class="error-message" id="error-education"></div>
          </div>
          <div class="form-field">
            <label for="hospital">Hospital:</label>
            <select name="hospital" id="hospital">
            </select>
            <div class="error-message" id="error-hospital"></div>
          </div>

          <div class="form-field">
            <label for="password">Password:</label>
            <div class="password__field">
              <input type="password" class="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
              <input type="checkbox" class="visibility" name="" id="visibility">
              <small>Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number.</small>
            </div>
            <div class="error-message" id="error-password"></div>
          </div>
          <div class="form-field">
            <label for="repeat-password">Repeat Password:</label>
            <div class="password__field">
              <input name="confirm-password" class="password" class="visibility" type="password" id="confirmPassword" required />
              <input type="checkbox" name="" id="visibility1">
            </div>
            <div class="error-message" id="error-confirm-password"></div>
          </div>
          <div class="form-field">
            <label for="">Upload Image</label>
            <div class="uploader__preview">
              <a href="#" id="uploader__container__loader">Upload</a>
              <img src="" alt="image preview" id="imgPreview" width="300px" height="300px" />
            </div>
            <div class="error-message" id="error-image"></div>
          </div>
          <div class="uploader__container">
            <div class="uploader__container__text">
              <p>Upload your Image</p>
              <div id="close"><i class="fa fa-close"></i></div>
            </div>
            <div class="container_flex">
              <div class="uploader__container__image">
                <img id="imagePreview" src="https://i.ibb.co/0Y0zX0g/doctor.png" width="300px" alt="doctor" />
              </div>
              <div class="uploader">
                <input type="file" id="profile-image" name="file" accept="image/*" required />
              </div>
            </div>
            <div class="bottom__btns">
              <a href="#" id="crop">Crop</a>
              <a href="#" id="cancel">Cancel</a>
            </div>
          </div>
          <button id="submit" type="submit">Submit</button>
        </form>
        <p>Already have an account? <a href="#">Login</a></p>
      </section>
    </div>

    <!-- Footer -->
    <!-- <?php include("./includes/footer.php") ?> -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/cropperjs"></script>
  <script>
    const form = document.getElementById('doctor-registration-form');
    const errorMessages = {
      'first-name': 'First name is required.',
      'last-name': 'Last name is required.',
      'dob': 'Date of birth is required.',
      'email': 'Valid email is required.',
      'phone-number': 'Phone number is required.',
      'address': 'Address is required.',
      'city': 'City is required.',
      'province': 'Province is required.',
      'postal-code': 'Postal code is required.',
      'license-number': 'Medical license number is required.',
      'specialization': 'Specialization is required.',
      'education': 'Educational background is required.',
      'password': 'Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number.',
      'confirm-password': 'Passwords do not match.',
      'file': 'Image file is required.'
    };

    form.addEventListener('submit', function(e) {
      e.preventDefault();
      let isValid = true;
      Object.keys(errorMessages).forEach(function(key) {
        const input = document.getElementById(key);
        const errorMessage = document.getElementById(`error-${key}`);
        if (input) {
          if (!input.checkValidity()) {
            isValid = false;
            errorMessage.textContent = errorMessages[key];
          } else {
            errorMessage.textContent = '';
          }
        }
      });

      // Check for password match
      const password = document.getElementById('password');
      const confirmPassword = document.getElementById('confirmPassword');
      const errorConfirmPassword = document.getElementById('error-confirm-password');

      if (password.value !== confirmPassword.value) {
        isValid = false;
        errorConfirmPassword.textContent = errorMessages['confirm-password'];
      } else {
        errorConfirmPassword.textContent = '';
      }

      // If the form is valid, submit it
      if (isValid) {
        form.submit();
      }
    });

    const image = document.getElementById('imagePreview');
    const input = document.getElementById('profile-image');
    const cropButton = document.getElementById('crop');
    const submitButton = document.getElementById('submit');
    const imgPreview = document.getElementById('imgPreview');
    let cropper;
    let croppedImageBlob;

    let passwordInput = document.querySelectorAll('input[type="password"]')
    let checkVisibility = document.querySelectorAll('input[type="checkbox"]')

    for (let i = 0; i < passwordInput.length; i++) {
      checkVisibility[i].addEventListener("click", (e) => {
        if (e.target.checked) {
          passwordInput[i].type = "text";
        } else {
          passwordInput[i].type = "password";
        }
      });
    }

    const uploaderContainer = document.getElementsByClassName('uploader__container')[0];
    const backdrop = document.getElementById('backdrop');
    const cancelButton = document.getElementById('cancel');
    const closeButton = document.getElementById('close');
    const openButton = document.getElementById('uploader__container__loader');

    openButton.addEventListener('click', () => {
      uploaderContainer.style.display = 'block';
      backdrop.style.display = 'block';
    });

    closeButton.addEventListener('click', closeUploader);
    cancelButton.addEventListener('click', closeUploader);

    function closeUploader() {
      uploaderContainer.style.display = 'none';
      backdrop.style.display = 'none';
    }

    input.addEventListener('change', (e) => {
      const files = e.target.files;
      const reader = new FileReader();

      reader.onload = function() {
        image.src = reader.result;
        cropper = new Cropper(image, {
          aspectRatio: 1,
          viewMode: 2,
          minCropBoxWidth: 150,
          minCropBoxHeight: 150,
          maxCropBoxWidth: 300,
          maxCropBoxHeight: 300,
        });
      };
      reader.readAsDataURL(files[0]);
    });

    cropButton.addEventListener('click', async () => {
      try {
        const croppedCanvas = cropper.getCroppedCanvas();
        croppedImageBlob = await new Promise(resolve => croppedCanvas.toBlob(resolve, 'image/png'));
        const objectURL = URL.createObjectURL(croppedImageBlob);

        if (objectURL) {
          imgPreview.src = objectURL;
          imgPreview.style.display = 'block';
          closeUploader();
        } else {
          console.error('Error creating image preview URL.');
        }
      } catch (error) {
        console.error('Error cropping/displaying image:', error);
      }
    });

    submitButton.addEventListener('click', async (e) => {
      e.preventDefault();

      const formData = new FormData(form);

      if (!croppedImageBlob) {
        alert('Please select an image and crop it before submitting.');
        return;
      }

      formData.append('croppedImage', croppedImageBlob, 'croppedImage.png');

      try {
        const response = await fetch('register.php', {
          method: 'POST',
          body: formData,
        });

        if (response.ok) {
          const data = await response.json();
          alert(data.message);
          window.location.href = 'login-doctor.php';
        } else {
          alert('Failed to upload image. Please try again later.');
        }
      } catch (error) {
        console.error('Error occurred while uploading the image:', error);
        alert('An error occurred while uploading the image.');
      }
    });
  </script>
</body>

</html>