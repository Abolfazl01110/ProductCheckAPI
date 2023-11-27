<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: *");

// Read data from products.json
$jsonPath = 'products.json';
$jsonContent = file_get_contents($jsonPath);

// Send the data back to the user
echo $jsonContent;
?>
