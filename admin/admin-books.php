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
      width: 50px;
      height: 50px;
      object-fit: cover;
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
        <li class="nav-item ">
          <a class="nav-link" href="admin-home.php">Users </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="admin-home.php">Requests </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="admin-books.php">Books<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="admin-about-us.php">About us </a>
        </li>
      </ul>
      <div class="d-flex justify-content-end">
        <a href="/cw1/clear_cookie.php" class="btn btn-danger">Logout</a>
      </div>

    </div>
  </nav>

  <div class="container my-5">

    <h1>Admin Panel</h1>

    <!-- Books table -->
    <h2>Books</h2>
    <table class="table table-dark table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Cover</th>
          <th scope="col">Link</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Description</th>
        </tr>
      </thead>

      <tbody id="books-table">
      </tbody>
    </table>

    <!-- Delete book form -->
    <h2>Delete Book</h2>
    <form class="form-inline" method="POST" action="delete_books.php">
      <input class="form-control mr-2" type="text" name="id" placeholder="Enter Book ID" />
      <button class="btn btn-danger" type="submit">Delete</button>
    </form>

    <!-- Add New Book Form -->

    <h2>Add New Book</h2>

    <form method="POST" action="admin-books1.php">

      <div class="form-group">
        <label>Cover Image</label>
        <input type="text" class="form-control" name="cover_image">
      </div>

      <div class="form-group">
        <label>Book Link</label>
        <input type="text" class="form-control" name="book_link">
      </div>

      <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title">
      </div>

      <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" name="author">
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Add Book</button>

    </form>
  </div>

  <script>
    $(document).ready(function () {

      $.getJSON("load-books.php", function (data) {
        $.each(data, function (key, book) {
          let row = `
                <tr>
                  <td>${book.id}</td>
                  <td><img class="cover-image" src="${book.cover_image_link}"></td>
                  <td>${book.book_link.substring(0, 30)}</td>
                  <td>${book.title}</td>
                  <td>${book.author}</td>
                  <td>${book.description.substring(0, 30)}...</td>
                </tr>
              `;
          $("#books-table").append(row);
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