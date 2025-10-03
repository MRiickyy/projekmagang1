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

Route::get('/', function () {
return view('home');
 });

Route::get('/call-for-papers', function () {
    return view('callpaper');
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
Route::get('/admin/speakers', [SpeakerController::class, 'adminList'])->name('admin.speakers');

// Route Committees
Route::get('/steering-committees', [CommitteeController::class, 'steering']);
Route::get('/technical-committees', [CommitteeController::class, 'technical']);
Route::get('/organizing-committees', [CommitteeController::class, 'organizing']);
Route::get('/admin/committees', [CommitteeController::class, 'adminList'])->name('admin.committees');

//Route Home
Route::get('/', [HomeContentController::class, 'index'])->name('home');
// Halaman Admin
Route::get('/admin/home-contents-admin/tambah', [HomeContentController::class, 'adminList'])->name('admin.tambah_home_contents_admin');

// Route For Author
Route::get('/author-information', [AuthorInformationController::class, 'index'])->name('author-information.index');
Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');

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

//Route Call Paper
Route::get('/call-for-papers', [CallPaperController::class, 'index'])->name('call_papers');
// Halaman Admin Call Paper
Route::prefix('admin')->group(function () {
    Route::get('/call-papers', [CallPaperController::class, 'indexAdmin'])->name('admin.call_papers');
    Route::get('/call-papers/create', [CallPaperController::class, 'create'])->name('admin.call_papers.create');
    Route::post('/call-papers', [CallPaperController::class, 'store'])->name('admin.call_papers.store');
    Route::get('/call-papers/{callPaper}/edit', [CallPaperController::class, 'edit'])->name('admin.call_papers.edit');
    Route::put('/call-papers/{callPaper}', [CallPaperController::class, 'update'])->name('admin.call_papers.update');
    Route::delete('/call-papers/{callPaper}', [CallPaperController::class, 'destroy'])->name('admin.call_papers.destroy');
});

Route::get('/admin/login', function () {
    return view('loginAdmin');
})->name('admin.login');

Route::get('/admin/speakerss', function () {
    return view('speakerAdmin'); // file: resources/views/keyspeakers.blade.php
})->name('admin.speakerss');

// Halaman Committees Admin
Route::get('/admin/committee', function () {
    return view('/admin/committeesAdmin'); // file: resources/views/committees.blade.php
})->name('admin.committeess');

Route::get('/admin/home-selection', function () {
    return view('/admin/home_contents_admin');
});

// Halaman form tambah home contents
Route::get('/admin/home-contents/tambah', function () {
    return view('admin.tambah_home_contents_admin');
})->name('admin.home_contents.tambah');

// Halaman tambah committee 
Route::get('/admin/committees/tambah', function () {
    return view('/admin/tambah_committeesAdmin');
})->name('admin.committees.tambah');

// Halaman Author Information Admin
Route::get('/admin/author', function () {
    return view('authorinformationAdmin'); 
})->name('admin.author');

// Halaman Registrations Admin
Route::get('/admin/registrations', function () {
    return view('registrationsAdmin'); 
})->name('admin.registrations');