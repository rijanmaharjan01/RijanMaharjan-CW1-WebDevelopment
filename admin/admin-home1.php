<?php
// Include connection file 
require_once 'connect.php';

// Fetch users data from the database
$query_users = "SELECT * FROM users";
$result_users = mysqli_query($conn, $query_users);

// Fetch requested books data from the database
$query_requests = "SELECT * FROM requested_books";
$result_requests = mysqli_query($conn, $query_requests);

$users = [];
$requests = [];

// Process users data
if (mysqli_num_rows($result_users) > 0) {
    while ($row = mysqli_fetch_assoc($result_users)) {
        $users[] = $row;
    }
}

// Process requested books data
if (mysqli_num_rows($result_requests) > 0) {
    while ($row = mysqli_fetch_assoc($result_requests)) {
        $requests[] = $row;
    }
}

// Prepare the data to be returned as JSON
$data = [
    'users' => $users,
    'requests' => $requests
];

// Close the database connection
mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($data);
?>
