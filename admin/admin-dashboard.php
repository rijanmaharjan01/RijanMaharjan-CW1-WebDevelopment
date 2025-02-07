<?php 

include 'admin-auth.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

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
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
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
            <a class="nav-link" href="admin-books.php">Books</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-about-us.php">About us </a>
          </li>
        </ul>
        <div class="d-flex justify-content-end">
        <a href="/cw1/clear_cookie.php" class="btn btn-danger">Logout</a>
      </div>
          
        </button>
      </div>
    </nav>
    <br />
    <div class="container mt-5">
      <!-- Summary cards -->

      <div class="row">
        <div class="col-md-4">
          <div class="card bg-primary text-white">
            <div class="card-body">
              <h5 class="card-title">Total Books</h5>
              <p class="card-text" id="total-books"></p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card bg-success text-white">
            <div class="card-body">
              <h5 class="card-title">Total Users</h5>
              <p class="card-text" id="total-users"></p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card bg-info text-white">
            <div class="card-body">
              <h5 class="card-title">Book Requests</h5>
              <p class="card-text" id="total-requests"></p>
            </div>
          </div>
        </div>
      </div>

      <canvas id="myChart"></canvas>
    </div>
    <!--Footer-->
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

    <script>
      $(document).ready(function () {
        // Fetch summary data
        $.getJSON("admin-dashboard1.php", function (data) {
          $("#total-books").text(data.books);
          $("#total-users").text(data.users);
          $("#total-requests").text(data.requests);

          // Extract data for chart
          var books = data.books;
          var users = data.users;
          var requests = data.requests;

          // Get canvas
          var ctx = document.getElementById("myChart").getContext("2d");

          // Global chart settings
          Chart.defaults.global.defaultFontFamily = "Lato";
          Chart.defaults.global.defaultFontSize = 18;

          // Create chart
          var myChart = new Chart(ctx, {
            type: "bar", // bar chart
            data: {
              labels: ["Books", "Users", "Requests"], // labels
              datasets: [
                {
                  label: "Data overviwew", // dataset label
                  data: [books, users, requests], // data values
                  backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(255, 206, 86, 0.2)",
                  ],
                  borderColor: [
                    "rgba(255,99,132,1)",
                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 206, 86, 1)",
                  ],
                  borderWidth: 2,
                },
              ],
            },
            options: {
              scales: {
                yAxes: [
                  {
                    ticks: {
                      beginAtZero: true,
                    },
                  },
                ],
              },
            },
          });
        });
      });
    </script>
  </body>
</html>
