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

Route::get('/speakers', function () {
    return view('speakers');
});