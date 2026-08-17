# Library Management System

A web application for cataloguing a library's book collection, built with
Laravel. Books can be added, listed, viewed, edited and deleted, with each
record holding a title, author, rating and publisher.

Built as a university web programming project.

## Stack

| Layer     | Technology                          |
| --------- | ----------------------------------- |
| Framework | Laravel 9                           |
| Language  | PHP 8.0.2+                          |
| Database  | MySQL                               |
| Views     | Blade templates                     |
| Styling   | Bootstrap 4.5 / 5.1 over CDN        |
| Assets    | Vite                                |

## Requirements

- PHP 8.0.2 or newer
- Composer
- MySQL
- Node.js and npm (only if you want to rebuild front-end assets)

## Setup

Install PHP dependencies:

```bash
composer install
```

Create your environment file and generate an application key:

```bash
cp .env.example .env
php artisan key:generate
```

Create the database and point `.env` at it:

```sql
CREATE DATABASE librarydb;
```

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=librarydb
DB_USERNAME=root
DB_PASSWORD=
```

Run the migrations:

```bash
php artisan migrate
```

Start the development server:

```bash
php artisan serve
```

The application is then available at http://127.0.0.1:8000.

## Routes

| Method    | URI                  | Action                        |
| --------- | -------------------- | ----------------------------- |
| GET       | `/`                  | Dashboard / home page         |
| GET       | `/books`             | List all books                |
| GET       | `/books/create`      | Form to add a book            |
| POST      | `/books`             | Store a new book              |
| GET       | `/books/{id}`        | View a single book            |
| GET       | `/books/{id}/edit`   | Form to edit a book           |
| PUT/PATCH | `/books/{id}`        | Update a book                 |
| DELETE    | `/books/{id}`        | Delete a book                 |
| GET       | `/about`             | About page                    |
| GET       | `/help`              | Help page                     |

The book routes are registered with a single `Route::resource` call in
`routes/web.php`.

## Data model

The `books` table is created by
`database/migrations/2023_05_25_080940_create_books_table.php`:

| Column       | Type      |
| ------------ | --------- |
| `id`         | bigint    |
| `title`      | string    |
| `author`     | string    |
| `rating`     | string    |
| `publish`    | string    |
| `created_at` | timestamp |
| `updated_at` | timestamp |

`publish` holds the publisher name.

## Project layout

```
app/Http/Controllers/BookController.php   CRUD actions for books
app/Models/Book.php                       Eloquent model
routes/web.php                            Route definitions
resources/views/books/                    Blade views for the book pages
resources/views/about.blade.php           About page
resources/views/help.blade.php            Help page
database/migrations/                      Schema migrations
public/                                   Images and front controller
```

## Notes

- `vendor/` and `.env` are not tracked. Run `composer install` and copy
  `.env.example` after cloning.
- `librarry.zip` and `Library Management System.pptx` are the original
  submission archive and accompanying presentation, kept for reference.
