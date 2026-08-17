<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Management System</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    body {
      padding-top: 80px;
      /* Updated background settings */
      background-color: #f8f9fa;
      background-image: url('{{ url('other5.jpg') }}');
      background-size: 100% 100%; /* Set background image to fit the screen */
      background-position: center;
      background-attachment: fixed;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .navbar {
      background-color: #343a40;
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

    .container {
      background-color: #F1EDED;
      opacity: 1;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 40px;
      margin-bottom: 20px;
      margin-top: 40px;
    }

    h2 {
      color: #333;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
    }

    .form-control {
      border-radius: 5px;
    }

    .btn-primary {
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
    }

    .btn-primary:hover {
      background-color: #0056b3;
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
        <a class="nav-link" href="{{ url('/') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="{{ route('books.index') }}">Show/edit Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('books.create') }}">Add Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>
      </ul>
    </div>
  </nav>

<div class="container">
    <h2 class="mb-4"><strong>View Book Details</strong></h2>
    <div class="card mt-4">
        <div class="card-body">
            <h2 class="card-title">{{ $book->title }}</h2>
            <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
            <p class="card-text"><strong>Rating:</strong> {{ $book->rating }}</p>
            <p class="card-text"><strong>Publisher:</strong> {{ $book->publish }}</p>
        </div>
    </div>
    <a href="{{ url('/books') }}" class="btn btn-primary mt-4">Back</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
