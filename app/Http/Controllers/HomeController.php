<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $timelines = Timeline::orderBy('round_number')
            ->orderBy('date')
            ->get()
            ->groupBy('round_number');

        return view('home', compact('timelines'));
    }
}
