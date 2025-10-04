<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DescriptionSpeaker;

class SpeakerController extends Controller
{
    public function keynote()
    {
        $speakers = Speaker::where('speaker_type', 'keynote')->get();
        return view('speakers.keynote', compact('speakers'));
    }

    public function tutorial()
    {
        $speakers = Speaker::where('speaker_type', 'tutorial')->get();
        return view('speakers.tutorial', compact('speakers'));
    }

    public function detailSpeaker($slug)
    {
        $speaker = Speaker::where('slug', $slug)
            ->with('description')
            ->firstOrFail();

        return view('speakers.detail', compact('speaker'));
    }

    public function listSpeakers(Request $request)
    {
        $query = Speaker::query();

        // 🔍 Search by name or university
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('university', 'like', "%{$search}%");
            });
        }

        // Filter by type (keynote/tutorial)
        if ($request->filled('type')) {
            $query->where('speaker_type', $request->type);
        }

        // ⬆️ Sort Ascending by name
        $speakers = $query->orderBy('name', 'asc')->paginate(10);

        // Biar filter tetap nyangkut ketika pindah halaman
        $speakers->appends($request->all());
        return view('admin.speakers.list_speakers', compact('speakers'));
    }

    public function addForm()
    {
        return view('admin.speakers.add_speaker');
    }

    public function addSpeaker(Request $request)
    {
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

        // Upload image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('speakers', 'public');
        }

        // Simpan Speaker
        $speaker = Speaker::create([
            'name'          => $validated['name'],
            'slug'          => $slug,
            'university'    => $validated['university'] ?? null,
            'image'         => $imagePath,
            'speaker_type'  => $validated['speaker_type'],
            'biodata'       => $validated['biodata'] ?? null,
        ]);

        // Simpan DescriptionSpeaker (jika ada)
        if (isset($validated['descriptions']['title'])) {
            foreach ($request->descriptions['title'] as $index => $title) {
                if (!empty($title)) {
                    DescriptionSpeaker::create([
                        'speaker_id' => $speaker->id,
                        'title' => $title,
                        'content' => $request->descriptions['content'][$index] ?? '',
                    ]);
                }
            }
        }

        return redirect()->route('admin.speakers')->with('success', 'Speaker has been added successfully!');
    }
}
