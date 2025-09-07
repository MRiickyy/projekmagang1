<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/author', function () {
    return view('author'); // ini yang penting
});

Route::get('/registration', function () {
    return view('registration'); // ini yang penting
});

Route::get('/callpaper', function () {
    return view('callpaper');
});

Route::get('/tutorial-speaker', function () {
    return view('tutorialspeaker');
});

Route::get('/keynote-speaker', function () {
    return view('keynotespeaker');
});

// Route untuk halaman Steering Committees
Route::get('/steering-committes', function () {
    return view('SteeringCommittes');
})->name('steering.committes');

Route::get('/login', function () {
    return view('login');
});