<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function keynote()
    {
        $speakers = Speaker::where('speaker_type', 'keynote')->get();
        return view('keynotespeaker', compact('speakers'));
    }

    public function tutorial()
    {
        $speakers = Speaker::where('speaker_type', 'tutorial')->get();
        return view('tutorialspeaker', compact('speakers'));
    }

    public function detailspeaker($id)
    {
        $speaker = Speaker::findOrFail($id);
        return view('detailspeakerK', compact('speaker'));
    }
}
