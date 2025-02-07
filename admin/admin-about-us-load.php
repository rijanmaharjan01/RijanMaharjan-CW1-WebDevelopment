<?php

// Load books data
require_once 'connect.php';

$query = "SELECT * FROM about_us";
$result = mysqli_query($conn, $query);

$abouts = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Encode data as JSON
$json_data = json_encode($abouts);

// Print JSON data
echo $json_data;

?>