<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Management System</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    body {
      padding-top: 120px;
      background-color: #f8f9fa;
      background-image: url('{{ url('other5.jpg') }}');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      margin: 0;
      font-family: Arial, sans-serif;
      background-size: 100% 100%; /* Set background image to fit the screen */
      background-position: center;
      background-attachment: fixed;
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
          <a class="nav-link" href="{{ route('books.index') }}">Show/edit Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="{{ route('books.create') }}">Add Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Add book -->
  <div class="container mt-5">
    <h2 class="mb-4">Add Book</h2>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('books.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
      </div>
      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}" required>
      </div>
      <div class="form-group">
        <label for="rating">Rating</label>
        <input type="number" step="0.1" min="0" max="5" class="form-control" id="rating" name="rating" value="{{ old('rating') }}" required>
      </div>
      <div class="form-group">
        <label for="publish">Publisher</label>
        <input type="text" class="form-control" id="publish" name="publish" value="{{ old('publish') }}" required>
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
