<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactInfo;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contacts = ContactInfo::all();
        return view('contact', compact('contacts'));
    }

    public function edit(ContactInfo $contact)
    {
        return view('admin.contact_infos.edit', compact('contact'));
    }

    public function update(Request $request, ContactInfo $contact)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        $contact->update($validated);

        return redirect()->route('contact')->with('success', 'Contact info updated!');
    }
}