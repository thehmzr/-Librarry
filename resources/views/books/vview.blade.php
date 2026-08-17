@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Books</h2>
        <a href="{{route('books.create')}}" class="btn btn-primary">Add Book</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info">View</a>
<a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-primary">Edit</a>
<form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
</form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
