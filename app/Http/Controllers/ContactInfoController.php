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
    public function addHome()
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
                        ->with('success', 'Contact berhasil ditambahkan!');
    }



}