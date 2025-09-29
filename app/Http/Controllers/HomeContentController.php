<?php

namespace App\Http\Controllers;

use App\Models\HomeContent;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeContentController extends Controller
{
    public function index()
    {
        // Ambil semua data home_contents dan jadikan key berdasarkan section
        $homeContents = HomeContent::all()->keyBy('section');

        // Ambil semua link ICoICT dari home_contents
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

    // Bagian Admin tetap sama
    public function adminIndex()
    {
        $homeContents = HomeContent::all();
        return view('admin.home_contents.index', compact('homeContents'));
    }

    public function create()
    {
        return view('admin.home_contents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required|string|unique:home_contents,section',
            'content' => 'required|string',
        ]);

        HomeContent::create($request->only('section', 'content'));

        return redirect()->route('admin.home_contents.index')->with('success', 'Content created');
    }

    public function edit(HomeContent $homeContent)
    {
        return view('admin.home_contents.edit', compact('homeContent'));
    }

    public function update(Request $request, HomeContent $homeContent)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $homeContent->update(['content' => $request->content]);

        return redirect()->route('admin.home_contents.index')->with('success', 'Content updated');
    }

    public function destroy(HomeContent $homeContent)
    {
        $homeContent->delete();
        return redirect()->route('admin.home_contents.index')->with('success', 'Content deleted');
    }
}