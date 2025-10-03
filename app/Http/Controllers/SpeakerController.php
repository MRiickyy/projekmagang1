<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use Illuminate\Http\Request;

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

    public function detailspeaker($slug)
    {
        $speaker = Speaker::where('slug', $slug)
            ->with('description')
            ->firstOrFail();

        return view('speakers.detail', compact('speaker'));
    }

    public function adminList()
    {
        $speakers = Speaker::all();
        return view('admin.speaker_list', compact('speakers'));
    }
}