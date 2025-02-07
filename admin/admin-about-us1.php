<?php

// Include connection file 
require_once 'connect.php';

// Get form data
$image1 = $_POST['image1'];
$image2 = $_POST['image2'];
$description = $_POST['description'];


$sql = "UPDATE about_us SET image1='$image1', image2='$image2', description='$description'";


echo "sorry";

if (mysqli_query($conn, $sql)) {
  // Redirect to login page
  header('Location: admin-about-us.php');
  exit;
} else {
  echo "Error inserting user: " . mysqli_error($conn);
}
?>