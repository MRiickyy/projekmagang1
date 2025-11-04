<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class HeaderController extends Controller
{
    public function listHeader()
    {
        $selectedEventId = session('selected_event_id');
        if (!$selectedEventId) {
            $latestEvent = Event::latest('year')->first();

            if (!$latestEvent) {
                return back()->with('error', 'No event found.');
            }

            $selectedEventId = $latestEvent->id;
            session(['selected_event_id' => $selectedEventId]);
        }

        $event = Event::find($selectedEventId);

        if (!$event) {
            session()->forget('selected_event_id');
            return back()->with('error', 'Selected event not found.');
        }
        return view('admin.header.list_header', compact('event'));
    }

    public function addHeader()
    {
        return view('admin.header.add_header');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'year' => 'required|integer',
            'main_title' => 'required',
            'subtitle' => 'required',
            'location' => 'required',
            'date_range' => 'required',
            'register_link' => 'required',
            'submit_link' => 'required',
        ]);

        Event::create($request->all());
        return redirect()->route('admin.header.list_header')->with('success', 'Header added successfully!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.header.edit_header', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'main_title' => 'required',
            'subtitle' => 'required',
            'location' => 'required',
            'date_range' => 'required',
            'register_link' => 'required',
            'submit_link' => 'required',
        ]);

        $event->update($request->all());
        return redirect()->route('admin.header.list_header')->with('success', 'Header updated successfully!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.header.list_header')->with('success', 'Header deleted successfully!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.header.detail_header', compact('event'));
    }
}
