<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        Book::create($this->validateBook($request));

        return redirect('/books')->with('success', 'Book created successfully!');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($this->validateBook($request));

        return redirect('/books')->with('success', 'Book updated successfully!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/books')->with('success', 'Book deleted successfully!');
    }

    public function home()
    {
        return view('books.home');
    }

    private function validateBook(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'publish' => 'required|string|max:255',
        ]);
    }
}

