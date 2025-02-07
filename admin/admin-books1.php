<?php

// Include connection file 
require_once 'connect.php';

// Get form data
$cover_image = $_POST['cover_image'];
$book_link = $_POST['book_link'];
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];



// Insert book into database
$sql = "INSERT INTO books (cover_image_link, book_link, title, author, description) 
          VALUES ('$cover_image', '$book_link', '$title', '$author', '$description')";

echo "sorry";

if (mysqli_query($conn, $sql)) {
  // Redirect to login page
  header('Location: admin-books.php');
  exit;
} else {
  echo "Error inserting user: " . mysqli_error($conn);
}
?>