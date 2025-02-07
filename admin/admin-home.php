<!DOCTYPE html>
<html>
  <head>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
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
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="admin-dashboard.php">Admin Panel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link" href="admin-home.php">Users </a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="admin-home.php">Requests</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-books.php">Books</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="admin-about-us.php">About-us </a>
          </li>
        </ul>
        <div class="d-flex justify-content-end">
        <a href="/cw1/clear_cookie.php" class="btn btn-danger">Logout</a>
      </div>
      </div>
    </nav>

    <div class="container my-5">
      <h1>Admin Panel</h1>

      <h2>Users</h2>

      <table class="table table-dark table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Join Date</th>
          </tr>
        </thead>

        <tbody id="users-table"></tbody>
      </table>

      <form
        id="delete-user-form"
        class="form-inline"
        method="POST"
        action="delete_users.php"
      >
        <input
          class="form-control mr-2"
          type="text"
          name="id"
          placeholder="Enter User ID"
        />
        <button class="btn btn-danger" type="submit">Delete User</button>
      </form>
      <br />
      <h2>Requested Books</h2>

      <table class="table table-dark table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">ISBN</th>
            <th scope="col">Author</th>
            <th scope="col">Release Date</th>
          </tr>
        </thead>

        <tbody id="requests-table"></tbody>
      </table>

      <form
        id="delete-request-form"
        class="form-inline"
        method="POST"
        action="delete_request.php"
      >
        <input
          class="form-control mr-2"
          type="text"
          name="id"
          placeholder="Enter Request ID"
        />
        <button class="btn btn-danger" type="submit">Delete Request</button>
      </form>
    </div>

    <script>
      $(document).ready(function () {
        $.getJSON("admin-home1.php", function (data) {
          let users = data.users;
          let requests = data.requests;

          // Build users table
          $.each(users, function (index, user) {
            let row = `
            <tr>
              <td>${user.id}</td>
              <td>${user.name}</td>
              <td>${user.email}</td>
              <td>${user.created_at}</td>
            </tr>
          `;

            $("#users-table").append(row);
          });

          // Build requests table
          $.each(requests, function (index, request) {
            let row = `
            <tr>
              <td>${request.id}</td>
              <td>${request.book_name}</td>
              <td>${request.isbn}</td>
              <td>${request.author}</td>
              <td>${request.release_date}</td>  
            </tr>
          `;

            $("#requests-table").append(row);
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
