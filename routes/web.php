<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpeakerController;

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

Route::get('/technical-program-committees', function () {
    return view('TechnicalProgramCommittee');
});

Route::get('/organizing-committe', function () {
    return view('OrganizingCommittee');
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