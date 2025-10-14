<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactInfo;
use App\Models\ContactMessage;
use App\Models\MapLocation;

class ContactInfoController extends Controller
{
    // Halaman user contact
    public function index()
    {
        $contactInfos = ContactInfo::all();
        $map = MapLocation::latest()->first();

        return view('contact', compact('contactInfos', 'map'));
    }

    // Halaman admin list contacts
    public function listContact()
    {
        $contactInfos = ContactInfo::all();
        $mapLocations = MapLocation::all();
        $contactMessages = ContactMessage::all();

        return view('admin.list_contacts_Admin', compact('contactInfos', 'mapLocations', 'contactMessages'));
    }

    // Halaman admin add contact
    public function addContact()
    {
        return view('admin.add_contacts_Admin');
    }

    public function store(Request $request)
    {
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
            ]);
        } elseif ($request->section === 'create_map_locations_table') {
            MapLocation::create([
                'title' => $request->title,
                'link'  => $request->link,
            ]);
        }

        return redirect()->route('admin.list_contacts_Admin')
                        ->with('success', 'Contact Info added successfully!');
    }

    public function destroyInfo($id)
    {
        ContactInfo::findOrFail($id)->delete();
        return back()->with('success', 'Contact Info deleted successfully!');
    }

    public function destroyMessage($id)
    {
        ContactMessage::findOrFail($id)->delete();
        return back()->with('success', 'Contact Message deleted successfully!');
    }

    public function destroyMap($id)
    {
        MapLocation::findOrFail($id)->delete();
        return back()->with('success', 'Map Location deleted successfully!');
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
        return redirect()->route('admin.list_contacts_Admin')->with('success', 'Contact Info updated successfully!');
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
        return redirect()->route('admin.list_contacts_Admin')->with('success', 'Map Location updated successfully!');
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