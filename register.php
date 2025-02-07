<?php
// Include connection file 
require_once 'connect.php';

// Get form data
$name = $_POST['name'];
$email = $_POST['email']; 
$password = $_POST['password'];

// Hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Insert with is_admin = 0  
$sql = "INSERT INTO users (name, email, password, is_admin) VALUES ('$name', '$email', '$password_hash', 0)";

if (mysqli_query($conn, $sql)) {
  // Redirect to login page
  header('Location: login.html');
  exit;
} else {
  echo "Error inserting user: " . mysqli_error($conn);
}

?>