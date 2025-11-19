<?php

use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPasswordResetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\CallPaperController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\HomeContentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\AuthorInformationController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\FooterSectionController;

Route::get('/', function () {

    // Jika admin sudah memilih event → pakai itu
    if (session()->has('selected_event_name') && session()->has('selected_event_year')) {
        return redirect()->route('home', [
            'event_name' => session('selected_event_name'),
            'event_year' => session('selected_event_year'),
        ]);
    }

    // Kalau belum ada session, baru gunakan default 2025
    $event = Event::where('year', 2025)->first();

    if ($event) {
        return redirect()->route('home', [
            'event_name' => $event->name,
            'event_year' => $event->year,
        ]);
    }

    return abort(404, 'Default event not found.');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/newacc', function () {
    return view('newacc');
});


Route::get('/cek-session', function () {
    return session()->all();
});


//Route Login Admin
Route::middleware(['web'])->group(function () {

    Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.process');

    Route::get('/admin/logout', function () {
        $request->session()->regenerate();
        session()->invalidate();        // HAPUS seluruh session
        session()->regenerateToken();   // Buat token baru (keamanan)
        return redirect()->route('admin.login')->with('success', 'Logout berhasil');
    });
    
});
//route reset pass admin
Route::get('/admin/resetPassword', [AdminPasswordResetController::class, 'showForm'])->name('admin.password.form');
Route::post('/admin/send-code', [AdminPasswordResetController::class, 'sendResetCode'])->name('admin.password.sendCode');
Route::get('/admin/resetPassword/form', [AdminPasswordResetController::class, 'showResetForm'])->name('admin.password.resetForm');
Route::post('/admin/reset-password', [AdminPasswordResetController::class, 'resetPassword'])->name('admin.password.reset');


