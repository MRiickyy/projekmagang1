<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeContentController;
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

Route::get('/registration', function () {
    return view('registration'); // ini yang penting
});

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

Route::get('/speakers/{slug}', [SpeakerController::class, 'detailspeaker'])->name('detail.speaker');

// Route Committees
Route::get('/steering-committees', [CommitteeController::class, 'steering']);
Route::get('/technical-committees', [CommitteeController::class, 'technical']);
Route::get('/organizing-committees', [CommitteeController::class, 'organizing']);

//Route Home
Route::get('/', [HomeContentController::class, 'index'])->name('home');
// Halaman Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/home-contents', [HomeContentController::class, 'adminIndex'])->name('home_contents.index');
    Route::get('/home-contents/create', [HomeContentController::class, 'create'])->name('home_contents.create');
    Route::post('/home-contents', [HomeContentController::class, 'store'])->name('home_contents.store');
    Route::get('/home-contents/{homeContent}/edit', [HomeContentController::class, 'edit'])->name('home_contents.edit');
    Route::put('/home-contents/{homeContent}', [HomeContentController::class, 'update'])->name('home_contents.update');
    Route::delete('/home-contents/{homeContent}', [HomeContentController::class, 'destroy'])->name('home_contents.destroy');
});

// Route Author
Route::get('/author-information', [AuthorInformationController::class, 'index'])->name('author-information.index');

//Route Contact
Route::get('/contacts', [ContactInfoController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactMessageController::class, 'store'])->name('contact.send');
Route::get('/contacts', [MapLocationController::class, 'index'])->name('contact');
// Halaman Admin Contact
Route::prefix('admin')->group(function () {
    Route::get('/contact-infos', [ContactInfoController::class, 'indexAdmin'])->name('admin.contact_infos.indexAdmin');
    Route::get('/contact-infos/create', [ContactInfoController::class, 'create'])->name('admin.contact_infos.create');
    Route::post('/contact-infos', [ContactInfoController::class, 'store'])->name('admin.contact_infos.store');
    Route::get('/contact-infos/{contact}/edit', [ContactInfoController::class, 'edit'])->name('admin.contact_infos.edit');
    Route::put('/contact-infos/{contact}', [ContactInfoController::class, 'update'])->name('admin.contact_infos.update');
    Route::delete('/contact-infos/{contact}', [ContactInfoController::class, 'destroy'])->name('admin.contact_infos.destroy');
});