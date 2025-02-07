<?php

// Connect to database
require_once 'connect.php';

// Get total books
$books_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM books"); 
$books_data = mysqli_fetch_assoc($books_result);
$total_books = $books_data['total'];

// Get total users 
$users_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users");
$users_data = mysqli_fetch_assoc($users_result);
$total_users = $users_data['total'];

// Get total requests
$requests_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM requested_books");
$requests_data = mysqli_fetch_assoc($requests_result);
$total_requests = $requests_data['total'];

// Output JSON data
$data = [
  'books' => $total_books,
  'users' => $total_users,
  'requests' => $total_requests
];

echo json_encode($data);

?>
