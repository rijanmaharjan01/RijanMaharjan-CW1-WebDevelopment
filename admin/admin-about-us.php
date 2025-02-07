<?php

include 'admin-auth.php';

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <style>
    body {
      background-color: #212529;
      color: white;
    }

    .navbar {
      background-color: #343a40;
    }

    th,
    td {
      vertical-align: middle;
    }

    .cover-image {
      width: 75px;
      height: 75px;
      object-fit: cover;
    }

    /* Hide scrollbar */
    .overflow-auto {
      -ms-overflow-style: none;
      /* IE and Edge */
      scrollbar-width: none;
      /* Firefox */
    }

    .overflow-auto::-webkit-scrollbar {
      display: none;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="admin-dashboard.php">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="admin-home.php">Users </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin-home.php">Requests </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin-books.php">Books</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="admin-about-us.php">About us <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <div class="d-flex justify-content-end">
        <a href="/cw1/clear_cookie.php" class="btn btn-danger">Logout</a>
      </div>

    </div>
  </nav>

  <div class="container my-5">
    <h1>Admin Panel</h1>
    <br />
    <!-- About us table -->
    <h2>About US page</h2>
    <table class="table table-dark table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Image1</th>
          <th scope="col">Image2</th>
          <th scope="col">Description</th>
        </tr>
      </thead>
      <tbody id="about-us-table"></tbody>
    </table>

    <!-- Edit About us page -->

    <h2>Edit About us page</h2>

    <form method="POST" action="admin-about-us1.php">
      <div class="form-group">
        <label>Image1</label>
        <input type="text" class="form-control" name="image1" />
      </div>

      <div class="form-group">
        <label>Image2</label>
        <input type="text" class="form-control" name="image2" />
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Upadte</button>
    </form>
  </div>

  <script>
    $(document).ready(function () {
      $.getJSON("admin-about-us-load.php", function (data) {
        $.each(data, function (key, book) {
          let row = `
          <tr>
            <td>${book.id}</td>
            <td><img class="cover-image" src="${book.image1}"></td>
            <td><img class="cover-image" src="${book.image2}"></td>
            <td><div class="d-flex flex-column h-100">
            <div class="overflow-auto" style="max-height: 100px;">
              ${book.description}
            </div>
          </div></td>
          </tr>
        `;
          $("#about-us-table").append(row);
        });
      });
    });
  </script>


  <footer class="bg-dark text-light mt-5">
    <div class="container py-3">
      <div class="row">
        <div class="col-md-6">
          <p>&copy; 2023 BookParadime - Admin Panel</p>
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