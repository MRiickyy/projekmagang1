<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class HeaderController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('year', 'desc')->get();
        return view('admin.header.list_header', compact('events'));
    }

    public function addHeader()
    {
        return view('admin.add_header');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'year' => 'required|integer|unique:events,year',
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
        return view('admin.edit_header', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'year' => 'required|integer|unique:events,year,' . $event->id,
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
        return view('admin.detail_header', compact('event'));
    }
}
