<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return app('App\Http\Controllers\BookController')->home();
});


Route::resource('books', BookController::class);
// routes/web.php
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/help', function () {
    return view('help');
})->name('help');
// Route::get('/', 'BookController@index');
// Route::get('/books/create', 'BookController@create');
// Route::post('/books', 'BookController@store');
// Route::get('/books/{id}', 'BookController@show');
// Route::get('/books/{id}/edit', 'BookController@edit');
// Route::put('/books/{id}', 'BookController@update');
// Route::delete('/books/{id}', 'BookController@destroy');
