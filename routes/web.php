<?php

use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\CallPaperController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\HomeContentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\AuthorInformationController;


Route::get('/', function () {
    $event = Event::latest('year')->first(); // ambil event terbaru
    return redirect("/ICOICT/{$event->year}");
});
Route::get('/ICOICT/{event_year}', [HomeContentController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('login');
});

Route::get('/newacc', function () {
    return view('newacc');
});


//Route Login Admin
Route::middleware(['web'])->group(function () {

    Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.process');

    Route::get('/admin/logout', function () {
        session()->forget(['admin_logged_in', 'admin_username']);
        return redirect()->route('admin.login')->with('success', 'Logout berhasil.');
    })->name('admin.logout');
});

Route::post('/admin/set-event', [EventController::class, 'setEvent'])->name('admin.setEvent');
Route::post('/admin/add-event', [EventController::class, 'create'])->name('admin.addEvent');

// Route Speaker
Route::get('/{event_year}/keynote-speakers', [SpeakerController::class, 'keynote'])->name('keynote.speakers');
Route::get('/{event_year}/tutorial-speakers', [SpeakerController::class, 'tutorial'])->name('tutorial.speakers');
Route::get('/{event_year}/speakers/{slug}', [SpeakerController::class, 'detailSpeaker'])->name('detail.speaker');

// Route Speaker Admin
Route::get('/admin/speakers', [SpeakerController::class, 'listSpeakers'])->name('admin.speakers');
Route::get('/admin/speaker/keynote', [SpeakerController::class, 'listKeynoteSpeakers'])->name('admin.speakers.keynote');
Route::get('/admin/speaker/tutorial', [SpeakerController::class, 'listTutorialSpeakers'])->name('admin.speakers.tutorial');
Route::get('/admin/speaker/add', [SpeakerController::class, 'addForm'])->name('add.form.speakers');
Route::post('/admin/speaker/add', [SpeakerController::class, 'addSpeaker'])->name('add.speakers');
Route::get('/admin/speaker/{slug}/edit', [SpeakerController::class, 'editForm'])->name('edit.speakers');
Route::put('/admin/speaker/{slug}', [SpeakerController::class, 'updateSpeaker'])->name('update.speakers');
Route::delete('/admin/speaker/{slug}', [SpeakerController::class, 'deleteSpeaker'])->name('delete.speakers');
Route::get('/admin/speaker/{slug}/detail', [SpeakerController::class, 'adminDetail'])->name('admin.speakers.detail');

// Route Committees
Route::get('/{event_year}/steering-committees', [CommitteeController::class, 'steering'])->name('steering.committees');
Route::get('/{event_year}/technical-program-committees', [CommitteeController::class, 'technical'])->name('technical.committees');
Route::get('/{event_year}/organizing-committees', [CommitteeController::class, 'organizing'])->name('organizing.committees');

// Route Committees Admin
Route::get('/admin/committees/steering', [CommitteeController::class, 'listSteering'])->name('admin.committees.steering');
Route::get('/admin/committees/technical', [CommitteeController::class, 'listTechnical'])->name('admin.committees.technical_program');
Route::get('/admin/committees/organizing', [CommitteeController::class, 'listOrganizing'])->name('admin.committees.organizing');
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
Route::delete('/admin/home-contents/{homeContent}', [HomeContentController::class, 'destroy'])->name('admin.delete_home_contents_admin');
Route::get('/admin/home-contents/{homeContent}/edit', [HomeContentController::class, 'edit'])->name('admin.edit_home_contents_admin');
Route::put('/admin/home-contents/{homeContent}', [HomeContentController::class, 'update'])->name('admin.update_home_contents_admin');
Route::get('/admin/home-contents/{homeContent}/detail', [HomeContentController::class, 'show'])->name('admin.detail_home_contents_admin');
Route::get('/admin/home-contents/timelines/add', [HomeContentController::class, 'addTimelineHome'])->name('admin.add_timeline_home_admin');
Route::post('/admin/home-contents/timelines/store', [HomeContentController::class, 'storeTimelineHome'])->name('admin.store_timeline_home_admin');
Route::get('/admin/home-contents/timelines/{timeline}/edit', [HomeContentController::class, 'editTimeline'])->name('admin.edit_timeline_home_admin');
Route::get('/admin/home-contents/timelines/{timeline}/detail', [HomeContentController::class, 'showTimeline']) ->name('admin.detail_timeline_home_admin');
Route::put('/admin/home-contents/timelines/{timeline}', [HomeContentController::class, 'updateTimeline'])->name('admin.update_timeline_home_admin');
Route::delete('/admin/home-contents/timelines/{timeline}', [HomeContentController::class, 'destroyTimeline'])->name('admin.delete_timeline_home_admin');

