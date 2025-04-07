/** @format */

document.addEventListener("DOMContentLoaded", function () {
  document.querySelector("form").addEventListener("submit", function (event) {
    // Prevent form submission
    event.preventDefault();

    // Clear previous error messages
    const errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach(function (msg) {
      msg.textContent = "";
    });

    // Form fields
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("address").value;
    var cardName = document.getElementById("card-name").value;
    var cardNumber = document.getElementById("card-number").value;
    var expiryDate = document.getElementById("expiry-date").value;
    var cvv = document.getElementById("cvv").value;
    var preferredDate = document.getElementById("date").value;
    var preferredTime = document.getElementById("time").value;

    var valid = true;

    // Validation patterns
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phonePattern = /^\d{10}$/;
    var cardNumberPattern = /^\d{16}$/;
    var expiryDatePattern = /^(0[1-9]|1[0-2])\/\d{2}$/;
    var cvvPattern = /^\d{3}$/;

    // Validation checks
    if (!emailPattern.test(email)) {
      document.getElementById("email-error").textContent =
        "Please enter a valid email address";
      valid = false;
    }

    if (!phonePattern.test(phone)) {
      document.getElementById("phone-error").textContent =
        "Please enter a valid phone number (10 digits)";
      valid = false;
    }

    if (address.trim() === "") {
      document.getElementById("address-error").textContent =
        "Address cannot be empty";
      valid = false;
    }

    if (cardName.trim() === "") {
      document.getElementById("card-name-error").textContent =
        "Cardholder's name cannot be empty";
      valid = false;
    }

    if (!cardNumberPattern.test(cardNumber)) {
      document.getElementById("card-number-error").textContent =
        "Please enter a valid 16-digit card number";
      valid = false;
    }

    if (!expiryDatePattern.test(expiryDate)) {
      document.getElementById("expiry-date-error").textContent =
        "Please enter a valid expiry date in MM/YY format";
      valid = false;
    }

    var currentDate = new Date();
    var inputDate = new Date(
      "20" + expiryDate.split("/")[1],
      expiryDate.split("/")[0] - 1
    );
    if (inputDate < currentDate) {
      document.getElementById("expiry-date-error").textContent =
        "Please enter a future expiry date";
      valid = false;
    }

    if (!cvvPattern.test(cvv)) {
      document.getElementById("cvv-error").textContent =
        "Please enter a valid 3-digit CVV";
      valid = false;
    }

    // Validate preferred date (within the next 3 months)
    var selectedDate = new Date(preferredDate);
    var maxDate = new Date();
    maxDate.setMonth(maxDate.getMonth() + 3);

    if (selectedDate < currentDate || selectedDate > maxDate) {
      document.getElementById("date-error").textContent =
        "Preferred date must be within the next 3 months";
      valid = false;
    }

    // Validate preferred time (between 8 AM and 3 PM)
    var timePattern = /^([0-1][0-9]|2[0-3]):([0-5][0-9])$/;
    if (!timePattern.test(preferredTime)) {
      document.getElementById("time-error").textContent =
        "Please enter a valid time";
      valid = false;
    }

    var timeParts = preferredTime.split(":");
    var hour = parseInt(timeParts[0], 10);
    var minute = parseInt(timeParts[1], 10);

    if (hour < 8 || hour > 15 || (hour === 15 && minute > 0)) {
      document.getElementById("time-error").textContent =
        "Preferred time must be between 8 AM and 3 PM";
      valid = false;
    }

    // If all validations pass, submit the form
    if (valid) {
      event.target.submit();
    }
  });
});