Route::middleware(['web', 'admin.auth'])->prefix('admin')->group(function () {


    Route::post('/set-event', [EventController::class, 'setEvent'])->name('admin.setEvent');
    Route::post('/add-event', [EventController::class, 'addEvent'])->name('admin.addEvent');


    // Route Speaker Admin
    Route::get('/speakers', [SpeakerController::class, 'listSpeakers'])->name('admin.speakers');
    Route::get('/speaker/keynote', [SpeakerController::class, 'listKeynoteSpeakers'])->name('admin.speakers.keynote');
    Route::get('/speaker/tutorial', [SpeakerController::class, 'listTutorialSpeakers'])->name('admin.speakers.tutorial');
    Route::get('/speaker/add', [SpeakerController::class, 'addForm'])->name('add.form.speakers');
    Route::post('/speaker/add', [SpeakerController::class, 'addSpeaker'])->name('add.speakers');
    Route::get('/speaker/{slug}/edit', [SpeakerController::class, 'editForm'])->name('edit.speakers');
    Route::put('/speaker/{slug}', [SpeakerController::class, 'updateSpeaker'])->name('update.speakers');
    Route::delete('/speaker/{slug}', [SpeakerController::class, 'deleteSpeaker'])->name('delete.speakers');
    Route::get('/speaker/{slug}/detail', [SpeakerController::class, 'adminDetail'])->name('admin.speakers.detail');

    // Route Committees Admin
    Route::get('/committees/steering', [CommitteeController::class, 'listSteering'])->name('admin.committees.steering');
    Route::get('/committees/technical', [CommitteeController::class, 'listTechnical'])->name('admin.committees.technical_program');
    Route::get('/committees/organizing', [CommitteeController::class, 'listOrganizing'])->name('admin.committees.organizing');
    Route::get('/committee/add', [CommitteeController::class, 'addForm'])->name('add.form.committees');
    Route::post('/committee/add', [CommitteeController::class, 'addCommittee'])->name('add.committees');
    Route::get('/committee/{id}/edit', [CommitteeController::class, 'editForm'])->name('edit.committees');
    Route::put('/committee/{id}', [CommitteeController::class, 'updateCommittee'])->name('update.committees');
    Route::delete('/committee/{id}', [CommitteeController::class, 'deleteCommittee'])->name('delete.committees');
    Route::get('/committee/{id}/detail', [CommitteeController::class, 'adminDetail'])->name('admin.committees.detail');


    //Route Home
    Route::get('/home-contents', [HomeContentController::class, 'listHome'])->name('admin.list_home_contents_admin');
    Route::get('/home-contents/add', [HomeContentController::class, 'addHome'])->name('admin.add_home_contents_admin');
    Route::post('/home-contents/store', [HomeContentController::class, 'store'])->name('admin.store_home_contents_admin');
    Route::delete('/home-contents/{homeContent}', [HomeContentController::class, 'destroy'])->name('admin.delete_home_contents_admin');
    Route::get('/home-contents/{homeContent}/edit', [HomeContentController::class, 'edit'])->name('admin.edit_home_contents_admin');
    Route::put('/home-contents/{homeContent}', [HomeContentController::class, 'update'])->name('admin.update_home_contents_admin');
    Route::get('/home-contents/{homeContent}/detail', [HomeContentController::class, 'show'])->name('admin.detail_home_contents_admin');
    Route::get('/home-contents/timelines/add', [HomeContentController::class, 'addTimelineHome'])->name('admin.add_timeline_home_admin');
    Route::post('/home-contents/timelines/store', [HomeContentController::class, 'storeTimelineHome'])->name('admin.store_timeline_home_admin');
    Route::get('/home-contents/timelines/{timeline}/edit', [HomeContentController::class, 'editTimeline'])->name('admin.edit_timeline_home_admin');
    Route::get('/home-contents/timelines/{timeline}/detail', [HomeContentController::class, 'showTimeline'])->name('admin.detail_timeline_home_admin');
    Route::put('/home-contents/timelines/{timeline}', [HomeContentController::class, 'updateTimeline'])->name('admin.update_timeline_home_admin');
    Route::delete('/home-contents/timelines/{timeline}', [HomeContentController::class, 'destroyTimeline'])->name('admin.delete_timeline_home_admin');

    //Route Contact
    // User mengirim pesan
    Route::get('/contact', [ContactInfoController::class, 'listContact'])->name('admin.list_contacts_Admin');
    Route::get('/contacts/add', [ContactInfoController::class, 'addContact'])->name('admin.add_contacts_Admin');
    Route::post('/contacts/store', [ContactInfoController::class, 'store'])->name('admin.store_contacts_Admin');
    Route::delete('/contact-infos/{id}', [ContactInfoController::class, 'destroyInfo'])->name('admin.delete_contact_info');
    Route::delete('/contact-messages/{id}', [ContactInfoController::class, 'destroyMessage'])->name('admin.delete_contact_message');
    Route::delete('/map-locations/{id}', [ContactInfoController::class, 'destroyMap'])->name('admin.delete_map_location');
    Route::get('/contact-infos/{id}/edit', [ContactInfoController::class, 'editInfo'])->name('admin.edit_contacts_Admin');
    Route::put('/contact-infos/{id}', [ContactInfoController::class, 'updateInfo'])->name('admin.update_contact_info');
    Route::get('/map-locations/{id}/edit', [ContactInfoController::class, 'editMap'])->name('admin.edit_map_location');
    Route::put('/map-locations/{id}', [ContactInfoController::class, 'updateMap'])->name('admin.update_map_location');
    Route::get('/contact-infos/{id}/detail', [ContactInfoController::class, 'detailInfo'])->name('admin.detail_contact_info');
    Route::get('/map-locations/{id}/detail', [ContactInfoController::class, 'detailMap'])->name('admin.detail_map_location');
    Route::get('/contact-messages/{id}/detail', [ContactInfoController::class, 'detailMessage'])->name('admin.detail_contact_message');


    //Route Call Paper
    Route::get('/callpaper', [CallPaperController::class, 'listCallPaper'])->name('admin.list_callpaper_Admin');
    Route::get('/callpapers/add', [CallPaperController::class, 'addCallPaper'])->name('admin.add_callpaper_Admin');
    Route::post('/callpapers/store', [CallPaperController::class, 'store'])->name('admin.store_callpaper_Admin');
    Route::get('/callpapers/{callPaper}/edit', [CallPaperController::class, 'edit'])->name('admin.edit_callpaper_Admin');
    Route::put('/callpapers/{callPaper}', [CallPaperController::class, 'update'])->name('admin.update_callpaper_Admin');
    Route::delete('/callpapers/{callPaper}', [CallPaperController::class, 'destroy'])->name('admin.delete_callpaper_Admin');
    Route::get('/callpapers/{callPaper}', [CallPaperController::class, 'show'])->name('admin.show_callpaper_Admin');

    //====ROUTE USER & ADMIN FOR AUTHOR====\\
    // author information
    // admin
    Route::get('/mainAuthorInformation', [AuthorInformationController::class, 'listAuthor'])->name('admin.forauthor.list_authorinformation_admin');
    Route::get('/add-authorInformation', [AuthorInformationController::class, 'addAuthor'])->name('admin.forauthor.add_authorinformation_admin');
    Route::post('/add-authorInformation', [AuthorInformationController::class, 'store'])->name('admin.forauthor.store_authorinformation_admin');
    Route::get('/edit-authorInformation/{id}', [AuthorInformationController::class, 'edit'])->name('admin.forauthor.edit_authorinformation_admin');
    Route::post('/edit-authorInformation/{id}', [AuthorInformationController::class, 'update'])->name('admin.forauthor.update_authorinformation_admin');
    Route::get('/detail-authorInformation/{id}', [AuthorInformationController::class, 'show'])->name('admin.forauthor.detail_authorinformation_admin');
    Route::delete('/delete-authorInformation/{authorInfo}', [AuthorInformationController::class, 'destroy'])->name('admin.forauthor.delete_authorinformation_admin');

    // registrations
    // admin
    Route::get('/mainregistrations', [RegistrationController::class, 'adminIndex'])->name('admin.forauthor.list_registrations_admin');
    Route::get('/add-registrations', [RegistrationController::class, 'adminRegisAdd'])->name('admin.forauthor.add_registrations_admin');
    Route::post('/add-registrations', [RegistrationController::class, 'adminRegisStore'])->name('admin.forauthor.store_registrations_admin');
    Route::get('/edit-registrations/{id}', [RegistrationController::class, 'adminRegisEdit'])->name('admin.forauthor.edit_registrations_admin');
    Route::post('/edit-registrations/{id}', [RegistrationController::class, 'adminRegisUpdate'])->name('admin.forauthor.update_registrations_admin');
    Route::get('/detail-registrations/{id}', [RegistrationController::class, 'adminRegisShow'])->name('admin.forauthor.detail_registrations_admin');
    Route::delete('/delete-registrations/{registration}', [RegistrationController::class, 'adminRegisDestroy'])->name('admin.forauthor.delete_registrations_admin');

    Route::get('/add-registrations-fee', [RegistrationController::class, 'adminRegisFeeAdd'])->name('admin.forauthor.add_registrationsfee_admin');
    Route::post('/add-registrations-fee', [RegistrationController::class, 'adminRegisFeeStore'])->name('admin.forauthor.store_registrationsfee_admin');
    Route::get('/edit-registrations-fee/{id}', [RegistrationController::class, 'adminRegisFeeEdit'])->name('admin.forauthor.edit_registrationsfee_admin');
    Route::post('/edit-registrations-fee/{id}', [RegistrationController::class, 'adminRegisFeeUpdate'])->name('admin.forauthor.update_registrationsfee_admin');
    Route::delete('/delete-registrations-fee/{fee}', [RegistrationController::class, 'adminRegisFeeDestroy'])->name('admin.forauthor.delete_registrationsfee_admin');
    Route::get('/detail-registrations-fee/{id}', [RegistrationController::class, 'adminRegisFeeShow'])->name('admin.forauthor.detail_registrationsfee_admin');

    Route::get('/add-paymentmethod', [RegistrationController::class, 'adminPaymentMethodAdd'])->name('admin.forauthor.add_paymentmethod_admin');
    Route::post('/add-paymentmethod', [RegistrationController::class, 'adminPaymentMethodStore'])->name('admin.forauthor.store_paymentmethod_admin');
    Route::get('/edit-payment-method/{id}', [RegistrationController::class, 'adminPaymentMethodEdit'])->name('admin.forauthor.edit_paymentmethod_admin');
    Route::post('/edit-payment-method/{id}', [RegistrationController::class, 'adminPaymentMethodUpdate'])->name('admin.forauthor.update_paymentmethod_admin');
    Route::delete('/delete-payment-method/{paymentMethod}', [RegistrationController::class, 'adminPaymentMethodDestroy'])->name('admin.forauthor.delete_paymentmethod_admin');
    Route::get('/detail-payment-method/{id}', [RegistrationController::class, 'adminPaymentMethodShow'])->name('admin.forauthor.detail_paymentmethod_admin');


    // Route untuk Contacts Admin
    // Route::get('/admin/contacts', function () {
    //     return view('/admin/contacts_Admin'); 
    // })->name('admin.contacts');
    // Route untuk tambah Contacts_Admin
    Route::get('/contacts/tambah', function () {
        return view('/admin/tambah_contacts_Admin'); // ini file yang kamu buat
    })->name('admin.contacts.tambah');

    // Halaman tambah Description Speaker Admin
    Route::get('/timelines/tambah', function () {
        return view('/admin/tambah_timelinesAdmin'); // file: resources/views/committees.blade.php
    })->name('admin.timelines.tambah');

    Route::get('/timelines', function () {
        return view('/admin/timelinesAdmin'); // file: resources/views/committees.blade.php
    })->name('admin.timelines');

    //===ROUTE HEADER ADMIN===\\
    Route::get('/list_header', [HeaderController::class, 'listHeader'])->name('admin.header.list_header');
    Route::get('/add_header', [HeaderController::class, 'addHeader'])->name('admin.header.add_header');
    Route::post('/store_header', [HeaderController::class, 'store'])->name('admin.header.store');
    Route::get('/edit_header/{id}', [HeaderController::class, 'edit'])->name('admin.header.edit_header');
    Route::put('/update_header/{id}', [HeaderController::class, 'update'])->name('admin.header.update');
    Route::delete('/delete_header/{id}', [HeaderController::class, 'destroy'])->name('admin.header.delete_header');
    Route::get('/detail_header/{id}', [HeaderController::class, 'show'])->name('admin.header.detail_header');

    //===ROUTE FOOTER ADMIN===\\
    Route::get('/footer', [FooterSectionController::class, 'listFooter'])->name('admin.footer.list');
    Route::get('/footer/add', [FooterSectionController::class, 'add'])->name('admin.footer.add');
    Route::post('/footer/store', [FooterSectionController::class, 'store'])->name('admin.footer.store');
    Route::get('/footer/edit-hostAndPartners/{id}', [FooterSectionController::class, 'editHostAndPartners'])->name('admin.footer.edit_hostAndPartners');
    Route::get('/footer/edit-hosted/{id}', [FooterSectionController::class, 'editHosted'])->name('admin.footer.edit_hosted');
    Route::get('/footer/edit-visitors/{id}', [FooterSectionController::class, 'editVisitors'])->name('admin.footer.edit_visitors');
    Route::put('/footer/update/{id}', [FooterSectionController::class, 'update'])->name('admin.footer.update');
    Route::delete('/footer/delete/{id}', [FooterSectionController::class, 'destroy'])->name('admin.footer.delete');
    Route::get('/footer/detail/{id}', [FooterSectionController::class, 'show'])->name('admin.footer.detail');
    
});





