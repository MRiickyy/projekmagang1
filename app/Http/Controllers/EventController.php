<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // 🔄 Simpan tahun yang dipilih ke session
    public function setEvent(Request $request)
    {
        $request->validate(['year' => 'required|integer']);

        $event = Event::where('year', $request->year)->first();

        if (!$event) {
            return back()->with('error', 'Event year not found.');
        }

        session(['selected_event_year' => $event->year]);

        return back()->with('success', 'Event year switched to ' . $event->year);
    }

    // Tambah event baru
    public function addEvent(Request $request)
    {
        $request->validate([
            'event' => 'required|string|max:255',
            'year'  => 'required|integer|unique:events,year',
        ]);
    
        Event::create([
            'event' => $request->event,
            'year'  => $request->year,
        ]);
    
        session(['selected_event_year' => $request->year]);
    
        return back()->with('success', 'Event year ' . $request->year . ' added and selected.');
    }
    
}