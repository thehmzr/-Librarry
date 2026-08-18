<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    private function makeBook(array $overrides = [])
    {
        return Book::create(array_merge([
            'title' => 'Dune',
            'author' => 'Frank Herbert',
            'rating' => '4.5',
            'publish' => 'Chilton Books',
        ], $overrides));
    }

    public function test_the_catalogue_lists_books()
    {
        $this->makeBook(['title' => 'Dune']);
        $this->makeBook(['title' => 'Slaughterhouse-Five']);

        $this->get('/books')
            ->assertOk()
            ->assertSee('Dune')
            ->assertSee('Slaughterhouse-Five');
    }

    public function test_a_book_can_be_added()
    {
        $this->post('/books', [
            'title' => 'Dune',
            'author' => 'Frank Herbert',
            'rating' => '4.5',
            'publish' => 'Chilton Books',
        ])->assertRedirect('/books');

        $this->assertDatabaseHas('books', [
            'title' => 'Dune',
            'author' => 'Frank Herbert',
            'rating' => '4.5',
            'publish' => 'Chilton Books',
        ]);
    }

    public function test_adding_a_book_requires_every_field()
    {
        $this->post('/books', ['title' => 'Dune'])
            ->assertSessionHasErrors(['author', 'rating', 'publish']);

        $this->assertDatabaseCount('books', 0);
    }

    public function test_a_rating_outside_zero_to_five_is_rejected()
    {
        $this->post('/books', [
            'title' => 'Dune',
            'author' => 'Frank Herbert',
            'rating' => '99',
            'publish' => 'Chilton Books',
        ])->assertSessionHasErrors('rating');

        $this->assertDatabaseCount('books', 0);
    }

    /**
     * update() used to assign the rating and publisher into the title and
     * author columns, so submitting the edit form unchanged wiped both.
     */
    public function test_editing_a_book_keeps_its_title_and_author()
    {
        $book = $this->makeBook([
            'title' => 'Slaughterhouse-Five',
            'author' => 'Kurt Vonnegut',
            'rating' => '4.1',
            'publish' => 'Delacorte Press',
        ]);

        $this->put("/books/{$book->id}", [
            'title' => 'Slaughterhouse-Five',
            'author' => 'Kurt Vonnegut',
            'rating' => '4.1',
            'publish' => 'Delacorte Press',
        ])->assertRedirect('/books');

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => 'Slaughterhouse-Five',
            'author' => 'Kurt Vonnegut',
            'rating' => '4.1',
            'publish' => 'Delacorte Press',
        ]);
    }

    public function test_editing_saves_the_new_values()
    {
        $book = $this->makeBook();

        $this->put("/books/{$book->id}", [
            'title' => 'Dune Messiah',
            'author' => 'Frank Herbert',
            'rating' => '4.0',
            'publish' => 'Putnam',
        ]);

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => 'Dune Messiah',
            'rating' => '4.0',
            'publish' => 'Putnam',
        ]);
    }

    public function test_a_book_can_be_deleted()
    {
        $book = $this->makeBook();

        $this->delete("/books/{$book->id}")->assertRedirect('/books');

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    public function test_a_book_that_does_not_exist_gives_a_404()
    {
        $this->get('/books/999')->assertNotFound();
        $this->get('/books/999/edit')->assertNotFound();
        $this->delete('/books/999')->assertNotFound();
    }

    public function test_the_static_pages_load()
    {
        $this->get('/')->assertOk();
        $this->get('/about')->assertOk();
        $this->get('/help')->assertOk();
    }
}
