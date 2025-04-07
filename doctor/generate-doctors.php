<?php

// Function to generate random date of birth
function generateDOB()
{
    $start_date = strtotime("1950-01-01");
    $end_date = strtotime("2000-12-31");
    $random_date = mt_rand($start_date, $end_date);
    return date("Y-m-d", $random_date);
}

// Function to generate random gender
function generateGender()
{
    $genders = ['Male', 'Female'];
    return $genders[array_rand($genders)];
}

// Function to generate a random email address
function generateEmail()
{
    $domains = ['gmail.com', 'yahoo.com', 'hotmail.com'];
    $username = strtolower(str_replace(' ', '', 'Doctor' . mt_rand(100, 999))); // Generate a random username
    $domain = $domains[array_rand($domains)];
    return $username . '@' . $domain;
}

// Function to generate a random phone number
function generatePhoneNumber()
{
    return '0' . mt_rand(600000000, 999999999); // South African phone number format
}

// Function to generate a random postal code (assuming South African format)
function generatePostalCode()
{
    return mt_rand(1000, 9999);
}

// Generate mockup data for 10 doctors
$doctors = [];
for ($i = 1; $i <= 10; $i++) {
    $doctor = [
        'first_name' => 'Doctor' . $i,
        'last_name' => 'Doe',
        'dob' => generateDOB(),
        'gender' => generateGender(),
        'email' => generateEmail(),
        'phone_number' => generatePhoneNumber(),
        'address' => '123 Street Name',
        'city' => 'City',
        'province' => 'Province',
        'postal_code' => generatePostalCode(),
        'license_number' => 'LICENSE' . $i,
        'specialization' => 'Specialization',
        'education' => 'Education',
        'hospital_id' => mt_rand(1, 5) // Assuming hospitals are identified by IDs from 1 to 5
    ];
    $doctors[] = $doctor;
}

// Output the generated mockup data
echo '<pre>';
print_r($doctors);
echo '</pre>';
