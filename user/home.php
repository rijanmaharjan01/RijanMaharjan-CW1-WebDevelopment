<?php

include 'connect.php';
include 'user-auth.php';

$sql = "SELECT cover_image_link, book_link, title, author, description FROM books";

$result = mysqli_query($conn, $sql);

?>
<?php

// Configuration
$books_per_page = 6;

// Include connection file 
require_once 'connect.php';

// Get books
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
$total_books = mysqli_num_rows($result);

// Calculate total pages
$total_pages = ceil($total_books / $books_per_page);

// Get current page
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate offset for pagination
$offset = ($page - 1) * $books_per_page;

// Get paginated books
$sql = "SELECT * FROM books LIMIT $offset, $books_per_page";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <style>
        .book {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
        }

        .book-image {
            flex: 1;
            margin-right: 20px;
        }

        .book-info {
            flex: 3;
        }

        .book {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }
    </style>
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
                <li class="nav-item">
                    <div class=" d-flex justify-content-end">
                        <a href="/cw1/clear_cookie.php" class="btn btn-danger">Logout</a>
                    </div>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search books..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

        </div>
    </nav>
    <!-- Book tiles -->
    <div class="container my-5">
        <div class="row">

            <?php if (mysqli_num_rows($result) > 0): ?>

                <?php while ($row = mysqli_fetch_assoc($result)): ?>

                    <div class="book">

                        <div class="book-image">
                            <img src="<?= $row['cover_image_link'] ?>" class="img-fluid">
                        </div>

                        <div class="book-info">

                            <h5 class="card-title">
                                <?= $row['title'] ?>
                            </h5>

                            <p class="card-text mb-4">
                                By
                                <?= $row['author'] ?>
                            </p>

                            <p class="card-text">
                                <?= $row['description'] ?>
                            </p>

                            <a href="<?= $row['book_link'] ?>" class="btn btn-primary" target="_blank">
                                Read More
                            </a>

                        </div>

                    </div>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>
        <!-- Page navigation -->
<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">

    <?php if ($page > 1): ?>
      <li class="page-item">
        <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1">Previous</a>
      </li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
      <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>

    <?php if ($page < $total_pages): ?>
      <li class="page-item">
        <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
      </li>
    <?php endif; ?>

  </ul>
</nav>
    </div>
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