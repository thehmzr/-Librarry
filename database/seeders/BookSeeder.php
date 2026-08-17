<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Seed a few books so a fresh install has something to show.
     *
     * Does nothing once the table has rows, so running it against a real
     * catalogue will not duplicate or overwrite anything.
     *
     * @return void
     */
    public function run()
    {
        if (Book::count() > 0) {
            $this->command->info('Books already present, skipping.');

            return;
        }

        $books = [
            ['title' => 'Harry Potter and the Philosopher\'s Stone', 'author' => 'J.K. Rowling', 'rating' => '4.7', 'publish' => 'Bloomsbury'],
            ['title' => 'Slaughterhouse-Five', 'author' => 'Kurt Vonnegut', 'rating' => '4.1', 'publish' => 'Delacorte Press'],
            ['title' => 'The Lion, the Witch and the Wardrobe', 'author' => 'C.S. Lewis', 'rating' => '4.2', 'publish' => 'Geoffrey Bles'],
            ['title' => 'Dune', 'author' => 'Frank Herbert', 'rating' => '4.3', 'publish' => 'Chilton Books'],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
