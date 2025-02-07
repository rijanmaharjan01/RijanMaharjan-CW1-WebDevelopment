<?php

// Load books data
require_once 'connect.php';

$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);

$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Encode data as JSON
$json_data = json_encode($books);

// Print JSON data
echo $json_data;

?>