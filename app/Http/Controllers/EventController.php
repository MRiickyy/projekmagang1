<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Simpan event yang dipilih ke session
    public function setEvent(Request $request)
    {
        $request->validate(['event_id' => 'required|integer']);

        $event = Event::find($request->event_id);

        if (!$event) {
            return back()->with('error', 'Event not found.');
        }

        // Simpan ID dan tahun ke session
        session([
            'selected_event_id' => $event->id,
            'selected_event_year' => $event->year,
        ]);

        return back()->with('success', "Switched to {$event->name} {$event->year}");
    }

    // Tambah event baru
    public function addEvent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|unique:events,year',
        ]);

        // Buat event baru
        $event = Event::create([
            'name' => $request->name,
            'year' => $request->year,
        ]);

        // Simpan langsung ke session
        session([
            'selected_event_id' => $event->id,
            'selected_event_year' => $event->year,
        ]);

        return back()->with('success', "Event {$event->name} {$event->year} added and selected.");
    }
}