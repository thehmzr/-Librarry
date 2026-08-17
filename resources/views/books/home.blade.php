<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Management System</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    body {
      background-image: url('{{ url('home4.jpg') }}');
      background-size: cover;
      background-position: center;
      padding-top: 60px;
      background-size: 100% 100%; /* Set background image to fit the screen */
      background-position: center;
      background-attachment: fixed;
    }

    .jumbotron {
      background-color: rgba(255, 255, 255, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 80px; /* Increase the margin to create space between navbar and jumbotron */
      padding: 20px; /* Adjust the padding to reduce the size of the jumbotron container */
    }

    .navbar {
      background-color: #55606B;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 9999;
    }

    .navbar-brand {
      font-size: 1.5rem;
    }

    .navbar-dark .navbar-nav .nav-link {
      color: #fff;
    }

    .navbar-dark .navbar-nav .nav-link.disabled {
      pointer-events: none;
    }

    .card {
      height: 100%;
    }

    .card-body {
      text-align: center;
    }

    .card-title {
      font-size: 1.2rem; /* Adjust the font size to reduce the size of the jumbotron text */
      font-weight: bold;
    }

    .card-text {
      font-size: 1.8rem; /* Adjust the font size to reduce the size of the jumbotron text */
    }

    .btn-get-started.disabled:hover {
      background-color: #007bff;
      color: #fff;
    }

  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Library Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('books.index') }}">Show/Edit Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('books.create') }}">Add Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Homepage -->
  <div class="jumbotron">
    <div class="container text-center">
      <h1 class="display-4">Welcome to the Library Management System</h1>
      <p class="lead">Manage your library with ease.</p>
      <hr class="my-4">
      <p>Explore the system features and start managing your books and members.</p>
      <a class="btn btn-primary btn-lg btn-get-started disabled" href="#" role="button" disabled>Get Started</a>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
