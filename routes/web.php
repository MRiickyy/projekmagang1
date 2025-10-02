<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeContentController;
use App\Http\Controllers\CallPaperController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\AuthorInformationController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\MapLocationController;
use App\Http\Controllers\RegistrationController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/author-information', function () {
    return view('author'); // ini yang penting
});

Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');

Route::get('/call-for-papers', function () {
    return view('callpaper');
});

// Route::get('/contacts', function () {
//     return view('contact');
// });

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