<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // default
});

Route::get('/author', function () {
    return view('author'); // ini yang penting
});

Route::get('/callpaper', function () {
    return view('callpaper');
});

// Route untuk halaman Steering Committees
Route::get('/steering-committes', function () {
    return view('SteeringCommittes');
})->name('steering.committes');
