<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use App\Models\DescriptionSpeaker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpeakerController extends Controller
{
    // ==============================
    // ======= FRONTEND AREA ========
    // ==============================

    public function keynote()
    {
        $speakers = Speaker::with('event')
            ->where('speaker_type', 'keynote')
            ->get();

        return view('speakers.keynote', compact('speakers'));
    }

    public function tutorial()
    {
        $speakers = Speaker::with('event')
            ->where('speaker_type', 'tutorial')
            ->get();

        return view('speakers.tutorial', compact('speakers'));
    }

    public function detailSpeaker($slug)
    {
        $speaker = Speaker::where('slug', $slug)
            ->with('descriptions')
            ->firstOrFail();

        return view('speakers.detail', compact('speaker'));
    }

    // ==============================
    // ======== ADMIN AREA ==========
    // ==============================

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

        // 🎯 Filter by speaker type (keynote/tutorial)
        if ($request->filled('type')) {
            $query->where('speaker_type', $request->type);
        }

        // 🔠 Sort ascending by name
        $speakers = $query->orderBy('name', 'asc')->paginate(10);
        $speakers->appends($request->all());

        return view('admin.speakers.list_speakers', compact('speakers'));
    }

    // ===== FORM TAMBAH SPEAKER =====
    public function addForm()
    {
        return view('admin.speakers.add_speaker');
    }

    // ===== SIMPAN SPEAKER BARU =====
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

        // 🖼 Upload image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/speakers'), $filename);
            $imagePath = $filename;
        }

        // 💾 Simpan Speaker
        $speaker = Speaker::create([
            'name'          => $validated['name'],
            'slug'          => $slug,
            'university'    => $validated['university'] ?? null,
            'image'         => $imagePath,
            'speaker_type'  => $validated['speaker_type'],
            'biodata'       => $validated['biodata'] ?? null,
        ]);

        // 📝 Simpan DescriptionSpeaker (jika ada)
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

        // 🔁 Redirect sesuai tipe speaker
        $route = $speaker->speaker_type === 'keynote'
            ? 'admin.speakers.keynote'
            : 'admin.speakers.tutorial';

        return redirect()->route($route)->with('success', 'Speaker has been added successfully!');
    }

    // ===== FORM EDIT SPEAKER =====
    public function editForm($slug)
    {
        $speaker = Speaker::where('slug', $slug)
            ->with('descriptions')
            ->firstOrFail();

        return view('admin.speakers.edit_speaker', compact('speaker'));
    }

    // ===== UPDATE SPEAKER =====
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

        // 🖼 Upload new image jika ada
        if ($request->hasFile('image')) {
            if ($speaker->image && file_exists(public_path('images/speakers/' . $speaker->image))) {
                unlink(public_path('images/speakers/' . $speaker->image));
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/speakers'), $filename);
            $speaker->image = $filename;
        }

        // 🔄 Update data speaker
        $speaker->update([
            'name'         => $validated['name'],
            'slug'         => $slug,
            'university'   => $validated['university'] ?? null,
            'speaker_type' => $validated['speaker_type'],
            'biodata'      => $validated['biodata'] ?? null,
        ]);

        // 🔧 Update Descriptions
        $existingDescriptions = $speaker->descriptions->pluck('id')->toArray();
        $requestTitles = $request->descriptions['title'] ?? [];
        $requestContents = $request->descriptions['content'] ?? [];
        $newDescriptionIds = [];

        foreach ($requestTitles as $index => $title) {
            $content = $requestContents[$index] ?? '';

            if (isset($request->descriptions['id'][$index])) {
                $desc = DescriptionSpeaker::find($request->descriptions['id'][$index]);
                if ($desc) {
                    $desc->update([
                        'title'   => $title,
                        'content' => $content
                    ]);
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

        // 🗑 Hapus deskripsi yang dihapus dari form
        $toDelete = array_diff($existingDescriptions, $newDescriptionIds);
        if (!empty($toDelete)) {
            DescriptionSpeaker::whereIn('id', $toDelete)->delete();
        }

        // 🔁 Redirect sesuai tipe speaker
        $route = $speaker->speaker_type === 'keynote'
            ? 'admin.speakers.keynote'
            : 'admin.speakers.tutorial';

        return redirect()->route($route)->with('success', 'Speaker has been updated successfully!');
    }

    // ===== DELETE SPEAKER =====
    public function deleteSpeaker($slug)
    {
        $speaker = Speaker::with('descriptions')->where('slug', $slug)->firstOrFail();

        // Simpan tipe sebelum dihapus
        $type = $speaker->speaker_type;

        // Hapus image jika ada
        if ($speaker->image && file_exists(public_path('images/speakers/' . $speaker->image))) {
            unlink(public_path('images/speakers/' . $speaker->image));
        }

        // Hapus deskripsi & data speaker
        $speaker->descriptions()->delete();
        $speaker->delete();

        // 🔁 Redirect sesuai tipe speaker
        $route = $type === 'keynote'
            ? 'admin.speakers.keynote'
            : 'admin.speakers.tutorial';

        return redirect()->route($route)->with('success', 'Speaker has been deleted successfully!');
    }

    // ===== DETAIL SPEAKER ADMIN =====
    public function adminDetail($slug)
    {
        $speaker = Speaker::where('slug', $slug)
            ->with('descriptions')
            ->firstOrFail();

        return view('admin.speakers.detail_speaker', compact('speaker'));
    }

    // ==============================
    // ==== LIST PER TIPE ADMIN ====
    // ==============================

    public function listKeynoteSpeakers(Request $request)
    {
        $query = Speaker::where('speaker_type', 'keynote');

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
            'pageTitle' => 'Keynote Speakers List',
            'type' => 'keynote'
        ]);
    }

    public function listTutorialSpeakers(Request $request)
    {
        $query = Speaker::where('speaker_type', 'tutorial');

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
            'pageTitle' => 'Tutorial Speakers List',
            'type' => 'tutorial'
        ]);
    }
}
