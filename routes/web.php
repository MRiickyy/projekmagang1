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

Route::get('/', [HomeContentController::class, 'index']);


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
Route::get('/speakers/{slug}', [SpeakerController::class, 'detailSpeaker'])->name('detail.speaker');
Route::get('/admin/speakers', [SpeakerController::class, 'listSpeakers'])->name('admin.speakers');
Route::get('/admin/speakers/add', [SpeakerController::class, 'addForm'])->name('add.form.speakers');
Route::post('/admin/speakers/add', [SpeakerController::class, 'addSpeaker'])->name('add.speakers');
Route::get('/admin/speakers/{slug}/edit', [SpeakerController::class, 'editForm'])->name('edit.form.speakers');
Route::put('/admin/speakers/{slug}/edit', [SpeakerController::class, 'updateSpeaker'])->name('update.speakers');
Route::delete('/admin/speakers/{slug}', [SpeakerController::class, 'deleteSpeaker'])->name('delete.speakers');
Route::get('/admin/speakers/{slug}/detail', [SpeakerController::class, 'adminDetail'])->name('admin.speakers.detail');

// Route Committees
Route::get('/steering-committees', [CommitteeController::class, 'steering']);
Route::get('/technical-committees', [CommitteeController::class, 'technical']);
Route::get('/organizing-committees', [CommitteeController::class, 'organizing']);
Route::get('/admin/committees', [CommitteeController::class, 'listCommittees'])->name('admin.committees');
Route::get('/admin/committees/add', [CommitteeController::class, 'addForm'])->name('add.form.committees');
Route::post('/admin/committees/add', [CommitteeController::class, 'addCommittee'])->name('add.committees');

//Route Home
Route::get('/admin/home-contents', [HomeContentController::class, 'listHome'])->name('admin.list_home_contents_admin');
Route::get('/admin/home-contents/add', [HomeContentController::class, 'addHome'])->name('admin.add_home_contents_admin');
Route::post('/admin/home-contents/store', [HomeContentController::class, 'store'])->name('admin.store_home_contents_admin');

//Route Contact
Route::get('/contacts', [ContactInfoController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactMessageController::class, 'store'])->name('contact.send');
Route::get('/contacts', [MapLocationController::class, 'index'])->name('contact');



//====ROUTE USER & ADMIN FOR AUTHOR====\\
// user
Route::get('/author-information', [AuthorInformationController::class, 'index'])->name('author-information.index');
Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');
// admin: displays the author information table
Route::get('/admin/mainAuthorInformation', [AuthorInformationController::class, 'adminIndex'])->name('admin.authorinformationAdmin');
// admin: form edit + save
Route::get('/admin/edit-authorInformation', [AuthorInformationController::class, 'adminAuthorEdit'])->name('admin.edit_authorinformationAdmin');
Route::post('/admin/edit-authorInformation', [AuthorInformationController::class, 'update'])->name('admin.update_authorinformation');
// admin: delete
Route::delete('/admin/delete-authorinformation/{id}', [AuthorInformationController::class, 'delete'])->name('admin.delete_authorinformationAdmin');
// Halaman Registrations Admin
Route::get('/admin/registrations', function () {
    return view('/admin/registrationsAdmin'); 
})->name('admin.registrations');
// Route untuk Contacts Admin
Route::get('/admin/contacts', function () {
    return view('/admin/contacts_Admin'); // ini file yang kamu buat
})->name('admin.contacts');
// Route untuk tambah Contacts_Admin
Route::get('/admin/contacts/tambah', function () {
    return view('/admin/tambah_contacts_Admin'); // ini file yang kamu buat
})->name('admin.contacts.tambah');
// Halaman Tambah Registrations Admin
Route::get('/admin/registrations/tambah', function () {
    return view('/admin/tambah_registrationsAdmin'); 
})->name('admin.registrationsAdmin.tambah');





//Route Call Paper
Route::get('/call-for-papers', [CallPaperController::class, 'index'])->name('call_papers');


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