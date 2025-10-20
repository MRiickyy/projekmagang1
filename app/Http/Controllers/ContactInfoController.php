<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ContactInfo;
use App\Models\MapLocation;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactInfoController extends Controller
{
    // Halaman user contact
    public function index()
    {
        $contactInfos = ContactInfo::with('event')
        ->where('event_year', session('selected_event_year', date('Y')))
        ->get();
        $map = MapLocation::with('event')
        ->where('event_year', session('selected_event_year', date('Y')))
        ->latest()
        ->first();

        return view('contact', compact('contactInfos', 'map'));
    }

    // Halaman admin list contacts
    public function listContact()
    {
        $year = session('selected_event_year', date('Y'));
        $event = Event::where('year', $year)->first();
        
        $contactInfos = ContactInfo::where('event_year', $event->year)->get();
        $mapLocations = MapLocation::where('event_year', $event->year)->get();
        $contactMessages = ContactMessage::where('event_year', $event->year)->get();

        return view('admin.list_contacts_Admin', compact('contactInfos', 'mapLocations', 'contactMessages'));
    }

    // Halaman admin add contact
    public function addContact()
    {
        return view('admin.add_contacts_Admin');
    }

    public function store(Request $request)
    {
        $year = session('selected_event_year', date('Y'));
        $request->validate([
            'section' => 'required|string',
            'type'    => 'nullable|string',
            'title'   => 'required|string',
            'value'   => 'nullable|string',
            'link'    => 'nullable|string',
        ]);

        if ($request->section === 'create_contact_infos') {
            ContactInfo::create([
                'type'  => $request->type,
                'title' => $request->title,
                'value' => $request->value,
                'event_year' => $year,
            ]);
        } elseif ($request->section === 'create_map_locations_table') {
            MapLocation::create([
                'title' => $request->title,
                'link'  => $request->link,
                'event_year' => $year,
            ]);
        }

        return redirect()->route('admin.list_contacts_Admin');
    }

    public function destroyInfo($id)
    {
        ContactInfo::findOrFail($id)->delete();
        return back();
    }

    public function destroyMessage($id)
    {
        ContactMessage::findOrFail($id)->delete();
        return back();
    }

    public function destroyMap($id)
    {
        MapLocation::findOrFail($id)->delete();
        return back();
    }

    // Edit Contact Info
    public function editInfo($id)
    {
        $contactInfo = ContactInfo::findOrFail($id);
        return view('admin.edit_contacts_Admin', [
            'section' => 'create_contact_infos',
            'data' => $contactInfo,
            'isDetail' => false   // <-- mode edit
        ]);
    }

    // Update Contact Info
    public function updateInfo(Request $request, $id)
    {
        $contactInfo = ContactInfo::findOrFail($id);
        $contactInfo->update($request->only(['type', 'title', 'value']));
        return redirect()->route('admin.list_contacts_Admin');
    }

    // Edit Map Location
    public function editMap($id)
    {
        $map = MapLocation::findOrFail($id);
        return view('admin.edit_contacts_Admin', [
            'section' => 'create_map_locations_table',
            'data' => $map,
            'isDetail' => false   // <-- mode edit
        ]);
    }

    // Update Map Location
    public function updateMap(Request $request, $id)
    {
        $map = MapLocation::findOrFail($id);
        $map->update($request->only(['title', 'link']));
        return redirect()->route('admin.list_contacts_Admin');
    }


    // Detail Contact Info
    public function detailInfo($id)
    {
        $contactInfo = ContactInfo::findOrFail($id);
        return view('admin.edit_contacts_Admin', [
            'section' => 'create_contact_infos',
            'data' => $contactInfo,
            'isDetail' => true   
        ]);
    }

    // Detail Map Location
    public function detailMap($id)
    {
        $map = MapLocation::findOrFail($id);
        return view('admin.edit_contacts_Admin', [
            'section' => 'create_map_locations_table',
            'data' => $map,
            'isDetail' => true   
        ]);
    }

    // Detail Contact Message
    public function detailMessage($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.edit_contacts_Admin', [
            'section' => 'create_contact_messages',  // tandai ini Contact Message
            'data' => $message,
            'isDetail' => true   // selalu read-only
        ]);
    }




}