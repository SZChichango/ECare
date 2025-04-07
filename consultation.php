<?php
include "includes/connect.php";
$price = 0;
// check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login-client.php");
  exit;
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
  <link rel="stylesheet" href="./consultation.css" />


  <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
  <style>
    .error-message {
      color: red;
      margin-top: 0.5em;
      font-size: 0.9em;
    }
  </style>
  <title>ECare - Login</title>
</head>

<body>
  <div class="container">
    <?php include  "includes/header.php"; ?>

    <main>
      <h2>Appointment Details</h2>
      <section class="appointment-form">
        <div style="width: 640px; height: 480px" id="mapContainer"></div>
        <form action="create-appointment.php" method="POST" id="appointment-form">
          <section class="doctor-selection">
            <h2>Find a Doctor</h2>
            <div class="filter">
              <input type="text" id="search-term" name="search_term" placeholder="Search by name, city, province or specialization" />
              <button type="button" id="filter-btn">Filter</button>
            </div>
            <div id="doctor-cards">
              <!-- Doctor cards will be dynamically populated based on the selected location -->
            </div>
            <h3 id="selected-doctor"></h3>
          </section>
          <div class="form-field">
            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes" required></textarea>
          </div>
          <div class="form-field">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />
            <span class="error-message" id="email-error"></span>
          </div>
          <div class="form-field">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone_number" required />
            <span class="error-message" id="phone-error"></span>
          </div>
          <div class="form-field">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required />
            <span class="error-message" id="address-error"></span>
          </div>
          <input type="hidden" id="selected-doctor-id" name="doctor_id">
          <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
          <div class="date-time">
            <div class="form-field">
              <label for="date">Preferred Date:</label>
              <input type="date" id="date" name="date" required />
              <span class="error-message" id="date-error"></span>
            </div>
            <div class="form-field">
              <label for="time">Preferred Time:</label>
              <input type="time" id="time" name="time" required />
              <span class="error-message" id="time-error"></span>
            </div>
          </div>

          <!-- Payment Fields -->
          <div class="h3">Pay with card</div>
          <div id="card-payment">
            <div class="form-field">
              <label for="card-name">Cardholder's Name:</label>
              <input type="text" id="card-name" name="card_name" required />
              <span class="error-message" id="card-name-error"></span>
            </div>
            <div class="form-field">
              <label for="card-number">Card Number:</label>
              <input type="text" id="card-number" name="card_number" required />
              <span class="error-message" id="card-number-error"></span>
            </div>
            <div class="form-field">
              <label for="expiry-date">Expiry Date:</label>
              <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY" required />
              <span class="error-message" id="expiry-date-error"></span>
            </div>
            <div class="form-field">
              <label for="cvv">CVV:</label>
              <input type="text" id="cvv" name="cvv" required />
              <span class="error-message" id="cvv-error"></span>
            </div>
            <div class="form-field">
              <label for="cvv">Total:</label>
              <p>R<span>2500.00</span></p>
              <input type="hidden" id="amount" name="amount" value="<?php echo 2500; ?>" />
            </div>
          </div>
          <button type="submit">Submit</button>
        </form>
      </section>
    </main>

    <!-- Footer -->
    <?php include  "includes/footer.php"; ?>

    <script>
      // Initialize the HERE Map
      let platform = new H.service.Platform({
        'apikey': 'zshb-pan5UJiNbB8dv9ywN_O0Ze7LnY-IxMylnC7XQE'
      });

      // Obtain the default map types from the platform object
      var maptypes = platform.createDefaultLayers();

      // Instantiate (and display) the map
      var map = new H.Map(
        document.getElementById('mapContainer'),
        maptypes.vector.normal.map, {
          zoom: 10,
          // Center the map at the default location (adjust as needed)
          center: {
            lng: -26.270760,
            lat: 28.112268
          }
        });

      // Function to search for the location based on the entered text
      function searchLocation(address) {
        // var searchTerm = document.getElementById('search-term').value;

        // Use the Geocoding API to search for the location
        var geocoder = platform.getSearchService();
        geocoder.geocode({
          q: address
        }, (result) => {
          // Get the first location from the result
          var location = result.items[0].position;

          // Clear existing markers
          map.removeObjects(map.getObjects());

          // Add a marker for the found location
          var marker = new H.map.Marker(location);
          map.addObject(marker);

          // Optionally, adjust the map's view to fit the marker
          map.getViewModel().setLookAtData({
            position: location,
            zoom: 14
          });
        }, alert);
      }

      // Bind the searchLocation function to the button click event
      // document.getElementById('filter-btn').addEventListener('click', searchLocation);


      // Function to handle click event on doctor cards
      function selectDoctor(doctorId, firstName, lastName) {
        // Set the selected doctor's ID as the value of the hidden input field
        document.getElementById('selected-doctor-id').value = doctorId;
        // Clear existing search results
        document.getElementById('doctor-cards').innerHTML = '';
        document.getElementById('selected-doctor').innerHTML = firstName + ' ' + lastName;
      }


      // Fetch doctors
      // Fetch the results from livesearch.php
      let search = document.getElementById("search-term");
      let searchResults = document.getElementById("doctor-cards")


      search.addEventListener("keyup", () => {
        let searchValue = search.value;
        let result = "";
        if (searchValue.length > 0) {
          fetch("fetch-doctor.php", {
              method: "POST",
              body: new URLSearchParams("searchTerm=" + searchValue),
            })
            .then((response) => response.text())
            .then((data) => {
              data = JSON.parse(data);
              console.log(data);
              for (let i = 0; i < data.length; i++) {
                // Display the search results with the links
                result += `<div class="doctor-card" onclick="selectDoctor('${data[i].doctor_id}', '${data[i].first_name}', '${data[i].last_name}'); searchLocation('${data[i].hospital_address}')">


                    <img src="${data[i].profile_image}" alt="Dr. ${data[i].first_name} ${data[i].last_name}" />
                    <h3>${data[i].first_name} ${data[i].last_name}</h3>
                    <p>Specialty: ${data[i].specialization}</p>
                </div>`;
              }
              searchResults.innerHTML = result;
            });
        } else {
          searchResults.innerHTML = "No Results Found";
        }
      });
    </script>
    <script src="validation.js"></script>
  </div>
</body>

</html>