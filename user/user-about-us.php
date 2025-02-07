<?php
include 'connect.php';
include 'user-auth.php';
// Query to get about us data
$sql = "SELECT image1, image2, description FROM about_us";
$result = mysqli_query($conn, $sql);
$about = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Home</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">Book Paradime</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="requestbook.php">Book Requests </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user-about-us.php">About us </a>
        </li>
      </ul>
      <div class="d-flex justify-content-end">
        <a href="/cw1/clear_cookie.php" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </nav>
  <!-- About Section -->
  <div class="container my-5">

    <div class="row align-items-center">

      <div class="col-md-6 order-2 order-md-1">

        <h2>About Us</h2>

        <p class="lead text-justify">
          <span class="font-italic">
            <?php echo $about['description']; ?>
          </span>

        <blockquote class="blockquote text-right">
          <p>: By Admin</p>
        </blockquote>
        </p>

      </div>
      <div class="col-md-6 order-1 order-md-2 text-center">

        <img src="<?php echo $about['image1']; ?>" class="img-fluid">

      </div>

    </div>


  </div>



  <!-- footer section -->
  <footer class="bg-dark text-light mt-5">
    <div class="container py-3">
      <div class="row">
        <div class="col-md-6">
          <p>&copy; 2023 BookParadime </p>
        </div>
        <div class="col-md-6 text-md-right">
          <a class="text-light" href="#">Terms of Use</a> |
          <a class="text-light" href="#">Privacy Policy</a>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>