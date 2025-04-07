<?php
include "../includes/connect.php";

$province = $_POST['province']; // Corrected variable name without $ sign


if (!isset($province)) {
    echo "<p>No province selected</p>";
    # code...
} else {
    # code...
    // Fetch hospitals
    $hospital_query = mysqli_query($con, "SELECT * FROM `hospital` WHERE province = '$province'");

    // Check if query was successful
    if ($hospital_query) {
        // Initialize an empty array to store hospitals
        $hospitals = array();

        // Loop through each row of the result set
        while ($row = mysqli_fetch_assoc($hospital_query)) {
            // Add each hospital to the array
            $hospitals[] = $row;
        }

        // Convert the array to JSON format
        $json_hospitals = json_encode($hospitals);

        // Output the JSON data
        header('Content-Type: application/json');
        echo $json_hospitals;
    } else {
        // If the query fails, return an error message
        echo json_encode(array('error' => 'Failed to fetch hospitals.'));
    }
}
