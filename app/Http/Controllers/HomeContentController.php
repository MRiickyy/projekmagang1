<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Timeline;
use App\Models\HomeContent;
use App\Models\CallPaper;
use App\Models\RegistrationModel;
use App\Models\RegistrationFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeContentController extends Controller
{
    public function index($event_name, $event_year)
    {
        $event = Event::where('name', $event_name)
            ->where('year', $event_year)
            ->firstOrFail();

        $homeContents = HomeContent::where('event_id', $event->id)
            ->get()
            ->keyBy('section');

        $timelines = Timeline::where('event_id', $event->id)
            ->orderBy('round_number')
            ->orderBy('date')
            ->get()
            ->groupBy('round_number');

        // CALL FOR PAPERS
        $callPapers = CallPaper::where('event_id', $event->id)
            ->get()
            ->keyBy('section');

        // REGISTRATION DATA
        $registration = RegistrationModel::where('event_id', $event->id)
            ->get()
            ->keyBy('section');

        // FEES
        $fees = RegistrationFee::where('event_id', $event->id)->get();

        // ICOICT LINKS
        $homeContents['icoict_links'] = $homeContents
            ->filter(fn($item, $key) => str_starts_with($key, 'icoict_link_'))
            ->mapWithKeys(function ($item, $key) {
                $year = str_replace('icoict_link_', '', $key);
                return [$year => $item->content];
            });

        return view('home', [
            'homeContents' => $homeContents,
            'timelines' => $timelines,
            'event' => $event,
            'callPapers' => $callPapers,
            'fees' => $fees,
            'registration' => $registration,
        ]);
    }

    public function listHome()
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

        $homeContents = HomeContent::where('event_id', $selectedEventId)->get();
        $timelines = Timeline::where('event_id', $selectedEventId)
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
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            return back()->with('error', 'Please select an event first.');
        }

        // Validasi
        $validated = $request->validate([
            'section' => 'required|string',
            'content' => 'nullable|string',
            'content_file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096', // 4MB
        ]);

        $data = [
            'section' => $validated['section'],
            'event_id' => $selectedEventId,
        ];

        // Jika upload file
        if ($request->hasFile('content_file')) {
            $file = $request->file('content_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);

            $data['content'] = $filename;  // Simpan nama file di database
        } else {
            // Jika tidak mengupload file, pakai text biasa
            $data['content'] = $validated['content'];
        }

        HomeContent::create($data);

        return redirect()
            ->route('admin.list_home_contents_admin')
            ->with('success', 'Content successfully added!');
    }


    public function edit($id)
    {
        $homeContent = HomeContent::findOrFail($id);
        return view('admin.edit_home_contents_admin', compact('homeContent'));
    }

    public function update(Request $request, $id)
    {
        $homeContent = HomeContent::findOrFail($id);

        // Tentukan apakah ini section image
        $isImageSection = in_array($homeContent->section, ['banner_image', 'banner_logo']);

        // Validation
        $validated = $request->validate([
            'content' => $isImageSection ? 'nullable' : 'required|string',
            'content_file' => $isImageSection ? 'nullable|image|mimes:jpg,png,jpeg,webp|max:4096' : 'nullable',
        ]);

        // === Jika ini section GAMBAR ===
        if ($isImageSection) {

            if ($request->hasFile('content_file')) {

                // Hapus gambar lama jika ada
                if ($homeContent->content && file_exists(public_path('images/' . $homeContent->content))) {
                    @unlink(public_path('images/' . $homeContent->content));
                }

                // Upload gambar baru
                $file = $request->file('content_file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);

                $homeContent->content = $filename;
            }

        } else {
            // === Jika ini TEXT SECTION ===
            $homeContent->content = $validated['content'];
        }

        $homeContent->save();

        return redirect()->route('admin.list_home_contents_admin')
                        ->with('success', 'Content updated successfully!');
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
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            return back()->with('error', 'Please select an event first.');
        }

        $request->validate([
            'round_number' => 'required|integer|min:1',
            'title' => 'required|string',
            'date' => 'required|date',
        ]);

        Timeline::create([
            'round_number' => $request->round_number,
            'title' => $request->title,
            'date' => $request->date,
            'event_id' => $selectedEventId,
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
