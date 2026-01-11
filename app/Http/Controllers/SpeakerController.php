<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Speaker;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DescriptionSpeaker;

class SpeakerController extends Controller
{
    // =======================================
    // ============ FRONTEND AREA ============
    // =======================================

    public function keynote($event_name, $event_year)
    {
        $event = Event::where('name', $event_name)
                      ->where('year', $event_year)
                      ->firstOrFail();

        $speakers = Speaker::with('event')
            ->where('event_id', $event->id)
            ->where('speaker_type', 'keynote')
            ->get();

        return view('speakers.keynote', compact('speakers', 'event'));
    }

    public function tutorial($event_name, $event_year)
    {
        $event = Event::where('name', $event_name)
                      ->where('year', $event_year)
                      ->firstOrFail();

        $speakers = Speaker::with('event')
            ->where('event_id', $event->id)
            ->where('speaker_type', 'tutorial')
            ->get();

        return view('speakers.tutorial', compact('speakers', 'event'));
    }

    public function detailSpeaker($event_name, $event_year, $slug)
    {
        $event = Event::where('name', $event_name)
                      ->where('year', $event_year)
                      ->firstOrFail();

        $speaker = Speaker::where('slug', $slug)
            ->where('event_id', $event->id)
            ->with('descriptions')
            ->firstOrFail();

        return view('speakers.detail', compact('speaker', 'event'));
    }

    // =======================================
    // ============== ADMIN AREA =============
    // =======================================

    public function addForm()
    {
        return view('admin.speakers.add_speaker');
    }

