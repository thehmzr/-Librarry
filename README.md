# Library Management System

A Laravel app for keeping track of a library's books. You can add books, list
them, view one, edit it and delete it. Each book has a title, author, rating
and publisher.

I built this for a university web programming course.

![Dashboard](docs/images/dashboard.jpg)

## Running it

You need PHP 8.0.2 or newer and Composer. On mac:

```bash
brew install php@8.2 composer
```

Then:

```bash
git clone https://github.com/thehmzr/-Librarry.git && cd -Librarry
./run.sh
```

Installs the dependencies, sets up the database, adds a few sample books
and starts the server on http://127.0.0.1:8000. Ctrl+C stops it.

Runs on SQLite so you don't need to install or start a database server.
Can run the script again any time; 
Does the steps that still need
doing and won't overwrite books you've added.

```bash
./run.sh --port 8080   # different port
./run.sh --fresh       # rebuild the database
./run.sh --setup       # set up but don't start the server
```

### With MySQL

Originally written against MySQL. Create the database:

```sql
CREATE DATABASE librarydb;
```

Set these in `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=librarydb
DB_USERNAME=root
DB_PASSWORD=
```

Then run `php artisan migrate` and `php artisan serve`.

## Tests

```bash
php artisan test
```

## Pages

The catalogue lists every book with view, edit and delete buttons on each row.

![Books](docs/images/books.jpg)

Adding a book is a form with the four fields. It posts to `/books` and sends
you back to the catalogue.

![Add a book](docs/images/add-book.jpg)

Each book also has its own page.

![View a book](docs/images/view-book.jpg)

Editing loads the same fields with the current values filled in.

![Edit a book](docs/images/edit-book.jpg)

There's a static about page as well.

![About](docs/images/about.jpg)

## Routes

Routes all come from one `Route::resource` call in `routes/web.php`.

| Method    | URI                | Action              |
| --------- | ------------------ | ------------------- |
| GET       | `/`                | Dashboard           |
| GET       | `/books`           | List all books      |
| GET       | `/books/create`    | Form to add a book  |
| POST      | `/books`           | Store a new book    |
| GET       | `/books/{id}`      | View one book       |
| GET       | `/books/{id}/edit` | Form to edit a book |
| PUT/PATCH | `/books/{id}`      | Update a book       |
| DELETE    | `/books/{id}`      | Delete a book       |
| GET       | `/about`           | About page          |
| GET       | `/help`            | Help page           |

#Database

One table, `books`, with `title`, `author`, `rating` and `publish`
columns (all strings) plus the usual `id` and timestamps. `publish` holds the
publisher name.
`database/migrations/2023_05_25_080940_create_books_table.php`.

#

```
app/Http/Controllers/BookController.php   the CRUD actions
app/Models/Book.php                       the model
routes/web.php                            routes
resources/views/books/                    catalogue, add, edit and view pages
resources/views/about.blade.php           about page
resources/views/help.blade.php            help page
database/migrations/                      schema
database/seeders/BookSeeder.php           sample books
tests/Feature/BookTest.php                tests for the book pages
public/                                   front controller and images
run.sh                                    setup and server script
```

#Notes

`librarry.zip` and `Library Management System.pptx` 
