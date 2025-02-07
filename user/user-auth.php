<?php

// Check for admin cookie
if(!isset($_COOKIE['user_type']) || $_COOKIE['user_type'] != 'user') {
  // Not logged in or not admin
  header('Location: /cw1/login.html'); 
  exit();
}

?>