    public function addSpeaker(Request $request)
    {
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            return back()->with('error', 'Please select an event first.');
        }

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'slug'          => 'nullable|string|max:255|unique:speakers,slug',
            'university'    => 'nullable|string|max:255',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
            'speaker_type'  => 'required|in:keynote,tutorial',
            'biodata'       => 'nullable|string',
            'descriptions'  => 'nullable|array',
            'descriptions.title'   => 'array',
            'descriptions.content' => 'array',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['name']);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/speakers'), $filename);
            $imagePath = $filename;
        }

        $speaker = Speaker::create([
            'name'          => $validated['name'],
            'slug'          => $slug,
            'university'    => $validated['university'] ?? null,
            'image'         => $imagePath,
            'speaker_type'  => $validated['speaker_type'],
            'biodata'       => $validated['biodata'] ?? null,
            'event_id'      => $selectedEventId,
        ]);

        // Simpan deskripsi tambahan
        if (isset($validated['descriptions']['title'])) {
            foreach ($request->descriptions['title'] as $index => $title) {
                if (!empty($title)) {
                    DescriptionSpeaker::create([
                        'speaker_id' => $speaker->id,
                        'title'      => $title,
                        'content'    => $request->descriptions['content'][$index] ?? '',
                    ]);
                }
            }
        }

        $route = $speaker->speaker_type === 'keynote'
            ? 'admin.speakers.keynote'
            : 'admin.speakers.tutorial';

        return redirect()->route($route)->with('success', 'Speaker has been added successfully!');
    }

    public function editForm($slug)
    {
        $speaker = Speaker::where('slug', $slug)
            ->with('descriptions')
            ->firstOrFail();

        return view('admin.speakers.edit_speaker', compact('speaker'));
    }

    public function updateSpeaker(Request $request, $slug)
    {
        $speaker = Speaker::with('descriptions')->where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'slug'          => 'nullable|string|max:255|unique:speakers,slug,' . $speaker->id,
            'university'    => 'nullable|string|max:255',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
            'speaker_type'  => 'required|in:keynote,tutorial',
            'biodata'       => 'nullable|string',
            'descriptions'  => 'nullable|array',
            'descriptions.title'   => 'array',
            'descriptions.content' => 'array',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['name']);

        if ($request->hasFile('image')) {
            if ($speaker->image && file_exists(public_path('images/speakers/' . $speaker->image))) {
                unlink(public_path('images/speakers/' . $speaker->image));
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/speakers'), $filename);
            $speaker->image = $filename;
        }

        $speaker->update([
            'name'         => $validated['name'],
            'slug'         => $slug,
            'university'   => $validated['university'] ?? null,
            'speaker_type' => $validated['speaker_type'],
            'biodata'      => $validated['biodata'] ?? null,
        ]);

        // Update deskripsi
        $existingDescriptions = $speaker->descriptions->pluck('id')->toArray();
        $requestTitles = $request->descriptions['title'] ?? [];
        $requestContents = $request->descriptions['content'] ?? [];
        $newDescriptionIds = [];

        foreach ($requestTitles as $index => $title) {
            $content = $requestContents[$index] ?? '';

            if (isset($request->descriptions['id'][$index])) {
                $desc = DescriptionSpeaker::find($request->descriptions['id'][$index]);
                if ($desc) {
                    $desc->update(['title' => $title, 'content' => $content]);
                    $newDescriptionIds[] = $desc->id;
                }
            } else {
                $desc = DescriptionSpeaker::create([
                    'speaker_id' => $speaker->id,
                    'title'      => $title,
                    'content'    => $content
                ]);
                $newDescriptionIds[] = $desc->id;
            }
        }

        $toDelete = array_diff($existingDescriptions, $newDescriptionIds);
        if (!empty($toDelete)) {
            DescriptionSpeaker::whereIn('id', $toDelete)->delete();
        }

        $route = $speaker->speaker_type === 'keynote'
            ? 'admin.speakers.keynote'
            : 'admin.speakers.tutorial';

        return redirect()->route($route)->with('success', 'Speaker updated successfully!');
    }

    public function deleteSpeaker($slug)
    {
        $speaker = Speaker::with('descriptions')->where('slug', $slug)->firstOrFail();
        $type = $speaker->speaker_type;

        if ($speaker->image && file_exists(public_path('images/speakers/' . $speaker->image))) {
            unlink(public_path('images/speakers/' . $speaker->image));
        }

        $speaker->descriptions()->delete();
        $speaker->delete();

        $route = $type === 'keynote'
            ? 'admin.speakers.keynote'
            : 'admin.speakers.tutorial';

        return redirect()->route($route)->with('success', 'Speaker deleted successfully!');
    }

    public function listKeynoteSpeakers(Request $request)
    {
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            $selectedEvent = Event::latest('year')->first();

            if (!$selectedEvent) {
                return back()->with('error', 'No event found.');
            }

            $selectedEventId = $selectedEvent->id;
            session(['selected_event_id' => $selectedEventId]);
        }

        $event = Event::find($selectedEventId);

        $query = Speaker::where('event_id', $selectedEventId)
            ->where('speaker_type', 'keynote');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('university', 'like', "%{$search}%");
            });
        }

        $speakers = $query->orderBy('name')->paginate(10);
        $speakers->appends($request->all());

        return view('admin.speakers.list_speakers', [
            'speakers' => $speakers,
            'pageTitle' => 'Keynote Speakers - ' . $event->name . ' (' . $event->year . ')',
            'type' => 'keynote',
            'event' => $event
        ]);
    }

    public function listTutorialSpeakers(Request $request)
    {
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            $selectedEvent = Event::latest('year')->first();

            if (!$selectedEvent) {
                return back()->with('error', 'No event found.');
            }

            $selectedEventId = $selectedEvent->id;
            session(['selected_event_id' => $selectedEventId]);
        }

        $event = Event::find($selectedEventId);

        $query = Speaker::where('event_id', $selectedEventId)
            ->where('speaker_type', 'tutorial');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('university', 'like', "%{$search}%");
            });
        }

        $speakers = $query->orderBy('name')->paginate(10);
        $speakers->appends($request->all());

        return view('admin.speakers.list_speakers', [
            'speakers' => $speakers,
            'pageTitle' => 'Tutorial Speakers - ' . $event->name . ' (' . $event->year . ')',
            'type' => 'tutorial',
            'event' => $event
        ]);
    }

    public function adminDetail($slug)
    {
        $speaker = Speaker::where('slug', $slug)
            ->with('descriptions', 'event')
            ->firstOrFail();
            
        return view('admin.speakers.detail_speaker', compact('speaker'));
    }
}
