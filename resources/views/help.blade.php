<!-- resources/views/help.blade.php -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Management System</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 <style>
  body {
  padding-top: 60px;
  background-color: #00FFFF;
}

.jumbotron {
  background-color: #f8f9fa;
}

.navbar {
  background-color: #343a40;
}

.navbar-brand {
  font-size: 1.5rem;
}

.navbar-dark .navbar-nav .nav-link {
  color: #fff;
}

.card {
  height: 100%;
}

.card-body {
  text-align: center;
}

.card-title {
  font-size: 1.5rem;
}

.card-text {
  font-size: 2rem;
}

  </style>
</head>
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Library Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
      
        <li class="nav-item">
          <a class="nav-link" href="{{ route('books.index') }}">Show/edit Books</a>
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
    <div class="container" style="background-color: aqua;">
        <div class="help-content">
            <h1>Help Manual</h1>
            <h2>Books CRUD Operations</h2>

            <h3>Create a Book</h3>
            <p>
                To create a new book, go to the Dashboard and click on the "Create Book" button. Fill in the required details, such as the title, author, and description of the book, and click the "Submit" button to create the book.
            </p>

            <h3>Read Books</h3>
            <p>
                The books table on the Dashboard displays a list of all the books in the library. You can view the details of each book, such as the title, author, and description, by clicking on the book's name in the table.
            </p>

            <h3>Update a Book</h3>
            <p>
                To update the details of a book, find the book in the books table and click on the "Edit" button. You can modify the title, author, and description of the book in the form that appears. Click the "Update" button to save the changes.
            </p>

            <h3>Delete a Book</h3>
            <p>
                If you want to remove a book from the library, locate the book in the books table and click on the "Delete" button. Confirm the deletion when prompted, and the book will be permanently removed from the system.
            </p>
        </div>
    </div>
@endsection
