<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\AuthorInformationController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/author-information', function () {
    return view('author'); // ini yang penting
});

Route::get('/registration', function () {
    return view('registration'); // ini yang penting
});

Route::get('/call-for-papers', function () {
    return view('callpaper');
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/newacc', function () {
    return view('newacc');
});

// Route Speaker
Route::get('/keynote-speakers-2025', [SpeakerController::class, 'keynote']);
Route::get('/tutorial-speakers-2025', [SpeakerController::class, 'tutorial']);

Route::get('/speakers/{id}', [SpeakerController::class, 'detailspeaker'])->name('detail.speaker');

// Route Committees
Route::get('/steering-committees', [CommitteeController::class, 'steering']);
Route::get('/technical-committees', [CommitteeController::class, 'technical']);
Route::get('/organizing-committees', [CommitteeController::class, 'organizing']);
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route Author
Route::get('/author-information', [AuthorInformationController::class, 'index'])->name('author-information.index');
