<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Timeline;
use App\Models\HomeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeContentController extends Controller
{
    public function index()
    {

        $homeContents = HomeContent::with('event')->get()->keyBy('section');
        $timelines = Timeline::with('event')->get()->groupBy('round_number');


        $homeContents['icoict_links'] = $homeContents
            ->filter(fn($item, $key) => str_starts_with($key, 'icoict_link_'))
            ->mapWithKeys(function ($item, $key) {
                $year = str_replace('icoict_link_', '', $key);
                return [$year => $item->content];
            });

        $timelines = Timeline::orderBy('round_number')
            ->orderBy('date')
            ->get()
            ->groupBy('round_number');

        return view('home', compact('homeContents', 'timelines'));
    }


    public function listHome()
    {
        $year = session('selected_event_year', date('Y'));
        $event = Event::where('year', $year)->first();

        $homeContents = HomeContent::where('event_year', $event->year)->get();
        $timelines = Timeline::where('event_year', $event->year)
            ->orderBy('round_number')->orderBy('id')
            ->get()->groupBy('round_number');

        return view('admin.list_home_contents_admin', compact('homeContents', 'timelines'));
    }



    public function addHome()
    {
        return view('admin.add_home_contents_admin');
    }

    public function store(Request $request)
    {
        $year = session('selected_event_year', date('Y'));

        $validated = $request->validate([
            'section' => 'required|string',
            'content' => 'required|string',
        ]);

        $validated['event_year'] = $year;

        HomeContent::create($validated);

        return redirect()
            ->route('admin.list_home_contents_admin');
    }


    public function edit($id)
    {
        $homeContent = HomeContent::findOrFail($id);
        return view('admin.edit_home_contents_admin', compact('homeContent'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $homeContent = HomeContent::findOrFail($id);
        $homeContent->content = $request->content;
        $homeContent->save();

        return redirect()->route('admin.list_home_contents_admin');
    }

    public function show($id)
    {
        $homeContent = HomeContent::findOrFail($id);
        return view('admin.edit_home_contents_admin', compact('homeContent'))->with('isDetail', true);
    }



    public function destroy(HomeContent $homeContent)
    {
        $homeContent->delete();

        return redirect()
            ->route('admin.list_home_contents_admin');
    }

    // Menampilkan form tambah timeline
    public function addTimelineHome()
    {
        return view('admin.add_timeline_home_admin');
    }

    // Menyimpan timeline baru
    public function storeTimelineHome(Request $request)
    {
        $request->validate([
            'round_number' => 'required|integer|min:1',
            'title' => 'required|string',
            'date' => 'required|date',
        ]);

        Timeline::create([
            'round_number' => $request->round_number,
            'title' => $request->title,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.list_home_contents_admin');
    }


    public function editTimeline($id)
    {
        $timeline = Timeline::findOrFail($id);
        return view('admin.edit_timeline_home_admin', compact('timeline'));
    }

    public function showTimeline($id)
    {
        $timeline = Timeline::findOrFail($id);
        return view('admin.edit_timeline_home_admin', compact('timeline'))->with('isDetail', true);
    }

    public function updateTimeline(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
        ]);

        $timeline = Timeline::findOrFail($id);
        $timeline->title = $request->title;
        $timeline->date = $request->date;
        $timeline->save();

        return redirect()->route('admin.list_home_contents_admin');
    }

    public function destroyTimeline(Timeline $timeline)
    {
        $timeline->delete();

        return redirect()
            ->route('admin.list_home_contents_admin');
    }
}