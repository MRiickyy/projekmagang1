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
        
        $homeContents = HomeContent::all()->keyBy('section');
        $timelines = Timeline::all()->groupBy('round_number');

       
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
    public function listHome()
    {
        $homeContents = HomeContent::all();
        return view('admin.list_home_contents_admin', compact('homeContents'));
    }

    
    public function addHome()
    {
        return view('admin.add_home_contents_admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required|string',
            'content' => 'required|string',
        ]);
        

        HomeContent::create($request->only('section', 'content'));

        
        return redirect()
            ->route('admin.list_home_contents_admin')
            ->with('success', 'Content berhasil ditambahkan!');
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