//Route Contact
// User mengirim pesan
Route::post('/contacts', [ContactMessageController::class, 'store'])->name('contact.send');
Route::get('/{event_year}/contacts', [ContactInfoController::class, 'index'])->name('contact'); 
Route::get('/admin/contacts', [ContactInfoController::class, 'listContact'])->name('admin.list_contacts_Admin');
Route::get('/admin/contacts/add', [ContactInfoController::class, 'addContact'])->name('admin.add_contacts_Admin');
Route::post('/admin/contacts/store', [ContactInfoController::class, 'store'])->name('admin.store_contacts_Admin');
Route::delete('/admin/contact-infos/{id}', [ContactInfoController::class, 'destroyInfo'])->name('admin.delete_contact_info');
Route::delete('/admin/contact-messages/{id}', [ContactInfoController::class, 'destroyMessage'])->name('admin.delete_contact_message');
Route::delete('/admin/map-locations/{id}', [ContactInfoController::class, 'destroyMap'])->name('admin.delete_map_location');
Route::get('/admin/contact-infos/{id}/edit', [ContactInfoController::class, 'editInfo'])->name('admin.edit_contacts_Admin');
Route::put('/admin/contact-infos/{id}', [ContactInfoController::class, 'updateInfo'])->name('admin.update_contact_info');
Route::get('/admin/map-locations/{id}/edit', [ContactInfoController::class, 'editMap'])->name('admin.edit_map_location');
Route::put('/admin/map-locations/{id}', [ContactInfoController::class, 'updateMap'])->name('admin.update_map_location');
Route::get('/admin/contact-infos/{id}/detail', [ContactInfoController::class, 'detailInfo'])->name('admin.detail_contact_info');
Route::get('/admin/map-locations/{id}/detail', [ContactInfoController::class, 'detailMap'])->name('admin.detail_map_location');
Route::get('/admin/contact-messages/{id}/detail', [ContactInfoController::class, 'detailMessage'])->name('admin.detail_contact_message');


//Route Call Paper
Route::get('/{event_year}/call-for-papers', [CallPaperController::class, 'index'])->name('call_papers');
Route::get('/admin/callpaper', [CallPaperController::class, 'listCallPaper'])->name('admin.list_callpaper_Admin');
Route::get('/admin/callpapers/add', [CallPaperController::class, 'addCallPaper'])->name('admin.add_callpaper_Admin');
Route::post('/admin/callpapers/store', [CallPaperController::class, 'store'])->name('admin.store_callpaper_Admin');
Route::get('/admin/callpapers/{callPaper}/edit', [CallPaperController::class, 'edit'])->name('admin.edit_callpaper_Admin');
Route::put('/admin/callpapers/{callPaper}', [CallPaperController::class, 'update'])->name('admin.update_callpaper_Admin');
Route::delete('/admin/callpapers/{callPaper}', [CallPaperController::class, 'destroy'])->name('admin.delete_callpaper_Admin');
Route::get('/admin/callpapers/{callPaper}', [CallPaperController::class, 'show'])->name('admin.show_callpaper_Admin');

//====ROUTE USER & ADMIN FOR AUTHOR====\\
// author information
// user
Route::get('/{event_year}/author-information', [AuthorInformationController::class, 'index'])->name('author-information.index');
// admin
Route::get('/admin/mainAuthorInformation', [AuthorInformationController::class, 'listAuthor'])->name('admin.forauthor.list_authorinformation_admin');
Route::get('/admin/add-authorInformation', [AuthorInformationController::class, 'addAuthor'])->name('admin.forauthor.add_authorinformation_admin');
Route::post('/admin/add-authorInformation', [AuthorInformationController::class, 'store'])->name('admin.forauthor.store_authorinformation_admin');
Route::get('/admin/edit-authorInformation/{id}', [AuthorInformationController::class, 'edit'])->name('admin.forauthor.edit_authorinformation_admin');
Route::post('/admin/edit-authorInformation/{id}', [AuthorInformationController::class, 'update'])->name('admin.forauthor.update_authorinformation_admin');
Route::get('/admin/detail-authorInformation/{id}', [AuthorInformationController::class, 'show'])->name('admin.forauthor.detail_authorinformation_admin');
Route::delete('/admin/delete-authorInformation/{authorInfo}', [AuthorInformationController::class, 'destroy'])->name('admin.forauthor.delete_authorinformation_admin');

