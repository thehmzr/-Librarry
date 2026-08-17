# Library Management System

A Laravel web app for cataloguing a library's collection. Add books, browse
them, edit and delete — each record holding a title, author, rating and
publisher.

Built as a university web programming project.

![Dashboard](docs/images/dashboard.jpg)

## Setup

Requires PHP 8.0.2+, Composer and MySQL.

```bash
git clone https://github.com/thehmzr/-Librarry.git && cd -Librarry
composer install
cp .env.example .env
php artisan key:generate
```

Create the database and point `.env` at it:

```sql
CREATE DATABASE librarydb;
```

```
DB_DATABASE=librarydb
DB_USERNAME=root
DB_PASSWORD=
```

Then migrate and serve:

```bash
php artisan migrate
php artisan serve
```

The app runs at http://127.0.0.1:8000.

## Pages

**Books.** The full catalogue in one table — title, author, rating and
publisher, with view, edit and delete on every row.

![Books](docs/images/books.jpg)

**Add.** A form for the four fields. Submits to `POST /books` and returns to
the catalogue with a confirmation.

![Add a book](docs/images/add-book.jpg)

**View.** A single book on its own page.

![View a book](docs/images/view-book.jpg)

**Edit.** The same four fields, pre-filled from the record, submitted as a
`PUT` to `/books/{id}`.

![Edit a book](docs/images/edit-book.jpg)

**About.** A static page describing the library.

![About](docs/images/about.jpg)

## Routes

All book routes come from a single `Route::resource` in `routes/web.php`.

| Method    | URI                | Action                |
| --------- | ------------------ | --------------------- |
| GET       | `/`                | Dashboard             |
| GET       | `/books`           | List all books        |
| GET       | `/books/create`    | Form to add a book    |
| POST      | `/books`           | Store a new book      |
| GET       | `/books/{id}`      | View one book         |
| GET       | `/books/{id}/edit` | Form to edit a book   |
| PUT/PATCH | `/books/{id}`      | Update a book         |
| DELETE    | `/books/{id}`      | Delete a book         |
| GET       | `/about`           | About page            |
| GET       | `/help`            | Help page             |

## Schema

One table, `books`, created by
`database/migrations/2023_05_25_080940_create_books_table.php`.

| Column       | Type      | Notes            |
| ------------ | --------- | ---------------- |
| `id`         | bigint    | primary key      |
| `title`      | string    |                  |
| `author`     | string    |                  |
| `rating`     | string    |                  |
| `publish`    | string    | publisher name   |
| `created_at` | timestamp |                  |
| `updated_at` | timestamp |                  |

## Layout

| Path                                     | What it is                          |
| ---------------------------------------- | ----------------------------------- |
| `app/Http/Controllers/BookController.php` | All seven CRUD actions plus `home()` |
| `app/Models/Book.php`                    | Eloquent model for `books`          |
| `routes/web.php`                         | Route definitions                   |
| `resources/views/books/index.blade.php`  | Catalogue table                     |
| `resources/views/books/create.blade.php` | Add form                            |
| `resources/views/books/edit.blade.php`   | Edit form                           |
| `resources/views/books/show.blade.php`   | Single book page                    |
| `resources/views/books/home.blade.php`   | Dashboard                           |
| `resources/views/about.blade.php`        | About page                          |
| `resources/views/help.blade.php`         | Help page                           |
| `resources/views/layouts/app.blade.php`  | Shared layout                       |
| `database/migrations/`                   | Schema migrations                   |
| `public/`                                | Front controller and images         |
| `config/`                                | Laravel configuration               |

Styling is Bootstrap over CDN, written inline in each view. There is no build
step for the front end — the Vite setup is Laravel's default and unused.

## Notes

`vendor/` and `.env` are not tracked. Run `composer install` and copy
`.env.example` after cloning.

`librarry.zip` and `Library Management System.pptx` are the original
submission archive and its presentation, kept for reference.
