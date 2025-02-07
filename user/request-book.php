<?php

// Include connection file 
require_once 'connect.php';

$book_name = strip_tags($_POST['book_name']); 
$isbn = strip_tags($_POST['isbn']);
$author = strip_tags($_POST['author']);
$release_date = strip_tags($_POST['release_date']);


$sql = "INSERT INTO requested_books (book_name, isbn, author, release_date) 
        VALUES ('$book_name', '$isbn', '$author', '$release_date')";
        
$conn->query($sql);
              
header('Location: requestbook.php');

?>