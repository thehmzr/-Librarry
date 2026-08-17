<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
      body {
      padding-top: 80px;
      /* Updated background settings */
      background-color: #f8f9fa;
      background-image: url('{{ url('about6.jpg') }}');
      background-size: 100% 100%; /* Set background image to fit the screen */
      background-position: center;
      background-attachment: fixed;
      margin: 0;
      font-family: Arial, sans-serif;
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
        

        body {
            background-image: url('{{ url('about6.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding: 0;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            left: 20px; 
            top: 50%;
            transform: translateY(-50%);
        }
        
        h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        
        p {
            color: #555;
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 10px;
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
          <a class="nav-link" href="{{ route('books.create') }}">Add Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="{{ route('about') }}">About Us</a>
        </li>
        
      </ul>
    </div>
  </nav>


    <div class="container">
        <h1>About Us</h1>

        <p>
            Welcome to our library! We are dedicated to providing a wide range of books and resources for our community. Our library offers a diverse collection of books, magazines, newspapers, and digital resources for all ages and interests.
        </p>
        <p>
            Our mission is to promote literacy, education, and lifelong learning. We strive to create a welcoming and inclusive environment where everyone can explore, discover, and grow.
        </p>
        <p>
            Visit us today and embark on a journey of knowledge and imagination. Our friendly staff is ready to assist you in finding the perfect book or resource for your needs. We also host various events and programs, so be sure to check our calendar for upcoming activities.
        </p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
