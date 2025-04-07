<?php
include "../includes/connect.php";

$response = ['status' => 'error', 'message' => 'Unknown error'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal_code'];
    $license_number = $_POST['license_number'];
    $specialization = $_POST['specialization'];
    $education = $_POST['education'];
    $hospital_id = $_POST['hospital'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // File upload
    if (isset($_FILES['croppedImage'])) {
        $file = $_FILES['croppedImage'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file_ext = 'png'; // Get the file extension

        // echo "The file extension is " . $file_ext;

        // Define allowed file extensions
        $allowed_extensions = ['jpg', 'jpeg', 'png'];

        if (in_array($file_ext, $allowed_extensions)) {
            // Generate a unique file name to prevent overwriting
            $new_file_name = uniqid('', true) . '.' . $file_ext;
            $file_destination = '../assets/images/uploads/' . $new_file_name;
            $file_destination_url = 'assets/images/uploads/' . $new_file_name;

            // Move the uploaded file to the specified destination
            if (move_uploaded_file($file_tmp, $file_destination)) {
                // File uploaded successfully, proceed with database insertion
                // Check if email is already used
                if ($stmt = $con->prepare("SELECT * FROM doctor WHERE email = ?")) {
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows == 0) {
                        // Email not found, insert new user into database
                        # code...
                        $sql = "INSERT INTO doctor (first_name, last_name, dob, gender, email, phone_number, address, city, province, postal_code, license_number, specialization, education, hospital_hospital_id, password, profile_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param("ssssssssssssssss", $first_name, $last_name, $dob, $gender, $email, $phone_number, $address, $city, $province, $postal_code, $license_number, $specialization, $education, $hospital_id, $password, $file_destination_url);

                        if ($stmt->execute()) {
                            // Doctor registered successfully
                            $response = ['status' => 'success', 'message' => 'Doctor registered successfully!'];
                        } else {
                            // Error occurred while inserting into the database
                            $response['message'] = "Database error: " . $stmt->error;
                        }
                    } else {
                        // Email already exists, display error message
                        $response['message'] = "Email already in use!";
                    }
                }
            } else {
                // Failed to move the uploaded file
                $response['message'] = "Failed to upload the profile image.";
            }
        } else {
            // Invalid file extension
            $response['message'] = "Invalid file extension.";
        }
    } else {
        // No file uploaded
        $response['message'] = "No profile image uploaded.";
    }
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
