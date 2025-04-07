<?php
include "includes/connect.php";

// Get the search term from the POST data
$searchTerm = $_POST['searchTerm'];

// Check if a search term is provided
if (!isset($searchTerm)) {
    echo "<p>No search term provided</p>";
} else {
    // Fetch doctors based on the search term
    $query = "SELECT doctor.*, hospital.address AS hospital_address 
          FROM doctor 
          INNER JOIN hospital ON doctor.hospital_hospital_id = hospital.hospital_id 
          WHERE 
          doctor.first_name LIKE '%$searchTerm%' OR
          doctor.last_name LIKE '%$searchTerm%' OR
          doctor.city LIKE '%$searchTerm%' OR
          doctor.province LIKE '%$searchTerm%' OR
          doctor.specialization LIKE '%$searchTerm%' OR
          hospital.address LIKE '%$searchTerm%'";
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if ($result) {
        // Initialize an empty array to store doctors
        $doctors = array();

        // Loop through each row of the result set
        while ($row = mysqli_fetch_assoc($result)) {
            // Add each doctor to the array
            $doctors[] = $row;
        }

        // Convert the array to JSON format
        $json_doctors = json_encode($doctors);

        // Output the JSON data
        header('Content-Type: application/json');
        echo $json_doctors;
    } else {
        // If the query fails, return an error message
        echo json_encode(array('error' => 'Failed to fetch doctors.'));
    }
}
