<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\AuthorInformation;

class AuthorInformationController extends Controller
{
    public function index($event_name, $event_year)
    {
        $event = Event::where('name', $event_name)
                      ->where('year', $event_year)
                      ->firstOrFail();

        $authorInfos = AuthorInformation::with('event')->where('event_id', $event->id)->get()->groupBy('section');
            
        return view('author', compact('authorInfos', 'event'));
    }

    public function listAuthor()
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

        $authorInfos = AuthorInformation::where('event_id', $selectedEventId)->get();
        return view('admin.forauthor.list_authorinformation_admin', compact('authorInfos'));
    }

    public function addAuthor()
    {
        return view('admin.forauthor.add_authorinformation_admin');
    }

    public function store(Request $request)
    {
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            return back()->with('error', 'Please select an event first.');
        }

        $validated = $request->validate([
            'section' => 'required|string',
            'content' => 'required|string',
        ]);

        $validated['event_id'] = $selectedEventId;

        AuthorInformation::create($validated);

        return redirect()->route('admin.forauthor.list_authorinformation_admin')->with('success', 'Content added successfully!');
    }

    public function edit($id)
    {
        $authorInfo = AuthorInformation::findOrFail($id);
        return view('admin.forauthor.edit_authorinformation_admin', compact('authorInfo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $authorInfo = AuthorInformation::findOrFail($id);
        $authorInfo->update($request->only('content'));

        return redirect()->route('admin.forauthor.list_authorinformation_admin')->with('success', 'Content updated successfully!');
    }

    public function show($id)
    {
        $authorInfo = AuthorInformation::findOrFail($id);
        return view('admin.forauthor.detail_authorinformation_admin', compact('authorInfo'))->with('isDetail', true);
    }

    public function destroy(AuthorInformation $authorInfo)
    {
        $authorInfo->delete();
        return redirect()->route('admin.forauthor.list_authorinformation_admin')->with('success', 'Content deleted successfully!');
    }
}
