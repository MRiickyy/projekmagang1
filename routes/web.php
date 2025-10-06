<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeContentController;
use App\Http\Controllers\CallPaperController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\AuthorInformationController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\ContactMessageController;
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
Route::get('/admin/speaker/add', [SpeakerController::class, 'addForm'])->name('add.form.speakers');
Route::post('/admin/speaker/add', [SpeakerController::class, 'addSpeaker'])->name('add.speakers');
Route::get('/admin/speaker/{slug}/edit', [SpeakerController::class, 'editForm'])->name('edit.speakers');
Route::put('/admin/speaker/{slug}', [SpeakerController::class, 'updateSpeaker'])->name('update.speakers');
Route::delete('/admin/speaker/{slug}', [SpeakerController::class, 'deleteSpeaker'])->name('delete.speakers');
Route::get('/admin/speaker/{slug}/detail', [SpeakerController::class, 'adminDetail'])->name('admin.speakers.detail');

// Route Committees
Route::get('/steering-committees', [CommitteeController::class, 'steering']);
Route::get('/technical-committees', [CommitteeController::class, 'technical']);
Route::get('/organizing-committees', [CommitteeController::class, 'organizing']);
Route::get('/admin/committees', [CommitteeController::class, 'listCommittees'])->name('admin.committees');
Route::get('/admin/committee/add', [CommitteeController::class, 'addForm'])->name('add.form.committees');
Route::post('/admin/committee/add', [CommitteeController::class, 'addCommittee'])->name('add.committees');
Route::get('/admin/committee/{id}/edit', [CommitteeController::class, 'editForm'])->name('edit.committees');
Route::put('/admin/committee/{id}', [CommitteeController::class, 'updateCommittee'])->name('update.committees');
Route::delete('/admin/committee/{id}', [CommitteeController::class, 'deleteCommittee'])->name('delete.committees');
Route::get('/admin/committee/{id}/detail', [CommitteeController::class, 'adminDetail'])->name('admin.committees.detail');


//Route Home
Route::get('/admin/home-contents', [HomeContentController::class, 'listHome'])->name('admin.list_home_contents_admin');
Route::get('/admin/home-contents/add', [HomeContentController::class, 'addHome'])->name('admin.add_home_contents_admin');
Route::post('/admin/home-contents/store', [HomeContentController::class, 'store'])->name('admin.store_home_contents_admin');

//Route Contact
// User mengirim pesan
Route::post('/contacts', [ContactMessageController::class, 'store'])->name('contact.send');
Route::get('/contacts', [ContactInfoController::class, 'index'])->name('contact'); 
Route::get('/admin/contacts', [ContactInfoController::class, 'listContact'])->name('admin.list_contacts_Admin');
Route::get('/admin/contacts/add', [ContactInfoController::class, 'addHome'])->name('admin.add_contacts_Admin');
Route::post('/admin/contacts/store', [ContactInfoController::class, 'store'])->name('admin.store_contacts_Admin');






//====ROUTE USER & ADMIN FOR AUTHOR====\\
// user
Route::get('/author-information', [AuthorInformationController::class, 'index'])->name('author-information.index');
Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');
// admin: displays the author information table
Route::get('/admin/mainAuthorInformation', [AuthorInformationController::class, 'adminIndex'])->name('admin.forauthor.authorinformationAdmin');
// admin: form edit + save
Route::get('/admin/edit-authorInformation', [AuthorInformationController::class, 'adminAuthorEdit'])->name('admin.forauthor.edit_authorinformationAdmin');
Route::post('/admin/edit-authorInformation', [AuthorInformationController::class, 'update'])->name('admin.forauthor.update_authorinformation');
// admin: detail author information
Route::get('/admin/detail-authorInformation', [AuthorInformationController::class, 'adminAuthorDetail'])->name('admin.forauthor.detail_authorinformationAdmin');


// admin: displays the registrations
Route::get('/admin/mainregistrations', function () {return view('/admin/forauthor/registrationsAdmin'); })->name('admin.forauthor.registrationsAdmin');
// Halaman Registrations Admin
Route::get('/admin/edit-registrations', function () {return view('/admin/forauthor/edit_registrationsAdmin'); })->name('admin.forauthor.edit_registrationsAdmin');



// Route untuk Contacts Admin
Route::get('/admin/contacts', function () {
    return view('/admin/contacts_Admin'); // ini file yang kamu buat
})->name('admin.contacts');
// Route untuk tambah Contacts_Admin
Route::get('/admin/contacts/tambah', function () {
    return view('/admin/tambah_contacts_Admin'); // ini file yang kamu buat
})->name('admin.contacts.tambah');




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


// Halaman tambah committee 
Route::get('/admin/committees/tambah', function () {
    return view('/admin/tambah_committeesAdmin');
})->name('admin.committees.tambah');