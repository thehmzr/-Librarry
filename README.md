<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 20px;
        }

        h1, h2 {
            color: #2c3e50;
        }

        section {
            background-color: #ecf0f1;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #bdc3c7;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Library Management System</h1>

    <section>
        <h2>Book List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Introduction to Programming</td>
                    <td>John Doe</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Data Structures and Algorithms</td>
                    <td>Jane Smith</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </section>

    <section>
        <h2>About the Project</h2>
        <p>
            Our Library Management System allows you to efficiently manage and organize your library's collection of books. You can easily add new books, view existing ones, and keep track of authors.
        </p>
        <p>
            To get started, <a href="#">sign in</a> or <a href="#">create an account</a>.
        </p>
    </section>

    <!-- Add more sections or content as needed -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