// registrations
//user
Route::get('/{event_year}/registration', [RegistrationController::class, 'index'])->name('registration.index');
// admin
Route::get('/admin/mainregistrations', [RegistrationController::class, 'adminIndex'])->name('admin.forauthor.list_registrations_admin');
Route::get('/admin/add-registrations', [RegistrationController::class, 'adminRegisAdd'])->name('admin.forauthor.add_registrations_admin');
Route::post('/admin/add-registrations', [RegistrationController::class, 'adminRegisStore'])->name('admin.forauthor.store_registrations_admin');
Route::get('/admin/edit-registrations/{id}', [RegistrationController::class, 'adminRegisEdit'])->name('admin.forauthor.edit_registrations_admin');
Route::post('/admin/edit-registrations/{id}', [RegistrationController::class, 'adminRegisUpdate'])->name('admin.forauthor.update_registrations_admin');
Route::get('/admin/detail-registrations/{id}', [RegistrationController::class, 'adminRegisShow'])->name('admin.forauthor.detail_registrations_admin');
Route::delete('/admin/delete-registrations/{registration}', [RegistrationController::class, 'adminRegisDestroy'])->name('admin.forauthor.delete_registrations_admin');

Route::get('/admin/add-registrations-fee', [RegistrationController::class, 'adminRegisFeeAdd'])->name('admin.forauthor.add_registrationsfee_admin');
Route::post('/admin/add-registrations-fee', [RegistrationController::class, 'adminRegisFeeStore'])->name('admin.forauthor.store_registrationsfee_admin');
Route::get('/admin/edit-registrations-fee/{id}', [RegistrationController::class, 'adminRegisFeeEdit'])->name('admin.forauthor.edit_registrationsfee_admin');
Route::post('/admin/edit-registrations-fee/{id}', [RegistrationController::class, 'adminRegisFeeUpdate'])->name('admin.forauthor.update_registrationsfee_admin');
Route::delete('/admin/delete-registrations-fee/{fee}', [RegistrationController::class, 'adminRegisFeeDestroy'])->name('admin.forauthor.delete_registrationsfee_admin');
Route::get('/admin/detail-registrations-fee/{id}', [RegistrationController::class, 'adminRegisFeeShow'])->name('admin.forauthor.detail_registrationsfee_admin');

Route::get('/admin/add-paymentmethod', [RegistrationController::class, 'adminPaymentMethodAdd'])->name('admin.forauthor.add_paymentmethod_admin');
Route::post('/admin/add-paymentmethod', [RegistrationController::class, 'adminPaymentMethodStore'])->name('admin.forauthor.store_paymentmethod_admin');
Route::get('/admin/edit-payment-method/{id}', [RegistrationController::class, 'adminPaymentMethodEdit'])->name('admin.forauthor.edit_paymentmethod_admin');
Route::post('/admin/edit-payment-method/{id}', [RegistrationController::class, 'adminPaymentMethodUpdate'])->name('admin.forauthor.update_paymentmethod_admin');
Route::delete('/admin/delete-payment-method/{paymentMethod}', [RegistrationController::class, 'adminPaymentMethodDestroy'])->name('admin.forauthor.delete_paymentmethod_admin');
Route::get('/admin/detail-payment-method/{id}', [RegistrationController::class, 'adminPaymentMethodShow'])->name('admin.forauthor.detail_paymentmethod_admin');


// Route untuk Contacts Admin
// Route::get('/admin/contacts', function () {
//     return view('/admin/contacts_Admin'); 
// })->name('admin.contacts');
// Route untuk tambah Contacts_Admin
Route::get('/admin/contacts/tambah', function () {
    return view('/admin/tambah_contacts_Admin'); // ini file yang kamu buat
})->name('admin.contacts.tambah');





Route::get('/admin/LupaPasswordAdmin', function () {
    return view('admin.LupaPasswordAdmin');
});

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

// Halaman tambah Description Speaker Admin
Route::get('/admin/descriptionspeaker/tambah', function () {
    return view('/admin/tambah_descriptionspeakerAdmin'); // file: resources/views/committees.blade.php
})->name('admin.descriptionspeaker.tambah');

Route::get('/admin/descriptionspeaker', function () {
    return view('/admin/descriptionspeakerAdmin'); // file: resources/views/committees.blade.php
})->name('admin.descriptionspeaker');

// Halaman tambah Description Speaker Admin
Route::get('/admin/timelines/tambah', function () {
    return view('/admin/tambah_timelinesAdmin'); // file: resources/views/committees.blade.php
})->name('admin.timelines.tambah');

Route::get('/admin/timelines', function () {
    return view('/admin/timelinesAdmin'); // file: resources/views/committees.blade.php
})->name('admin.timelines');