Route::prefix('{event_name}/{event_year}')->group(function () {
    Route::get('/', [HomeContentController::class, 'index'])->name('home');

    // Route Call Paper
    Route::get('/call-for-papers', [CallPaperController::class, 'index'])->name('call_papers');

    // Route Speaker
    Route::get('speakers/keynote-speakers', [SpeakerController::class, 'keynote'])->name('keynote.speakers');
    Route::get('speakers/tutorial-speakers', [SpeakerController::class, 'tutorial'])->name('tutorial.speakers');
    Route::get('speakers/{slug}', [SpeakerController::class, 'detailSpeaker'])->name('detail.speaker');

    // Route Committees
    Route::get('/steering-committees', [CommitteeController::class, 'steering'])->name('steering.committees');
    Route::get('/technical-program-committees', [CommitteeController::class, 'technical'])->name('technical.committees');
    Route::get('/organizing-committees', [CommitteeController::class, 'organizing'])->name('organizing.committees');

    // Route Author Information
    Route::get('/author-information', [AuthorInformationController::class, 'index'])->name('author-information.index');

    // Route Registration
    Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');

    // Route Contact
    Route::get('/contacts', [ContactInfoController::class, 'index'])->name('contact');
    Route::post('/contact/send', [ContactMessageController::class, 'store'])->name('contact.send');
});