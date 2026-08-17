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
             background-color: #f8f9fa; /* Set background color for the table container */
  
            background-image: url('{{ url('other5.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            /* padding: 0; */
            margin: 0;
            font-family: Arial, sans-serif;
        }
    /* Styling for the first navbar */
    nav#firstNavbar {
      background-color: #343a40;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 9999;
    }

    nav#firstNavbar .navbar-brand {
      font-size: 1.5rem;
    }

    nav#firstNavbar .navbar-dark .navbar-nav .nav-link {
      color: #fff;
    }

    nav#firstNavbar .navbar-dark .navbar-nav .nav-link.disabled {
      pointer-events: none;
    }

    /* Rest of your existing styles */
    .container {
      background-color: #F1EDED; /* Set the background color to white */
      opacity: 1; /* Make the background non-transparent */
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 40px;
      margin-bottom: 20px;
      margin-top: 40px; /* Add margin to create space between the container and navbar */
    }

    h2 {
      color: #333;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .btn-management {
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .btn-management:hover {
      background-color: #0056b3;
    }

    .table {
      background-color: #fff; /* Set the background color to white */
      opacity: 1; /* Make the background non-transparent */
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .table th {
      background-color: #f8f9fa;
    }

    .table td {
      vertical-align: middle;
    }

    .table thead th {
      white-space: nowrap; /* Prevent table header text from wrapping */
    }

    .table td,
    .table th {
      padding: 12px 15px; /* Increase padding for more spacing */
    }

    .btn-management-delete {
      background-color: #CD6155;
      color: #fff;
      font-weight: bold;
    }

    .btn-management-delete:hover {
      background-color: #a71d2a;
    }

    .btn-group {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

  </style>
</head>

<body>
  <!-- First Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="firstNavbar">
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
          <a class="nav-link" href="{{ route('books.create') }}">Add Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <h2>Books</h2>
    <a href="{{ route('books.create') }}" class="btn btn-primary btn-management">Add Book</a>
    <table class="table mt-4">
      <thead>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Rating</th>
          <th>Publisher</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($books as $book)
        <tr>
          <td>{{ $book->title }}</td>
          <td>{{ $book->author }}</td>
          <td>{{ $book->rating }}</td>
          <td>{{ $book->publish }}</td>
          <td>
            <div class="btn-group">
            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-management" style="background-color: #7DCEA0; color: #fff;">View</a>
              <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-management" style="background-color: #7FB3D5; color: #fff;">Edit</a>
              <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-management-delete"
                  onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>
