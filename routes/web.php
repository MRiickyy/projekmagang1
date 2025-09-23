<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/author-information', function () {
    return view('author'); // ini yang penting
});

Route::get('/registration', function () {
    return view('registration'); // ini yang penting
});

Route::get('/call-for-papers', function () {
    return view('callpaper');
});

Route::get('/tutorial-speakers-2025', function () {
    return view('tutorialspeaker');
});

Route::get('/keynote-speakers-2025', function () {
    return view('keynotespeaker');
});

Route::get('contacts', function () {
    return view('contact');
});

Route::get('/detailspeakerK', function () {
    return view('detailspeakerK');
});

Route::get('/detailspeakerT', function () {
    return view('detailspeakerT');
});

// Route untuk halaman Steering Committees
Route::get('/steering-committees', function () {
    return view('SteeringCommittes');
})->name('steering.committes');

Route::get('/login', function () {
    return view('login');
});

Route::get('/newacc', function () {
    return view('newacc');
});
