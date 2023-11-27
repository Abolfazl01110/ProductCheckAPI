<?php
// Include necessary files and database connection
include 'config/db_connect.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: *");
// Read the content of the db.json file
$jsonPath = 'db.json'; // Update the path
$jsonContent = file_get_contents($jsonPath);

// Convert JSON to PHP array
$data = json_decode($jsonContent, true);

if ($data !== null) {
    foreach ($data as $entry) {
        // Sanitize input data
        $username = mysqli_real_escape_string($conn, $entry['username']);
        $products = mysqli_real_escape_string($conn, $entry['products']);
        $number_of_products = mysqli_real_escape_string($conn, $entry['numberOfProducts']);
        $price = mysqli_real_escape_string($conn, $entry['price']);
        $name = mysqli_real_escape_string($conn, $entry['name']);
        $lastname = mysqli_real_escape_string($conn, $entry['lastname']);
        $organization = mysqli_real_escape_string($conn, $entry['organization']);
        $country = mysqli_real_escape_string($conn, $entry['country']);
        $province = mysqli_real_escape_string($conn, $entry['province']);
        $city = mysqli_real_escape_string($conn, $entry['city']);
        $address1 = mysqli_real_escape_string($conn, $entry['address1']);
        $address2 = mysqli_real_escape_string($conn, $entry['address2']);
        $postal_code = mysqli_real_escape_string($conn, $entry['postalCode']);
        $phone_number = mysqli_real_escape_string($conn, $entry['phoneNumber']);
        $email = mysqli_real_escape_string($conn, $entry['email']);
        $national_code = mysqli_real_escape_string($conn, $entry['nationalCode']);
        $additional_notes = mysqli_real_escape_string($conn, $entry['additionalNotes']);

        // Insert data into the database
        $sql = "INSERT INTO Orders (ID, username, products, numberOfProducts, price, name, lastname, organization, country, province, city, address1, address2, postalCode, phoneNumber, email, nationalCode, additionalNotes) 
                VALUES (NULL, '$username', '$products', '$number_of_products', '$price', '$name', '$lastname', '$organization', '$country', '$province', '$city', '$address1', '$address2', '$postal_code', '$phone_number', '$email', '$national_code', '$additional_notes')";

        mysqli_query($conn, $sql);
    }

    // Clear the content of the db.json file
    file_put_contents($jsonPath, json_encode([]));
}

// Close the database connection
mysqli_close($conn);
?>
