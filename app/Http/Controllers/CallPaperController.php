<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\CallPaper;
use Illuminate\Http\Request;

class CallPaperController extends Controller
{

    public function index()
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
        $callPapers = CallPaper::where('event_id', $selectedEventId)->get();

        return view('callpaper', compact('callPapers', 'event'));
    }



    public function listCallPaper()
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

        $callPapers = CallPaper::where('event_id', $selectedEventId)->orderBy('section')->orderBy('id')->get();
        return view('admin.list_callpaper_Admin', compact('callPapers'));
    }

    public function addCallPaper()
    {
        return view('admin.add_callpaper_Admin');
    }

    public function store(Request $request)
    {
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            return back()->with('error', 'Please select an event first.');
        }

        $request->validate([
            'section' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        CallPaper::create([
            'section' => $request->section,
            'title' => $request->title,
            'content' => $request->content,
            'event_id' => $selectedEventId,
        ]);

        return redirect()->route('admin.list_callpaper_Admin');
    }

    public function edit(CallPaper $callPaper)
    {
        return view('admin.edit_callpaper_Admin', compact('callPaper'))->with('isDetail', false);
    }


    public function update(Request $request, CallPaper $callPaper)
    {
        $request->validate([
            'section' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $callPaper->update([
            'section' => $request->section,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.list_callpaper_Admin');
    }

    public function destroy(CallPaper $callPaper)
    {
        $callPaper->delete();
        return redirect()->route('admin.list_callpaper_Admin');
    }

    public function show(CallPaper $callPaper)
    {
        // kirim flag 'isDetail' ke view untuk membedakan mode
        return view('admin.edit_callpaper_Admin', compact('callPaper'))->with('isDetail', true);
    }
}
