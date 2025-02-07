<?php
// Include connection file 
require_once 'connect.php';

$id = $_POST['id'];
$query = "DELETE FROM users WHERE id=$id"; 
if (mysqli_query($conn, $query)) {
    // Redirect to login page
    header('Location: admin-home.php');
    exit;
  } else {
    echo "Error inserting user: " . mysqli_error($conn);
  }

?>